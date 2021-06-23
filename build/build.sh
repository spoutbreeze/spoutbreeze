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

SDKMAN_DIR="/usr/local/sdkman"
source "/usr/local/sdkman/bin/sdkman-init.sh"

echo "User $USER :: Building SpoutBreeze :: Version $GIT_VERSION on $GIT_BRANCH branch with"

# Archive spoutbreeze-web
cd $APP_DIR/spoutbreeze-web
./package.sh

# Preparing buikd package
cd $APP_DIR/build
tar czvf config.tar.gz config/app.conf config/www.conf

# Build spoutbreeze-commons
echo "Build spoutbreeze-commons Java Library"
cd $APP_DIR/spoutbreeze-commons
gradle clean build
gradle publishToMavenLocal

echo "Build spoutbreeze-manager Java Application"
cd $APP_DIR/spoutbreeze-manager
gradle clean assemble
mkdir $APP_DIR/spoutbreeze-manager/staging
cd $APP_DIR/spoutbreeze-manager/staging
mv $APP_DIR/spoutbreeze-manager/build/libs/spoutbreeze-manager* spoutbreeze-manager.jar
cp -R $APP_DIR/spoutbreeze-manager/prod/*.*  .
tar -zcvf spoutbreeze-manager.tar.gz .

echo "Build spoutbreeze-agent Java Application"
cd $APP_DIR/spoutbreeze-agent
gradle clean assemble
mkdir $APP_DIR/spoutbreeze-agent/staging
cd $APP_DIR/spoutbreeze-agent/staging
mv $APP_DIR/spoutbreeze-agent/build/libs/spoutbreeze-agent* spoutbreeze-agent.jar
cp -R $APP_DIR/spoutbreeze-agent/prod/*.*  .
tar -zcvf spoutbreeze-agent.tar.gz .
