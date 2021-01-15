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

namespace Utils;

class DataUtils
{
    public static function keepIntegerInArray(&$array): void
    {
        if (!is_null($array)) {
            array_filter($array, 'ctype_digit');
        }
    }

    /**
     * Unsets an array item by its value
     *
     * @param $array
     * @param $value
     */
    public static function unsetByValue(&$array, $value): void
    {
        if (($key = array_search($value, $array)) !== false) {
            unset($array[$key]);
        }
    }
}
