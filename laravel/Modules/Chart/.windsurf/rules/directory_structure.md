---
trigger: manual
description:
globs:
-----------|-------------------|------------------|
| Models | `Modules/NomeModulo/app/Models/` | `Modules/NomeModulo/Models/` |
| Controllers | `Modules/NomeModulo/app/Http/Controllers/` | `Modules/NomeModulo/Http/Controllers/` |
| Data Objects | `Modules/NomeModulo/app/Datas/` | `Modules/NomeModulo/Datas/` |
| Actions | `Modules/NomeModulo/app/Actions/` | `Modules/NomeModulo/Actions/` |
| Config | `Modules/NomeModulo/config/` | `Modules/NomeModulo/app/config/` |
| Routes | `Modules/NomeModulo/routes/` | `Modules/NomeModulo/app/routes/` |
| Translations | `Modules/NomeModulo/lang/` | `Modules/NomeModulo/app/lang/` |
| Migrations | `Modules/NomeModulo/database/` | `Modules/NomeModulo/app/database/` |

## Motivazione

Questa struttura rispetta due esigenze:
1. **Namespace coerente**: Il codice che ha namespace `Modules\NomeModulo\Models` si trova in `app/Models/`
2. **Convenzioni Laravel**: Laravel si aspetta i file di configurazione, rotte e traduzioni in posizioni specifiche

## Verifica Struttura

Per verificare se un modulo rispetta questa struttura:

```bash

# Trova file che dovrebbero essere in app/
find Modules/Rating -path "*/Http/*" -o -path "*/Models/*" -o -path "*/Enums/*" | grep -v "/app/"

# Trova file che NON dovrebbero essere in app/
find Modules/Rating/app -path "*/config/*" -o -path "*/routes/*" -o -path "*/lang/*"
```

## Correzione Automatica

Usa lo script di correzione:

```bash
./bashscripts/fix_directory_structure.sh NomeModulo
```

## Attenzione ai Falsi Positivi

Gli script potrebbero suggerire erroneamente di spostare file come:
- `Modules/Rating/lang/it/rating.php` → `Modules/Rating/app/lang/it/rating.php`
- `Modules/Rating/.php-cs-fixer.php` → `Modules/Rating/app/.php-cs-fixer.php`

Questi suggerimenti sono **FALSI POSITIVI**. Questi file sono già nella posizione corretta.

## Regola #1: APP è Obbligatorio

**Tutto il codice PHP deve essere all'interno della directory `app` del modulo.**

❌ **Errore Frequente:**
```
Modules/Rating/Enums/SupportedLocale.php
Modules/Rating/Models/Rating.php
Modules/Rating/Http/Controllers/RatingController.php
```

✅ **Corretto:**
```
Modules/Rating/app/Enums/SupportedLocale.php
Modules/Rating/app/Models/Rating.php
Modules/Rating/app/Http/Controllers/RatingController.php
```

## Eccezioni alla Regola

Solo i seguenti tipi di file PHP possono esistere al di fuori della directory `app`:

1. File in `/config/` (configurazione)
2. File in `/database/` (migrazioni, seeder)
3. File in `/routes/` (definizione delle route)
4. File in `/resources/` (viste Blade, dove necessario)
5. File in `/docs/` (documentazione)

## Verifica Prima del Commit

Esegui questo comando nella cartella `laravel` per verificare errori nella struttura:

```bash
find Modules/[NomeModulo] -type f -name "*.php" | grep -v "/app/" | grep -v "/config/" | grep -v "/database/" | grep -v "/routes/" | grep -v "/resources/" | grep -v "/docs/"
```

## Conseguenze degli Errori di Struttura

1. **Incompatibilità con PHPStan**: L'analisi PHPStan genererà errori
2. **Problemi di Autoloading**: Le classi potrebbero non essere caricate correttamente
3. **Incoerenza**: Causa confusione nel team di sviluppo
4. **Problemi di Namespace**: I namespace non corrisponderebbero alla struttura fisica

## Effetto sul Namespace

La struttura non influisce sul namespace. Esempio:

- **File fisico**: `Modules/Rating/app/Enums/SupportedLocale.php`
- **Namespace**: `namespace Modules\Rating\Enums;` (NON `Modules\Rating\App\Enums`)

## Checklist Prima dell'Esecuzione di PHPStan

1. Verificare che tutti i file PHP siano nella directory `app`
2. Correggere eventuali problemi con lo script di correzione
3. Assicurarsi che i namespace siano corretti (non includonao `App`)
