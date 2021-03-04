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

namespace Actions;

use Acl\Access;
use Core\Session;
use DOMDocument;
use Enum\UserRole;
use Enum\UserStatus;
use Helpers\Assets;
use Helpers\HTML;
use Helpers\I18n;
use Log\LogWriterTrait;
use Models\User;
use SimpleXMLElement;
use Template;
use Utils\Environment;

/**
 * Base Controller Class.
 */
abstract class Base extends \Prefab
{
    use LogWriterTrait;

    /**
     * f3 instance.
     *
     * @var \Base f3
     */
    protected $f3;

    /**
     * f3 instance.
     *
     * @var Session f3
     */
    protected $session;

    /**
     * f3 instance.
     *
     * @var I18n f3
     */
    protected $i18n;

    /**
     * Assets instance.
     *
     * @var Assets
     */
    protected $assets;

    /**
     * The view name to render.
     *
     * @var string
     */
    protected $view;

    /**
     * @var Access
     */
    private $access;

    /**
     * @var string
     */
    private $headerAuthorization;

    /**
     * @var string
     */
    private $templatesDir;

    const JSON            = 'Content-Type: application/json; charset=utf-8';
    const APPLICATION_XML = 'Content-Type: application/xml; charset=UTF-8';
    const CSV             = 'Content-Type: text/csv; charset=UTF-8';
    const TEXT            = 'Content-Type: text/plain; charset=utf-8';
    const XML             = 'Content-Type: text/xml; charset=UTF-8';

    /**
     * initialize controller.
     */
    public function __construct()
    {
        $this->f3      = \Base::instance();
        $this->session = \Registry::get('session');
        $this->i18n    = I18n::instance();
        $this->assets  = Assets::instance();
        $this->access  = Access::instance();

        $this->initLogger();
        $this->parseHeaderAuthorization();

        $this->templatesDir = $this->f3->get('ROOT') . $this->f3->get('BASE') . '/../app/ui/';
        $this->f3->set('title', 'SpoutBreeze');

        $this->f3->set('init.js', ['Locale', 'Plugins', 'Common']);
    }

    public function beforeroute(): void
    {
        $this->access->authorize($this->getRole(), function ($route, $subject): void {
            $this->onAccessAuthorizeDeny($route, $subject);
        });
        if ($this->session->isLoggedIn() && $this->f3->get('ALIAS') === $this->f3->get('ALIASES.login')) {
            $this->f3->reroute($this->f3->get('ALIASES.dashboard'));
        } elseif ($this->f3->VERB === 'POST' && !$this->session->validateToken()) {
            $this->f3->reroute($this->f3->get('PATH'));
        }
        // Rerouted paged uri having the page value less than one
        if ($this->f3->exists('PARAMS.page')) {
            if ($this->f3->get('PARAMS.page') < 1) {
                $uri = $this->f3->get('PATH');
                $uri = preg_replace('/\/' . $this->f3->get('PARAMS.page') . '$/', '/1', $uri);
                $this->f3->reroute($uri);
            }
        }
    }

    public function onAccessAuthorizeDeny($route, $subject): void
    {
        $this->logger->warning('Access denied to route ' . $route . ' for subject ' . ($subject ?: 'unknown'));
        $this->f3->error(404);
    }

    protected function setPartial($name)
    {
        return "$name.phtml";
    }

    /**
     * @param null   $view
     * @param null   $partial
     * @param string $mime
     */
    public function render($view = null, $partial = null, $mime = 'text/html'): void
    {
        // automatically load the partial from the class namespace
        if ($partial === null) {
            $partial = str_replace(['\\_'], '/', str_replace('actions\\_', '', $this->f3->snakecase(get_class($this))));
        }
        $this->f3->set('partial', $this->setPartial($partial));
        if ($view === null) {
            $view = $this->view ?: $this->f3->get('view.default');
        }
        // This required to register the template extensions before rendering it
        // We do it at this time because we are sure that we want to render starting from here
        HTML::instance();
        // add controller assets to assets.css and assets.js hive properties
        echo Template::instance()->render($view . '.phtml', $mime);
    }

    /**
     * @param string | array $json
     * @param integer        $statusCode
     */
    public function renderJson($json, $statusCode = 200): void
    {
        header('HTTP/1.1 ' . $statusCode);
        header(self::JSON);
        echo is_string($json) ? $json : json_encode($json);
    }

    /**
     * @param string | array $text
     * @param integer        $statusCode
     */
    public function renderText($text, $statusCode = 200): void
    {
        header('HTTP/1.1 ' . $statusCode);
        header(self::TEXT);
        echo is_string($text) ? $text : implode("\n", $text);
    }

    public function renderCsv($object): void
    {
        header(self::CSV);
        header('Content-Disposition: attachement; filename="' . $this->f3->hash($this->f3->get('TIME') . '.csv"'));
        echo $object;
    }

    public function renderXML(string $view = null, string $cacheKey = null, int $ttl = 0): void
    {
        if (!empty($view)) {
            $this->view = $view;
        }
        // Set the XML header
        header('Content-Type: text/xml; charset=UTF-8');

        // Use caching only in production
        if (!empty($cacheKey) && Environment::isProduction()) {
            if (!$this->f3->exists($cacheKey)) {
                $this->f3->set($cacheKey, $this->parseXMLView(), $ttl);
            }
            echo $this->f3->get($cacheKey);
        } else {
            echo $this->parseXMLView();
        }
    }

    /**
     * @param $xml SimpleXMLElement
     */
    public function renderRawXml($xml): void
    {
        // Set the XML header
        header('Content-Type: text/xml; charset=UTF-8');
        echo $xml->asXML();
    }

    private function parseXMLView(string $view = null): string
    {
        $xmlResponse = new SimpleXMLElement(Template::instance()->render($this->view . '.xml'));

        $xmlDocument                     = new DOMDocument('1.0');
        $xmlDocument->preserveWhiteSpace = false;
        $xmlDocument->formatOutput       = true;

        $xmlDocument->loadXML($xmlResponse->asXML());

        return $xmlDocument->saveXML();
    }

    public function renderXmlString($xml = null): void
    {
        header('Content-Type: text/xml; charset=UTF-8');

        echo $xml;
    }

    /**
     * @return mixed
     */
    public function getDecodedBody(): array
    {
        return json_decode($this->f3->get('BODY'), true);
    }

    protected function parseHeaderAuthorization(): void
    {
        if ($header = $this->f3->get('HEADERS.Authorization')) {
            $this->headerAuthorization = str_replace('Basic ', '', $header);
        }
    }

    /**
     * @return bool
     */
    protected function isApiUserVerified(): bool
    {
        if ($credentials = $this->getCredentials()) {
            $user = new User();
            $user = $user->getByEmail($credentials[0]);

            return
                $user->valid() &&
                $user->status === UserStatus::ACTIVE &&
                $user->role === UserRole::API &&
                $user->verifyPassword($credentials[1]);
        }

        return false;
    }

    /**
     * @return string
     */
    protected function getRole(): string
    {
        if ($this->session->getRole()) {
            return $this->session->getRole();
        } elseif ($this->isApiUserVerified()) {
            return UserRole::API;
        }

        return '';
    }

    /**
     * @return array
     */
    protected function getCredentials(): array
    {
        if (!$this->headerAuthorization) {
            return [];
        }

        $credentials = base64_decode($this->headerAuthorization);
        $credentials = explode(':', $credentials);

        if (count($credentials) !== 2) {
            return [];
        }

        return $credentials;
    }
}
