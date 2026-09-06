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
 * GDPR data deletion: anonymises the account (no personal data remains) and
 * drops any pending reset tokens. Deactivating/enabling lives in Toggle.
 */
class Delete extends ConsoleAction
{
    public function execute($f3, $params): void
    {
        $this->bootConsole('users');
        $id = (int) $params['id'];
        try {
            if ($id === (int) $this->session->get('user.id')) {
                throw new \InvalidArgumentException('Use your profile page to delete your own account');
            }
            UserService::fromPdo($this->pdo())->deletePersonalData($id);
            $f3->set('SESSION.users_notice', 'User personal data deleted (account anonymised).');
        } catch (\Throwable $e) {
            $f3->set('SESSION.users_notice', $e->getMessage());
        }
        $f3->reroute('/users');
    }
}
