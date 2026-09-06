<?php

declare(strict_types=1);

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

namespace Core;

use Suite\ConfigurationTest;
use Suite\ModelTest;
use Suite\SessionTest;
use Suite\ApiTest;
use Suite\DomainTest;
use Sukarix\Statera as SukarixStatera;

class Statera extends SukarixStatera
{
    public static function registerGroups(): void
    {
        self::setGroups([
            ConfigurationTest::class,
            SessionTest::class,
            ModelTest::class,
            ApiTest::class,
            DomainTest::class,
        ]);
    }
}

class Map
{
    public function get(): void {}

    public function post(): void {}
}
