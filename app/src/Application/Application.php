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

namespace Application;

use Sukarix\Application\Bootstrap;
use Sukarix\Core\Session;

class Application extends Bootstrap
{
    /**
     * The console database: users, sessions and operator data. The broadcast
     * domain (broadcasts, servers, agents) lives in its own database and is
     * reached through Domain\Persistence\DomainDb.
     *
     * Read from `spoutbreeze.db.*` rather than `db.*` because the last line
     * here sets the `db` hive key to the connection object, which would
     * replace an ini-loaded `db` array and blank out `db.dsn` for everything
     * that reads it afterwards.
     */
    protected function createDatabaseConnection(): void
    {
        $db = new \DB\SQL(
            (string) $this->f3->get('spoutbreeze.db.dsn'),
            (string) $this->f3->get('spoutbreeze.db.username'),
            (string) $this->f3->get('spoutbreeze.db.password')
        );
        \Registry::set('db', $db);
        $this->f3->set('db', $db);
    }

    /**
     * Seed a new session's locale from the configured default before the
     * framework loads the rest of the application settings.
     */
    protected function loadAppSetting(): void
    {
        if (null === $this->session) {
            return;
        }

        if (!$this->session->exists('locale')) {
            $this->session->set('locale', $this->f3->get('application.locale') ?: 'en-GB');
        }
        parent::loadAppSetting();
    }
}
