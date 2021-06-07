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

echo "User $USER :: Building SpoutBreeze :: Version $GIT_VERSION on $GIT_BRANCH branch with"

# Browse to the server project
echo "Build spoutbreeze-commons Java Library"
cd $BASEDIR/spoutbreeze-commons
gradle clean build
gradle publishToMavenLocal

