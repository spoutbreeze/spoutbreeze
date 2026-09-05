#!/bin/bash
set -e

SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"

docker run --rm -v "$SCRIPT_DIR":/app -w /app node:24-alpine \
    sh -c "npm ci --no-audit --no-fund && npm run build-bundle"

TARGET="$SCRIPT_DIR/../public/plugins/bigbluebutton/0.2.0"
rm -rf "$TARGET"
mkdir -p "$TARGET"
cp "$SCRIPT_DIR"/dist/manifest.json "$SCRIPT_DIR"/dist/SpoutBreeze.js "$TARGET/"
