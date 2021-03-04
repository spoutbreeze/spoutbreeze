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

namespace Actions\Agents;

use Actions\Base as BaseAction;
use Models\Agent;
use Base;

/**
 * Class Index
 
 * @package Actions\Agents
 */
class Index extends BaseAction
{
    /**
     * @param Base  $f3
     * @param array $params
     */
    public function show($f3, $params): void
    {
        $this->assets->addJs('core.js');
        $this->assets->addJs('core/agents.js');
        $this->assets->addJs('vendors/datatables.min.js');
        $this->assets->addCss('datatables.min.css');
        $f3->push('init.js', 'Agents');

        $this->render();
    }

    /**
     * @param Base  $f3
     * @param array $params
     */
    public function execute($f3, $params): void
    {
        $agent     = new Agent();
        $filter    = $f3->get('GET');
        $agents    = $agent->find($filter, ['order' => 'id']);

        $this->renderJson(['data' => $agents ? $agents->castAll(0) : [], 'filter' => $filter]);
    }
}
