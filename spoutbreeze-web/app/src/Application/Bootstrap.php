<?php

/**
 * SpoutBreeze open source platform - https://www.spoutbreeze.io/
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

namespace Application;

use Base;
use Enum\CacheKey;
use Helpers\Time;
use Mail\MailSender;
use Models\Setting;
use Registry;
use Tracy\Debugger;

// load composer autoload
require_once '../vendor/autoload.php';

/**
 * fat-free framework application initialisation.
 */
class Bootstrap extends Boot
{
    public function __construct()
    {
        if (PHP_SAPI !== 'cli') {
            $this->logFileName = 'app';
        } else {
            $this->logFileName = 'cli';
        }
        $this->logSession = true;

        parent::__construct();

        $this->setupMailer();
        $this->addGlobalExceptionHanlder();
        $this->createDatabaseConnection();
        $this->prepareSession();
        // $this->loadAppSetting();
        $this->detectCli();
        $this->loadRoutesAndAssets();
    }

    protected function loadConfiguration(): void
    {
        $this->f3->config('config/default.ini');
        if (file_exists('config/config-' . $this->environment . '.ini')) {
            $this->f3->config('config/config-' . $this->environment . '.ini');
        }

        // custom error handler if debugging
        $this->debug = $this->f3->get('DEBUG');
    }

    protected function addGlobalExceptionHanlder(): void
    {
        // Tracy consumes about 300 Ko of memory
        Debugger::enable($this->debug !== 3 ? Debugger::PRODUCTION : Debugger::DEVELOPMENT, __DIR__ . '/../../' . $this->f3->get('LOGS'));
        if (Debugger::$productionMode) {
            Debugger::$onFatalError = [function ($exception): void {
                /**
                 * @var $mailer MailSender
                 */
                $mailer = Registry::get('mailer');
                $mailer->sendExceptionEmail($exception);
            }];
        }

        // default error pages if site is not being debugged
        if (!$this->isCli && empty($this->debug)) {
            $this->f3->set(
                'ONERROR',
                function (): void {
                    header('Expires:  ' . Time::http(time() + Base::instance()->get('error.ttl')));
                    if (Base::instance()->get('ERROR.code') === '404') {
                        include_once 'templates/error/404.phtml';
                    } else {
                        include_once 'templates/error/error.phtml';
                    }
                }
            );
        }
    }

    protected function loadAppSetting(): void
    {
        if (!$this->f3->get(CacheKey::CONFIG_LOADED)) {
            $this->f3->set(CacheKey::CONFIG_LOADED, true, 3590);
            // Load global settings
            foreach ([] as $entry => $cacheKey) {
                if ($entry === 'locale') {
                    $exists = $this->session->get($entry);
                } else {
                    $exists = $this->f3->exists($entry);
                }
                if (!$exists) {
                    $setting = new Setting();
                    $setting->load();
                    $value = $setting->$entry;
                    if ($entry === 'locale') {
                        $this->session->set($entry, $value);
                    } else {
                        $this->f3->set($cacheKey, $value, 3600);
                    }
                }
            }
        }
        $this->f3->set('LANGUAGE', $this->session->get('locale'));
    }

    protected function loadRoutesAndAssets(): void
    {
        // setup routes
        // @see http://fatfreeframework.com/routing-engine
        // firstly load routes from ini file then load custom environment routes
        $this->f3->config('config/routes.ini');

        if (file_exists('config/routes-' . $this->environment . '.ini')) {
            $this->f3->config('config/routes-' . $this->environment . '.ini');
        }

        if (!$this->isCli) {
            // load routes access policy
            $this->f3->config('config/access.ini');
        } else {
            // load routes access policy for CLI
            $this->f3->config('config/access-cli.ini');
        }
        // setup assets
        // @see http://fatfreeframework.com/framework-variables#Customsections
        // assets are save in configuration so we do no need to overload the memory with classes
        $this->f3->config('config/assets.ini');
    }
}
