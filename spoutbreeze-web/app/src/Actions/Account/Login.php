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

namespace Actions\Account;

use Actions\Base as BaseAction;
use Base;
use Enum\UserRole;
use Enum\UserStatus;
use Helpers\Flash;
use Helpers\Time;
use Models\User as UserModel;
use Validation\Validator;

/**
 * Class Login
 * @package Actions\Account
 */
class Login extends BaseAction
{
    public function __construct()
    {
        parent::__construct();

        $this->view = 'authentication';
    }

    /**
     * @param Base  $f3
     * @param array $params
     */
    public function show($f3, $params): void
    {
        if (!$this->session->isLoggedIn()) {
            $this->render();
        } else {
            if ($this->session->isRole(UserRole::ADMIN)) {
                $this->f3->reroute('@dashboard');
            } elseif ($this->session->isRole(UserRole::CUSTOMER)) {
                $this->f3->reroute('@recordings_list');
            }
        }
    }

    public function authorise($f3): void
    {
        $v    = new Validator();
        $post = $this->f3->get('POST');
        $v->email()->verify('email', $post['email']);
        $v->length(4)->verify('password', $post['password']);

        if ($v->allValid()) {
            $email    = $this->f3->get('POST.email');
            $password = $this->f3->get('POST.password');

            /**
             * @var UserModel $user
             */
            $user = new UserModel();
            $user = $user->getByEmail($email);

            if ($user->valid() && $user->status === UserStatus::ACTIVE && $user->role !== UserRole::API && $user->verifyPassword($password)) {
                $this->session->authorizeUser($user);

                $user->last_login = Time::db();
                $user->save();

                $this->session->set('locale', $user->locale);

                Flash::instance()->addMessage($this->f3->format($this->i18n->msg('user.login_success'), $user->first_name), Flash::INFORMATION);
                $this->f3->reroute('@dashboard');
            } else {
                $this->f3->set('data', $post);
                $this->f3->set('form_errors.email', $this->i18n->err('login.password'));
                $this->show($f3, $post);
            }
        } else {
            $this->f3->set('data', $post);
            $this->f3->set('form_errors', $v->getErrors());
            $this->show($f3, $post);
        }
    }
}
