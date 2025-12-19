# Architecture

## Non-negotiable contracts
- Any endpoint called by fetch/Alpine must return JSON only (never Blade or redirects).
- Step transitions are state-based: `started` → `scheduled` → `paid`.
