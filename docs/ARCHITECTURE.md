# Architecture

## Non-negotiable contracts
- Any endpoint called by fetch/Alpine must return JSON only (never Blade or redirects).
- Step transitions are state-based: `started` → `scheduled` → `paid`.
- The backend is the source of truth for state transitions and scheduling timestamps.
- No optimistic UI transitions; steps advance only after backend confirmation.
