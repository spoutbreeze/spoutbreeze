# Broadcasts

A broadcast is one meeting being streamed to one or more destinations. It is
started from the **Broadcasts** screen in the console, or through the API.

## Starting one

The form needs a meeting and at least one target:

- **Meeting id** — the BigBlueButton meeting to join. Left empty, one is
  generated.
- **Destinations** — the saved destinations to stream to, ticked from the
  list. See [Destinations](./destinations.md).
- **RTMP target** — an ad-hoc URL, for a sink or a one-off target that is not
  worth saving.
- **Profile** — `1080p30` or `720p30`.

A broadcast may mix saved destinations with an ad-hoc URL.

## While it runs

The list shows each broadcast's state and the agent carrying it. States are
`READY` once accepted, `ASSIGNED` once an agent has it, `LIVE` while the
stream is up, and `ENDED` or `FAILED` when it is over.

**Stop** ends the broadcast. Managed providers are told first — YouTube and
Facebook transition their remote broadcast to complete, Panopto converts the
session to on-demand — and only then is the capture torn down, so a platform
is never left with a broadcast that looks live.

A broadcast also ends on its own when the meeting does. The Interactor
receives BigBlueButton's `MeetingEnded` webhook and stops it, which is why
nobody has to watch a scheduled event to the end.

## Chat from the platforms

Where a platform's chat is configured, messages from Twitch, YouTube and
Facebook are relayed into the BigBlueButton public chat with a prefix naming
the platform, so a presenter sees one conversation rather than three.
