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
 * Class User
 * @property int       $id
 * @property string    $email
 * @property string    $role
 * @property string    $username
 * @property string    $first_name
 * @property string    $last_name
 * @property string    $password
 * @property string    $salt
 * @property string    $status
 * @property DateTime  $created_on
 * @property DateTime  $updated_on
 * @property DateTime  $last_login
 * @package Models
 */
class User extends BaseModel
{
    protected $table = 'users';

    public function __construct($db = null, $table = null, $fluid = null, $ttl = 0)
    {
        parent::__construct($db, $table, $fluid, $ttl);

        $this->onset('password', function ($self, $value) {
            $crypt = \Bcrypt::instance();

            $self->salt = mb_substr(md5(uniqid(mt_rand(), true)), 0, 22);

            return $crypt->hash($value, $self->salt);
        });
    }

    /**
     * @param $filter
     * @param $external
     * @return array
     */
    public function all($filter, $external)
    {
        if (empty($filter)) {
            $filter = ['email' => '', 'role' => '', 'username' => ''];
        }
        $filter = $this->prepareFilter($filter);
        $page   = Pagination::findCurrentPage();
        $result = $this->db->exec(
            'SELECT users.id, users.email, users.username, users.last_login, users.role, users.status,
             FROM users
             WHERE role LIKE ?
             AND email LIKE ?
             AND username LIKE ?
             ORDER BY id ASC
             LIMIT ? OFFSET ?',
            [$filter['role'], $filter['email'], $filter['username'],
                $this->pageSize, $this->pageSize * ($page - 1)]
        );

        $total = $this->db->exec(
            'SELECT	count(id) AS total
             FROM users
             WHERE role LIKE ?
             AND email LIKE ?
             AND username LIKE ?',
            [$filter['role'], $filter['email'], $filter['username']])[0]['total'];

        $count = ceil($total / $this->pageSize);
        $pos   = max(0, min($page - 1, $count - 1));

        return [
            'subset' => $result,
            'total'  => $total,
            'limit'  => $this->pageSize,
            'count'  => $count,
            'pos'    => $pos < $count ? $pos : 0
        ];
    }

    /**
     * Get user record by email value
     *
     * @param  string $email
     * @return Cortex
     */
    public function getByEmail($email)
    {
        $this->load(['lower(email) = ?', mb_strtolower($email)]);

        return $this;
    }

    /**
     * Check if email already in use
     *
     * @param  string $email
     * @return bool
     */
    public function emailExists($email)
    {
        return count($this->db->exec('SELECT 1 FROM users WHERE email= ?', $email)) > 0;
    }

    //@todo: will be used to detect if the course is full or not yet
    /**
     * @param $ids
     * @return int
     */
    public function countActiveUsers($ids)
    {
        $result = $this->db->exec(
            'SELECT COUNT(us.id) AS total
             FROM users AS us
             WHERE (us.status= ?) AND (us.id IN ("' . implode('","', $ids) . '"))',
            [UserStatus::ACTIVE]
        );

        return (int) $result[0]['total'];
    }

    /**
     * @return mixed
     */
    public function getCountFields()
    {
        return $this->countFields;
    }

    public function verifyPassword($password): bool
    {
        return Bcrypt::instance()->verify(trim($password), $this->password);
    }
}
