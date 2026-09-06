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
 * Profile: change own password and GDPR self-service data deletion.
 */
class Profile extends ConsoleAction
{
    public function execute($f3, $params): void
    {
        $this->bootConsole('profile');
        $this->render();
    }

    public function submit($f3, $params): void
    {
        $this->bootConsole('profile');
        $action = (string) $f3->get('POST.action');
        $userId = (int) $this->session->get('user.id');

        try {
            $service = UserService::fromPdo($this->pdo());
            if ('password' === $action) {
                $service->changePassword(
                    $userId,
                    (string) $f3->get('POST.current_password'),
                    (string) $f3->get('POST.new_password')
                );
                $f3->set('SESSION.users_notice', 'Password changed.');
            } elseif ('delete' === $action) {
                $service->deleteOwnAccount($userId, (string) $f3->get('POST.confirm_password'));
                $this->session->revokeUser();
                $f3->reroute('/login');
            }
        } catch (\Throwable $e) {
            $f3->set('SESSION.users_notice', $e->getMessage());
        }
        $f3->reroute('/profile');
    }

    protected function pdo(): \PDO
    {
        return new \PDO(
            (string) ($this->f3->get('db.dsn') ?: 'pgsql:host=postgres;port=5432;dbname=spoutbreeze_app'),
            (string) ($this->f3->get('db.username') ?: 'spoutbreeze_u'),
            (string) ($this->f3->get('db.password') ?: 'spoutbreeze_pass'),
            [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]
        );
    }
}
