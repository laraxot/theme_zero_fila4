# Convenzioni dei Path in Laravel e 

## Regole Fondamentali per i Path di Cartelle

In Laravel e , i nomi delle cartelle principali (come definite nella struttura standard di Laravel) **DEVONO** rispettare il caso specifico definito dalle convenzioni di Laravel.

## Cartelle Standard e loro Casing Corretto

| Nome Cartella  | Caso Corretto | Caso Errato     |
|----------------|---------------|-----------------|
| `app`          | lowercase     | `App`           |
| `bootstrap`    | lowercase     | `Bootstrap`     |
| `config`       | lowercase     | `Config`        |
| `database`     | lowercase     | `Database`      |
| `public`       | lowercase     | `Public`        |
| `resources`    | lowercase     | `Resources`     |
| `routes`       | lowercase     | `Routes`        |
| `storage`      | lowercase     | `Storage`       |
| `tests`        | lowercase     | `Tests`         |
| `vendor`       | lowercase     | `Vendor`        |

## Convenzioni per le Viste

Le viste in Laravel devono essere collocate in:

```
/var/www/html//laravel/Modules/Notify/resources/views/
```

**NON** in:

```
/var/www/html//laravel/Modules/Notify/Resources/views/
```

## Importanza

1. **Compatibilità cross-platform**: Linux è case-sensitive
2. **Coerenza con il framework**: Seguire le convenzioni di Laravel
3. **Prevedibilità**: Path consistenti facilitano debug e manutenzione

## Riferimenti

- [Documentazione completa](/var/www/html//laravel/Modules/Notify/docs/LARAVEL_PATH_CONVENTIONS.md)
