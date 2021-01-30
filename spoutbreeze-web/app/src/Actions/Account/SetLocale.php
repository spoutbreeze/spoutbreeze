<?php

/**
 * SpoutBreeze open source platform - https://www.spoutbreeze.io/
 *
 * Copyright (c) 2021 Frictionless Solutions Inc., RIADVICE SUARL and by respective authors (see below).
 *
 * This program is free software; you can redistribute it and/or modify it under the
 * terms of the GNU Lesser General Public License as published by the Free Software
 * Foundation; either version 3.0 of the License, or (at your option) any later
 * version.
 *
 * SpoutBreeze is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License along
 * with SpoutBreeze; if not, see <http://www.gnu.org/licenses/>.
 */

namespace Actions\Account;

use Actions\Base as BaseAction;
use Enum\Locale;
use Enum\ResponseCode;
use Models\User;
use Base;

/**
 * Class SetLocal
 * @package Actions\Account
 */
class SetLocale extends BaseAction
{

    /**
     * Save the user locale.
     *
     * @param Base  $f3
     * @param array $params
     * @throws
     */
    public function execute($f3, $params): void
    {
        $locale        = $params['locale'];
        $localeUpdated = false;

        if (Locale::contains($params['locale'])) {
            $this->session->set('locale', $locale);
            $localeUpdated = true;
        }

        if ($this->session->isLoggedIn()) {
            $this->updateUserLocale($params['locale']);
        }
        // TODO: remove unnecessary data, code is enough
        $result = ['locale' => $locale];
        // TODO: remove unnecessary data, code is enough
        if (!$localeUpdated) {
            $result = ['accepted' => false];
        }

        $this->renderJson($result, $localeUpdated ? ResponseCode::HTTP_OK : ResponseCode::HTTP_NOT_FOUND);
    }

    private function updateUserLocale($locale): void
    {
        $user = new User();
        $user->findone(['id = ?', [$this->session->get('user.id')]]);
        $user->locale = $locale;
        $user->save();
    }
}
