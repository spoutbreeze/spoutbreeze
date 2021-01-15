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

namespace Test;

use Utils\CliUtils;

class UnitTest extends \Test
{
    /**
     * Text represented group of tests
     *
     * @var string
     */
    protected $group = '';

    /**
     * {@inheritdoc}
     */
    public function expect($cond, $text = null)
    {
        $result = parent::expect($cond, $text);
        if (PHP_SAPI === 'cli') {
            usleep(1000);
        }

        foreach (debug_backtrace() as $frame) {
            if (isset($frame['file'])) {
                $result->data[0]['source'] = \Base::instance()->
                    fixslashes($frame['file']) . ':' . $frame['line'];

                break;
            }
        }

        CliUtils::instance()->writeTestResult(end($result->data), $this->group);

        return $result;
    }

    /**
     * @param string $group
     */
    public function setGroup($group): void
    {
        $this->group = $group;
    }
}
