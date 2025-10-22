---
trigger: always_on
description: >
globs:
---
# Wizard: funzioni separate per ogni step

## Regola
- Ogni step di un wizard deve essere implementato in una funzione separata, con responsabilità singola e nome chiaro.
- Evitare funzioni monolitiche che gestiscono più step.
- Ogni funzione deve essere documentata e facilmente testabile.

## Collegamenti
- Vedi anche: Xot/docs/clean-code.md, Xot/docs/wizard-best-practices.md
