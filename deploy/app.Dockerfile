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

FROM php:8.4-fpm-alpine
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
RUN install-php-extensions pdo_pgsql redis sockets bcmath mbstring intl zip opcache curl soap

WORKDIR /var/www/spoutbreeze
COPY app app
COPY public public
COPY db db
COPY tools tools
COPY tests tests
# Dev-free and with the framework symlinks dereferenced, staged by
# `tools/sb vendor-release`. The working-tree vendor/ is excluded in
# .dockerignore: it carries dev dependencies, and its sukarix/statera
# entries are symlinks to paths outside the image that would arrive broken.
COPY dist/vendor vendor
COPY phinx.json .
RUN mkdir -p logs tmp app/logs app/tmp && chown -R www-data:www-data logs tmp app/logs app/tmp

COPY deploy/app-entrypoint.sh /usr/local/bin/spoutbreeze-entrypoint.sh
RUN chmod +x /usr/local/bin/spoutbreeze-entrypoint.sh

EXPOSE 9000
ENTRYPOINT ["/usr/local/bin/spoutbreeze-entrypoint.sh"]
