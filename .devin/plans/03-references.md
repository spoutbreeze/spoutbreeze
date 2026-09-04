# Reference map

## Code lines (all local)

| Path | What |
|---|---|
| `/home/riadvice/workspace/spoutbreeze/spoutbreeze` | This repository (2021 monolith + revival). Remote `git@github.com:spoutbreeze/spoutbreeze.git`. |
| `/home/riadvice/workspace/sukarix/sukarix` | Sukarix framework source (packagist `sukarix/sukarix` 0.4.0). |
| `/home/riadvice/workspace/sukarix/application` | Sukarix skeleton the new app was copied from. |
| `/home/riadvice/workspace/sukarix/statera` | Statera test framework. |
| `/home/riadvice/workspace/websummoner/websummoner` | WebSummoner hub (Go; local docker image `websummoner/websummoner:latest`). |
| `/home/riadvice/workspace/websummoner/images` | Browser image sources (`selenium/base`, `static/chrome`, `static/firefox`, …). Local images `websummoner/chrome:152.0` etc. built from here; tarball snapshots in `websummoner/ws-images/`. |
| `/home/riadvice/workspace/websummoner/websummoner-container-tests` | Container test suite for the images. |
| `/home/riadvice/workspace/craftschoolship/spoutbreeze-backend` | CraftSchoolship Python backend — reference only, never copy. |
| `/home/riadvice/workspace/craftschoolship/spoutbreeze-frontend` | CraftSchoolship Next.js frontend — reference only. |
| `/home/riadvice/workspace/craftschoolship/spoutbreeze-bbb-plugin` | CraftSchoolship BBB plugin — reference only. |
| `/home/riadvice/workspace/craftschoolship/spoutbreeze-chat-gateway` | CraftSchoolship chat gateway — reference only. |

The CraftSchoolship forks live under https://github.com/CraftSchoolship/ (private org; `gh` is
authenticated as GhaziTriki with access). The sibling "2025 restart" repos are abandoned in favour
of this monolith.

## TailAdmin asset rebuild (one-shot, no Node on the host)

    rm -rf /tmp/tailadmin && gh repo clone TailAdmin/tailadmin-free-tailwind-dashboard-template /tmp/tailadmin -- --depth 1
    docker run --rm -v /tmp/tailadmin:/app -w /app node:24-alpine sh -c "npm ci --no-audit --no-fund && npm run build"
    # copy build/style.css, build/bundle.js, build/images, build/src/images → public/assets/tailadmin/

## BBB 4.0 demo server (test target, owner-provided, use freely)

- URL: the BigBlueButton 4.0 test server (set `BBB_API_URL` in `deploy/.env`)
- Shared secret: in `deploy/.env` as `BBB_SHARED_SECRET`, never in the repository
- sha1 checksums confirmed working; API mate link:
  API Mate can be pointed at it with those two values.
- Do not commit this secret; if the repo ever goes public, move it to a private vault first.

## Official documentation

- BBB API: https://docs.bigbluebutton.org/development/api/ (incl. `sendChatMessage`, `pluginManifests`, `bot=true`)
- BBB plugins: https://docs.bigbluebutton.org/plugins/ ; template `bigbluebutton/bbb-plugin-template` (branches `v0.0.x` = 3.0, `v0.1.x` = 4.0)
- BBB webhooks: https://docs.bigbluebutton.org/development/webhooks/
- TailAdmin free HTML: https://tailadmin.com/ (repo `TailAdmin/tailadmin-free-tailwind-dashboard-template`)
