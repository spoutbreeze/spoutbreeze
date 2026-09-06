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
use Sukarix\Mail\MailSender;

/**
 * Self-service password reset: request a token by email (through the
 * operator's Postal SMTP), then set a new password. The response is
 * deliberately identical for known and unknown emails so the endpoint
 * cannot enumerate accounts.
 */
class Forgot extends AuthAction
{
    public function show($f3, $params): void
    {
        $f3->set('sent', $f3->get('SESSION.reset_sent'));
        $f3->clear('SESSION.reset_sent');
        $this->renderAuth('auth/forgot');
    }

    public function submit($f3, $params): void
    {
        $email = trim((string) $f3->get('POST.email'));
        $result = null;
        try {
            $result = UserService::fromPdo($this->pdo())->requestPasswordReset($email);
        } catch (\Throwable $e) {
            $this->logger->error('Password reset request failed', ['exception' => $e]);
        }

        if (null !== $result) {
            $link = $this->origin($f3) . '/reset/' . $result['token'];
            try {
                (new MailSender())->send('reset', ['link' => $link], $result['email'],
                    'SpoutBreeze', 'Reset your SpoutBreeze password');
            } catch (\Throwable $e) {
                // Never leak delivery state to the caller; development still
                // records the link so the flow is testable without SMTP.
                $this->logger->debug('Password reset link for {email}: {link}', [
                    'email' => $result['email'], 'link' => $link,
                ]);
            }
        }

        $f3->set('SESSION.reset_sent', true);
        $f3->reroute('/forgot');
    }

    private function origin($f3): string
    {
        $base = rtrim((string) $f3->get('BASE'), '/');

        return $f3->get('SCHEME') . '://' . $f3->get('HOST') . $base;
    }
}
