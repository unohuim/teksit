# Request Flow (Step-Based)

## Step 1 — Started
- Trigger: request creation
- Status: `started`
- Validation: `scheduled_at` must be **nullable** at this step
- Purpose: capture initial request details only

## Step 2 — Scheduled (Calendly)
- Trigger: Calendly embed fires `calendly.event_scheduled` on the frontend
- Endpoint: `POST /api/requests/{request}/scheduled`
- Required payload:
  - `calendly_event_uri`
  - `scheduled_at`
- Status transition: `started` → `scheduled`
- Validation timing rule: **only validate `scheduled_at` here**

## Step 3 — Paid (Billing)
- Trigger: billing confirmation (Stripe or equivalent)
- Status: `scheduled` → `paid`

## Validation Timing Rules
- Do **not** require Calendly fields before the Calendly callback.
- `scheduled_at` is optional at Step 1 and required at Step 2 only.
- Step transitions are state changes, not navigation.
