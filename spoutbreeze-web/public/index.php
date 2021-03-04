<?php

/**
 * SpoutBreeze open source platform - https://www.spoutbreeze.org/
 *
 * Copyright (c) 2021 Frictionless Solutions Inc., RIADVICE SUARL and by respective authors (see below).
 *
 * This program is free software; you can redistribute it and/or modify it under the
 * terms of the GNU Lesser General Public License as published by the Free Software
 * Foundation; either version 3.0 of the License, or (at your option) any later
 * version.
 *
 * SpoutBreeze is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License along
 * with SpoutBreeze; if not, see <http://www.gnu.org/licenses/>.
 */

if (PHP_SAPI === 'cli') {
    parse_str(str_replace('/?', '', $argv[1]), $_GET);
}

if (!empty($_GET) && array_key_exists('hypertest', $_GET)) {
    require_once __DIR__ . '/hypertest/index.php';
    exit;
}

// Change to application directory to execute the code
chdir(realpath(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'app'));

// require bootstrap to init the application
require_once 'src/Application/Bootstrap.php';

$app = new \Application\Bootstrap();
$app->start();
