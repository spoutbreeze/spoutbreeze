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

namespace Actions\Endpoints;

use Actions\Base as BaseAction;
use Base;
use Enum\ResponseCode;
use Models\Endpoint;
use Validation\Validator;

/**
 * Class Edit
 * @package Actions\Endpoints
 */
class Edit extends BaseAction
{
    /**
     * @param Base $f3
     * @param array $params
     */
    public function show($f3, $params): void
    {
        $endpoint = $this->loadData($params['id']);

        if ($endpoint->valid()) {
            $this->renderJson(['data' => $endpoint->toArray()]);
        } else {
            $this->renderJson([], ResponseCode::HTTP_NOT_FOUND);
        }
    }

    /**
     * @param Base $f3
     * @param array $params
     */
    public function save($f3, $params): void
    {
        $v = new Validator();
        $form = $this->getDecodedBody();
        $endpoint = $this->loadData($params['id']);

        $v->notEmpty()->verify('name', $form['name'], ['notEmpty' => $this->i18n->err('streaming_endpoints.name')]);
        $v->url()->verify('url', $form['url'], ['url' => $this->i18n->err('streaming_endpoints.url')]);


        if (!$endpoint->valid()) {
            $this->renderJson([], ResponseCode::HTTP_NOT_FOUND);
        } elseif ($v->allValid()) {
            $endpoint->name = $form['name'];
            $endpoint->url = $form['url'];


            try {
                $endpoint->save();
            } catch (\Exception $e) {
                $this->renderJson(['errors' => $e->getMessage()], ResponseCode::HTTP_INTERNAL_SERVER_ERROR);

                return;
            }

            $this->renderJson([], ResponseCode::HTTP_NO_CONTENT);
        } else {
            $this->renderJson(['errors' => $v->getErrors()], ResponseCode::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * @param int $id
     * @return Endpoint
     */
    public function loadData($id): Endpoint
    {
        $endpoint = new Endpoint();
        $endpoint->load(['id = ?', [$id]]);

        return $endpoint;
    }
}
