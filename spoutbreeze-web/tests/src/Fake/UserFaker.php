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

namespace Fake;

use Base;
use Enum\UserRole;
use Enum\UserStatus;
use Faker\Factory as Faker;
use models\User;
use ReflectionException;

class UserFaker
{
    private static array $storage = [];

    /**
     * @param  null                $role
     * @param  string              $status
     * @param  null                $storageName
     * @return User
     * @throws ReflectionException
     */
    public static function create($role = null, $status = UserStatus::ACTIVE, $storageName = null)
    {
        // To make testing easier, the user is password is the same as its role
        $faker            = Faker::create();
        $user             = new User();
        $user->email      = $faker->email;
        $user->username   = $faker->userName;
        // pick a random role if not provided
        if (is_null($role)) {
            $role = array_rand(UserRole::values());
        }
        $user->role     = $role;
        $user->password = $role;
        if ($role === UserRole::ADMIN) {
            $user->password = $role . $role;
        }
        $user->status = $status;

        $user->save();
        if (!is_null($storageName)) {
            self::$storage[$storageName] = $user;
        }

        return $user;
    }

    /**
     * Creates a user and authenticates it
     *
     * @param $role
     * @param  string              $status
     * @param  null                $storageName
     * @return User
     * @throws ReflectionException
     */
    public static function createAndLogin($role, $status = UserStatus::ACTIVE, $storageName = null)
    {
        $user = self::create($role, $status, $storageName);

        self::loginUser($user);

        return $user;
    }

    /**
     * @param User $user
     */
    public static function loginUser($user): void
    {
        $password = $role = $user->role;
        if ($role === UserRole::ADMIN) {
            $password = $role . $role;
        }
        Base::instance()->mock('POST /login', [
            'email'    => $user->email,
            'password' => $password
        ]);
    }

    public static function logout(): void
    {
        Base::instance()->mock('GET /logout');
    }

    /**
     * @param $storageName
     * @return User
     */
    public static function get($storageName)
    {
        return self::$storage[$storageName];
    }
}
