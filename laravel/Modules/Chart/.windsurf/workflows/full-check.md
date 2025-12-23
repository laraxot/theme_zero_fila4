---
description: Workflow completo che esegue tutti i controlli Laraxot in sequenza - PHPStan, Traduzioni, Migrazioni e Quality Assurance
---

# Full Laraxot Quality Check

Workflow orchestratore che esegue tutti i controlli di qualità Laraxot in sequenza logica per garantire la massima conformità agli standard del framework.

## Utilizzo
Invoca con `/full-check` per eseguire TUTTI i controlli di qualità in sequenza automatica.

## Sequenza di Esecuzione

### 1. Setup e Preparazione
```bash

# Verifica directory corretta
cd /var/www/html/_bases/base_<nome progetto>/laravel

# Aggiorna autoload
composer dump-autoload

# Verifica struttura moduli
ls -la Modules/
```

### 2. Controlli di Qualità Sequenziali

#### 2.1 Controllo Namespace e Struttura
```bash
echo "🔍 Fase 1: Controllo Namespace..."

# Verifica namespace senza 'App'
grep -r "namespace.*App\\" Modules/ --include="*.php" && echo "❌ Namespace errati trovati!" || echo "✅ Namespace corretti"

# Verifica ereditarietà modelli
grep -r "extends.*Model" Modules/*/Models/ --include="*.php" | grep -v "BaseModel" && echo "❌ Ereditarietà errata!" || echo "✅ Ereditarietà corretta"
```

#### 2.2 Analisi Statica PHPStan
**Invoca workflow specializzato**: `/phpstan-check`

```bash
echo "🔍 Fase 2: Analisi PHPStan..."

# Eseguito dal workflow phpstan-check
```

#### 2.3 Validazione Migrazioni
**Invoca workflow specializzato**: `/migration-check`

```bash
echo "🔍 Fase 3: Controllo Migrazioni..."

# Eseguito dal workflow migration-check
```

#### 2.4 Controllo Traduzioni
**Invoca workflow specializzato**: `/translation-check`

```bash
echo "🔍 Fase 4: Validazione Traduzioni..."

# Eseguito dal workflow translation-check
```

### 3. Controlli Aggiuntivi Integrati

#### 3.1 Controllo Filament Components
```bash
echo "🔍 Fase 5: Controllo Filament..."

# Cerca ->label() hardcoded (VIETATO)
grep -r "->label(" Modules/ --include="*.php" | grep -v "test\|Test" && echo "❌ ->label() hardcoded trovati!" || echo "✅ Nessun ->label() hardcoded"

# Cerca ->placeholder() hardcoded (VIETATO)
grep -r "->placeholder(" Modules/ --include="*.php" | grep -v "test\|Test" && echo "❌ ->placeholder() hardcoded trovati!" || echo "✅ Nessun ->placeholder() hardcoded"
```

#### 3.2 Controllo Componenti UI
```bash
echo "🔍 Fase 6: Controllo Componenti UI..."

# Verifica posizionamento componenti UI
find resources/views/components/ -name "*.blade.php" 2>/dev/null && echo "❌ Componenti UI in posizione errata!" || echo "✅ Componenti UI posizionati correttamente"

# Verifica struttura corretta
ls -la Modules/UI/resources/views/components/ui/ 2>/dev/null || echo "⚠️  Directory UI components non trovata"
```

#### 3.3 Controllo Documentazione
```bash
echo "🔍 Fase 7: Controllo Documentazione..."

# Verifica naming convention docs
find Modules/*/docs/ -name "*.md" | grep -E "[A-Z]" | grep -v "README.md" && echo "❌ File docs con maiuscole!" || echo "✅ Naming convention docs corretta"

# Verifica presenza documentazione base
for module in $(ls Modules/); do
    if [ ! -d "Modules/$module/docs" ]; then
        echo "⚠️  Mancante directory docs per $module"
    fi
done
```

### 4. Test e Validazione

#### 4.1 Syntax Check PHP
```bash
echo "🔍 Fase 8: Controllo Sintassi PHP..."

# Verifica sintassi PHP per tutti i moduli
find Modules/ -name "*.php" -exec php -l {} \; | grep -v "No syntax errors" | head -10
```

#### 4.2 Controllo Strict Types
```bash
echo "🔍 Fase 9: Controllo Strict Types..."

# Cerca file senza declare(strict_types=1)
missing_strict=$(find Modules/ -name "*.php" -exec grep -L "declare(strict_types=1)" {} \; | wc -l)
echo "File senza strict_types: $missing_strict"
```

### 5. Report Finale

#### 5.1 Generazione Summary Report
```bash
echo "📊 Generazione Report Finale..."

# Crea report di riepilogo
cat > laraxot-quality-report.md << EOF

# Laraxot Quality Report
Data: $(date)
Progetto: <nome progetto>

## Risultati Controlli

### Namespace e Struttura
- $(grep -r "namespace.*App\\" Modules/ --include="*.php" >/dev/null 2>&1 && echo "❌ Errori trovati" || echo "✅ Conforme")

### PHPStan (Livello 9)
- Eseguito tramite /phpstan-check

### Migrazioni
- Eseguito tramite /migration-check

### Traduzioni  
- Eseguito tramite /translation-check

### Filament Components
- $(grep -r "->label(" Modules/ --include="*.php" | grep -v "test" >/dev/null 2>&1 && echo "❌ ->label() hardcoded trovati" || echo "✅ Conforme")

### Componenti UI
- $(find resources/views/components/ -name "*.blade.php" >/dev/null 2>&1 && echo "❌ Posizionamento errato" || echo "✅ Conforme")

### Documentazione
- $(find Modules/*/docs/ -name "*.md" | grep -E "[A-Z]" | grep -v "README.md" >/dev/null 2>&1 && echo "❌ Naming non conforme" || echo "✅ Conforme")

## Raccomandazioni
1. Risolvi tutti gli errori ❌ prima di procedere
2. Esegui i workflow specializzati per dettagli approfonditi
3. Aggiorna documentazione se necessario
4. Esegui test completi dopo le correzioni

EOF

echo "✅ Report generato: laraxot-quality-report.md"
```

#### 5.2 Checklist Finale
```bash
echo "📋 Checklist Finale:"
echo "1. ✅ Namespace verificati (senza 'App')"
echo "2. ✅ PHPStan livello 9 eseguito"
echo "3. ✅ Migrazioni controllate (classi anonime, no down())"
echo "4. ✅ Traduzioni validate (struttura espansa)"
echo "5. ✅ Filament components verificati (no ->label())"
echo "6. ✅ Componenti UI posizionati correttamente"
echo "7. ✅ Documentazione conforme (naming lowercase)"
echo "8. ✅ Sintassi PHP verificata"
echo "9. ✅ Strict types controllati"

echo ""
echo "🎯 FULL CHECK COMPLETATO!"
echo "📄 Controlla laraxot-quality-report.md per i dettagli"
```

## Workflow Specializzati Richiamati

Questo workflow orchestratore invoca automaticamente:

1. **`/phpstan-check`** - Analisi statica completa
2. **`/migration-check`** - Controlli migrazioni sicure  
3. **`/translation-check`** - Validazione traduzioni

Per eseguire controlli specifici singolarmente, usa i rispettivi comandi slash.

## Criteri di Successo

Il full check è considerato PASSATO quando:

- ✅ Tutti i namespace sono corretti (no 'App')
- ✅ PHPStan livello 9 passa senza errori critici
- ✅ Migrazioni seguono pattern Laraxot (classi anonime, no down())
- ✅ Traduzioni usano struttura espansa completa
- ✅ Nessun ->label() hardcoded nei componenti Filament
- ✅ Componenti UI in Modules/UI/resources/views/components/ui/
- ✅ Documentazione segue naming convention (lowercase)
- ✅ Tutti i file PHP hanno sintassi corretta
- ✅ Tutti i file hanno declare(strict_types=1)

## Azioni Post-Check

Dopo il completamento del full check:

1. **Se TUTTI i controlli passano**: Procedi con commit e deploy
2. **Se ci sono errori**: Risolvi utilizzando i workflow specializzati
3. **Se ci sono warning**: Valuta la criticità e documenta le eccezioni
4. **Sempre**: Aggiorna la documentazione se sono state fatte modifiche

## Best Practice di Utilizzo

- **Esegui `/full-check` prima di ogni commit importante**
- **Usa workflow specializzati per debugging specifico**
- **Mantieni il report aggiornato nella documentazione**
- **Condividi i risultati con il team per review**

---

**Ultimo aggiornamento**: Dicembre 2024  
**Versione**: 1.0  
**Compatibilità**: Laraxot <nome progetto>, tutti i moduli 
