# Calendly Integration

## Embed URL
Inline embed uses:
`https://calendly.com/colquhoun-r/discovery-call`

## Required event
- Event name: `calendly.event_scheduled`

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
