---
trigger: always_on
description:
globs:
---

# Regole del Progetto

## Struttura dei File di Configurazione JSON

I file di configurazione JSON, come `1.json`, sono utilizzati per definire sezioni di contenuto all'interno del sistema di gestione dei contenuti. Questi file si trovano nella cartella `config/local/saluteora/database/content/sections/` e contengono dettagli come:

- `id`: Identificatore univoco della sezione.
- `name`: Nome della sezione in diverse lingue.
- `slug`: Slug URL della sezione.
- `blocks`: Array di blocchi di contenuto, ciascuno con un nome, tipo e dati specifici.
- `attributes`: Attributi HTML come classi, ID e stili.
- `created_at`, `updated_at`, `created_by`, `updated_by`: Informazioni temporali e sugli utenti che hanno creato/aggiornato la sezione.

### Utilizzo

Questi file sono utilizzati per generare dinamicamente sezioni di contenuto del sito, come header, footer, ecc., attraverso un sistema di rendering basato su template.

### Convenzioni

- Mantenere i file JSON ben strutturati e commentati per facilitare la manutenzione.
- Seguire le convenzioni di codice definite in `code-quality.md` per la qualità del codice.

# Your rule content

- You can @ files here
- You can use markdown but dont have to
