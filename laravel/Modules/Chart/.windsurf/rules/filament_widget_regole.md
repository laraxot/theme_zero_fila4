---
trigger: manual
description:
globs:
---
# Regola: Widget Filament (XotBase) - Label, Placeholder, Path View

- Non usare MAI ->label(), ->placeholder(), né stringhe tradotte direttamente nei componenti Filament.
- Tutte le label, placeholder, titoli e descrizioni sono risolte tramite i file di traduzione del modulo (es: Modules/<nome progetto>/lang/it/widgets.php).
- Chi estende XotBaseWidget, XotBaseResource, XotBasePage deve affidarsi solo alle chiavi di traduzione.
- Tutte le view dei widget Filament devono essere referenziate come 'modulo::filament.widgets.nome-widget'.
- La struttura delle cartelle deve essere sempre resources/views/filament/widgets/.
- Mai usare path generici come widgets. o pages. senza il prefisso filament.

**Esempio corretto:**
```php
protected static string $view = '<nome progetto>::filament.widgets.find-doctor-and-appointment';
Forms\Components\TextInput::make('location');
```
**Esempio sbagliato:**
```php
protected static string $view = '<nome progetto>::widgets.find-doctor-and-appointment';
Forms\Components\TextInput::make('location')->label(__('<nome progetto>::widgets.find_doctor.location_label'));
```

Vedi anche: modules/xot/docs/filament_widget_regole.md
