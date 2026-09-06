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
use Sukarix\Enum\UserStatus;

class Login extends AuthAction
{
    public function show($f3, $params): void
    {
        if ($this->session->isLoggedIn()) {
            $f3->reroute('/broadcasts');
        }
        $f3->set('error', (string) $f3->get('SESSION.login_error'));
        $f3->clear('SESSION.login_error');
        $this->renderAuth('auth/login');
    }

    public function submit($f3, $params): void
    {
        $email    = trim((string) $f3->get('POST.email'));
        $password = (string) $f3->get('POST.password');

        $user = null;
        try {
            $user = UserService::fromPdo($this->pdo())->authenticate($email, $password);
        } catch (\Throwable) {
            // Database trouble answers the same generic error as bad credentials.
        }

        if (null === $user) {
            $f3->set('SESSION.login_error', 'Invalid email or password');
            $f3->reroute('/login');
        }

        $this->session->authorizeUser($user);
        $f3->clear('SESSION.login_error');
        $f3->reroute('/broadcasts');
    }
}
