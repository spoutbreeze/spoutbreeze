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

namespace Actions\Broadcasts;

use Actions\ConsoleAction;
use Domain\Broadcasts\BroadcastService;

/**
 * TailAdmin broadcasts list and start form.
 */
class Index extends ConsoleAction
{
    /**
     * @param \Base $f3
     * @param array $params
     */
    public function execute($f3, $params): void
    {
        $this->bootConsole('broadcasts');
        $error = '';
        $rows  = [];
        try {
            $rows = BroadcastService::fromEnv($f3)->list();
        } catch (\Throwable $e) {
            $error = $e->getMessage();
        }
        $f3->set('broadcasts', $rows);
        $f3->set('form_error', $error);
        $f3->set('default_rtmp', $f3->get('spoutbreeze.sink_url'));

        // Saved destinations replace the credential fields the form used to
        // carry; an install without a secret key simply sees none.
        $destinations = BroadcastService::destinations($f3);
        $f3->set('destinations', null === $destinations ? [] : $destinations->enabled());

        $this->render();
    }
}
