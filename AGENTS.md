# SpoutBreeze

SpoutBreeze streams BigBlueButton meetings to YouTube, Twitch, LinkedIn, Panopto, Facebook and any
RTMP target, using a Sukarix (PHP) control plane, a RabbitMQ bus and a WebSummoner browser grid.

## Context and progress

All revival context — decisions taken, work completed, work planned, open questions and reference
locations — lives in [`.devin/plans/`](.devin/plans/). Read `00-overview.md` there before working on
this repository; it is the authoritative working journal.

## Layout

- `app/`, `public/`, `db/`, `tests/`, `tools/`, `composer.json` — the Sukarix application (new console).
- `spoutbreeze-web/` — the 2021 Fat-Free console, dockerised, kept until the Sukarix console replaces it.
- `spoutbreeze-commons/`, `spoutbreeze-manager/`, `spoutbreeze-agent/`, `spoutbreeze-interactor/` — Gradle multi-project (`settings.gradle.kts` at the root) on Micronaut 5.1.3 / JDK 25 with `micronaut-rabbitmq`. Every project directory is prefixed `spoutbreeze-` (hard rule). Tests run in a Gradle container (see `.devin/plans/00-overview.md`).

- `spoutbreeze-bigbluebutton-plugin/` — BigBlueButton 4.0 HTML5 plugin from the official `bbb-plugin-template`; build with `bash spoutbreeze-bigbluebutton-plugin/build.sh` (Node runs in a container); served from `public/plugins/bigbluebutton/<ver>/`.
- `spoutbreeze-streamer/` — the streaming sidecar on the WebSummoner recorder (MediaMTX relay, bats tests under `tests/`).
- `deploy/` — `compose.yml` plus every Dockerfile, nginx conf, `browsers.json` and initdb script. `- `contracts/` — JSON Schemas for the RabbitMQ messages.

Everything runs in Docker; nothing is installed on the host. Start the stack with:

    docker compose -f deploy/compose.yml up -d --build

## Conventions

1. Commit subjects: imperative mood, capital first letter, at most 72 characters, ending with a
   period. Example: `Add the Panopto provider adapter.`
2. Optional prose body after a blank line explaining why, wrapped at 72 columns.
3. One logical change per commit; version bumps are their own commit: `Bump version to 1.1.0.`
4. No trailers of any kind — no `Co-Authored-By`, no `Signed-off-by`, no tool attribution.
5. British spelling in messages and identifiers (`organisation`, `initialise`).
6. Comments are minimal; prefer self-explanatory names.
7. Framework gaps are written into Sukarix itself (local path repository), never into the application.
8. Never copy features or UI from the CraftSchoolship repositories (reference clones live outside
   this repo); we re-implement in our own way.
