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

namespace Actions\Servers;

use Actions\Base as BaseAction;
use Enum\ResponseCode;
use Models\Server;
use Validation\Validator;
/**
 * Class Add
 * @package Actions\Servers
 */
class Add extends BaseAction
{
    /**
     * @param \Base $f3
     * @param array $params
     */
    public function show($f3, $params): void
    {
        $this->render();
    }

    /**
     * @param \Base $f3
     * @param array $params
     */
    public function save($f3, $params): void
    {
        $v       = new Validator();
        $form    = $this->getDecodedBody();

        $server    = new Server();

        $v->notEmpty()->verify('fqdn', $form['fqdn'], ['notEmpty' => $this->i18n->err('servers.fqdn')]);
        $v->ip('*', FILTER_FLAG_IPV4)->verify('ip_address', $form['ip_address'], ['ip' => $this->i18n->err('servers.ip_address')]);
        $v->notEmpty()->verify('shared_secret', $form['shared_secret'], ['notEmpty' => $this->i18n->err('servers.shared_secret')]);

        if ($v->allValid()) {
            $server->fqdn               = $form['fqdn'];
            $server->ip_address         = $form['ip_address'];
            $server->shared_secret      = $form['shared_secret'];

            try {
                $server->save();
            } catch (\Exception $e) {
                $this->renderJson(['errors' => $e->getMessage()], ResponseCode::HTTP_INTERNAL_SERVER_ERROR);

                return;
            }

            $this->renderJson(['data' => $server->toArray()]);
        } else {
            $this->renderJson(['errors' => $v->getErrors()], ResponseCode::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
