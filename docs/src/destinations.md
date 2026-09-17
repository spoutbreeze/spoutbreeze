# Destinations

A destination is a named, reusable place to stream to. Set one up once under
**Destinations** and tick it when starting a broadcast, rather than pasting a
stream key each time.

## Providers

| Provider | What it needs | What SpoutBreeze does |
|---|---|---|
| Generic RTMP | Ingest URL, stream key | Pushes to the assembled URL |
| YouTube | OAuth access token | Creates the broadcast and stream, binds them, transitions to live, completes on stop |
| Facebook | Access token, page id | Creates a live video and ends it on stop |
| LinkedIn | Ingest URL, stream key | Guided custom-stream setup, with LinkedIn's 1080p30 / 6 Mbps / 4 h limits applied |
| Panopto | Site, API user and password, folder | Creates a webcast session and converts it to on-demand on stop |

## How credentials are held

The credential half of a destination is encrypted with libsodium's secretbox
before it reaches the database, under a key held only in the install's
configuration. The non-sensitive half — provider, label, ingest host — stays
readable so the console can list destinations without unsealing anything.

Two consequences are worth knowing:

- A destination's credentials are never shown again after saving, and never
  appear in a listing, an API response or a log.
- The capture tier never receives them. It is given the assembled push URL
  and nothing else, so a compromised capture host yields no platform account.

Losing or changing the install's encryption key makes every stored credential
unreadable. It belongs with the deployment's other secrets.

## Enabling and disabling

A destination can be disabled without deleting it; a disabled one is skipped
when a broadcast starts rather than failing it.
