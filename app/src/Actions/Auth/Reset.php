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

declare(strict_types=1);

namespace Actions\Auth;

use Domain\Users\UserService;

class Reset extends AuthAction
{
    public function show($f3, $params): void
    {
        $f3->set('token', (string) $params['token']);
        $f3->set('error', (string) $f3->get('SESSION.reset_error'));
        $f3->clear('SESSION.reset_error');
        $this->renderAuth('auth/reset');
    }

    public function submit($f3, $params): void
    {
        $token    = (string) $f3->get('POST.token');
        $password = (string) $f3->get('POST.password');
        $confirm  = (string) $f3->get('POST.password_confirm');

        if ($password !== $confirm) {
            $f3->set('SESSION.reset_error', 'The passwords do not match');
            $f3->reroute('/reset/' . $token);
        }

        $ok = false;
        try {
            $ok = UserService::fromPdo($this->pdo())->resetPasswordWithToken($token, $password);
        } catch (\InvalidArgumentException $e) {
            $f3->set('SESSION.reset_error', $e->getMessage());
            $f3->reroute('/reset/' . $token);
        }

        if (!$ok) {
            $f3->set('SESSION.reset_error', 'This reset link is invalid or has expired');
            $f3->reroute('/reset/' . $token);
        }

        $f3->reroute('/login');
    }
}
