# Decisions from the owner — history

## 5 September 2026 (evening) — SUPERSEDED by Revision 2

These seven answers were implemented during the second night and are now overridden by the
Revision 2 plan where noted:

1. ~~Player dropped, platform embeds~~ → **Reversed**: the SpoutBreeze Player is a first-class
   channel (MediaMTX edge, LL-HLS/WHEP, Centrifugo chat, questions into BBB).
2. ~~Chat gateway as a separate Java service~~ → **Changed**: the chat relay lives inside the
   Interactor (Spring Boot), one JVM framework for everything.
3. **AGPL-3.0 — still valid** (`LICENSE.markdown`; header sweep pending).
4. **The agent stays Java — still valid** (Capture Agent role from the 2021 diagram).
5. Broadcaster on the WebSummoner recorder — **still valid, upgraded**: now the `streamer/`
   sidecar with a local MediaMTX relay for one-encode-N-independent-pushes.
6. **BBB 4.0 baseline — still valid** (demo server 4.0-rc1; plugin on the 0.1.x SDK).
7. Agent queue fix (own `spoutbreeze_agent.*` queues only) — **still valid**.

## Archived: the original architecture diagram (as read from the owner's photos)

SpoutBreeze box containing: Web Facade (PHP — Management Console + API) → "Manage" → Database
(PostgreSQL); Capture Manager (Spring Boot — Agents Manager) "Store & Sync" → Database; Capture
Agents (Spring Boot — Agent 1..N) "Store & Sync" → Database and "Create a session" → Selenoid;
Selenoid zone: Selenoid → "Create browser container" → Selenoid Browser, and → "Create recording
streamer" → Selenoid Recorder (Streamer); Recorder "Get stream via x11" ← Browser; Browser
"Open web-page" → the meeting; Recorder/Streamer pushes out and "Convert to BigBlueButton
actions" → Interactor (Micronaut) ↔ Injector (node) inside BigBlueButton; Streaming Player
(Node + RabbitMQ — Message Processor, Message Queue, Web Application). External band: Twitch,
YouTube, Frozen Mountain, generic Video Streaming Platform / CDN.

Revision 2 cites the same diagrams from the original v0.5 (January 2021) design document, which
adds the purpose section (audience overflow to 500–2 000 viewers with interaction back into the
meeting) that justifies the Player's return.
