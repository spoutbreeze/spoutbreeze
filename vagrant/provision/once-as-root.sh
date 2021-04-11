#!/usr/bin/env bash

source /app/vagrant/provision/common.sh

#== Import script args ==

timezone=$(echo "$1")

#== Provision script ==

info "Provision-script user: $(whoami)"

export DEBIAN_FRONTEND=noninteractive

info "Configure timezone"
timedatectl set-timezone ${timezone} --no-ask-password

info "Add ondrej/php repository"
sudo add-apt-repository -y ppa:ondrej/php

info "Enable Percoan PostgreSQL distribution"
sudo wget https://repo.percona.com/apt/percona-release_latest.generic_all.deb
sudo dpkg -i percona-release_latest.generic_all.deb
sudo rm percona-release_latest.generic_all.deb

info "Add docker key"
sudo curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu bionic stable"

info "Update OS software"
sudo apt-get update

info "Install ubuntu tools"
sudo apt-get install -y wget gnupg2 lsb-release curl zip unzip nginx-full bc ntp xmlstarlet bash-completion

info "Installing docker and docker compose with their dependencies"
sudo apt install -y apt-transport-https ca-certificates curl software-properties-common gnupg-agent
sudo apt install -y docker-ce docker-ce-cli containerd.io
sudo curl -L "https://github.com/docker/compose/releases/download/1.27.4/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose

info "Pull selenoid images"
sudo docker pull aerokube/selenoid:latest-release
sudo docker pull aerokube/selenoid-ui:latest-release
sudo docker pull selenoid/video-recorder:latest-release
sudo docker pull browsers/chrome:87.0

info "Install Redis for caching"
sudo apt-get install -y redis

info "Install PHP 8.0 with its dependencies"
sudo apt-get install -y php8.0-curl php8.0-cli php8.0-intl php8.0-redis php8.0-gd php8.0-fpm php8.0-pgsql php8.0-mbstring php8.0-xml php8.0-bcmath php-xdebug

info "Installing PostgreSQL"
sudo percona-release setup ppg-13.1
sudo apt-get install -y percona-postgresql-13 percona-postgresql-13-pgaudit percona-pg-stat-monitor13

info "Upgrade to the latest versions"
sudo apt-get upgrade -y

info "Configure PHP-FPM"
sudo rm /etc/php/8.0/fpm/pool.d/www.conf
sudo ln -s /app/vagrant/dev/php-fpm/www.conf /etc/php/8.0/fpm/pool.d/www.conf
sudo rm /etc/php/8.0/mods-available/xdebug.ini
sudo ln -s /app/vagrant/dev/php-fpm/xdebug.ini /etc/php/8.0/mods-available/xdebug.ini
echo "Done!"

info "Configure NGINX"
sudo sed -i 's/user www-data/user vagrant/g' /etc/nginx/nginx.conf
echo "Done!"

info "Enabling site configuration"
sudo rm /etc/nginx/sites-enabled/default
sudo ln -s /app/vagrant/dev/nginx/app.conf /etc/nginx/sites-enabled/app.conf
sudo ln -s /app/vagrant/dev/nginx/docs.conf /etc/nginx/sites-enabled/docs.conf
echo "Done!"

info "Install RabbitMQ Server"
sudo apt-get install -y rabbitmq-server
sudo rabbitmq-plugins enable rabbitmq_management
sudo rabbitmqctl add_user spoutbreeze spoutbreeze
sudo rabbitmqctl set_user_tags spoutbreeze administrator
sudo rabbitmqctl set_permissions -p '/' 'spoutbreeze' '.*' '.*' '.*'

info "Install composer"
sudo curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer

info "set the default to listen to all addresses"
sudo sed -i "/port*/a listen_addresses = '*'" /etc/postgresql/13/main/postgresql.conf

info "allow any authentication mechanism from any client"
sudo sed -i "$ a host all all all trust" /etc/postgresql/13/main/pg_hba.conf

info "Initializing dev databases and users for PostgreSQL"
sudo -u postgres psql -c "CREATE USER spoutbreeze_u WITH PASSWORD 'spoutbreeze_pass'"
sudo -u postgres psql -c "CREATE DATABASE spoutbreeze WITH OWNER 'spoutbreeze_u'"
echo "Done!"

info "Initializing test databases and users for PostgreSQL"
sudo -u postgres psql -c "CREATE USER spoutbreeze_test_u WITH PASSWORD 'spoutbreeze_test'"
sudo -u postgres psql -c "CREATE DATABASE spoutbreeze_test WITH OWNER 'spoutbreeze_test_u'"
sudo -u postgres psql -c "ALTER ROLE spoutbreeze_test_u SUPERUSER;"
echo "Done!"
