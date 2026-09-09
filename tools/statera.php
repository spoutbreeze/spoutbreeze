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

use Application\Application;
use Core\Statera;

/**
 * Sukarix - Just the Right Amount of Sweetness and Efficiency on Top of Fat-Free
 * Copyright (c) RIADVICE SUARL
 * All rights reserved.
 */

// load composer autoload — resolve from project root (works from tools/ or public/statera/)
$projectRoot = realpath(__DIR__ . '/../');
if (!file_exists($projectRoot . '/vendor/autoload.php')) {
    $projectRoot = realpath(__DIR__ . '/../../');
}

require_once $projectRoot . '/vendor/autoload.php';

// Change to application directory to execute the code
chdir(realpath($projectRoot . DIRECTORY_SEPARATOR . 'app'));

$GLOBALS['test_cli'] = PHP_SAPI === 'cli';

// Activate test environment so detectEnvironment() loads config-test.ini and routes-test.ini
// Only set if not already provided via CLI URL params (e.g. ?statera=withCoverage)
$f3 = Base::instance();
if (!$f3->exists('GET.statera')) {
    $f3->set('GET.statera', 'all');
}

Statera::registerGroups();
Statera::startCoverage('Application Bootstrapping');
$app = new Application();
Statera::stopCoverage();
$app->start();
