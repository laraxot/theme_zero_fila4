---
trigger: manual
description:
globs:
---
## Best Practice Widget FullCalendar (2024-06-XX)
- Eager Loading: sempre usare with() per le relazioni
- Caching: implementare cache per eventi richiesti spesso
- Paginazione/lazy loading per grandi dataset
- Autorizzazioni: implementare canView()
- Filtri: filtrare eventi per permessi utente
- Validazione: validare sempre i dati in input
- Colori coerenti: schema colori centralizzato
- Tooltip informativi e icone descrittive
- Metodi privati per logica complessa
- Configurazione centralizzata tramite trait/config
- Documentazione aggiornata e linkata

## Regola fondamentale
- Disponibilità solo su appointments (type AVAILABILITY)
- Vietato ogni modello/tabella separata
- Tutto il calendario lavora su appointments

## Checklist
- [x] Nessun modello/tabella separata per disponibilità
- [x] Tutte le query calendar filtrano per type
- [x] Documentazione aggiornata
- [x] Colori e icone diverse per disponibilità

## Collegamenti
- [docs/fullcalendar_widgets.md](mdc:../../Modules/<nome progetto>/docs/fullcalendar_widgets.md)
- [docs/appointment-management.md](mdc:../../Modules/<nome progetto>/docs/appointment-management.md)
- [docs/calendar/doctor-availability-management.md](mdc:../../Modules/<nome progetto>/docs/calendar/doctor-availability-management.md)
- [docs/fullcalendar_parental_widgets.md](mdc:../../Modules/<nome progetto>/docs/fullcalendar_parental_widgets.md)
