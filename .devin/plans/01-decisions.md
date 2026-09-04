# Decisions taken during execution

Each entry: decision, reason, and where it lives. ADR numbers refer to the master plan's
architecture decision records; this file records the execution-level choices on top of those.

## D1 — Java tier on Spring Boot 4.1.1 and Micronaut Platform 5.1.3, Java 25, Gradle 9.7.1

Owner's instruction: latest dependencies everywhere, Java 25 (latest LTS). Confirmed via Maven
Central and the Spring Boot 4.0 migration notes: `@EntityScan` moved to
`org.springframework.boot.persistence.autoconfigure.EntityScan`; `Jackson2JsonMessageConverter` is
deprecated-but-present in Spring AMQP 4 (kept for now). The three Spring modules build as one
Gradle composite (`settings.gradle` at the repo root); commons is consumed via
`project(':spoutbreeze-commons')` instead of `mavenLocal` publishing.

## D2 — Interactor on Micronaut 5 with a lean dependency set

MongoDB, GraphQL, Freemarker, Jackson-XML, Micronaut session and the embedded Spring starters were
only referenced by config, never by code — removed. Redis pub/sub switched from
`micronaut-redis-lettuce` (archived upstream) to direct Lettuce. RxJava controllers rewritten to
blocking `HttpClient` calls; behaviour unchanged (proxy endpoints to the web API).

## D3 — Reuse WebSummoner artifacts instead of building new images

The workspace already ships locally built `websummoner/websummoner:latest` (hub) and
`websummoner/chrome:152.0` (browser). A custom chrome layer was attempted and then dropped after
the owner's correction: nothing needs injecting into the browser image yet (that day comes with
`streamctl` in plan Phase 3, done upstream-style on the WebSummoner images). The recorder is the
published `websummoner/video-recorder:latest-release`. Consequence: `spoutbreeze-broadcaster` and
`spoutbreeze-selenoid` are no longer part of the runtime stack; selenoid is retired in favour of
the WebSummoner hub (selenoid-compatible API, agent code unchanged apart from reading its endpoint
from config).

## D4 — Legacy web: dockerise as-is, lock refreshed within old constraints

The 2021 console runs on php 8.5-fpm with its existing major-version constraints (f3 3.7.3,
cortex, phinx 0.12): jumping majors on a tier scheduled for replacement buys nothing. The lock was
`composer update`-refreshed within constraints (196 packages, no known advisories). The tier is
replaced by the Sukarix console over the coming phases, at which point the directory is deleted.

## D5 — New console: Sukarix skeleton at the repo root + TailAdmin, no Node at runtime

Per owner: the webapp moves to Sukarix (not pure f3) and uses TailAdmin (CSS/JS only). TailAdmin's
free HTML template needs one webpack build; that build runs once inside a throwaway
`node:24-alpine` container and the compiled `style.css`/`bundle.js`/images are vendored in
`public/assets/tailadmin/`. No Node toolchain exists in the repo's runtime or workflows; refreshing
assets = rerun the build script recorded in `03-references.md`.

## D6 — Extender from the official plugin template, served by our app

`bigbluebutton/bbb-plugin-template` branch `v0.0.x`, SDK pinned `0.0.99` with `requiredSdkVersion:
~0.0.99` (matching dependency and manifest — the mismatch the plan flagged in Craft's plugin is
fixed here). Built with the template's official webpack flow into `public/extender/0.1.0/` so BBB
can inject it through `pluginManifests` on `create`. A `v0.1.x` template branch exists for the
BBB 4.0 line (demo server is 4.0-rc1) — branching the extender for 4.0 is future work.

## D7 — Environment and secrets in the dev stack

Dev credentials are inline in `deploy/compose.yml` (`spoutbreeze_u/spoutbreeze_pass`,
rabbit `spoutbreeze/spoutbreeze`) and match the legacy app's phinx config so the 2021 migrations
run unmodified. `SPB_ENV` (new env-var override in `Boot.php`) forces the legacy app's
development config regardless of hostname. The Sukarix app gets its own `spoutbreeze_app`
database via `deploy/initdb/`.

## D8 — Nothing committed

All work stays in the working tree, per instruction. The git status will look large; the owner
reviews and commits in their own conventions (AGENTS.md).

## Licence header policy (5 September 2026)

The following AGPL notice is applied to every file of this repository except
`spoutbreeze-bigbluebutton-plugin` (see the exception below). It replaces the
2021 LGPL-3.0 headers (the co-owned "and by respective authors" blocks from the
original partnership) wherever they existed, and is
added to every file that had none — Java, PHP, shell, bats, Gradle, INI,
properties, YAML, conf and Dockerfiles, in the comment syntax of each format.

```
SpoutBreeze open source platform - https://www.spoutbreeze.org/

Copyright (c) 2021-2026 RIADVICE SUARL.

This program is free software: you can redistribute it and/or modify it under the
terms of the GNU Affero General Public License as published by the Free Software
Foundation, either version 3 of the License, or (at your option) any later version.

SpoutBreeze is distributed in the hope that it will be useful, but WITHOUT ANY
WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
PARTICULAR PURPOSE. See the GNU Affero General Public License for more details.

You should have received a copy of the GNU Affero General Public License along
with SpoutBreeze. If not, see <https://www.gnu.org/licenses/>.
```

Deliberate exclusions:

- **`spoutbreeze-bigbluebutton-plugin`** — files copied from BigBlueButton's
  plugin template arrive under LGPL-3.0 and must keep their original notice;
  SpoutBreeze's own new files in that project may carry the AGPL header. The
  combination is permitted because LGPL code may be included in an AGPL work.
  ADR-012 and step 0.4 of the master plan are to read: *"AGPL-3.0-or-later
  everywhere; template-derived plugin files keep their LGPL notice."*
- **`tools/statera.php`** — vendored from the Sukarix project (its own
  copyright notice, MIT project); its original notice stays.
- **`vendor/`, `public/`** — third-party dependencies and vendored assets
  (TailAdmin, compiled bundles, plugin build artefacts) keep their upstream
  notices.
- **JSON files** — no comment syntax; the licence lives in `LICENSE` and the
  adjacent source files.
- **Markdown documentation and the `.devin/plans/` journal** — prose, not
  source.

The Sukarix framework checkout is a separate project with its own MIT licence
and its own header conventions; framework files are not stamped with this
header. When the framework features built for SpoutBreeze (F1–F5) are released
upstream, they carry whatever licence policy Sukarix itself decides.
