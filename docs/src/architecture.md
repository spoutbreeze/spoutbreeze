# Architecture

SpoutBreeze is split into a control plane, which decides what should happen,
and a capture tier, which does the work of sitting in a meeting and pushing
video out. They talk over RabbitMQ and never over a shared database.

## The tiers

| Component | Runtime | Responsibility |
|---|---|---|
| Console | PHP 8.4 on [Sukarix](https://github.com/sukarix) | Operator interface and the `/api/v1` surface |
| Capture Manager | Micronaut 5 on JDK 25 | Places a broadcast on an agent and runs the saga |
| Capture Agent | Micronaut 5 on JDK 25 | Drives one browser session per broadcast |
| Interactor | Micronaut 5 on JDK 25 | BigBlueButton webhooks in, platform chat relay out |
| Streamer | ffmpeg and MediaMTX | Captures the browser and pushes to each destination |
| Player edge | MediaMTX | LL-HLS and WebRTC for the watch page |

PostgreSQL holds the broadcast domain, Redis the streamer jobs, and RabbitMQ
carries every command between the tiers.

## How a broadcast happens

1. The console resolves the selected destinations, unsealing their
   credentials, and each provider prepares an ingest URL. YouTube and
   Facebook create a remote broadcast at this point.
2. A request goes onto the manager's queue. The broadcast row is recorded
   before anything else moves, so a failure to reach the bus leaves nothing
   that looks startable.
3. The manager picks a capture host and routes the session to that agent's
   own queue, building a bot join URL against the servers registry.
4. The agent opens a browser session on the grid and joins the meeting.
5. **The page-ready gate.** The streamer is launched alongside the browser,
   but holds until the agent has driven the client all the way into the
   meeting. This is what stops a broadcast opening on an empty desktop.
6. The streamer captures the display and the meeting audio, encodes once
   into a local relay, then copies that stream to every destination, each
   with its own reconnect loop.
7. Stopping runs the same path backwards. A BigBlueButton `MeetingEnded`
   webhook stops it just as an operator would, and managed providers are
   told the broadcast is over before the capture is torn down.

## Why the gate matters

The capture tier is the part of the system that holds a seat in a real
meeting. Everything about its design follows from that: it is given a
single-use job token rather than credentials, it is told where to push but
not what the account is, and it does not start until there is something
worth recording.
