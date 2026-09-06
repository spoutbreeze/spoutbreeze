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

namespace Actions\Users;

use Actions\ConsoleAction;
use Domain\Users\UserService;

/**
 * Reset another user's password (admin sets a temporary password; the GDPR
 * self-service deletion lives on the profile page).
 */
class ResetPassword extends ConsoleAction
{
    public function execute($f3, $params): void
    {
        $this->bootConsole('users');
        try {
            UserService::fromPdo($this->pdo())->resetPasswordByAdmin(
                (int) $params['id'],
                (string) $f3->get('POST.new_password')
            );
            $f3->set('SESSION.users_notice', 'Password updated.');
        } catch (\Throwable $e) {
            $f3->set('SESSION.users_notice', $e->getMessage());
        }
        $f3->reroute('/users');
    }
}
