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

use Base;

class Environment
{
    public const TEST        = 'test';
    public const DEVELOPMENT = 'development';
    public const PRODUCTION  = 'production';

    /**
     * @return bool
     */
    public static function isProduction(): bool
    {
        return Base::instance()->get('application.environment') === self::PRODUCTION;
    }

    /**
     * @return bool
     */
    public static function isNotProduction(): bool
    {
        return !self::isProduction();
    }

    /**
     * @return bool
     */
    public static function isTest(): bool
    {
        return Base::instance()->get('application.environment') === self::TEST;
    }
}
