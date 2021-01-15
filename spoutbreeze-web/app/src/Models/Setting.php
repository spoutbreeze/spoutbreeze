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
namespace Models;

use DateTime;
use Models\Base as BaseModel;

/**
 * Class Setting
 * @property integer $max_meetings
 * @property boolean $strict_pooling
 * @property string $join_as_name
 * @property string $load_balancing_strategy
 * @property string $param_create_logo
 * @property DateTime $created_on
 * @property DateTime $updated_on
 * @package  Models
 */
class Setting extends BaseModel
{
    protected $table = 'settings';
}
