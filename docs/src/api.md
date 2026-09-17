# API

Machine callers use `/api/v1`. Requests carry a bearer token configured for
the install:

```
Authorization: Bearer <api key>
```

Responses are JSON. Failures return an envelope with `success: false`, a
`message` and the status code.

## Broadcasts

### Start

```http
POST /api/v1/broadcasts
```

```json
{
  "meeting_id": "weekly-seminar",
  "profile": "1080p30",
  "destination_ids": [3, 7],
  "targets": [
    { "provider": "generic_rtmp", "url": "rtmp://sink.example/live/key" }
  ]
}
```

`destination_ids` selects saved destinations; `targets` adds ad-hoc ones.
Either may be omitted, but a broadcast needs at least one of the two, and
either `meeting_id` or `join_url`.

Returns the broadcast id and the streamer job token:

```json
{ "token": "…", "broadcast_id": 12, "meeting_id": "weekly-seminar", "state": "pending" }
```

### Stop

```http
POST /api/v1/broadcasts/{id}/stop
```

```json
{ "reason": "operator" }
```

### Status

```http
GET /api/v1/broadcasts/{token}
```

## Player audio

```http
GET  /api/v1/player/audio/{meeting}
POST /api/v1/player/audio/{meeting}
```

The `GET` reports whether the audio invitation is on offer for that meeting.
The `POST` mints a LiveKit token for a viewer, taking `{"name": "…"}` for the
display name shown to the room. Both are anonymous: a watch-page viewer has
no account, so the checks are that the install has enabled invitations, the
broadcast is live, and the meeting is running.

## Status codes

| Code | Meaning |
|---|---|
| `200` | Accepted |
| `401` | Missing or wrong API key |
| `404` | No such broadcast, job or live meeting |
| `409` | Refused by a rule — not live, not enabled, not started |
| `422` | The request is malformed or a target is unusable |
