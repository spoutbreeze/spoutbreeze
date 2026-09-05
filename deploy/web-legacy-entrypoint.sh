#!/bin/sh
# SpoutBreeze open source platform - https://www.spoutbreeze.org/
#
# Copyright (c) 2021-2026 RIADVICE SUARL.
#
# This program is free software: you can redistribute it and/or modify it under the
# terms of the GNU Affero General Public License as published by the Free Software
# Foundation, either version 3 of the License, or (at your option) any later version.
#
# SpoutBreeze is distributed in the hope that it will be useful, but WITHOUT ANY
# WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
# PARTICULAR PURPOSE. See the GNU Affero General Public License for more details.
#
# You should have received a copy of the GNU Affero General Public License along
# with SpoutBreeze. If not, see <https://www.gnu.org/licenses/>.
set -e

until php -r 'new PDO(getenv("DB_DSN") ?: "pgsql:host=postgres;port=5432;dbname=spoutbreeze", getenv("DB_USER") ?: "spoutbreeze_u", getenv("DB_PASS") ?: "spoutbreeze_pass");' 2>/dev/null; do
  echo "waiting for the database"
  sleep 2
done

vendor/bin/phinx migrate -e development
exec php-fpm
