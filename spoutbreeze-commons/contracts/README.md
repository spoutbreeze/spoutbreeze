# Message contracts

JSON Schema (draft 2020-12) for every RabbitMQ message and the streamer job API payload. The Web
Facade validates outgoing messages with `opis/json-schema`; the JVM modules keep hand-written
records in `jvm/commons` aligned with these files. Schema generation for the JVM side and a
drift test between both sides are planned (Phase 2.7 of the revival plan).

| Schema | Queue | Producer → consumer |
|---|---|---|
| `broadcast-requested.schema.json` | `spoutbreeze_manager` | Web Facade → Capture Manager |
| `start-session.schema.json` | `spoutbreeze_agent.<name>` | Capture Manager → Capture Agent |
| `stop-session.schema.json` | `spoutbreeze_agent.<name>` | Capture Manager → Capture Agent |
| `broadcast-event.schema.json` | `spoutbreeze_events` | agents / streamer / interactor → everyone |
