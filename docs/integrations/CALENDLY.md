# Calendly Integration

## Embed URL
Inline embed uses:
`https://calendly.com/colquhoun-r/discovery-call`

## Required event
- Event name: `calendly.event_scheduled`

Calendly inline embeds emit analytics postMessage events (GTM / GA) that are NOT lifecycle events.
The application must strictly filter by origin === 'https://calendly.com' AND event === 'calendly.event_scheduled'.
Embed payloads do NOT include start_time; backend must fetch event details via Calendly API using event.uri.

When using Calendly inline embeds, the browser does NOT receive start_time.
The backend must fetch the scheduled event using the Calendly API via event.uri.
Frontend must never expect or validate scheduling timestamps.

## Payload fields
Read only:
- `payload.event.uri`
- `payload.invitee.uri`

## Common failure modes
- Calendly sends multiple postMessage events. Only `calendly.event_scheduled` is reliable.
- Posting without `payload.event.uri` or `payload.invitee.uri` prevents persistence.

## Debug checklist
- Enable the debug flag (`CALENDLY_DEBUG=true`) to log the full message payload.
- Confirm `payload.event.uri` and `payload.invitee.uri` are present.
- Verify the schedule POST sends JSON with both URIs.
