# Player

Besides the platforms, SpoutBreeze can stream to its own player. A viewer
opens `/watch/<meeting>` and gets the broadcast over LL-HLS, with no account
and nothing to install.

This is for the audience a meeting cannot hold: a BigBlueButton room has a
practical ceiling, while the player is ordinary video delivery and scales
with the edge in front of it.

## Joining the meeting audio

BigBlueButton 4.0 carries meeting audio on LiveKit. That makes it possible to
move a viewer from watching the stream into the live conversation: the player
opens a LiveKit connection to the meeting's room and subscribes to its audio.
No BigBlueButton client is loaded.

When the invitation is enabled and a broadcast is live, the watch page offers
**Join audio**. On joining, the stream's own audio is muted, because it runs
several seconds behind the room and would double the voices.

Two limits are deliberate:

- **Listening is the default.** Speaking is a separate setting, off unless an
  install turns it on.
- **A viewer admitted this way is a LiveKit participant, not a BigBlueButton
  user.** They do not appear in the BigBlueButton user list, and moderators
  cannot mute or eject them from the BigBlueButton interface. A silent
  listener is a very different proposition from an unlisted voice, which is
  why the two are separate switches.

The invitation only appears when a broadcast is actually live and the meeting
is running, so the page never offers a control that would fail.
