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

/**
 * Bootstrap admin seeding, driven by the environment:
 * ADMIN_EMAIL, ADMIN_USERNAME, ADMIN_PASSWORD.
 *
 * Idempotent: creates the account when missing; re-applies the configured
 * password and role on every start so the .env stays authoritative. The
 * untouched 2021 default admin (admin@email.com) is deactivated — its
 * password is unknown legacy state.
 */

require __DIR__ . '/../vendor/autoload.php';

// Runs from the container entrypoint, before the application boots. Fat-Free
// hot-loads the ini files, so this reads exactly the same configuration the
// application will: default.ini, then the environment's own file on top.
// APP_ENV is the only variable involved, and only to pick that file — the
// same rule the framework follows.
chdir(\dirname(__DIR__) . '/app');

$f3          = Base::instance();
$environment = getenv('APP_ENV') ?: 'production';

// Same order Bootstrap::loadConfiguration() uses: defaults, then the files
// listed in CONFIGS (which is where spoutbreeze.ini comes from), then the
// environment's own file on top.
$f3->config('config/default.ini');
foreach ((array) ($f3->get('CONFIGS') ?: []) as $file) {
    $path = 'config/' . mb_trim((string) $file) . '.ini';
    if (file_exists($path)) {
        $f3->config($path);
    }
}
if (file_exists('config/config-' . $environment . '.ini')) {
    $f3->config('config/config-' . $environment . '.ini');
}

$pdo = new PDO(
    (string) $f3->get('spoutbreeze.db.dsn'),
    (string) $f3->get('spoutbreeze.db.username'),
    (string) $f3->get('spoutbreeze.db.password'),
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

$email    = (string) $f3->get('spoutbreeze.admin.email');
$username = (string) $f3->get('spoutbreeze.admin.username');
$password = (string) $f3->get('spoutbreeze.admin.password');

if ('' === $email) {
    fwrite(STDERR, "spoutbreeze.admin.email is not configured; bootstrap admin not created\n");

    exit(0);
}

// No weak shipped default: an install that configures no password gets a
// strong random one, printed once on creation, rather than a password that
// is the same on every deployment of this image.
$generated = '' === $password;
if ($generated) {
    $password = rtrim(strtr(base64_encode(random_bytes(18)), '+/', '-_'), '=');
}

$hash = password_hash($password, PASSWORD_BCRYPT);

// Deactivate the legacy admin@email.com account from the 2021 migration and
// free its username for the bootstrap admin.
$pdo->prepare("UPDATE users SET status = 'inactive', username = username || '_legacy'
               WHERE email = 'admin@email.com' AND email <> ? AND username = ?")
    ->execute([$email, $username]);

// Create-only, deliberately. This runs on every container start, so an
// upsert would re-apply ADMIN_PASSWORD each time: an operator who rotates
// the admin password through the console would silently lose it on the next
// restart, a deliberately disabled account would come back active, and a
// demoted one would be forced back to admin.
$statement = $pdo->prepare(
    'INSERT INTO users (email, username, role, password, status, created_on, updated_on)
     VALUES (?, ?, ?, ?, ?, now(), now())
     ON CONFLICT (email) DO NOTHING
     RETURNING id'
);
$statement->execute([$email, $username, 'admin', $hash, 'active']);

if (false === $statement->fetchColumn()) {
    echo "bootstrap admin already exists, left untouched: {$email}\n";

    exit(0);
}

if ($generated) {
    // The only time this password is ever shown. It is not stored anywhere
    // else and cannot be recovered.
    fwrite(STDOUT, str_repeat('=', 72) . "\n");
    fwrite(STDOUT, "  Bootstrap admin created: {$email}\n");
    fwrite(STDOUT, "  Generated password:      {$password}\n");
    fwrite(STDOUT, "  Shown once. Sign in and change it, or set ADMIN_PASSWORD.\n");
    fwrite(STDOUT, str_repeat('=', 72) . "\n");

    exit(0);
}

echo "bootstrap admin created: {$email}\n";
