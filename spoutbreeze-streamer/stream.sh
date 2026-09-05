#!/bin/bash
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
set -uo pipefail

BROWSER_CONTAINER_NAME=${BROWSER_CONTAINER_NAME:-"browser"}
DISPLAY=${DISPLAY:-"99"}
FILE_NAME=${FILE_NAME:-"video.mp4"}
PRESET=${PRESET:-"veryfast"}
AUDIO_BITRATE=${AUDIO_BITRATE:-"128k"}
STREAMER_API=${SPOUTBREEZE_API:-}
STREAMER_JOB=${SPOUTBREEZE_JOB:-}
PROFILE=${PROFILE:-"1080p30"}
ARCHIVE=${ARCHIVE:-"false"}
RELAY_URL="rtmp://127.0.0.1/relay"
HEARTBEAT_INTERVAL=${HEARTBEAT_INTERVAL:-15}
PUSH_PIDS=()
SOCAT_PIDS=()
LOG_DIR=/data
mkdir -p "$LOG_DIR" 2>/dev/null || LOG_DIR=/tmp

profile_settings() {
    case "$1" in
        720p30)  echo "1280x720 30 3500k" ;;
        1080p60) echo "1920x1080 60 6000k" ;;
        *)       echo "1920x1080 30 6000k" ;;
    esac
}

gop_for() {
    echo $(( $1 * 2 ))
}

job_endpoint() {
    echo "${SPOUTBREEZE_API%/}/api/v1/streamer/jobs/${SPOUTBREEZE_JOB}"
}

target_urls() {
    jq -r '.targets[].url' <<< "$1"
}

target_labels() {
    jq -r '.targets[] | (.label // (.url | split("/")[2]))' <<< "$1"
}

heartbeat_body() {
    local state=$1
    jq -cn --arg state "$state" '{state: $state}'
}

wait_for_display() {
    local attempts=0
    until xset -display "${BROWSER_CONTAINER_NAME}:${DISPLAY}" b off > /dev/null 2>&1; do
        attempts=$((attempts + 1))
        [ $attempts -ge 300 ] && return 1
        sleep 0.1
    done
}

prepare_pulse() {
    mkdir -p ~/.config/pulse
    echo -n 'gIvST5iz2S0J1+JlXC1lD3HWvg61vDTV1xbmiGxZnjB6E3psXsjWUVQS4SRrch6rygQgtpw7qmghDFTaekt8qWiCjGvB0LNzQbvhfs1SFYDMakmIXuoqYoWFqTJ+GOXYByxpgCMylMKwpOoANEDePUCj36nwGaJNTNSjL8WBv+Bf3rJXqWnJ/43a0hUhmBBt28Dhiz6Yqowa83Y4iDRNJbxih6rB1vRNDKqRr/J9XJV+dOlM0dI+K6Vf5Ag+2LGZ3rc5sPVqgHgKK0mcNcsn+yCmO+XLQHD1K+QgL8RITs7nNeF1ikYPVgEYnc0CGzHTMvFR7JLgwL2gTXulCdwPbg==' | base64 -d > ~/.config/pulse/cookie
    export PULSE_SERVER="tcp:${BROWSER_CONTAINER_NAME}"

    local attempts=0
    until pactl info > /dev/null 2>&1; do
        attempts=$((attempts + 1))
        [ $attempts -ge 25 ] && return 1
        sleep 0.2
    done
}

wait_for_job() {
    local attempts=0 response
    while true; do
        response=$(curl -fsS --max-time 10 "$(job_endpoint)" 2>/dev/null) || response=""
        if [ -n "$response" ] && [ "$(jq -r '.state' <<< "$response")" = "ready" ]; then
            echo "$response"
            return 0
        fi
        attempts=$((attempts + 1))
        [ $attempts -ge 300 ] && return 1
        sleep 2
    done
}

start_relay() {
    mediamtx /etc/spoutbreeze/mediamtx.yml > >(tee -a "${LOG_DIR}/relay.log") 2>&1 &
    RELAY_PID=$!
}

start_encoder() {
    local video_size=$1 frame_rate=$2 video_bitrate=$3
    local input_args="-f x11grab -video_size ${video_size} -r ${frame_rate} -i ${BROWSER_CONTAINER_NAME}:${DISPLAY}"
    local codec_args="-an"
    local video_index=0
    local audio_map=""

    if [ "${HAVE_AUDIO:-0}" = "1" ]; then
        input_args="-f pulse -thread_queue_size 1024 -i default ${input_args}"
        codec_args="-c:a aac -b:a ${AUDIO_BITRATE} -ar 48000"
        video_index=1
        audio_map="-map 0:a:0"
    fi

    ffmpeg -hide_banner -loglevel info \
        ${input_args} -y \
        -map "${video_index}:v:0" ${audio_map} \
        -c:v libx264 -preset "${PRESET}" -tune zerolatency -profile:v high -pix_fmt yuv420p \
        -g "$(gop_for "$frame_rate")" -keyint_min "$(gop_for "$frame_rate")" \
        -b:v "${video_bitrate}" -maxrate "${video_bitrate}" -bufsize "$(( ${video_bitrate%k} * 2 ))k" \
        ${codec_args} \
        -filter:v "pad=ceil(iw/2)*2:ceil(ih/2)*2" \
        -f flv "${RELAY_URL}" > >(tee -a "${LOG_DIR}/encoder.log") 2>&1 &
    ENCODER_PID=$!
}

start_archive() {
    mkdir -p /data
    ffmpeg -hide_banner -loglevel warning -i "${RELAY_URL}" -c copy -movflags +faststart "/data/${FILE_NAME}" &
    ARCHIVE_PID=$!
}

start_pushers() {
    local job=$1 index=0 label url
    for label in $(target_labels "$job"); do
        url="$(sed -n "$((index + 1))p" <<< "$(target_urls "$job")")"
        if is_rtmps "$url"; then
            url="$(start_tls_tunnel "$index" "$url")"
        fi
        run_pusher "$label" "$url" &
        PUSH_PIDS+=($!)
        index=$((index + 1))
    done
}

is_rtmps() {
    case "$1" in rtmps://*) return 0 ;; *) return 1 ;; esac
}

# This image's ffmpeg cannot complete a TLS handshake (it fails even against
# a local openssl s_server), and some networks filter plain RTMP on the wire.
# For rtmps targets the pusher therefore speaks plain RTMP over loopback into
# a socat TLS tunnel that terminates at the platform with proper SNI.
start_tls_tunnel() {
    local index=$1 url=$2
    local rest host port local_port
    rest="${url#rtmps://}"
    host="${rest%%/*}"
    case "$host" in
        *:*) port="${host##*:}"; host="${host%%:*}" ;;
        *)   port="443" ;;
    esac
    local_port=$((21000 + index))

    socat "TCP-LISTEN:${local_port},fork,reuseaddr,bind=127.0.0.1" \
        "OPENSSL:${host}:${port},verify=1,cafile=/etc/ssl/certs/ca-certificates.crt" \
        > "${LOG_DIR}/tunnel-${index}.log" 2>&1 &
    SOCAT_PIDS+=($!)
    trace "tls tunnel ${index}: 127.0.0.1:${local_port} -> ${host}:${port}"

    echo "rtmp://127.0.0.1:${local_port}/${rest#*/}"
}

run_pusher() {
    local label=$1 url=$2
    echo "connecting" > "/tmp/target-${label}.state"
    while true; do
        ffmpeg -hide_banner -loglevel info -i "${RELAY_URL}" -c copy -f flv "${url}" >> "${LOG_DIR}/pusher-${label}.log" 2>&1 &
        local pid=$!
        # Heartbeats report the target state: after a few seconds of a living
        # ffmpeg the push is genuinely streaming, not merely connecting.
        sleep 5
        if kill -0 "$pid" 2>/dev/null; then
            echo "streaming" > "/tmp/target-${label}.state"
        fi
        wait "$pid"
        echo "reconnecting" > "/tmp/target-${label}.state"
        sleep 2
    done
}

pusher_states() {
    local state_file label state body="[]"
    for state_file in /tmp/target-*.state; do
        [ -e "$state_file" ] || continue
        label="${state_file#/tmp/target-}"
        label="${label%.state}"
        state="$(cat "$state_file")"
        body=$(jq -cn --argjson acc "$body" --arg label "$label" --arg state "$state" \
            '$acc + [{label: $label, state: $state}]')
    done
    echo "$body"
}

send_heartbeat() {
    curl -fsS --max-time 10 -X POST \
        -H 'content-type: application/json' \
        -d "{\"job\":\"${STREAMER_JOB}\",\"targets\":$(pusher_states)}" \
        "$(job_endpoint)/heartbeat" > /dev/null 2>&1 || true
}

heartbeat_loop() {
    while kill -0 "${ENCODER_PID}" 2>/dev/null; do
        send_heartbeat
        sleep "${HEARTBEAT_INTERVAL}"
    done
}

# A dead encoder used to end the whole streamer, leaving the broadcast LIVE
# with no stream. The design rule "restart the streaming at any recoverable
# failure" applies here: supervise the encoder and restart it while the job
# is still active. The relay and pushers survive a dropped source (the
# pushers reconnect on their own).
supervise() {
    local restarts=0
    while true; do
        if kill -0 "${ENCODER_PID}" 2>/dev/null; then
            send_heartbeat
        else
            restarts=$((restarts + 1))
            trace "encoder died; restarting (attempt ${restarts})"
            wait "${ENCODER_PID}" 2>/dev/null
            start_encoder "$@" 2>/dev/null || true
        fi
        sleep "${HEARTBEAT_INTERVAL}"
    done
}

stop_everything() {
    kill "${PUSH_PIDS[@]}" "${SOCAT_PIDS[@]}" "${ENCODER_PID}" "${RELAY_PID}" 2>/dev/null
    [ "${ARCHIVE_PID:-}" ] && kill "${ARCHIVE_PID}" 2>/dev/null
    wait 2>/dev/null
    send_heartbeat
    exit 0
}

trace() {
    echo "$(date -u +%FT%TZ) $*" >> "${LOG_DIR}/streamer-boot.log" 2>/dev/null || true
}

main() {
    trap stop_everything SIGTERM SIGINT
    trace "boot script=$0 browser=${BROWSER_CONTAINER_NAME} display=${DISPLAY} job=${SPOUTBREEZE_JOB:-} api=${SPOUTBREEZE_API:-} audio=${DISABLE_AUDIO:-}"

    trace "display ready, fetching job"
    local job
    job=$(wait_for_job) || { trace "job never became ready"; echo "the streamer job never became ready"; exit 1; }
    trace "job received"

    read -r video_size frame_rate video_bitrate <<< "$(profile_settings "$(jq -r '.profile // empty' <<< "$job" || true)")"
    PROFILE=$(jq -r '.profile // "1080p30"' <<< "$job")
    read -r video_size frame_rate video_bitrate <<< "$(profile_settings "$PROFILE")"

    wait_for_display || { echo "the browser display never opened"; exit 1; }
    HAVE_AUDIO=0
    prepare_pulse && HAVE_AUDIO=1

    start_relay
    sleep 1

    start_encoder "$video_size" "$frame_rate" "$video_bitrate"

    [ "$ARCHIVE" = "true" ] && start_archive
    trace "encoder started pid=${ENCODER_PID}"
    start_pushers "$job"
    trace "pushers started"
    supervise "$video_size" "$frame_rate" "$video_bitrate"
}

if [[ "${BASH_SOURCE[0]}" == "$0" ]]; then
    main "$@"
fi
