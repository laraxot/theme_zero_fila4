# Regole per l'Utilizzo di PHPStan in Laraxot <nome progetto>

## Comando Corretto

PHPStan deve essere eseguito dalla cartella `laravel` con il seguente comando:

```bash
./vendor/bin/phpstan analyse [opzioni] [percorso]
```

## ❌ NON Usare

```bash
php artisan phpstan:analyse  # ERRATO
```

## ✅ Usare Invece

```bash
./vendor/bin/phpstan analyse Modules/NomeModulo --level=9  # CORRETTO
```

## Esempi di Uso Corretto

### Analisi di un Singolo Modulo

```bash
cd /var/www/html/_bases/base_<nome progetto>_fila3/laravel
./vendor/bin/phpstan analyse Modules/Xot --level=9
```

### Analisi di Più Moduli

```bash
cd /var/www/html/_bases/base_<nome progetto>_fila3/laravel
./vendor/bin/phpstan analyse Modules/Xot Modules/User --level=9
```

### Analisi con Livello 10 (Massima Rigidità)

```bash
cd /var/www/html/_bases/base_<nome progetto>_fila3/laravel
./vendor/bin/phpstan analyse Modules/Xot --level=10
```

## Quando Eseguire PHPStan

1. **Prima di ogni commit** - Per assicurarsi che il codice soddisfi gli standard
2. **Dopo modifiche importanti** - Per verificare che le modifiche non abbiano introdotto errori
3. **Prima di una PR/MR** - Come controllo di qualità finale

## Come Interpretare gli Errori

Gli errori di PHPStan sono generalmente di queste categorie:

1. **Tipi non corrispondenti** - Un metodo ritorna un tipo diverso da quello dichiarato
2. **Metodi non trovati** - Chiamata a metodi che non esistono
3. **Proprietà non trovate** - Accesso a proprietà che non esistono
4. **Errori di argomento** - Passaggio di argomenti di tipo errato alle funzioni

## Documentazione Completa

Per una documentazione più dettagliata su PHPStan, vedere il file:

```
laravel/Modules/Xot/docs/PHPSTAN-USAGE-GUIDE.md
``` 
