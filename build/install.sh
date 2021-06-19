#!/bin/bash

# SpoutBreeze open source platform - https://www.spoutbreeze.org/
#
# Copyright (c) 2021 Frictionless Solutions Inc., RIADVICE SUARL and by respective authors (see below).
#
# This program is free software; you can redistribute it and/or modify it under the
# terms of the GNU Lesser General Public License as published by the Free Software
# Foundation; either version 3.0 of the License, or (at your option) any later
# version.
#
# SpoutBreeze is distributed in the hope that it will be useful, but WITHOUT ANY
# WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
# PARTICULAR PURPOSE. See the GNU Lesser General Public License for more details.
#
# You should have received a copy of the GNU Lesser General Public License along
# with SpoutBreeze; if not, see <http://www.gnu.org/licenses/>.
# Author(s):
#       Ghazi Triki <ghazi.triki@riadvice.tn>
#
# Changelog:
#   2021-06-07 GTR Initial Version

# The real location of the script
SCRIPT=$(readlink -f "$0")

# Current unix username
USER=$(whoami)

# Directory where the script is located
BASEDIR=$(dirname "$SCRIPT")

# Formatted current date
NOW=$(date +"%Y-%m-%d_%H.%M.%S")

# Production BBB LB directory
APP_DIR=$BASEDIR/../

echo "User $USER :: Installing SpoutBreeze"

echo "Create spoutbreeze user"
id -u spoutbreeze &>/dev/null || sudo useradd -r -s /bin/false spoutbreeze

echo "Add ondrej/php repository"
sudo add-apt-repository -y ppa:ondrej/php

echo "Enable Percoan PostgreSQL distribution"
sudo wget https://repo.percona.com/apt/percona-release_latest.generic_all.deb
sudo dpkg -i percona-release_latest.generic_all.deb
sudo rm percona-release_latest.generic_all.deb

echo "Add docker key"
sudo curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu bionic stable"

echo "Update OS software"
sudo apt-get update

echo "Install ubuntu tools"
sudo apt-get install -y wget gnupg2 lsb-release curl zip unzip nginx-full bc ntp xmlstarlet bash-completion

echo "Installing docker and docker compose with their dependencies"
sudo apt install -y apt-transport-https ca-certificates curl software-properties-common gnupg-agent
sudo apt install -y docker-ce docker-ce-cli containerd.io
sudo curl -L "https://github.com/docker/compose/releases/download/1.29.2/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose

echo "Pull selenoid images"
sudo docker pull aerokube/selenoid:latest-release
sudo docker pull aerokube/selenoid-ui:latest-release
sudo docker pull selenoid/video-recorder:latest-release
sudo docker pull browsers/chrome:91.0

echo "Install Redis for caching"
sudo apt-get install -y redis

echo "Install PHP 8.0 with its dependencies"
sudo apt-get install -y php8.0-curl php8.0-cli php8.0-intl php8.0-redis php8.0-gd php8.0-fpm php8.0-pgsql php8.0-mbstring php8.0-xml php8.0-bcmath php-xdebug

echo "Install PostgreSQL"
sudo percona-release setup ppg-13.2
sudo apt-get install -y percona-postgresql-13 percona-postgresql-13-pgaudit percona-pg-stat-monitor13

echo "Install RabbitMQ Server"
sudo apt-get install -y rabbitmq-server
sudo rabbitmq-plugins enable rabbitmq_management

DB_LISTED=$(sudo -u postgres psql -c "SELECT datname FROM pg_database;" &>/dev/null | grep "spoutbreeze")

if [[ ! $DB_LISTED =~ 'spoutbreeze$' ]]; then
    if [ ! -f ".pgpass" ]; then
        PG_PASS=$(dd if=/dev/urandom bs=1 count=32 2>/dev/null | base64 -w 0 | rev | cut -b 2- | rev)
        echo "$PG_PASS" >>".pgpass"
    fi

    PG_PASS=$(cat .pgpass)

    sudo -u postgres psql -c "CREATE USER spoutbreeze_u WITH PASSWORD '$PG_PASS'"
    sudo -u postgres psql -c "CREATE DATABASE spoutbreeze WITH OWNER 'spoutbreeze_u'"

    echo "------ PLEASE SAVE THE INFO BELOW ------"
    echo "PostgreSQL Password => $PG_PASS"
    echo "--------- DISPLAYED ONLY ONCE ----------"
fi

echo "Install JRE8"
sudo apt install openjdk-8-jre
