<?php

/**
 * SpoutBreeze open source platform - https://www.spoutbreeze.org/
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

namespace Actions\Broadcasts;

use Actions\Base as BaseAction;
use Base;
use Models\Broadcast;
use Models\Endpoint;
use Models\Server;

/**
 * Class Start
 * @package Actions\Broadcasts
 */
class Start extends BaseAction
{
    /**
     * @param Base $f3
     * @param array $params
     */
    public function execute($f3, $params): void {
        // @todo: check the meeting id first then return and indompedant response
        $form      = $this->getDecodedBody();
        $broadcast = $this->loadBroadcastByMeetingId($form["meetingId"]);
        // @todo: make sure the server ID is checked also
        if (!$broadcast->dry()) {
            $this->renderJson(['data' => $broadcast->cast()]);
            return;
        }
        $server = $this->loadServerByIP($f3->ip());
        if (!$server->dry()) {
            $endpoint = $this->loadEndpoint($form['endpointId']);
            if (!$endpoint->dry()) {
                $broadcast              = new Broadcast();
                $broadcast->endpoint_id = $endpoint->id;
                $broadcast->server_id   = $server->id;
                $broadcast->meeting_id  = $form["meetingId"];
                $broadcast->selenoid_id = "none";
                $broadcast->save();

                $this->renderJson(['data' => $broadcast->cast()]);
            } else {
                // @todo: return json error
                $this->f3->error(500);
            }
        } else {
            // @todo: return json error
            $this->f3->error(500);
        }
    }

    /**
     * @param int $id
     * @return Endpoint
     */
    public function loadEndpoint($id): Endpoint {
        $endpoint = new Endpoint();
        $endpoint->load(['id = ?', [$id]]);

        return $endpoint;
    }

    /**
     * @param int $ip_address
     * @return Server
     */
    public function loadServerByIP($ip_address): Server {
        $server = new Server();
        $server->load(['ip_address = ?', [$ip_address]]);

        return $server;
    }

    public function loadBroadcastByMeetingId($meetingId) {
        $broadcast = new Broadcast();
        $broadcast->load(['meeting_id = ?', [$meetingId]]);

        return $broadcast;
    }
}
