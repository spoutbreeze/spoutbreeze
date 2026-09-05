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

FROM composer:2 AS vendor
WORKDIR /app

COPY spoutbreeze-web/composer.json spoutbreeze-web/composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader \
    --ignore-platform-req=ext-sockets --ignore-platform-req=ext-bcmath

COPY spoutbreeze-web .
RUN composer dump-autoload --optimize --no-dev

FROM php:8.4-fpm-alpine
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
RUN install-php-extensions pdo_pgsql redis sockets bcmath mbstring gd intl zip opcache

WORKDIR /var/www/spoutbreeze-web
COPY --from=vendor /app .
RUN mkdir -p tmp logs data && chown -R www-data:www-data tmp logs data

COPY deploy/web-legacy-entrypoint.sh /usr/local/bin/spoutbreeze-entrypoint.sh
RUN chmod +x /usr/local/bin/spoutbreeze-entrypoint.sh

EXPOSE 9000
ENTRYPOINT ["/usr/local/bin/spoutbreeze-entrypoint.sh"]
