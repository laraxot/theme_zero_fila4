# Gestione File .gitignore nei Moduli

## Introduzione
<<<<<<< HEAD
Questo documento descrive la standardizzazione dei file `.gitignore` all'interno dei moduli Laravel di il progetto.
## File Template Standardizzato
È stato creato un template standardizzato (`.gitignore-template`) che include tutte le esclusioni necessarie, categorizzate per tipologia:
=======

Questo documento descrive la standardizzazione dei file `.gitignore` all'interno dei moduli Laravel di il progetto.

## File Template Standardizzato

È stato creato un template standardizzato (`.gitignore-template`) che include tutte le esclusioni necessarie, categorizzate per tipologia:

>>>>>>> ef8dc24 (.)
- **Dipendenze e pacchetti**: `/vendor/`, `/node_modules/`, ecc.
- **File di lock e cache**: `*.lock`, `*.cache`, `package-lock.json`, ecc.
- **File di log**: `*.log`
- **Directory di build**: `/build/`
- **Specifici Laravel**: file di storage, env, ecc.
- **Configurazioni locali**: Homestead, Vagrant
- **Specifici Git**: `.git-rewrite/`, `.git-blame-ignore-revs`
- **File temporanei e di sistema**: `*.tmp`, `*.swp`, `.DS_Store`, ecc.
- **Cache specifiche**: `docs/cache/`, `cache/`
<<<<<<< HEAD
## Script di Aggiornamento
Lo script `update-gitignore.sh` permette di applicare il template standardizzato a tutti i moduli:
- Per i moduli senza `.gitignore`, copia il template
- Per i moduli con `.gitignore` esistente, aggiunge `*.log` se non presente
## Come Utilizzare lo Script
```bash
=======

## Script di Aggiornamento

Lo script `update-gitignore.sh` permette di applicare il template standardizzato a tutti i moduli:

- Per i moduli senza `.gitignore`, copia il template
- Per i moduli con `.gitignore` esistente, aggiunge `*.log` se non presente

## Come Utilizzare lo Script

```bash

>>>>>>> f71d08e230 (.)
>>>>>>> 71ff9e32 (.)
>>>>>>> ec52a6b4 (.)
>>>>>>> ef8dc24 (.)
# Dalla directory del progetto
cd laravel/Modules
./update-gitignore.sh
```
<<<<<<< HEAD
## Analisi dei File .gitignore Esistenti
Durante l'analisi sono stati trovati file `.gitignore` con vari stili e contenuti nei seguenti moduli:
=======

## Analisi dei File .gitignore Esistenti

Durante l'analisi sono stati trovati file `.gitignore` con vari stili e contenuti nei seguenti moduli:

>>>>>>> ef8dc24 (.)
- Activity
- Cms
- Media
- Tenant
- UI
- User
- Xot
<<<<<<< HEAD
## Vantaggi della Standardizzazione
=======

## Vantaggi della Standardizzazione

>>>>>>> ef8dc24 (.)
- **Coerenza**: Tutti i moduli hanno lo stesso set di esclusioni
- **Completezza**: Inclusione di tutte le esclusioni necessarie
- **Chiarezza**: Categorizzazione delle esclusioni
- **Manutenibilità**: Facile aggiornamento tramite script
- **Sicurezza**: Esclusione di file di log e dati sensibili
<<<<<<< HEAD
## Problemi Risolti
=======

## Problemi Risolti

>>>>>>> ef8dc24 (.)
- Aggiunta di `*.log` a tutti i file `.gitignore`
- Eliminazione di duplicati
- Organizzazione in categorie
- Standardizzazione del formato 
