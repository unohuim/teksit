# AI Guardrails

## Calendly Scheduling
- Never require Calendly data before the Calendly embed fires `calendly.event_scheduled`.
- Never validate `scheduled_at` outside the Step 2 scheduling endpoint.

## JSON-Only Responses
- Never return HTML to JavaScript-driven endpoints.
- Any API endpoint used by the frontend must return JSON only.

## Step Flow Integrity
- Step 1 = started
- Step 2 = scheduled (Calendly callback)
- Step 3 = paid
