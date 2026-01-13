# Pattern Corretti per Migrazioni JSON in <nome progetto>

## Problema Critico

L'errore `SQLSTATE[22032]: <<Unknown error>>: 3140 Invalid JSON text: "Invalid value."` si verifica quando si tenta di convertire una colonna esistente con dati non-JSON a tipo JSON. Questo è un errore comune e critico nelle migrazioni.

## Pattern da EVITARE

```php
// Pattern ERRATO: conversione diretta senza preparazione dei dati
if(in_array($this->getColumnType('field_name'), ['text', 'string'])) {
    $table->json('field_name')->nullable()->change();
}
```

Questo approccio fallirà se anche un solo record contiene dati che non sono già in formato JSON valido.

## Pattern CORRETTI

### 1. Conversione con colonne temporanee (RACCOMANDATO)

```php
// 1. Aggiungere colonna JSON temporanea
$table->json('field_name_json')->nullable()->after('field_name');

// 2. Convertire i dati in formato JSON valido
DB::table('table_name')->chunk(100, function ($records) {
    foreach ($records as $record) {
        DB::table('table_name')
            ->where('id', $record->id)
            ->update([
                'field_name_json' => json_encode(['it' => $record->field_name])
            ]);
    }
});

// 3. Eliminare la vecchia colonna
$table->dropColumn('field_name');

// 4. Rinominare la nuova colonna
$table->renameColumn('field_name_json', 'field_name');
```

### 2. Preparazione dati e poi conversione

```php
// 1. Convertire prima i dati esistenti
DB::table('table_name')->whereNull('field_name')->update([
    'field_name' => DB::raw("'[]'")
]);

DB::table('table_name')->whereNotNull('field_name')->update([
    'field_name' => DB::raw("JSON_OBJECT('it', field_name)")
]);

// 2. Solo dopo modificare il tipo di colonna
$table->json('field_name')->nullable()->change();
```

## Per Nuove Tabelle e Colonne

Per nuove tabelle, dichiarare correttamente i campi JSON fin dall'inizio:

```php
// In tableCreate per nuove installazioni
$table->json('field_name')->nullable();

// In tableUpdate per aggiungere colonne
if(!$this->hasColumn('field_name')) {
    $table->json('field_name')->nullable()->after('previous_field');
}
```

## Verifica della Validità JSON

Prima di qualsiasi migrazione che coinvolge JSON, verificare che i dati siano validi:

```php
protected function isValidJson($string) {
    if (!is_string($string)) return false;
    json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE);
}
```

## Handling delle Traduzioni

Per campi multilingua che utilizzano `HasTranslations`:

```php
// Conversione corretta per campi tradotti
$translations = [];
$locales = ['it', 'en']; // Aggiungi tutte le lingue supportate

// Per dati esistenti
foreach ($locales as $locale) {
    $translations[$locale] = $record->field_name ?? '';
}

return json_encode($translations);
```

## Conclusione

**MAI** tentare di convertire direttamente una colonna a JSON senza prima validare e convertire i dati esistenti in un formato JSON valido.

Questi pattern si applicano a TUTTE le migrazioni in <nome progetto> che coinvolgono colonne JSON, in particolare per:
- Traduzioni con `HasTranslations`
- Configurazioni o meta-dati strutturati
- Qualsiasi campo che memorizza dati complessi
