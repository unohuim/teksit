# Flow State Machine

## States
- `started` → `scheduled` → `paid`

## Transitions
- **Started → Scheduled**
  - Trigger: Calendly sends `calendly.event_scheduled` and the frontend posts to `/api/requests/{id}/scheduled`.
  - The backend is idempotent and will return success for duplicate events.

- **Scheduled → Paid**
  - Trigger: successful deposit charge recorded via `/api/requests/{id}/deposit`.

## Frontend Guardrails
- The `/scheduled` call must never permanently lock the frontend. Only a backend success response should set the persisted guard and advance to Step 3.
