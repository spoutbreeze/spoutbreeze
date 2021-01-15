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

namespace Actions\Account;

use Actions\Base as BaseAction;
use Enum\ResponseCode;
use Models\User;
use Validation\Validator;
use Base;

/**
 * Class Login
 * @package Actions\Account
 */
class Profile extends BaseAction
{
    /**
     * @param Base  $f3
     * @param array $params
     */
    public function show($f3, $params): void
    {
        $this->assets->addJs('core/account.js');
        $f3->push('init.js', 'Account');

        $this->render();
    }

    /**
     * @param Base  $f3
     * @param array $params
     */
    public function save($f3, $params): void
    {
        $v      = new Validator();
        $form   = $this->getDecodedBody();
        $user   = $this->loadData($this->session->get('user.id'));

        $v->notEmpty()->verify('email', $form['email'], ['notEmpty' => $this->i18n->err('users.email')]);
        $v->notEmpty()->verify('username', $form['username'], ['notEmpty' => $this->i18n->err('users.username')]);

        if (!$user->valid()) {
            $this->renderJson([], ResponseCode::HTTP_NOT_FOUND);
        } elseif ($v->allValid()) {
            $user->email      = $form['email'];
            $user->username   = $form['username'];
            $user->updated_on = date('Y-m-d H:i:s');

            if (!empty($form['password'])) {
                $user->password = $form['password'];
            }

            $user->save();

            $this->session->set('user.username', $user->username);
            $this->session->set('user.email', $user->email);

            $this->renderJson([], ResponseCode::HTTP_NO_CONTENT);
        } else {
            $this->renderJson(['errors' => $v->getErrors()], ResponseCode::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * @param  int  $id
     * @return User
     */
    public function loadData($id) : User
    {
        $user = new User();
        $user->load(['id = ?', [$id]]);

        return $user;
    }
}
