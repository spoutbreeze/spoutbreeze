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

namespace Helpers;

use MatthiasMullie\Minify\CSS;
use MatthiasMullie\Minify\JS;
use Nette\Utils\Strings;
use Validation\Validator as V;

/**
 * Class Assets Helper.
 */
class Assets extends Base
{

    /**
     * @var array
     */
    private $assets;

    public function __construct()
    {
        parent::__construct();
        $this->assets = ['head' => [], 'footer' => []];
    }

    /**
     * @param $node
     * @return string
     */
    public static function renderCss($node)
    {
        $params = [];

        if (isset($node['@attrib'])) {
            $params = $node['@attrib'];
            unset($node['@attrib']);
        }

        return self::instance()->renderCssTag($params['src'], array_key_exists('id', $params) ? $params['id'] : null);
    }

    /**
     * @param $filePath
     * @param $id
     * @return string
     */
    public function renderCssTag($filePath, $id = null)
    {
        $filePath = '/css/' . $filePath;
        if (mb_stripos($filePath, 'http') === false) {
            V::exists()->check($this->f3->get('ROOT') . $filePath);
        }
        $idTag = $id ? 'id="' . $id . '"' : '';
        if ($this->f3->get('MINIFY_CSS') === true && mb_stripos($filePath, 'http') === false && !Strings::contains($filePath, '.min.')) {
            $cssTag = '<link href="/minified/' . $this->minifyCSS($filePath, mb_stripos($filePath, '.min.')) . '" rel="stylesheet" type="text/css" ' . $idTag . '/>' . "\n";
        } else {
            $cssTag = '<link href="' . $filePath . '" rel="stylesheet" type="text/css" ' . $idTag . '/>' . "\n";
        }

        return $cssTag;
    }

    public static function renderCssTheme()
    {
        return '<link href="/css/themes/<? echo \\Cache::instance()->get(\\enum\\CacheKey::THEME) ?>.css" rel="stylesheet" id="theme-style">';
    }

    /**
     * Minifies a CSS file if not minified yet and returns its new minified path.
     *
     * @param string $file CSS file path
     * @param        $copy bool Just copy the file to the minifcation folder instead of minifying it
     *
     * @return string new minified CSS path
     */
    private function minifyCSS($file, $copy = false)
    {
        $hash     = $this->f3->hash(filemtime($this->f3['ROOT'] . $file) . $file);
        $fileName = $hash . '.' . $this->f3->hash($file) . '.css';
        if (!file_exists($filePath = $this->getMinifyPath() . $fileName)) {
            if (!$copy) {
                $css = new CSS($this->f3['ROOT'] . $file);
                $css->minify($filePath);
                $this->logger->debug('Minified CSS file "' . $file . '" to "' . $filePath . '"');
            } else {
                $this->logger->debug('Copied CSS file "' . $file . '" to "' . $filePath . '"');
                copy($this->f3['ROOT'] . $file, $filePath);
            }
        }

        return $fileName;
    }

    public function currentJsLocale()
    {
        return "Locale.setLocale('{$this->session->get('locale')}');\n";
    }

    public function setUserRole()
    {
        return "Common.setUserRole('{$this->session->getRole()}');\n";
    }

    public function initJsClasses()
    {
        $init = '';

        $classes = $this->f3->get('init.js');

        foreach ($classes as $value) {
            $init .= "$value.init();\n";
        }

        return $init;
    }

    public function initJs($js): void
    {
        $this->f3->push('init.js', $js);
    }

    /**
     * @param $node
     * @return string
     */
    public static function renderJs($node)
    {
        $params = [];

        if (isset($node['@attrib'])) {
            $params = $node['@attrib'];
            unset($node['@attrib']);
        }

        return self::instance()->renderJsTag($params['src']);
    }

    /**
     * @param $filePath string
     * @return string
     */
    public function renderJsTag($filePath)
    {
        $filePath = '/js/' . $filePath;
        if ($this->f3->get('MINIFY_JS') === true && !Strings::contains($filePath, '.min.')) {
            $jsTag = '<script src="/minified/' . $this->minifyJavaScript($filePath, mb_stripos($filePath, '.min.')) . '" type="text/javascript"></script>' . "\n";
        } else {
            V::exists()->check($this->f3->get('ROOT') . $filePath);
            $jsTag = '<script src="' . $filePath . '" type="text/javascript"></script>' . "\n";
        }

        return $jsTag;
    }

    /**
     * Minifies a JavaScript files if not minified yet and returns its new path.
     *
     * @param $file string JavaScript file path
     * @param $copy bool Just copy the file to the 'minified' folder instead of minifying it
     *
     * @return string new minified JavaScript path
     */
    public function minifyJavaScript($file, $copy = false)
    {
        $hash     = $this->f3->hash(filemtime($this->f3['ROOT'] . $file) . $file);
        $fileName = $hash . '.' . $this->f3->hash($file) . '.js';
        if (!file_exists($filePath = $this->getMinifyPath() . $fileName)) {
            if (!$copy) {
                $css = new JS($this->f3['ROOT']  . $file);
                $css->minify($filePath);
                $this->logger->debug('Minified JS file "' . $file . '" to "' . $filePath . '"');
            } else {
                copy($this->f3->f3['ROOT']  . $file, $filePath);
                $this->logger->debug('Copied JS file "' . $file . '" to "' . $filePath . '"');
            }
        }

        return $fileName;
    }

    public function addJs($path): void
    {
        $this->assets['footer'][] = $path;
    }

    public function addCss($path): void
    {
        $this->assets['head'][] = $path;
    }

    /**
     * Returns the minification path.
     *
     * @return string
     */
    private function getMinifyPath()
    {
        return $this->f3['ROOT'] . '/minified/';
    }

    /**
     * get all defined groups
     * @return array
     */
    public function getGroups()
    {
        return array_keys($this->assets);
    }

    /**
     * @param $group
     * @return string
     */
    public function renderGroup($group)
    {
        $tags = '';
        if ($group === 'head') {
            foreach ($this->assets['head'] as $tag) {
                $tags .= $this->renderCssTag($tag) . "\n";
            }
        } elseif ($group === 'footer') {
            foreach ($this->assets['footer'] as $tag) {
                $tags .= $this->renderJsTag($tag) . "\n";
            }
        }

        return $tags;
    }
}
