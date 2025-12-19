# AI Guardrails

## Calendly Scheduling
- Only react to `calendly.event_scheduled`.
- Never trust analytics postMessage events.
- Never require Calendly data before the embed fires `calendly.event_scheduled`.
- Never assume Calendly embed payload completeness.
- Never parse Calendly timestamps in JS.
- Never validate Calendly timestamps from frontend input.
- Never advance to the next step until the backend confirms success.
- Never set the "persisted" guard before backend success.
- Never depend on Calendly messages firing exactly once.
- Never let mail failures block scheduling progression.
- Never validate `scheduled_at` from frontend input.
- Always fetch the Calendly event server-side using `payload.event.uri`.

## JSON-Only Responses
- Never return HTML to JavaScript-driven endpoints.
- Any API endpoint used by the frontend must return JSON only.

## Step Flow Integrity
- Step 1 = started
- Step 2 = scheduled (Calendly callback)
- Step 3 = paid
