# Checklist di Ripartenza Universale

## Prima di riprendere lo sviluppo dopo un restart:

- [ ] Verifica che tutte le migration siano applicate in tutti i moduli
- [ ] Controlla che i trait NON siano duplicati nei modelli specializzati (es. HasFactory)
- [ ] Verifica la catena di ereditarietà nei modelli STI (Doctor → User → BaseUser)
- [ ] Controlla che la documentazione sia aggiornata e neutra (nessun riferimento a progetti/brand)
- [ ] Controlla che le ValidationException usino sempre `withMessages`
- [ ] Aggiorna sempre la doc PRIMA di ogni modifica
- [ ] Consulta i file chiave:
    - Doctor.php, User.php, BaseUser.php
    - DoctorResource.php, RegisterAction.php, RegistrationWidget.php
- [ ] Consulta le sezioni docs:
    - Errori di Validazione
    - Migrazioni e STI
    - Best Practices
    - Ereditarietà
- [ ] Esegui test automatici e verifica che la coverage sia almeno all'80%
- [ ] Verifica che tutte le traduzioni siano aggiornate e senza label() hardcoded
- [ ] Controlla che nessun trait sia duplicato nei modelli figli
- [ ] Verifica che la struttura delle cartelle docs sia coerente e aggiornata

## Reminder
- Documentazione sempre neutra e riutilizzabile
- Validazione custom solo con ValidationException::withMessages
- Aggiornare sempre la doc PRIMA di ogni modifica
- Non duplicare trait già presenti nei modelli base
- Segnalare subito ogni warning o errore dopo il restart 
