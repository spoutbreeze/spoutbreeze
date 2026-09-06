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
 * Starts a broadcast from the console form. CSRF is enforced by WebAction.
 */
class Start extends ConsoleAction
{
    /**
     * @param \Base $f3
     * @param array $params
     */
    public function execute($f3, $params): void
    {
        $meetingId = trim((string) $f3->get('POST.meeting_id'));
        $joinUrl   = trim((string) $f3->get('POST.join_url'));
        $rtmp      = trim((string) $f3->get('POST.rtmp_url'));
        $profile   = (string) ($f3->get('POST.profile') ?: '1080p30');

        // Credentials are no longer typed into this form: a broadcast picks
        // saved destinations, and an ad-hoc RTMP URL stays available for a
        // sink or a one-off target.
        $selected = $f3->get('POST.destination_ids');
        $targets  = [];
        if ('' !== $rtmp) {
            $targets[] = ['provider' => 'generic_rtmp', 'url' => $rtmp, 'label' => 'sink'];
        }

        try {
            BroadcastService::fromEnv($f3)->start([
                'meeting_id'      => $meetingId,
                'join_url'        => $joinUrl,
                'profile'         => $profile,
                'server_id'       => $f3->get('POST.server_id') ?: null,
                'destination_ids' => \is_array($selected) ? $selected : [],
                'targets'         => $targets,
            ]);
        } catch (\Throwable $e) {
            $this->bootConsole('broadcasts');
            $f3->set('form_error', $e->getMessage());
            $f3->set('broadcasts', []);
            $f3->set('default_rtmp', $rtmp);
            $destinations = BroadcastService::destinations($f3);
            $f3->set('destinations', null === $destinations ? [] : $destinations->enabled());
            $this->render('website', 'broadcasts/index');

            return;
        }

        $f3->reroute('/broadcasts');
    }
}
