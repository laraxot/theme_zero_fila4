---
trigger: manual
description:
globs:
---
# Regole per la Nomenclatura delle Icone in Filament

## Formato del Nome
- Il nome dell'icona deve seguire il formato: `<modulo>-<nome>`
- Il modulo deve essere in minuscolo
- Il nome deve essere in minuscolo
- Esempio: `<nome progetto>-doctor`

## Registrazione delle Icone
- Le icone SVG personalizzate devono essere registrate nel ServiceProvider del modulo
- Utilizzare `FilamentIcon::register()` per registrare le icone
- Il percorso dell'icona deve essere relativo alla cartella resources del modulo

## Esempio di Registrazione
```php
FilamentIcon::register([
    '<nome progetto>-doctor' => asset('modules/<nome progetto>/resources/svg/doctor.svg'),
]);
```

## Utilizzo nelle Traduzioni
- Nelle traduzioni, utilizzare il nome completo dell'icona
- Non utilizzare percorsi diretti alle risorse
- Esempio:
```php
'navigation' => [
    'icon' => '<nome progetto>-doctor',
]
```

## Best Practices
1. Mantenere i nomi delle icone consistenti in tutto il modulo
2. Documentare le icone personalizzate nel README del modulo
3. Utilizzare nomi descrittivi e significativi
4. Evitare nomi generici o ambigui

## Note per lo Sviluppo
- Quando si crea una nuova icona SVG, seguire sempre questa convenzione di naming
- Verificare che l'icona sia registrata nel ServiceProvider del modulo
- Aggiornare la documentazione del modulo con le nuove icone
- Testare l'icona in modalità chiara e scura
