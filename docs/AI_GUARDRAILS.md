# AI Guardrails

## Calendly Scheduling
- Only react to `calendly.event_scheduled`.
- Read `payload.event.start_time` and `payload.event.uri` only.
- Never require Calendly data before the embed fires `calendly.event_scheduled`.
- Never validate `scheduled_at` outside the Step 2 scheduling endpoint.
- Never advance to the next step until the backend confirms success.

## JSON-Only Responses
- Never return HTML to JavaScript-driven endpoints.
- Any API endpoint used by the frontend must return JSON only.

## Step Flow Integrity
- Step 1 = started
- Step 2 = scheduled (Calendly callback)
- Step 3 = paid
