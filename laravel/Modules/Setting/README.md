# Module Setting
Modulo dedicato alla gestione di alcune configurazioni

## Aggiungere Modulo nella base del progetto
Dentro la cartella laravel/Modules

```bash
git submodule add https://github.com/laraxot/module_setting_fila3.git Setting
```

## Verificare che il modulo sia attivo
```bash
php artisan module:list
```
in caso abilitarlo
```bash
php artisan module:enable Setting
```

## Eseguire le migrazioni
```bash
php artisan module:migrate Setting
```