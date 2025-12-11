# Regole di Naming per le Pagine Filament

## Regola Fondamentale

**Tutte** le classi situate in una directory `Pages` di Filament **DEVONO** terminare con il suffisso `Page`.

## Esempi Corretti

- ✅ `SendSMSPage.php` con `class SendSMSPage extends Page`
- ✅ `UserProfilePage.php` con `class UserProfilePage extends XotBasePage`

## Esempi Errati

- ❌ `SendSMS.php` con `class SendSMS extends Page`
- ❌ `UserProfile.php` con `class UserProfile extends XotBasePage`

## Motivazione

1. **Coerenza**: Garantisce coerenza con le convenzioni di Filament
2. **Chiarezza**: Indica chiaramente che la classe è una pagina Filament
3. **PSR-4**: Rispetta le convenzioni di naming PSR-4
4. **Integrazione**: Facilita l'integrazione con il sistema di routing di Filament

## Verifica Automatica

```bash
find /var/www/html/<nome progetto>/laravel/Modules -path "*/Filament/*/Pages/*.php" | grep -v "Page.php$"
```

## Riferimenti

- [Filament Documentation](https://filamentphp.com/docs/3.x/panels/pages)
- [PSR-4 Autoloading Standard](https://www.php-fig.org/psr/psr-4/)
- [Modules/Notify/docs/FILAMENT_PAGE_NAMING_CONVENTION.md](file:///var/www/html/<nome progetto>/laravel/Modules/Notify/docs/FILAMENT_PAGE_NAMING_CONVENTION.md)
