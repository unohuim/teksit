# AI Guardrails

## Calendly Scheduling
- Only react to `calendly.event_scheduled`.
- Never require Calendly data before the embed fires `calendly.event_scheduled`.
- Never assume Calendly embed payload completeness.
- Never validate Calendly timestamps from frontend input.
- Never advance to the next step until the backend confirms success.
- Always fetch the Calendly event server-side using `payload.event.uri`.

## JSON-Only Responses
- Never return HTML to JavaScript-driven endpoints.
- Any API endpoint used by the frontend must return JSON only.

## Step Flow Integrity
- Step 1 = started
- Step 2 = scheduled (Calendly callback)
- Step 3 = paid
