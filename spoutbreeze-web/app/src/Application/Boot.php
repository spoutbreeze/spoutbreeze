<?php

/**
 * SpoutBreeze open source platfrom - https://www.spoutbreeze.io/
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
use Cache;
use Core\Session;
use DB\SQL;
use F3;
use Log\LogWriterTrait;
use Mail\MailSender;
use Nette\Utils\Strings;
use Registry;
use Utils\Environment;

abstract class Boot
{
    use LogWriterTrait;

    /**
     * @var F3
     */
    protected $f3;

    /**
     * @var string
     */
    protected $environment;

    /**
     * @var mixed
     */
    protected $debug;

    /**
     * @var Session
     */
    protected $session;

    /**
     * @var boolean
     */
    protected $logSession = false;

    /**
     * @var string
     */
    protected $logFileName;

    /**
     * @var string
     */
    protected $isCli;

    public function __construct()
    {
        $this->isCli = PHP_SAPI === 'cli';
        $this->f3    = Base::instance();

        $this->setPhpVariables();
        $this->detectEnvironment();

        // start configuration F3 framework from this point
        $this->loadConfiguration();
        $this->setupLogging();
    }

    protected function setPhpVariables(): void
    {
        // add php variables configuration here
        setlocale(LC_TIME, 'en_GB.utf8', 'eng');
    }

    protected function detectEnvironment(): void
    {
        // read config and overrides
        // @see http://fatfreeframework.com/framework-variables#configuration-files
        // set the environment dynamically depending on the server IP address
        $host = $this->f3->get('HOST');

        if ($this->f3->exists('GET.hypertest') !== true) {
            if (Strings::contains($host, 'spoutbreeze.test')) {
                $this->f3->set('application.environment', Environment::DEVELOPMENT);
            } else {
                $this->f3->set('application.environment', Environment::PRODUCTION);
            }
        } else {
            $this->f3->set('application.environment', Environment::TEST);
            Cache::instance()->reset();
        }

        $this->environment = $this->f3->get('application.environment');
    }

    abstract protected function loadConfiguration();

    protected function setupMailer(): void
    {
        $this->f3->config('config/smtp.ini');
        $mailer = new MailSender();
        Registry::set('mailer', $mailer);
    }

    protected function setupLogging(): void
    {
        // setup daily rotation logging for access and errors
        // @todo gzip compress previous day log and delete the .log file using service log rotation
        $this->f3->set('application.logfile', $this->f3->get('LOGS') . $this->logFileName . '-' . date('Y-m-d') . '.log');
        ini_set('error_log', $this->f3->get('LOGS') . $this->logFileName . '-error-' . date('Y-m-d') . '.log');

        // setup application logging
        $this->initLogger();
    }

    abstract protected function addGlobalExceptionHanlder();

    protected function createDatabaseConnection(): void
    {
        // setup database connection params
        // @see http://fatfreeframework.com/databases

        $db = new SQL(
            $this->f3->get('db.dsn'),
            $this->f3->get('db.username'),
            $this->f3->get('db.password')
        );

        if ($this->logSession === true) {
            $db->log($this->f3->get('log.session') === true);
        }
        Registry::set('db', $db);
    }

    public function prepareSession(): void
    {
        // store the session into database
        $this->session = new Session(Registry::get('db'), $this->f3->get('session.table'), false);
        Registry::set('session', $this->session);
    }

    protected function detectCli(): void
    {
        // If in CLI mode run that from here on...
        if ($this->isCli) {
            $this->f3->config('config/routes-cli.ini');
            $this->f3->set('ROOT', $this->f3->get('ROOT') . '/../public');
        }
    }

    abstract protected function loadRoutesAndAssets();

    protected function logExecution(): void
    {
        // log session SQL queries only in dev environment for debugging purpose
        if ($this->f3->get('log.session') === true) {
            $this->logger->debug(Registry::get('db')->log());
        }

        $execution_time = round(microtime(true) - $this->f3->get('TIME'), 3);
        $this->logger->notice('[' . $this->f3->get('PATH') . '] Script executed in ' . $execution_time . ' seconds using ' . round(memory_get_usage() / 1024 / 1024, 3) . '/' . round(memory_get_peak_usage() / 1024 / 1024, 3) . ' MB memory/peak');
    }

    public function start(): void
    {
        // start the framework
        $this->f3->run();
        $this->logExecution();
    }
}
