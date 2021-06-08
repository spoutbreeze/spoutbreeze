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

/**
 * Class GetEndpoint
 * @package Actions\Broadcasts
 */
class GetEndpoint extends BaseAction
{
    /**
     * @param Base  $f3
     * @param array $params
     */
    public function execute($f3, $params): void
    {
        // @todo: check the meeting id first then return and indompedant response
        $form      = $this->getDecodedBody();
        $broadcast = $this->loadBroadcastById($form['boradcastId']);
        // @todo: make sure the server ID is checked also
        if (!$broadcast->dry()) {
            $endpoint = $this->loadEndpointByBroadcastId($broadcast->endpoint_id);
            $this->renderJson(['data' => $endpoint->cast()]);
        } else {
            // @todo: return json error
            $this->f3->error(500);
        }
    }

    public function loadBroadcastById($broadcastId)
    {
        $broadcast = new Broadcast();
        $broadcast->load(['id = ?', [$broadcastId]]);

        return $broadcast;
    }

    public function loadEndpointByBroadcastId($endpointId)
    {
        $endpoint = new Endpoint();
        $endpoint->load(['id = ?', [$endpointId]]);

        return $endpoint;
    }
}
