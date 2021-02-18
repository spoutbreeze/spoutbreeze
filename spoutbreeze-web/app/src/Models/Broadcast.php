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

namespace Models;

use Enum\UserStatus;
use Helpers\Pagination;
use Models\Base as BaseModel;
use DateTime;
use DB\Cortex;
use Bcrypt;

/**
 * Class Broadcast
 * @property int       $selenoid_id
 * @property int       $server_id
 * @property int       $endpoint_id
 * @property DateTime  $created_on
 * @property DateTime  $updated_on
 * @package Models
 */

class Broadcast extends BaseModel
{
    protected $table = 'broadcasts';

    public function __construct($db = null, $table = null, $fluid = null, $ttl = 0)
    {
        parent::__construct($db, $table, $fluid, $ttl);

        $this->onset('password', function ($self, $value) {
            $crypt = \Bcrypt::instance();

            $self->salt = mb_substr(md5(uniqid(mt_rand(), true)), 0, 22);

            return $crypt->hash($value, $self->salt);
        });
    }




}

