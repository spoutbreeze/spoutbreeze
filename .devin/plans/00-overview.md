# SpoutBreeze revival — working journal

> This file was empty (0 bytes) as of 17 September; the earlier history was lost. The entries
> below start from that date. `01-decisions.md` and `02-open-questions.md` are intact.

## Done (17 September — dependency refresh)

1. **Dependencies brought current across PHP and the JVM.** There is no Python in this
   repository (0 `.py` files, no requirements/pyproject), so that part of the request has
   nothing to act on here.
   - **PHP**: `composer update` moved 11 transitive packages — cakephp 5.4.1→5.4.2 (via phinx),
     symfony 8.1.x→8.1.7 and php-cs-fixer 3.95.24→3.95.25 (via the dev tools), chronos 3.5.1.
     `composer outdated --direct` is now empty. `phpseclib` has a 3→4 major available but it is
     transitive and constrained by its parent, so it was left alone.
   - **JVM**: micronaut-platform 5.1.3→5.1.5, selenium 4.48.0→4.49.0, h2 2.3.230→2.5.250,
     mockito 5.20.0→5.23.0, assertj 3.27.6→3.27.7. Already current: Gradle 9.7.1 (latest),
     JDK 25, micronaut-gradle-plugin 5.0.2, shadow 9.6.1, junit-jupiter 6.1.3, rabbitmq
     http-client 5.7.0. Full `gradle build` green: **114 tests, 0 failures**.
   - **Dead build leftovers removed**: every JVM module carried its own Gradle **6.8.1** wrapper
     and `settings.gradle` from the 2021 layout. Nothing used them — the image builds with
     `gradle:9.7.1-jdk25` against the root `settings.gradle.kts` — but `./gradlew` inside a
     module would have built it as a separate root project against a 2021 Gradle.

2. **The environment-override layer is gone — by design, not by accident.** Sukarix 0.5.0
   removed `applyEnvConfiguration()` deliberately: Fat-Free hot-loads ini files, so ini *is*
   the configuration mechanism and a parallel environment layer was working against the
   framework. (Read the other way first, as a regression, and briefly re-attached to
   `loadConfiguration()` before the owner corrected it — see entry 8.)

3. Noted, not changed: `DestinationRepositoryTest` reports "PostgreSQL is not reachable" and
   skips, so the destination repository has no real coverage in CI-like runs. The PHP suite
   stands at **131/131**; the difference against the 9 September figure of 149 is the
   14 September rework of `SecretBox`/`DestinationRepository` (which removed `SecretBoxTest`),
   not this refresh.

## Done (17 September — shipping-safety fixes)

4. **A production ini can no longer reach an image.** `.dockerignore` excludes
   `app/config/config-{production,staging,local}.ini` plus `deploy/.env*`; the tracked
   `config-production.ini.sample` still ships, and the customer builds their own from it —
   the same pattern as the `bbb-lb` repository. Verified with a canary: a
   `config-production.ini` containing a marker key was present on the build host and reached
   the image **zero** times, while the `.sample` shipped.

5. **The bootstrap admin is create-only, once and for all.** `tools/seed-admin.php` used
   `ON CONFLICT (email) DO UPDATE`, so every container start re-applied `ADMIN_PASSWORD`,
   re-activated a disabled account and forced the role back to admin. It is now
   `DO NOTHING`: the account is created on the first start that finds no such address and
   never touched again. The weak `ChangeMe_2026!` default is gone from compose and
   `env.example` — an install that sets no `ADMIN_PASSWORD` now gets a strong random one,
   printed once to the container log on creation, instead of a password identical on every
   deployment of the image. Verified: an operator-rotated password survives a restart, and a
   fresh account prints a generated one.

6. **Development dependencies no longer ship.** The image copied the working-tree `vendor/`,
   which carried 37 dev packages *and* — since composer switched the framework path
   repositories to symlinks — `vendor/sukarix/{sukarix,statera}` symlinks pointing outside the
   image. **The image could not have run outside the dev overlay at all**, because those
   symlinks arrive dangling. `tools/sb vendor-release` now stages `dist/vendor`: installed
   with `--no-dev` and copied with `cp -rL` so the symlinks become real directories. The image
   copies that; `.dockerignore` excludes the working-tree `vendor/`. Verified inside the built
   image: 51 packages, no php-cs-fixer/faker/sebastian, no Statera, **0 dangling symlinks**.
   `compose.dev.yml` mounts the working-tree vendor plus the two framework checkouts at
   `/var/sukarix/*` (where the relative symlinks resolve inside the container) so the test
   suite still runs in development — 131/131.

7. Found on the way: `tools/seed-admin.php` called `EnvConfig::str()`, which **does not exist
   in released Sukarix 0.5.0** — that helper only ever lived in the working tree. The
   entrypoint had been logging "WARNING: bootstrap admin seeding failed" on every start. It now
   uses `EnvConfig::env()` with `??` fallbacks, which is the released API.

## Done (17 September — full migration to Sukarix 0.5.0)

8. **Configuration is ini-only now.** Fat-Free hot-loads `app/config/*.ini`, so that is the
   whole surface. `APP_ENV` is the only variable anything reads, and only to choose which
   `config-<environment>.ini` loads on top of `default.ini` — the same rule
   `Boot::detectEnvironment()` follows.
   - Removed `Application\EnvMap` and `tools/env-sync.php`, and the `env-sync` command from
     `tools/sb`.
   - `deploy/compose.core.yml` no longer passes application settings: the `app-php`
     environment is `APP_ENV` and `LOG_JSON`, nothing more.
   - `deploy/env/env.example` and `deploy/.env` now carry only what the **JVM** services and
     compose interpolation need (`BBB_*`, `CHAT_*`, `TWITCH_*`, provider keys). 28 inert PHP
     variables were removed from `.env`.
   - `tools/seed-admin.php` runs before the app boots, so it loads the same ini files itself
     rather than reading the environment.
   - **Configuration layering (corrected after owner feedback):** `default.ini` is the
     *framework's* defaults and must never hold sensitive data. Application settings live in
     `app/config/spoutbreeze.ini`, loaded through the `CONFIGS` list in `default.ini` and
     therefore before `config-<environment>.ini`. `spoutbreeze.ini` declares the shape and the
     non-sensitive defaults — hosts, policy flags, TTLs — with every credential key present
     but empty. Credentials live only in the environment's own file:
     `config-development.ini` and `config-test.ini` for throwaway containers,
     `config-production.ini` (gitignored, mounted at runtime) for an install.
   - `config-production.ini.sample` is the customer-facing file and overrides
     `spoutbreeze.ini` rather than restating it.
   - **The image now ships zero credentials.** `config-development.ini` and `config-test.ini`
     are excluded from the build too: development mounts `app/` from the working tree, so they
     are never needed inside an image, and an image carrying them would hand a customer our
     development API key and destination encryption key. Verified in the built image — the
     only ini files present are the framework's, `spoutbreeze.ini` and the `.sample`, with no
     populated credential in any of them.
   - `tools/seed-admin.php` reproduces `Bootstrap::loadConfiguration()`'s order exactly —
     defaults, then the `CONFIGS` files, then the environment file — because it runs from the
     entrypoint before the application boots.
   - Verified against the **shipped image**: `APP_ENV=production` plus a mounted
     `config-production.ini` overrode `default.ini` correctly (API key, secret key, LiveKit
     enabled). Suite 131/131, probes 200, entrypoint warnings zero.

9. **`Application` reduced to what is genuinely application-specific.** Comparing each override
   against released 0.5.0 showed four were now redundant or worse than the framework's:
   - `applyEnvConfiguration()` — the request-id logic it carried is byte-identical to
     `Boot::assignRequestId()`, which the framework now calls itself.
   - `isStatelessRoute()` — 0.5.0's version is better: it distinguishes an ini key declared
     empty (meaning "no route is session-free") from one never written at all.
   - `prepareSession()` — the app passed `null` where the framework passes the registry
     connection and registers the session with the Injector.
   - `logPerformanceMetrics()` — the framework's also logs session SQL in development.
   Only `createDatabaseConnection()` (it reads `spoutbreeze.db.*`) and `loadAppSetting()`
   (locale seeding) remain.

## Open

- **Licence and branding decision pending** (17 September): whether to rename to
  *BBB One Webinar* and move from AGPL-3.0 to a commercial or source-available licence.
  Nothing is published — the GitHub remote holds only the 2021 monolith, zero tags, and the
  entire revival is uncommitted — so the decision is as cheap as it will ever be.
- Security and hardening findings from the 9 September scan (capture-host logs carrying stream
  keys, `.dockerignore` baking a production ini into the image, the bootstrap admin password
  re-applied on every container start, no login throttling, dev dependencies in the runtime
  image) — the scan list itself was in the journal that was emptied.
- OAuth connect/refresh for YouTube and Facebook (plan phase 6.2) remains the next mandatory
  product feature.
- The LiveKit player-audio feature assumes the LiveKit room name is `internalMeetingID`;
  verify against a live 4.0 meeting before enabling it for real viewers.
- No CI exists at all.
