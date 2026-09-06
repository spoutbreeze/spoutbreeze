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

namespace Domain\Messaging;

use Sukarix\Messaging\AmqpPublisher as SukarixAmqpPublisher;

/**
 * Resolves this app's AMQP DSN and exchange from configuration. The
 * publisher itself lives in {@see SukarixAmqpPublisher}.
 */
final class AmqpPublisher
{
    public static function fromHive(?\Base $f3 = null): SukarixAmqpPublisher
    {
        $dsn = (string) ($f3 ?? \Base::instance())->get('spoutbreeze.amqp.dsn');

        return new SukarixAmqpPublisher($dsn, 'spoutbreeze');
    }
}
