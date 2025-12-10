# Regole per la Gestione delle Traduzioni

## Regole di Base

1. **Nessuna Chiave di Navigazione Grezza**
   - ❌ Vietato usare `.navigation` come valore di traduzione
   - ✅ Usare etichette descrittive in tutte le lingue supportate

2. **Struttura dei File di Traduzione**
   - Ogni risorsa deve avere il proprio file di traduzione
   - Usare la struttura gerarchica standard
   - Includere sempre label, placeholder e helper_text

3. **Convenzioni di Naming**
   - Usare `snake_case` per tutte le chiavi
   - Prefissare con il nome del modulo per le chiavi globali
   - Usare nomi descrittivi e coerenti

## Struttura Obbligatoria

```php
return [
    'navigation' => [
        'label' => 'Nome Risorsa',  // Obbligatorio
        'group' => 'Gruppo Menu',   // Obbligatorio
        'icon' => 'heroicon-o-xxx', // Obbligatorio
    ],
    'fields' => [
        'field_name' => [
            'label' => 'Etichetta',
            'placeholder' => 'Testo segnaposto',
            'helper_text' => 'Aiuto contestuale',
        ],
    ],
];
```

## Validazione Automatica

Il sistema controllerà automaticamente che:

1. Non ci siano chiavi `.navigation` come valori
2. Tutti i campi obbligatori siano presenti
3. La struttura sia corretta
4. Tutte le lingue supportate abbiano le stesse chiavi

## Esempi

### ❌ Non Valido
```php
'label' => 'user.navigation',
'group' => 'user.navigation',
'icon' => 'user.navigation',
```

### ✅ Valido
```php
'label' => 'Utenti',
'group' => 'Amministrazione',
'icon' => 'heroicon-o-users',
```

## Comandi Utili

```bash

# Verifica le traduzioni mancanti
php artisan translation:check

# Sincronizza le chiavi tra le lingue
php artisan translation:sync
```

## Best Practices

1. **Mantenere l'Ordine Alfabetico**
   - Ordinare le chiavi in ordine alfabetico
   - Raggruppare le chiavi correlate

2. **Documentazione**
   - Documentare le nuove chiavi aggiunte
   - Aggiornare la documentazione quando si modificano le chiavi esistenti

3. **Consistenza**
   - Usare lo stesso stile in tutto il progetto
   - Mantenere la coerenza con le convenzioni esistenti
