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

namespace Domain\Users;

use Sukarix\Enum\UserRole;
use Sukarix\Enum\UserStatus;
use Sukarix\Models\User;

/**
 * Users management, authentication and GDPR data handling.
 *
 * GDPR deletion anonymises the account instead of hard-deleting it: the row
 * keeps referential integrity while every personal datum (email, username,
 * password) is replaced with non-identifying placeholders.
 */
final class UserService
{
    public function __construct(private \PDO $pdo) {}

    public static function fromPdo(\PDO $pdo): self
    {
        return new self($pdo);
    }

    /**
     * @return null|User
     */
    public function authenticate(string $email, string $password): ?User
    {
        $user = new User();
        $user = $user->getByEmail(mb_trim($email));
        if (!$user->valid()
            || UserStatus::ACTIVE !== $user->status
            || !$user->verifyPassword($password)) {
            return null;
        }

        $this->pdo->prepare('UPDATE users SET last_login = now() WHERE id = ?')->execute([$user->id]);

        return $user;
    }

    /**
     * @return list<array<string, mixed>>
     */
    public function all(): array
    {
        return $this->pdo->query(
            'SELECT id, email, username, role, status, last_login, created_on
             FROM users ORDER BY id'
        )->fetchAll() ?: [];
    }

    /**
     * @throws \InvalidArgumentException when the email or username is taken
     */
    public function create(string $email, string $username, string $password, string $role): int
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('A valid email is required');
        }
        if (!in_array($role, [UserRole::ADMIN, UserRole::CUSTOMER], true)) {
            throw new \InvalidArgumentException('Unknown role');
        }
        if ('' === $password || mb_strlen($password) < 10) {
            throw new \InvalidArgumentException('The password must be at least 10 characters');
        }

        $user = new User();
        if ($user->getByEmail($email)->valid() || $user->usernameExists($username)) {
            throw new \InvalidArgumentException('This email or username is already registered');
        }

        $user->email    = mb_trim($email);
        $user->username = mb_trim($username);
        $user->password = $password;
        $user->role     = $role;
        $user->status   = UserStatus::ACTIVE;
        $user->save();

        return (int) $user->id;
    }

    public function toggleStatus(int $id, int $actorId): void
    {
        if ($id === $actorId) {
            throw new \InvalidArgumentException('You cannot change your own account status');
        }
        $this->pdo->prepare(
            "UPDATE users SET status = CASE WHEN status = 'active' THEN 'inactive' ELSE 'active' END,
             updated_on = now() WHERE id = ?"
        )->execute([$id]);
    }

    /**
     * Admin-side password reset: sets a new password for the account.
     */
    public function resetPasswordByAdmin(int $id, string $newPassword): void
    {
        if (mb_strlen($newPassword) < 10) {
            throw new \InvalidArgumentException('The password must be at least 10 characters');
        }
        $this->pdo->prepare('UPDATE users SET password = ?, updated_on = now() WHERE id = ?')
            ->execute([password_hash($newPassword, PASSWORD_BCRYPT), $id]);
        $this->invalidateResetTokens($id);
    }

    /**
     * GDPR data deletion: the account loses every personal datum and can
     * never be logged into again. Audit-relevant rows keep their reference.
     */
    public function deletePersonalData(int $id): void
    {
        $anonEmail    = 'deleted' . $id . '@anonymized.local';
        $anonUsername = 'deleted_' . $id;
        $this->pdo->prepare(
            "UPDATE users SET email = ?, username = ?,
             password = ?, status = 'inactive', updated_on = now() WHERE id = ?"
        )->execute([
            $anonEmail,
            $anonUsername,
            password_hash(bin2hex(random_bytes(16)), PASSWORD_BCRYPT),
            $id,
        ]);
        $this->invalidateResetTokens($id);
    }

    /**
     * Self-service GDPR deletion (change-password aware): only the owner
     * session can call it, with their current password as confirmation.
     */
    public function deleteOwnAccount(int $id, string $currentPassword): void
    {
        $user = new User();
        $user->load(['id = ?', $id]);
        if (!$user->valid() || !$user->verifyPassword($currentPassword)) {
            throw new \InvalidArgumentException('Your current password does not match');
        }
        $this->deletePersonalData($id);
    }

    public function changePassword(int $id, string $currentPassword, string $newPassword): void
    {
        $user = new User();
        $user->load(['id = ?', $id]);
        if (!$user->valid() || !$user->verifyPassword($currentPassword)) {
            throw new \InvalidArgumentException('Your current password does not match');
        }
        if (mb_strlen($newPassword) < 10) {
            throw new \InvalidArgumentException('The new password must be at least 10 characters');
        }
        $this->pdo->prepare('UPDATE users SET password = ?, updated_on = now() WHERE id = ?')
            ->execute([password_hash($newPassword, PASSWORD_BCRYPT), $id]);
    }

    /**
     * Starts a password reset: returns the raw token to email, or null when
     * the email is unknown (the caller answers identically either way so the
     * endpoint cannot be used to enumerate accounts).
     *
     * @return array{token: string, email: string}|null
     */
    public function requestPasswordReset(string $email): ?array
    {
        $user = new User();
        $user = $user->getByEmail(mb_trim($email));
        if (!$user->valid() || UserStatus::ACTIVE !== $user->status) {
            return null;
        }

        $token     = bin2hex(random_bytes(32));
        $statement = $this->pdo->prepare(
            'INSERT INTO password_resets (user_id, token_hash, expires_on, created_on)
             VALUES (?, ?, now() + interval \'1 hour\', now())'
        );
        $statement->execute([$user->id, hash('sha256', $token)]);

        return ['token' => $token, 'email' => $user->email];
    }

    public function resetPasswordWithToken(string $token, string $newPassword): bool
    {
        if (mb_strlen($newPassword) < 10) {
            throw new \InvalidArgumentException('The new password must be at least 10 characters');
        }
        $statement = $this->pdo->prepare(
            'SELECT user_id FROM password_resets WHERE token_hash = ? AND expires_on > now()'
        );
        $statement->execute([hash('sha256', $token)]);
        $userId = $statement->fetchColumn();
        if (false === $userId) {
            return false;
        }

        $this->pdo->prepare('UPDATE users SET password = ?, updated_on = now() WHERE id = ?')
            ->execute([password_hash($newPassword, PASSWORD_BCRYPT), (int) $userId]);
        $this->pdo->prepare('DELETE FROM password_resets WHERE user_id = ?')->execute([$userId]);

        return true;
    }

    private function invalidateResetTokens(int $userId): void
    {
        $this->pdo->prepare('DELETE FROM password_resets WHERE user_id = ?')->execute([$userId]);
    }
}
