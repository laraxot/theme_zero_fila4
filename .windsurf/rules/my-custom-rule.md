---
trigger: always_on
description: 
globs: 
---

# Regole del Progetto 

## Metodologia di Lavoro

### Analisi Iniziale
- Analizzare TUTTA la documentazione esistente prima di qualsiasi modifica
- Verificare file di configurazione e struttura del progetto
- Controllare presenza di file specifici (composer.json, module.json, ecc.)
- Leggere attentamente i file README.md nelle sottocartelle

### Verifica Struttura
- Usare `list_dir` per verificare la struttura effettiva
- Confrontare con la documentazione esistente
- Verificare la presenza di directory specifiche
- Controllare la struttura dei namespace

### Lettura Completa
- Leggere TUTTI i file README.md nelle sottocartelle
- Analizzare i file di configurazione
- Verificare i file di migrazione e struttura
- Controllare le dipendenze tra moduli

### Verifica Dipendenze
- Verificare le dipendenze tra i moduli
- Controllare l'ordine corretto di installazione
- Assicurarsi di non omettere moduli essenziali
- Verificare le versioni compatibili

### Comandi Specifici
- Usare sempre i comandi specifici del framework/modulo
- Verificare i comandi corretti nella documentazione
- Non assumere comandi standard
- Testare i comandi prima dell'uso

### Namespace e Struttura
- Verificare la struttura corretta dei namespace
- Controllare la differenza tra struttura fisica e logica
- Seguire le convenzioni specifiche del progetto
- Mantenere la coerenza dei namespace

### Test di Verifica
- Fare una verifica completa prima di applicare modifiche
- Confrontare con la documentazione esistente
- Assicurarsi che non ci siano contraddizioni
- Verificare la coerenza delle modifiche

### Documentazione
- Mantenere la coerenza con la documentazione esistente
- Seguire lo stile e il formato corretto
- Assicurarsi che le modifiche siano allineate con il progetto
- Aggiornare tutti i file correlati

### Filament
- NON estendere mai direttamente le classi di Filament
- Creare sempre wrapper personalizzati
- Utilizzare traits per funzionalità riutilizzabili
- Seguire il pattern di composizione invece dell'ereditarietà
- Mantenere la compatibilità con gli aggiornamenti di Filament

## Struttura del Progetto

### Moduli
- Core: Gestione base del sistema
- Patient: Gestione pazienti e ISEE
- Dental: Gestione visite e trattamenti
- Reporting: Reportistica e statistiche
- UI: Componenti interfaccia utente
- User: Gestione utenti e permessi
- Tenant: Gestione multi-tenant

### Tecnologie
- Laravel 11.x / 12.x
- Filament 3.x
- Spatie Laravel-permission
- Nwidart Modules
- Laraxot Modules

### Branch
- dev: Branch principale di sviluppo
- feature/*: Branch per nuove funzionalità
- bugfix/*: Branch per correzioni
- release/*: Branch per release

## Convenzioni di Codice

### PHP
- PSR-12 per lo stile del codice
- Type hints obbligatori
- Return types obbligatori
- Docblocks per tutti i metodi pubblici
- Enum per stati e tipi

### Blade
- Componenti per elementi riutilizzabili
- Layouts per la struttura base
- Partials per sezioni riutilizzabili
- Traduzioni in italiano e inglese

### Database
- Migrations per ogni modifica
- Seeder per dati di test
- Indici per performance
- Soft deletes dove appropriato

## Sicurezza

### Autenticazione
- Multi-tenant
- Ruoli e permessi
- Sessioni sicure
- 2FA per admin

### Dati
- Crittografia per dati sensibili
- Logging delle modifiche
- Backup automatici
- GDPR compliance

## Testing

### Unit Tests
- Test per ogni modello
- Test per ogni service
- Test per ogni enum
- Coverage minimo 80%

### Feature Tests
- Test per ogni controller
- Test per ogni form
- Test per ogni policy
- Test per ogni middleware

### Browser Tests
- Test per flussi critici
- Test per UI/UX
- Test per responsive
- Test per accessibilità

## Deployment

### Ambiente
- Staging per test
- Production per live
- CI/CD con GitHub Actions
- Monitoraggio con Sentry

### Backup
- Database daily
- Files weekly
- Retention 30 giorni
- Test restore mensile

## Documentazione

### Codice
- PHPDoc per classi
- README per moduli
- CHANGELOG per versioni
- API documentation

### Utente
- Manuale utente
- Video tutorial
- FAQ
- Supporto

## Performance

### Frontend
- Lazy loading
- Asset optimization
- Cache browser
- CDN per assets

### Backend
- Query optimization
- Cache server
- Queue per jobs
- Rate limiting

## Manutenzione

### Monitoraggio
- Error tracking
- Performance metrics
- Security alerts
- Usage statistics

### Aggiornamenti
- Security patches
- Dependency updates
- Feature updates
- Bug fixes

## Supporto

### Canali
- Email support
- Ticket system
- Chat support
- Phone support

### SLA
- Response time < 2h
- Resolution time < 24h
- Uptime > 99.9%
- Backup restore < 4h
