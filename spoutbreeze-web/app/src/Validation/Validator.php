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

namespace Validation;

use Respect\Validation\Validator as RespectValidator;

/**
 * Class Validator
 * @package Validation
 */
class Validator extends RespectValidator
{
    /**
     * @var array
     */
    private $errors;

    /**
     * @param $name
     * @param $input
     * @param $messages
     * @return bool|$this
     */
    public function verify($name, $input = null, $messages = null)
    {
        $exceptions    = $this->validateRules($input);
        $numRules      = count($this->rules);
        $numExceptions = count($exceptions);
        $summary       = [
            'total'  => $numRules,
            'failed' => $numExceptions,
            'passed' => $numRules - $numExceptions,
        ];

        // Remove rules once the validation has been finished
        $this->removeRules();
        if (!empty($exceptions)) {
            $exception = $this->reportError($input, $summary)->setRelated($exceptions);
            if ($messages) {
                $this->errors[$name] = $exception->findMessages($messages);
            } else {
                $this->errors[$name] = $exception->getFullMessage();
            }

            return false;
        }

        return true;
    }

    /**
     * @param  $popErrors     bool If true errors will be put into f3 hive
     * @param  $errorsHiveKey string
     * @return bool
     */
    public function allValid($popErrors = true, $errorsHiveKey = 'form_errors')
    {
        if (!empty($this->errors) && $popErrors) {
            foreach ($this->getErrors() as $key => $errors) {
                if (is_array($errors)) {
                    \Base::instance()->set($errorsHiveKey . '.' . $key, array_values($errors)[0]);
                }
            }
        }

        return empty($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
