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

namespace Actions\Core;

use Actions\Base as BaseAction;
use Base;
use Enum\ResponseCode;
use Exception;
use Models\Setting;
use Validation\Validator;

/**
 * Class Settings
 * @package Actions\Core
 */
class Settings extends BaseAction
{
    /**
     * @param Base  $f3
     * @param array $params
     */
    public function show($f3, $params): void
    {
        $settings = $this->loadData();

        $this->assets->addJs('core.js');
        $this->assets->addJs('core/settings.js');
        $f3->push('init.js', 'Settings');

        $this->f3->set('settings', $settings->toArray());

        $this->render();
    }

    public function save(): void
    {
        $v        = new Validator();
        $form     = $this->getDecodedBody();
        $settings = $this->loadData();

        $v->notEmpty()->verify('load_balancing_strategy', $form['load_balancing_strategy'], ['notEmpty' => $this->i18n->err('settings.load_balancing_strategy')]);
        $v->notEmpty()->verify('max_meetings', $form['max_meetings'], ['notEmpty' => $this->i18n->err('settings.max_meetings')]);
        $v->notEmpty()->verify('join_as_name', $form['join_as_name'], ['notEmpty' => $this->i18n->err('settings.join_as_name')]);

        if (!$settings->valid()) {
            $this->renderJson([], ResponseCode::HTTP_NOT_FOUND);
        } elseif ($v->allValid()) {
            $settings->max_meetings            = $form['max_meetings'];
            $settings->strict_pooling          = $form['strict_pooling'];
            $settings->join_as_name            = $form['join_as_name'];
            $settings->load_balancing_strategy = $form['load_balancing_strategy'];
            $settings->param_create_logo       = $form['param_create_logo'];

            try {
                $settings->save();
                $this->f3->clear('CACHE');
            } catch (Exception $e) {
                $this->renderJson(['errors' => $e->getMessage()], ResponseCode::HTTP_INTERNAL_SERVER_ERROR);

                return;
            }

            $this->renderJson([], ResponseCode::HTTP_NO_CONTENT);
        } else {
            $this->renderJson(['errors' => $v->getErrors()], ResponseCode::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * @return Setting
     */
    public function loadData(): Setting
    {
        $settings = new Setting();
        $settings->load();

        return $settings;
    }
}
