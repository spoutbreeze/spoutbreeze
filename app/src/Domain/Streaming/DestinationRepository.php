<?php

/*
 * SpoutBreeze open source platform - https://www.spoutbreeze.org/
 *
 * Copyright (c) 2021-2026 RIADVICE SUARL.
 *
 * This program is free software: you can redistribute it and/or modify it under the
 * terms of the GNU Affero General Public License as published by the Free Software
 * Foundation, either version 3 of the License, or (at your option) any later version.
 *
 * SpoutBreeze is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License along
 * with SpoutBreeze. If not, see <https://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace Domain\Streaming;

use Sukarix\Security\SecretBox;

/**
 * Saved streaming destinations.
 *
 * A destination is a named provider configuration an operator sets up once
 * and then selects when starting a broadcast, instead of pasting a stream
 * key or an access token into the start form every time. The credential
 * half of the configuration is sealed with {@see SecretBox} before it
 * reaches the database and is only ever unsealed to build a broadcast.
 */
final class DestinationRepository
{
    /** Providers an operator may configure, with the fields each one needs. */
    public const PROVIDERS = [
        'generic_rtmp' => ['url', 'stream_key'],
        'youtube'      => ['access_token', 'privacy'],
        'facebook'     => ['access_token', 'target_id'],
        'linkedin'     => ['url', 'key'],
        'panopto'      => ['site', 'user', 'password', 'folder_id'],
    ];

    public function __construct(private \PDO $pdo, private SecretBox $secrets)
    {
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
    }

    /**
     * Every destination, credentials excluded. This is what the console
     * lists and what the broadcast form offers.
     *
     * @return list<array<string, mixed>>
     */
    public function all(): array
    {
        $rows = $this->pdo->query(
            'SELECT id, name, provider, label, config, enabled, last_status, last_checked_on, created_on
             FROM destinations ORDER BY name'
        )->fetchAll() ?: [];

        foreach ($rows as $index => $row) {
            $rows[$index]['config'] = $this->decodeConfig($row['config'] ?? null);
        }

        return $rows;
    }

    /**
     * @return list<array<string, mixed>>
     */
    public function enabled(): array
    {
        return array_values(array_filter($this->all(), static fn (array $row): bool => (bool) $row['enabled']));
    }

    /**
     * @param array<string, mixed> $config
     *
     * @throws \InvalidArgumentException on an unknown provider, a blank name
     *                                   or a configuration the provider rejects
     */
    public function create(string $name, string $provider, string $label, array $config): int
    {
        $name  = trim($name);
        $label = trim($label);
        if ('' === $name) {
            throw new \InvalidArgumentException('A destination name is required');
        }
        if (!isset(self::PROVIDERS[$provider])) {
            throw new \InvalidArgumentException('Unknown streaming provider "' . $provider . '"');
        }
        if ('' === $label) {
            $label = $provider;
        }

        $config = $this->prune($provider, $config);
        $config['label'] = $label;

        // Fail here rather than at broadcast time: a destination that the
        // provider cannot turn into an ingest URL is not worth storing.
        // Providers that reach the network to prepare (YouTube, Facebook,
        // Panopto) are validated on their static fields only.
        $this->validate($provider, $config);

        $statement = $this->pdo->prepare(
            'INSERT INTO destinations (name, provider, label, config, secret, enabled, created_on, updated_on)
             VALUES (?, ?, ?, ?, ?, true, now(), now())
             RETURNING id'
        );

        try {
            $statement->execute([
                $name,
                $provider,
                $label,
                json_encode(Destination::withoutSecrets($config), JSON_THROW_ON_ERROR),
                $this->secrets->encryptArray(Destination::onlySecrets($config)),
            ]);
        } catch (\PDOException $e) {
            if (str_contains($e->getMessage(), 'destinations_name')) {
                throw new \InvalidArgumentException('A destination with this name already exists');
            }

            throw $e;
        }

        return (int) $statement->fetchColumn();
    }

    public function delete(int $id): void
    {
        $this->pdo->prepare('DELETE FROM destinations WHERE id = ?')->execute([$id]);
    }

    public function toggle(int $id): void
    {
        $this->pdo
            ->prepare('UPDATE destinations SET enabled = NOT enabled, updated_on = now() WHERE id = ?')
            ->execute([$id]);
    }

    public function recordStatus(int $id, string $status): void
    {
        $this->pdo
            ->prepare('UPDATE destinations SET last_status = ?, last_checked_on = now() WHERE id = ?')
            ->execute([mb_substr($status, 0, 32), $id]);
    }

    /**
     * Resolves selected destination ids into the target rows
     * {@see ProviderRegistry::resolve()} expects, credentials unsealed.
     *
     * Disabled destinations are skipped silently: an operator who turns one
     * off should not have every scheduled broadcast start failing.
     *
     * @param list<int|string> $ids
     *
     * @return list<array<string, mixed>>
     */
    public function targetsFor(array $ids): array
    {
        $ids = array_values(array_unique(array_filter(array_map('intval', $ids), static fn (int $id): bool => $id > 0)));
        if ([] === $ids) {
            return [];
        }

        $placeholders = implode(',', array_fill(0, \count($ids), '?'));
        $statement    = $this->pdo->prepare(
            'SELECT id, provider, label, config, secret FROM destinations
             WHERE id IN (' . $placeholders . ') AND enabled = true ORDER BY name'
        );
        $statement->execute($ids);

        $targets = [];
        foreach ($statement->fetchAll() ?: [] as $row) {
            $config = $this->decodeConfig($row['config'] ?? null);
            $secret = (string) ($row['secret'] ?? '');
            if ('' !== $secret) {
                $config = array_merge($config, $this->secrets->decryptArray($secret));
            }
            $config['provider']       = (string) $row['provider'];
            $config['label']          = (string) $row['label'];
            $config['destination_id'] = (int) $row['id'];
            $targets[]                = $config;
        }

        return $targets;
    }

    /**
     * @param array<string, mixed> $config
     *
     * @return array<string, mixed>
     */
    private function prune(string $provider, array $config): array
    {
        // LinkedIn calls its custom-stream credential `key`; the console form
        // spells every stream credential `stream_key`.
        if ('linkedin' === $provider && '' === (string) ($config['key'] ?? '')) {
            $config['key'] = $config['stream_key'] ?? '';
        }

        $pruned = [];
        foreach (self::PROVIDERS[$provider] as $field) {
            $value = trim((string) ($config[$field] ?? ''));
            if ('' !== $value) {
                $pruned[$field] = $value;
            }
        }

        return $pruned;
    }

    /**
     * @param array<string, mixed> $config
     */
    private function validate(string $provider, array $config): void
    {
        switch ($provider) {
            case 'generic_rtmp':
            case 'linkedin':
                // Both assemble a URL locally, so prepare() is a real check.
                (new ProviderRegistry(new GenericRtmp(), new LinkedIn(new CurlTransport())))
                    ->resolve([$config + ['provider' => $provider]]);

                break;

            case 'youtube':
            case 'facebook':
                if ('' === (string) ($config['access_token'] ?? '')) {
                    throw new \InvalidArgumentException('An access token is required');
                }

                break;

            case 'panopto':
                foreach (['site', 'user', 'password', 'folder_id'] as $field) {
                    if ('' === (string) ($config[$field] ?? '')) {
                        throw new \InvalidArgumentException('Panopto needs a site, api user, password and folder id');
                    }
                }

                break;
        }
    }

    /**
     * @return array<string, mixed>
     */
    private function decodeConfig(mixed $raw): array
    {
        if (\is_array($raw)) {
            return $raw;
        }
        if (!\is_string($raw) || '' === $raw) {
            return [];
        }
        $decoded = json_decode($raw, true);

        return \is_array($decoded) ? $decoded : [];
    }
}
