# Calendly Integration Notes

## Frontend Messaging
- Calendly sends multiple `postMessage` events; only `calendly.event_scheduled` should be acted on.
- The frontend guards scheduling with two flags:
  - `scheduleInFlight` while the POST is in progress.
  - `schedulePersisted` only after backend success.
- The handler must ignore duplicates, unrelated events, and any payloads missing the event or invitee URIs.

## Backend Idempotency
- `/api/requests/{id}/scheduled` is idempotent.
- If the request is already scheduled, it returns `{success:true,next_step:"billing"}`.
- If the same Calendly event UUID arrives again, it is treated as a successful no-op.

## Error Handling
- Calendly API fetch failures should be logged and must not block scheduling persistence.
- Email failures should be logged and must never block the scheduling response.
