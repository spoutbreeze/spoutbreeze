#!/usr/bin/env bash

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
