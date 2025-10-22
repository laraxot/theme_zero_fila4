---
trigger: always_on
description: Convenzioni di naming per file e cartelle docs in Laraxot <nome progetto>
globs: ["**/docs/**/*"]
---

# Convenzioni di naming per cartelle docs in Laraxot <nome progetto>

## Regole fondamentali

1. **Nomi file in minuscolo**: Tutti i file nelle cartelle `docs` DEVONO avere nomi in minuscolo
   - ❌ ERRATO: `PHPSTAN_FIXES.md`, `SERVICE_PROVIDER.md`
   - ✅ CORRETTO: `phpstan_fixes.md`, `service_provider.md`

2. **Unica eccezione**: L'unico file che può contenere maiuscole è `README.md`

3. **Nomi cartelle in minuscolo**: Tutte le sottocartelle nelle directory `docs` DEVONO avere nomi in minuscolo
   - ❌ ERRATO: `PHPStan`, `Models`, `UI_COMPONENTS`
   - ✅ CORRETTO: `phpstan`, `models`, `ui_components`

4. **Evitare duplicazione**: Prima di creare un nuovo file di documentazione, verificare che non esista già un file che tratta lo stesso argomento

5. **Collegamenti bidirezionali**: Ogni documento deve avere collegamenti bidirezionali con la docs root quando appropriato

## Organizzazione della documentazione

1. **Regole generali**: Le regole e documentazione generali vanno nella cartella `docs` del modulo Xot

2. **Documentazione specifica**: La documentazione specifica di un modulo va nella cartella `docs` del modulo corrispondente

3. **Documentazione moduli**: Ogni modulo deve avere la propria documentazione aggiornata nella cartella `docs` del modulo

4. **Collegamenti strutturati**: I file di documentazione devono avere collegamenti strutturati tra di loro

## Processo di standardizzazione

Se si identificano file o cartelle con convenzioni di naming non conformi:

1. Creare script bash nella cartella `bashscripts` per la correzione automatizzata
2. Rinominare i file e le cartelle mantenendo il contenuto
3. Aggiornare tutti i riferimenti ai file rinominati
4. Documentare l'intervento di standardizzazione

## Script di utilità

Gli script di utilità per la manutenzione della documentazione devono essere posizionati nella cartella `bashscripts` e devono avere nomi descrittivi in minuscolo con estensione `.sh`.

## Priorità nella risoluzione dei conflitti

In caso di conflitto tra file con lo stesso nome ma convenzioni diverse, prioritizzare:

1. Il mantenimento del contenuto più recente o più completo
2. La conformità alle convenzioni di naming
3. L'aggiornamento di tutti i riferimenti interni

## Responsabilità nella creazione di documentazione

Quando si crea nuova documentazione:

1. Seguire le convenzioni di naming
2. Posizionare il file nella posizione corretta
3. Creare collegamenti bidirezionali appropriati
4. Evitare duplicazione con documentazione esistente

*Ultimo aggiornamento: Giugno 2025*
