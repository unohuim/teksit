# Request Flow (Step-Based)

## Step 1 — Started
- Trigger: request creation
- Status: `started`
- Purpose: capture initial request details only

## Step 2 — Scheduled (Calendly)
- Trigger: Calendly embed fires `calendly.event_scheduled` on the frontend
- Endpoint: `POST /api/requests/{request}/scheduled`
- Required payload:
  - `calendly_event_uri`
  - `calendly_invitee_uri`
- Status transition: `started` → `scheduled`
- Backend responsibility: fetch Calendly event details via `calendly_event_uri` and persist `scheduled_at`

## Step 3 — Paid (Billing)
- Trigger: billing confirmation (Stripe or equivalent)
- Status: `scheduled` → `paid`

## Validation Timing Rules
- Do **not** require Calendly fields before the Calendly callback.
- Never validate `scheduled_at` from frontend input.
- Step transitions are state changes, not navigation.
