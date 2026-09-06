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

/**
 * Shared setup for the unauthenticated auth screens (standalone layout,
 * CSRF token, error flash) and the PDO accessor for the user domain.
 */
abstract class AuthAction extends \Sukarix\Actions\Action
{
    protected function renderAuth(string $view): void
    {
        $this->f3->set('view', $view . '.phtml');
        if (null !== $this->session) {
            $this->f3->set('csrf_token', $this->session->generateToken());
        }
        echo \Template::instance()->render('auth.phtml');
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
