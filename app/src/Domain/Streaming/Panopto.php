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

use Panopto\Client;
use Panopto\SessionManagement\AddSession;
use Panopto\SessionManagement\AuthenticationInfo;
use Panopto\SessionManagement\ListSessionRTMPStreams;
use Panopto\SessionManagement\UpdateSessionSetRTMPBroadcast;
use Panopto\SessionManagement\UpdateSessionCreateRTMPStreams;

/**
 * Panopto webcast adapter: creates a broadcast session in a folder through
 * the PublicAPI SOAP service, starts its RTMP broadcast, and returns the
 * primary ingest URL. Site credentials (api user + password) and the folder
 * id come from the operator configuration, exactly like the OAuth tokens of
 * the other providers.
 */
final class Panopto implements Provider
{
    public function __construct(private ?Client $client = null) {}

    public function name(): string
    {
        return 'panopto';
    }

    public function prepare(array $config): Destination
    {
        $site     = rtrim(trim((string) ($config['site'] ?? '')), '/');
        $user     = trim((string) ($config['user'] ?? ''));
        $password = (string) ($config['password'] ?? '');
        $folder   = trim((string) ($config['folder_id'] ?? ''));
        $title    = (string) ($config['title'] ?? 'SpoutBreeze broadcast');
        if ('' === $site || '' === $user || '' === $folder) {
            throw new \InvalidArgumentException('The Panopto site, api user and folder id are required');
        }

        $client = $this->client ?? $this->createClient($site, $user, $password);
        $auth   = new AuthenticationInfo($user, $password, null);

        $session = $client->session_management->AddSession(new AddSession($auth, $title, $folder, true));
        $sessionId = is_object($session) && isset($session->AddSessionResult)
            ? (string) $session->AddSessionResult
            : '';
        if ('' === $sessionId) {
            throw new \RuntimeException('Panopto did not return a session id');
        }

        $client->session_management->UpdateSessionSetRTMPBroadcast(
            new UpdateSessionSetRTMPBroadcast($auth, $sessionId)
        );
        $client->session_management->UpdateSessionCreateRTMPStreams(
            new UpdateSessionCreateRTMPStreams($auth, $sessionId, true)
        );

        $streams = $client->session_management->ListSessionRTMPStreams(
            new ListSessionRTMPStreams($auth, $sessionId)
        );
        $ingest = null;
        $result = is_object($streams) ? ($streams->ListSessionRTMPStreamsResult ?? null) : null;
        if (is_object($result) && is_iterable($result->RTMPStreamInfo ?? null)) {
            foreach ($result->RTMPStreamInfo as $stream) {
                $url = (string) ($stream->URL ?? '');
                if ('' !== $url) {
                    $ingest = $url . '/' . (string) ($stream->StreamKey ?? '');
                    break;
                }
            }
        }
        if (null === $ingest) {
            throw new \RuntimeException('Panopto did not return an RTMP ingest URL');
        }

        return new Destination(
            $this->name(),
            $ingest,
            (string) ($config['label'] ?? 'panopto'),
            ['session_id' => $sessionId, 'title' => $title]
        );
    }

    /**
     * After the stream, convert the broadcast to an on-demand session.
     *
     * @param array<string, mixed> $config
     * @param array<string, mixed> $meta
     */
    public function convertToOnDemand(array $config, array $meta): void
    {
        $sessionId = (string) ($meta['session_id'] ?? '');
        if ('' === $sessionId) {
            return;
        }
        $site     = rtrim(trim((string) ($config['site'] ?? '')), '/');
        $user     = trim((string) ($config['user'] ?? ''));
        $password = (string) ($config['password'] ?? '');
        if ('' === $site || '' === $user) {
            return;
        }

        $client = $this->client ?? $this->createClient($site, $user, $password);
        $auth   = new AuthenticationInfo($user, $password, null);
        $client->session_management->UpdateSessionSetShouldConvertToOnDemand(
            new \Panopto\SessionManagement\UpdateSessionSetShouldConvertToOnDemand($auth, $sessionId, true)
        );
    }

    private function createClient(string $host, string $user, string $password): Client
    {
        $client = new Client($host);
        $client->setAuthenticationInfo($user, $password);

        return $client;
    }
}
