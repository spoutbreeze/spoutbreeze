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

namespace Models;

use Base;
use Bcrypt;
use Faker\Factory as Faker;
use Registry;
use Test\Scenario;

/**
 * Class UserTest
 * @package Models
 */
class UserTest extends Scenario
{
    protected $group = 'User Model';

    /**
     * @param  Base  $f3
     * @return array
     */
    public function testPasswordHash($f3)
    {
        $test           = $this->newTest();
        $faker          = Faker::create();
        $password       = 'secure_password';
        $user           = new User();
        $user->username = $faker->userName;
        $user->password = $password;

        $crypt = Bcrypt::instance();

        $test->expect(mb_strlen($user->salt) === 22, 'User salt has been generated');
        $test->expect($crypt->verify($password, $user->password), 'User password is hashed correctly');

        return $test->results();
    }

    /**
     * @param  \Base $f3
     * @return array
     */
    public function testUserCreation($f3)
    {
        $test           = $this->newTest();
        $faker          = Faker::create();
        $user           = new User(Registry::get('db'));
        $user->username = $faker->userName;
        $user->email    = $faker->email;
        $user->password = $faker->password(8);
        $user->save();

        $test->expect($user->id !== 0, 'User mocked & saved to the database');

        return $test->results();
    }
}
