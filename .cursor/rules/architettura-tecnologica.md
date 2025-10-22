# Regole Fondamentali per l'Architettura Tecnologica il progetto

## Backend/Backoffice - SOLO FILAMENT

- **UTILIZZARE ESCLUSIVAMENTE Filament** per tutte le interfacce di backend/backoffice
- **MAI utilizzare Blade nel backend** se non come ultima risorsa e in casi eccezionali 
- Seguire l'approccio Resource/Page di Filament per tutte le entità
- Utilizzare widget Filament per dashboard e visualizzazioni personalizzate
- Implementare actions Filament per operazioni avanzate

## Frontend/Frontoffice - FOLIO + VOLT

- **Utilizzare Laravel Folio** per la definizione delle pagine e il routing frontend
- **Implementare con Laravel Volt** tutti i componenti dinamici e reattivi
- Utilizzare Blade SOLO nel contesto frontend per templating
- Organizzare i componenti frontend in modo modulare e riutilizzabile
- Separare chiaramente la logica di presentazione dalla logica di business

## Pattern e Architettura

- **Utilizzare ESCLUSIVAMENTE Spatie Laravel-Queueable-Action** per la logica di business
- **MAI implementare Job tradizionali** di Laravel
- Organizzare il codice in moduli indipendenti e coesi
- Mantenere una netta separazione tra backend (Filament) e frontend (Folio+Volt)
- Seguire il principio di responsabilità unica in tutti i componenti

## Violazioni

Le seguenti pratiche sono considerate violazioni delle regole di architettura del progetto:

1. Utilizzo di Blade nel backend/backoffice
2. Creazione di controller tradizionali Laravel per il backend
3. Implementazione di Job invece di Queueable Actions
4. Utilizzo di approcci che bypassano l'architettura Filament nel backend

Queste regole sono FONDAMENTALI e non negoziabili per mantenere la coerenza e la manutenibilità del progetto il progetto.
