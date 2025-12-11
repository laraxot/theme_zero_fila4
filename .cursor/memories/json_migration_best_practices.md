# JSON Migration Best Practices in Laravel & <nome progetto>

## Critical Error Identified

The error `SQLSTATE[22032]: <<Unknown error>>: 3140 Invalid JSON text: "Invalid value."` occurs when attempting to directly convert a non-JSON column to JSON format in MySQL. MySQL cannot automatically convert string data to valid JSON.

## Root Cause

When using `XotBaseMigration` in <nome progetto>:

1. The pattern `$table->json('field_name')->nullable()->change()` directly attempts to convert existing data
2. This fails if any record in the column contains data that is not valid JSON
3. MySQL has no built-in mechanism to auto-convert strings to JSON format

## Correct Approach for JSON Migrations

### Option 1: Column Replacement Strategy (Recommended)

```php
// Step 1: Create a new JSON column
$table->json('field_name_json')->nullable()->after('field_name');

// Step 2: Migrate data with proper JSON formatting
DB::table('table_name')->cursor()->each(function ($record) {
    DB::table('table_name')
        ->where('id', $record->id)
        ->update([
            'field_name_json' => json_encode(['it' => $record->field_name])
        ]);
});

// Step 3: Drop old column
$table->dropColumn('field_name');

// Step 4: Rename new column
$table->renameColumn('field_name_json', 'field_name');
```

### Option 2: Pre-Convert Data

```php
// Step 1: First convert all values to valid JSON strings
DB::statement("UPDATE table_name SET field_name = JSON_OBJECT('it', field_name) WHERE field_name IS NOT NULL");
DB::statement("UPDATE table_name SET field_name = '{}' WHERE field_name IS NULL");

// Step 2: Then change column type
$table->json('field_name')->nullable()->change();
```

## Multilingual Data Considerations

For fields using HasTranslations:

```php
// Convert to proper JSON format for translations
$translations = [];
foreach (['it', 'en'] as $locale) {
    $translations[$locale] = $record->field_name ?? '';
}
return json_encode($translations);
```

## Verification Checklist

Before running migrations that involve JSON conversions:

1. ✅ Never directly change column type to JSON without data preparation
2. ✅ Always validate existing data or use a multi-step conversion process
3. ✅ Use separate migration steps for data transformation and schema changes
4. ✅ Consider chunking for large tables to avoid memory issues
5. ✅ Always have a backup of the database before running JSON migrations

This memory replaces any previous guidance on JSON migrations and must be followed for all migrations in <nome progetto> that involve JSON columns.
