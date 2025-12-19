# Calendly Integration

## Embed URL
Inline embed uses:
`https://calendly.com/colquhoun-r/discovery-call`

## Required event
- Event name: `calendly.event_scheduled`

## Payload fields
Read only:
- `payload.event.start_time`
- `payload.event.uri`

## Common failure modes
- Calendly sends multiple postMessage events. Only `calendly.event_scheduled` is reliable.
- Firing the POST before `start_time` exists causes 422 validation errors.
- Missing `payload.event.uri` means the booking is not persisted.

## Debug checklist
- Enable the debug flag (`CALENDLY_DEBUG=true`) to log the full message payload.
- Confirm `payload.event.start_time` and `payload.event.uri` are present.
- Verify the schedule POST sends JSON with both fields.
