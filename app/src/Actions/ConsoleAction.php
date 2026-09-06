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

namespace Actions;

use Sukarix\Actions\WebAction;

/**
 * Shared hive setup for TailAdmin console pages.
 */
abstract class ConsoleAction extends WebAction
{
    protected function pdo(): \PDO
    {
        // spoutbreeze.db.* rather than db.*: the bootstrap sets the `db` hive
        // key to the connection object, so db.dsn reads back as null.
        return new \PDO(
            (string) $this->f3->get('spoutbreeze.db.dsn'),
            (string) $this->f3->get('spoutbreeze.db.username'),
            (string) $this->f3->get('spoutbreeze.db.password'),
            [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]
        );
    }

    /**
     * ACL denies land here: anonymous visitors go to the login screen,
     * signed-in users without the right role get the error page.
     */
    public function onAccessAuthorizeDeny($route, $subject): void
    {
        if (null === $this->session || !$this->session->isLoggedIn()) {
            $this->f3->reroute('/login');
        }
        parent::onAccessAuthorizeDeny($route, $subject);
    }

    protected function bootConsole(string $page): void
    {
        // Defence in depth beyond the ACL: the console is for signed-in users.
        if (null === $this->session || !$this->session->isLoggedIn()) {
            $this->f3->reroute('/login');
        }
        $notice = $this->session->get('users_notice');
        if (null !== $notice && '' !== (string) $notice) {
            $this->f3->set('form_error', (string) $notice);
            $this->session->set('users_notice', null);
        }
        $currentLocale = explode(',', (string) $this->f3->get('LANGUAGE'))[0];
        $this->f3->set('current_locale', $currentLocale);
        $this->f3->set('is_rtl', \in_array($currentLocale, ['ar-SA', 'fa-IR'], true));
        $this->f3->set('locale_flags', [
            'en-GB' => '🇬🇧',
            'fr-FR' => '🇫🇷',
            'de-DE' => '🇩🇪',
            'es-ES' => '🇪🇸',
            'pt-BR' => '🇧🇷',
            'pt-PT' => '🇵🇹',
            'th-TH' => '🇹🇭',
            'zh-CN' => '🇨🇳',
            'zh-TW' => '🇹🇼',
            'vi-VN' => '🇻🇳',
            'ar-SA' => '🇸🇦',
            'nl-NL' => '🇳🇱',
            'it-IT' => '🇮🇹',
            'ru-RU' => '🇷🇺',
            'ja-JP' => '🇯🇵',
            'uk-UA' => '🇺🇦',
        ]);
        $this->f3->set('sidebar_page', $page);
        if (null !== $this->session) {
            $this->f3->set('csrf_token', $this->session->generateToken());
            $this->f3->set('current_user', (string) $this->session->get('user.username'));
            $bounce = $this->session->get('csrf_bounce');
            if (null !== $bounce && '' !== (string) $bounce) {
                $this->f3->set('form_error', (string) $bounce);
                $this->session->set('csrf_bounce', null);
            }
        }
    }
}
