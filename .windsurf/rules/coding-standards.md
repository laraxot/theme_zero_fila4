# Standard di Codice

## Routing e Controller
- Non creare rotte in `web.php`
- Lasciare che Filament e Folio gestiscano le rotte
- Non creare controller personalizzati

## Sezioni e Blocchi
- Documentazione tecnica in:
  - `Themes/{Theme}/docs/sections`
  - `Modules/Cms/docs/sections`
- Link bidirezionali tra le due
- JSON configurazione sezioni:
  - Ogni blocco deve avere attributo "view"
  - Blocchi raggruppati per locale
  - Filtrare con `app()->getLocale()`

## Vite Config
```javascript
// vite.config.js dei temi
{
  emptyOutDir: false,
  manifest: 'manifest.json',
  build: {
    outDir: './public'
  }
}
```

## Validazione dei Percorsi
- Verificare percorsi relativi
- Rimuovere riferimenti al nome del progetto
- Assicurare compatibilità cross-platform
- Mantenere coerenza struttura directory
- Usare validatori markdown
- Implementare pre-commit hooks

## Correzione Errori
Ordine di aggiornamento:
1. Documentazione nel modulo
2. Collegamenti bidirezionali nella root
3. Regole configurazione IDE
4. Codice effettivo

## Manutenzione Documentazione
- File docs root solo collegamenti bidirezionali
- Spostare documenti generici a Xot
- Analizzare Modules come insieme coerente
- Documentare prima nel modulo, poi con collegamenti
- Concentrarsi su "perché" e "cosa"
- Evitare dettagli implementativi
- Usare cartella bashscripts più vicina
- Documentare metodi mancanti

## Gestione Array
Gestire correttamente array in:
- `getListTableColumns`
- `getTableActions`
- `getTableBulkActions` 
