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

namespace Utils;

use Colors\Color;

/**
 * @codeCoverageIgnore
 */
class CliUtils extends \Prefab
{
    /**
     * @var Color
     */
    private $console;

    public function __construct()
    {
        $this->console = new Color();
        $this->console->setTheme(
            [
                'passed' => ['white', 'bg_green'],
                'failed' => ['white', 'bg_red'],
            ]
        );
    }

    public function writeTestResult($data, $group): void
    {
        if ($this->isCli()) {
            $console = $this->console;
            if ($data['status']) {
                $text = "<passed><bold>SUCCESS</bold></passed> :: {$group} :: {$data['text']}";
            } else {
                $text = "<failed><bold>FAILED </bold></failed> :: {$group} :: {$data['text']} => <failed>{$data['source']}</failed>";
            }
            echo $console($text)->colorize() . PHP_EOL;

            ob_flush();
            flush();
        }
    }

    /**
     * @param $suite array
     * @param $name
     */
    public function writeSuiteResult($suite, $name): void
    {
        if ($this->isCli()) {
            $testsNumber      = 0;
            $successfullTests = 0;
            foreach ($suite as $key => $value) {
                $testsNumber += count($suite[$key]);
                $successfullTests += count(array_filter(array_column($suite[$key], 'status')));
            }

            $console = $this->console;
            if ($testsNumber === $successfullTests) {
                $text = ":::::::<bold><passed> ✔ </passed> {$name} => <passed>{$successfullTests}/{$testsNumber}</passed></bold>";
                echo $console($text)->colorize() . PHP_EOL;
            } else {
                $text = ":::::::<bold><failed> ✘ </failed> {$name} => <failed>{$successfullTests}/{$testsNumber}</failed></bold>";
                echo $console($text)->colorize() . PHP_EOL;
            }

            ob_flush();
            flush();
        }
    }

    public function write($message): void
    {
        if ($this->isCli()) {
            $console = $this->console;
            echo $console($message)->colorize() . PHP_EOL;

            ob_flush();
            flush();
        }
    }

    private function isCli()
    {
        return PHP_SAPI === 'cli';
    }
}
