# Regole per Template Email

## Layout HTML
- I file in `/resources/mail-layouts` devono contenere SOLO la struttura base
- Usare il placeholder `{{{ body }}}` per il contenuto dinamico
- Evitare logica dinamica nei layout
- Mantenere i layout semplici e statici

## Template Database
- Tutto il contenuto dinamico deve essere nel campo `html_template`
- Usare le variabili del mailable nel template
- Mantenere la compatibilità con i client email
- Testare su vari dispositivi

## Classi Mailable
- Estendere `TemplateMailable`
- Definire le proprietà pubbliche per le variabili
- Implementare `getHtmlLayout()`
- Usare il layout base corretto

## Best Practices
- Separare layout e contenuto
- Usare stili inline
- Testare su vari client
- Mantenere la struttura semplice 
