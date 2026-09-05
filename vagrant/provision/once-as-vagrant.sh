#!/usr/bin/env bash
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

source /app/vagrant/provision/common.sh

#== Provision script ==

info "Provision-script user: $(whoami)"

info "Install SDKMan"
curl -s https://get.sdkman.io | bash
source "$HOME/.sdkman/bin/sdkman-init.sh"

info "Install JDK framework"
sdk install gradle 7.0.2
sdk install springboot 2.4.3
sdk install micronaut 2.3.3
sdk install java 8.0.265-open

info "Create bash-alias 'app' for vagrant user"
echo 'alias app="cd /app"' | tee /home/vagrant/.bash_aliases

info "Enabling colorized prompt for guest console"
sed -i "s/#force_color_prompt=yes/force_color_prompt=yes/" /home/vagrant/.bashrc

info "Install install composer dependencies and run database migration"
cd /app/spoutbreeze-web
composer install -o
vendor/bin/phinx migrate -e development
composer global require daux/daux.io
