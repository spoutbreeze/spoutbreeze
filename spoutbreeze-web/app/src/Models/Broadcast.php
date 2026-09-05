<?php

/*
 * SpoutBreeze open source platform - https://www.spoutbreeze.org/
 *
 * Copyright (c) 2021-2026 RIADVICE SUARL.
 *
 * This program is free software: you can redistribute it and/or modify it under the
 * terms of the GNU Affero General Public License as published by the Free Software
 * Foundation, either version 3 of the License, or (at your option) any later version.
 *
 * SpoutBreeze is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License along
 * with SpoutBreeze. If not, see <https://www.gnu.org/licenses/>.
 */

namespace Models;

use Models\Base as BaseModel;
use DateTime;

/**
 * Class Broadcast
 * @property int $session_id
 * @property int $server_id
 * @property int $endpoint_id
 * @property int $meeting_id
 * @property int $agent_id
 * @property string $status
 * @property DateTime $created_on
 * @property DateTime $updated_on
 * @package Models
 */
class Broadcast extends BaseModel
{
    protected $table = 'broadcasts';
}
