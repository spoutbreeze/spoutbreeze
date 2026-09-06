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

namespace Actions\Destinations;

use Actions\ConsoleAction;
use Domain\Security\SecretBox;
use Domain\Streaming\DestinationRepository;

class Create extends DestinationsAction
{
    /**
     * @param \Base $f3
     * @param array $params
     */
    public function execute($f3, $params): void
    {
        $provider = (string) $f3->get('POST.provider');
        $config   = [];
        foreach (DestinationRepository::PROVIDERS[$provider] ?? [] as $field) {
            $config[$field] = (string) $f3->get('POST.' . $field);
        }

        try {
            $this->destinations()->create(
                (string) $f3->get('POST.name'),
                $provider,
                (string) $f3->get('POST.label'),
                $config
            );
        } catch (\Throwable $e) {
            $this->back($e->getMessage());

            return;
        }

        $this->back();
    }
}
