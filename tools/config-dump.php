<?php

declare(strict_types=1);

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

/*
 * Prints the resolved SpoutBreeze configuration: the values the application
 * actually runs with, after config-<environment>.ini and the environment
 * overrides on top of it. Useful when a deployment behaves as if a setting
 * had not been applied.
 */

require_once realpath(__DIR__ . '/../') . '/vendor/autoload.php';

chdir(realpath(__DIR__ . '/../app'));

$f3 = Base::instance();
new Application\Application();

$secretKeys = ['password', 'secret_key', 'api.key', 'access_token'];

foreach ($f3->get('spoutbreeze') ?: [] as $group => $value) {
    foreach (is_array($value) ? $value : ['' => $value] as $leaf => $item) {
        $key = 'spoutbreeze.' . $group . ('' !== $leaf ? '.' . $leaf : '');
        if (is_array($item)) {
            foreach ($item as $sub => $subValue) {
                render($key . '.' . $sub, (string) $subValue, $secretKeys);
            }

            continue;
        }
        render($key, (string) $item, $secretKeys);
    }
}

function render(string $key, string $value, array $secretKeys): void
{
    foreach ($secretKeys as $needle) {
        if (str_contains($key, $needle) && '' !== $value) {
            $value = substr($value, 0, 4) . '… (' . strlen($value) . ' chars)';

            break;
        }
    }
    printf("%-38s %s\n", $key, '' === $value ? '(unset)' : $value);
}
