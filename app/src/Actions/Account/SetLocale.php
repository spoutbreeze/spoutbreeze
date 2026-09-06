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

namespace Actions\Account;

use Sukarix\Actions\WebAction;

/**
 * Switches the active locale and returns the URL for the selected language.
 */
class SetLocale extends WebAction
{
    /**
     * Locale switching is a public, stateless helper used by the UI language picker.
     */
    public function beforeroute(): void
    {
        // Deliberately skip CSRF and access checks for this public helper.
    }

    public function execute($f3, $params): void
    {
        $requestedLocale = $params['locale'];
        $locales         = $f3->get('MULTILANG.languages');

        if (!\is_array($locales) || !\in_array($requestedLocale, $locales, true)) {
            $this->renderJson(['success' => false, 'error' => 'Invalid locale'], 400);

            return;
        }

        $this->session->set('locale', $requestedLocale);

        $language = array_search($requestedLocale, $locales, true);
        $redirect = '/' . $language;

        $this->logger->info('Locale switched', ['locale' => $requestedLocale, 'redirect' => $redirect]);
        $this->renderJson(['success' => true, 'redirect' => $redirect]);
    }
}
