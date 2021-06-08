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

# Current git branch name transforms '* dev-0.5' to 'dev-0.5'
GIT_BRANCH=$(git --git-dir="$BASEDIR/../.git" branch | sed -n '/\* /s///p')

# Git tag, commits ahead & commit id under format '0.4-160-g3bb256c'
GIT_VERSION=$(git --git-dir="$BASEDIR/../.git" describe --tags --always HEAD)

echo "User $USER :: Installing SpoutBreeze :: Version $GIT_VERSION on $GIT_BRANCH branch"

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
sudo docker pull browsers/chrome:87.0

echo "Install Redis for caching"
sudo apt-get install -y redis

echo "Install PHP 8.0 with its dependencies"
sudo apt-get install -y php8.0-curl php8.0-cli php8.0-intl php8.0-redis php8.0-gd php8.0-fpm php8.0-pgsql php8.0-mbstring php8.0-xml php8.0-bcmath php-xdebug

echo "Installing PostgreSQL"
sudo percona-release setup ppg-13.2
sudo apt-get install -y percona-postgresql-13 percona-postgresql-13-pgaudit percona-pg-stat-monitor13
