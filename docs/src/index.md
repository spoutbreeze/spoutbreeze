# SpoutBreeze

SpoutBreeze streams BigBlueButton meetings to YouTube, Twitch, LinkedIn,
Panopto, Facebook and its own player, live and unattended.

A broadcast joins the meeting as a bot, captures what an attendee would see
and hear, encodes it once, and pushes a copy to every destination the
organiser selected. Nothing is installed in the meeting itself and no
presenter has to run anything: the capture happens on SpoutBreeze's own
hosts, driven by a browser grid.

## What it does

- **Streams one meeting to several platforms at once**, encoding a single
  time and copying the result to each target, so a second destination costs
  bandwidth rather than CPU.
- **Follows the meeting.** The broadcast starts when the operator asks and
  stops when the meeting ends, without anyone watching it.
- **Carries the conversation back.** Chat from Twitch, YouTube and Facebook
  is relayed into the BigBlueButton public chat, and viewers on the
  SpoutBreeze Player can be invited into the meeting audio.
- **Keeps credentials sealed.** Stream keys and access tokens are encrypted
  before they are stored and are never handed to the capture tier.

## Licence

SpoutBreeze is free software under the
[GNU Affero General Public License v3.0](https://www.gnu.org/licenses/agpl-3.0.html)
or later, copyright © 2021-2026 RIADVICE SUARL.

RIADVICE offers SpoutBreeze as a hosted service, with capture capacity,
operations and support. That service is what is sold; the platform itself
carries no feature locks.
