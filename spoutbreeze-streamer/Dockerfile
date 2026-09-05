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

ARG MEDIAMTX_VERSION=1.20.1

FROM websummoner/video-recorder:latest-release

ARG MEDIAMTX_VERSION

RUN apk add -U --no-cache jq curl bash socat ca-certificates && \
    rm -rf /var/cache/apk/*

ADD "https://github.com/bluenviron/mediamtx/releases/download/v${MEDIAMTX_VERSION}/mediamtx_v${MEDIAMTX_VERSION}_linux_amd64.tar.gz" /tmp/mediamtx.tar.gz

RUN tar -xzf /tmp/mediamtx.tar.gz -C /usr/local/bin mediamtx && \
    rm /tmp/mediamtx.tar.gz && \
    adduser -D -u 1000 streamer || true

COPY stream.sh /stream.sh
COPY mediamtx.yml /etc/spoutbreeze/mediamtx.yml

RUN chmod +x /stream.sh /usr/local/bin/mediamtx

ENTRYPOINT ["/stream.sh"]
