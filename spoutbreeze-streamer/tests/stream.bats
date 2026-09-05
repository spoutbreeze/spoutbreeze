#!/usr/bin/env bats

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

setup() {
    STREAMERUnderTest=1
    # shellcheck disable=SC1091
    source "$(dirname "$BATS_TEST_FILENAME")/../stream.sh"
}

@test "profile settings resolve size, frame rate and bitrate" {
    [ "$(profile_settings 720p30)" = "1280x720 30 3500k" ]
    [ "$(profile_settings 1080p30)" = "1920x1080 30 6000k" ]
    [ "$(profile_settings 1080p60)" = "1920x1080 60 6000k" ]
    [ "$(profile_settings unknown)" = "1920x1080 30 6000k" ]
}

@test "gop is twice the frame rate" {
    [ "$(gop_for 30)" = "60" ]
    [ "$(gop_for 60)" = "120" ]
}

@test "job endpoint joins api base and job token" {
    SPOUTBREEZE_API="https://spb.example.com/"
    SPOUTBREEZE_JOB="job-token"
    [ "$(job_endpoint)" = "https://spb.example.com/api/v1/streamer/jobs/job-token" ]
}

@test "target urls and labels are extracted from the job" {
    job='{"state":"ready","profile":"1080p30","targets":[{"url":"rtmp://a.example.com/live/k1"},{"label":"twitch","url":"rtmp://b.example.com/live/k2"}]}'

    [ "$(target_urls "$job" | tr '\n' ' ')" = "rtmp://a.example.com/live/k1 rtmp://b.example.com/live/k2 " ]
    [ "$(target_labels "$job" | tr '\n' ' ')" = "a.example.com twitch " ]
}

@test "heartbeat body carries the state" {
    [ "$(heartbeat_body streaming)" = '{"state":"streaming"}' ]
}

@test "pusher states aggregate the target state files" {
    echo "connected" > /tmp/target-youtube.state
    echo "reconnecting" > /tmp/target-twitch.state

    body="$(pusher_states)"
    echo "$body" | jq -e '(sort_by(.label)) == ([{"label":"twitch","state":"reconnecting"},{"label":"youtube","state":"connected"}] | sort_by(.label))' > /dev/null

    rm -f /tmp/target-youtube.state /tmp/target-twitch.state
}

@test "pusher states handle no targets" {
    rm -f /tmp/target-*.state
    [ "$(pusher_states)" = "[]" ]
}
