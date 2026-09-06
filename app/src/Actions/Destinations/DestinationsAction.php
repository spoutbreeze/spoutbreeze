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

/**
 * Shared repository wiring for the destinations screens.
 */
abstract class DestinationsAction extends ConsoleAction
{
    /**
     * @throws \RuntimeException when no secret key is configured
     */
    protected function destinations(): DestinationRepository
    {
        return new DestinationRepository($this->pdo(), SecretBox::fromHive($this->f3));
    }

    /**
     * The screens share one flash channel, so a failed create can render the
     * list with its error without a second round trip.
     */
    protected function back(string $notice = ''): void
    {
        if ('' !== $notice && null !== $this->session) {
            $this->session->set('users_notice', $notice);
        }
        $this->f3->reroute('/destinations');
    }
}
