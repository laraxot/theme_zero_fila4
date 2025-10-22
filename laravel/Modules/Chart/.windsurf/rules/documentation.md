# Regole Documentazione

## Indice
- [Struttura Documentazione](#struttura-documentazione)
- [Formato Documentazione](#formato-documentazione)
- [Collegamenti](#collegamenti)
- [Esempi](#esempi)
- [Best Practices](#best-practices)
- [Checklist](#checklist)

## Struttura Documentazione

### Cartelle Principali
```
docs/
├── architecture/     # Documentazione architetturale
├── standards/       # Standard e convenzioni
├── modules/         # Documentazione moduli
├── roadmap/         # Roadmap e pianificazione
├── flussi/          # Flussi di lavoro
├── errori/          # Errori comuni e soluzioni
└── troubleshooting/ # Risoluzione problemi
```

### File Obbligatori per Modulo
- `README.md`: Documentazione principale
- `CHANGELOG.md`: Storico modifiche
- `LICENSE.md`: Licenza
- `CONTRIBUTING.md`: Guida contribuzione
- `API.md`: Documentazione API

## Formato Documentazione

### Regole Fondamentali
- Utilizzare Markdown
- Utilizzare heading levels corretti
- Utilizzare liste ordinate e non ordinate
- Utilizzare blocchi di codice con syntax highlighting
- Utilizzare tabelle per dati strutturati
- Utilizzare immagini con alt text
- Utilizzare link relativi
- Utilizzare emoji per migliorare la leggibilità

### Struttura README.md
```markdown

# Nome Modulo

## Descrizione
Breve descrizione del modulo

## Installazione
Istruzioni di installazione

## Configurazione
Istruzioni di configurazione

## Utilizzo
Esempi di utilizzo

## API
Documentazione API

## Contribuire
Istruzioni per contribuire

## Licenza
Informazioni sulla licenza
```

## Collegamenti

### Regole Fondamentali
- Ogni file `.md` importante deve essere referenziato da almeno 5 altri file
- Utilizzare link relativi per file interni
- Utilizzare link assoluti per risorse esterne
- Utilizzare anchor links per sezioni specifiche
- Mantenere i link aggiornati

### Esempi
```markdown

# Link Relativi
[Documentazione Modulo](modules/user/README.md)
[Guida Contribuzione](CONTRIBUTING.md)

# Link con Anchor
[Installazione](#installazione)
[Configurazione](#configurazione)

# Link Esterni
[Laravel](https://laravel.com)
[Filament](https://filamentphp.com)
```

## Esempi

### Regole Fondamentali
- Fornire esempi pratici
- Utilizzare blocchi di codice con syntax highlighting
- Commentare il codice
- Spiegare il contesto
- Mostrare input e output

### Esempio Corretto
```php
// Esempio di utilizzo del modulo User
use Modules\User\Models\User;

// Creazione utente
$user = User::create([
    'name' => 'Mario Rossi',
    'email' => 'mario.rossi@example.com',
    'password' => Hash::make('password'),
]);

// Verifica email
$user->markEmailAsVerified();
```

## Best Practices

### Regole Fondamentali
- Mantenere la documentazione aggiornata
- Utilizzare un linguaggio chiaro e conciso
- Evitare gergo tecnico non necessario
- Fornire esempi pratici
- Includere screenshot quando utile
- Utilizzare diagrammi per processi complessi
- Mantenere una struttura coerente
- Utilizzare un tono professionale
- Evitare riferimenti a nomi di progetto specifici

### Checklist per Nuova Documentazione
- [ ] Struttura corretta
- [ ] Collegamenti bidirezionali
- [ ] Esempi pratici
- [ ] Screenshot/Diagrammi
- [ ] Linguaggio chiaro
- [ ] No gergo tecnico
- [ ] No riferimenti a nomi progetto
- [ ] Documentazione API
- [ ] Changelog
- [ ] Licenza
- [ ] Guida contribuzione

## Checklist

### Per Ogni Modulo
- [ ] README.md completo
- [ ] CHANGELOG.md aggiornato
- [ ] LICENSE.md presente
- [ ] CONTRIBUTING.md presente
- [ ] API.md presente
- [ ] Collegamenti bidirezionali
- [ ] Esempi pratici
- [ ] Screenshot/Diagrammi
- [ ] Documentazione aggiornata
- [ ] No riferimenti a nomi progetto

### Per Ogni File
- [ ] Struttura corretta
- [ ] Heading levels corretti
- [ ] Collegamenti funzionanti
- [ ] Esempi pratici
- [ ] Screenshot/Diagrammi
- [ ] Linguaggio chiaro
- [ ] No gergo tecnico
- [ ] No riferimenti a nomi progetto
- [ ] Documentazione aggiornata
- [ ] Collegamenti bidirezionali 
