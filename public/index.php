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

use Application\Application;

if (PHP_SAPI === 'cli') {
    parse_str(str_replace('/?', '', $argv[1]), $_GET);
}

if (!empty($_GET) && array_key_exists('statera', $_GET)) {
    require_once __DIR__ . '/statera/index.php';

    exit;
}

// Change to application directory to execute the code
chdir(realpath(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'app'));

// load composer autoload
require_once '../vendor/autoload.php';

$app = new Application();
$app->start();
