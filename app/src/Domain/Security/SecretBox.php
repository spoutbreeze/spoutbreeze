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

namespace Domain\Security;

use Sukarix\Security\SecretBox as SukarixSecretBox;

/**
 * Resolves this app's credential-sealing key from configuration.
 * The encryption itself lives in {@see SukarixSecretBox}.
 */
final class SecretBox
{
    /** Hive key, fed from the ini file or the SPB_SECRET_KEY environment variable. */
    public const HIVE_KEY = 'spoutbreeze.secret_key';

    /**
     * Reads the key from configuration: `spoutbreeze.secret_key` in the ini
     * file, or the SPB_SECRET_KEY environment variable that overrides it. It
     * is expected as 64 hex characters or base64 decoding to 32 bytes —
     * `sodium_crypto_secretbox_keygen()` output, in other words.
     *
     * @throws \RuntimeException when no usable key is configured
     */
    public static function fromHive(?\Base $f3 = null): SukarixSecretBox
    {
        $key = (string) ($f3 ?? \Base::instance())->get(self::HIVE_KEY);
        if ('' === $key) {
            throw new \RuntimeException(
                self::HIVE_KEY . ' is not set (SPB_SECRET_KEY); destinations cannot store credentials without it'
            );
        }

        return SukarixSecretBox::fromKeyMaterial($key);
    }
}
