# Regole Traduzioni

## Indice
- [Regole Fondamentali](#regole-fondamentali)
- [Struttura](#struttura)
- [Best Practices](#best-practices)
- [Checklist](#checklist)

## Regole Fondamentali

### Traduzioni
- **REGOLA FONDAMENTALE**: Ogni stringa deve essere tradotta
- Usare `LangServiceProvider`
- Evitare l'uso diretto di `->label()`
- Documentare le traduzioni

### Esempio Corretto
```php
// CORRETTO
class DoctorResource extends Resource
{
    protected static ?string $model = Doctor::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-user';
    
    protected static ?string $navigationLabel = __('filament.resources.doctor.navigation.label');
    
    protected static ?string $modelLabel = __('filament.resources.doctor.model.label');
    
    protected static ?string $pluralModelLabel = __('filament.resources.doctor.model.plural');
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('filament.resources.doctor.form.name.label'))
                    ->required()
                    ->maxLength(255),
                
                Forms\Components\TextInput::make('email')
                    ->label(__('filament.resources.doctor.form.email.label'))
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                
                Forms\Components\TextInput::make('phone')
                    ->label(__('filament.resources.doctor.form.phone.label'))
                    ->tel()
                    ->required()
                    ->maxLength(255),
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament.resources.doctor.table.name.label'))
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('email')
                    ->label(__('filament.resources.doctor.table.email.label'))
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('phone')
                    ->label(__('filament.resources.doctor.table.phone.label'))
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('filament.resources.doctor.table.created_at.label'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('filament.resources.doctor.table.updated_at.label'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ]);
    }
}

// ERRATO
class DoctorResource extends Resource
{
    protected static ?string $model = Doctor::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-user';
    
    protected static ?string $navigationLabel = 'Doctors'; // ❌ No traduzione
    
    protected static ?string $modelLabel = 'Doctor'; // ❌ No traduzione
    
    protected static ?string $pluralModelLabel = 'Doctors'; // ❌ No traduzione
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255), // ❌ No label, no traduzione
                
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(), // ❌ No ignoreRecord
                
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(255), // ❌ No label, no traduzione
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(), // ❌ No label, no traduzione
                
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(), // ❌ No label, no traduzione
                
                Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->sortable(), // ❌ No label, no traduzione
                
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // ❌ No label, no traduzione
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // ❌ No label, no traduzione
            ]);
    }
}
```

## Struttura

### Regole Fondamentali
1. **Namespace**
   - `App\Providers\LangServiceProvider`
   - `Modules\{Module}\Providers\LangServiceProvider`

2. **Nome Classe**
   - Suffisso `LangServiceProvider`
   - Nome descrittivo
   - PascalCase

3. **Metodi**
   - `boot()`: Registra traduzioni
   - `register()`: Registra provider
   - `loadTranslations()`: Carica traduzioni

### Esempi

#### Provider Base
```php
// CORRETTO
class LangServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'filament');
    }
    
    public function register(): void
    {
        //
    }
    
    protected function loadTranslations(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'filament');
    }
}

// ERRATO
class LangServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // ❌ No caricamento traduzioni
    }
    
    public function register(): void
    {
        //
    }
    
    protected function loadTranslations(): void
    {
        // ❌ No caricamento traduzioni
    }
}
```

#### Provider con Traduzioni
```php
// CORRETTO
class LangServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'filament');
        
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/filament'),
        ], 'filament-translations');
    }
    
    public function register(): void
    {
        //
    }
    
    protected function loadTranslations(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'filament');
        
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/filament'),
        ], 'filament-translations');
    }
}

// ERRATO
class LangServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // ❌ No caricamento traduzioni
        // ❌ No pubblicazione traduzioni
    }
    
    public function register(): void
    {
        //
    }
    
    protected function loadTranslations(): void
    {
        // ❌ No caricamento traduzioni
        // ❌ No pubblicazione traduzioni
    }
}
```

## Best Practices

### Regole Fondamentali
1. **Traduzioni**
   - File dedicati
   - Chiavi standard
   - Test traduzioni
   - Log errori

2. **Provider**
   - Provider dedicati
   - Caricamento ottimizzato
   - Pubblicazione
   - Cache

3. **Test**
   - Test unitari
   - Test integrazione
   - Test UI
   - Test performance

### Esempi

#### Provider Completo
```php
// CORRETTO
class LangServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'filament');
        
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/filament'),
        ], 'filament-translations');
        
        $this->loadJsonTranslationsFrom(__DIR__.'/../resources/lang');
        
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'filament');
    }
    
    public function register(): void
    {
        $this->app->singleton('translator', function ($app) {
            $loader = $app['translation.loader'];
            
            $locale = $app['config']['app.locale'];
            
            $trans = new Translator($loader, $locale);
            
            $trans->setFallback($app['config']['app.fallback_locale']);
            
            return $trans;
        });
    }
    
    protected function loadTranslations(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'filament');
        
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/filament'),
        ], 'filament-translations');
        
        $this->loadJsonTranslationsFrom(__DIR__.'/../resources/lang');
        
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'filament');
    }
}

// ERRATO
class LangServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // ❌ No caricamento traduzioni
        // ❌ No pubblicazione traduzioni
        // ❌ No caricamento JSON
    }
    
    public function register(): void
    {
        // ❌ No registrazione translator
    }
    
    protected function loadTranslations(): void
    {
        // ❌ No caricamento traduzioni
        // ❌ No pubblicazione traduzioni
        // ❌ No caricamento JSON
    }
}
```

## Checklist

### Per Ogni Traduzione
- [ ] File dedicato
- [ ] Chiavi standard
- [ ] Testata
- [ ] Loggata

### Per Provider
- [ ] Provider dedicato
- [ ] Caricamento ottimizzato
- [ ] Pubblicazione
- [ ] Cache

### Per Test
- [ ] Unitari
- [ ] Integrazione
- [ ] UI
- [ ] Performance
- [ ] Copertura

## REGOLA CRITICA: Struttura Directory Auth Laravel

⚠️ **SEMPRE** seguire la gerarchia Laravel per l'autenticazione:

### ✅ CORRETTO - Struttura Gerarchica
```
auth/
├── password/
│   ├── reset.blade.php        # /password/reset
│   ├── confirm.blade.php      # /password/confirm
│   └── email.blade.php        # /password/email
├── register.blade.php         # /register
├── login.blade.php           # /login
└── verify.blade.php          # /verify
```

### ❌ ERRATO - Nomi Piatti con Trattini
```
auth/
├── password-reset.blade.php   # ❌ Non segue convenzioni Laravel
├── password-confirm.blade.php # ❌ Non scalabile
└── password-email.blade.php   # ❌ Inconsistente con route
```

### Motivazioni
1. **Coerenza Route**: Laravel usa `/password/reset`, non `/password-reset`
2. **Coerenza Controller**: `Password\ResetController`, non `PasswordResetController`
3. **Organizzazione Logica**: Raggruppa funzionalità correlate (password)
4. **Scalabilità**: Facile aggiungere nuove funzionalità password
5. **Standard Laravel**: Convenzione ufficiale del framework

### Checklist Prima di Creare File Auth
- [ ] Verificare struttura route esistenti (`/password/reset`)
- [ ] Controllare convenzioni controller (`Password\ResetController`)
- [ ] Mantenere gerarchia directory logica (`password/reset.blade.php`)
- [ ] Non usare mai trattini per separare concetti gerarchici
- [ ] Testare che la struttura sia coerente in tutto il progetto

## REGOLA CRITICA: Namespace per Widget Auth vs Funzionali

⚠️ **DISTINGUERE** tra widget di autenticazione e funzionali:

### ✅ CORRETTO - Widget Auth usano pub_theme::
```php
// Widget di autenticazione nel modulo User
namespace Modules\User\Filament\Widgets\Auth;

class PasswordResetWidget extends XotBaseWidget
{
    protected static string $view = 'pub_theme::filament.widgets.auth.password.reset';
    //                               ^^^^^^^^^^^
    //                               Widget AUTH usa namespace TEMA
}
```

### ✅ CORRETTO - Widget Funzionali usano namespace modulo
```php
// Widget funzionale nel modulo User
namespace Modules\User\Filament\Widgets;

class UserStatsWidget extends XotBaseWidget
{
    protected static string $view = 'user::filament.widgets.user.stats';
    //                               ^^^^^^ 
    //                               Widget FUNZIONALE usa namespace MODULO
}
```

### Mappatura Namespace Corretta per Tipo Widget
| Tipo Widget | Namespace | Esempio View | Motivazione |
|-------------|-----------|--------------|-------------|
| **Widget Auth** | `pub_theme::` | `pub_theme::filament.widgets.auth.password.reset` | Parte dell'UX del tema |
| **Widget Funzionali User** | `user::` | `user::filament.widgets.user.stats` | Logica modulo specifica |
| **Widget Funzionali Cms** | `cms::` | `cms::filament.widgets.cms.dashboard` | Logica modulo specifica |
| **Layout Tema** | `pub_theme::` | `pub_theme::layouts.app` | Sempre tema |

### Principio Architetturale Corretto
1. **Widget Auth**: Parte dell'esperienza utente del tema (`pub_theme::`)
2. **Widget Funzionali**: Logica specifica del modulo (namespace modulo)
3. **Layout Globali**: Sempre nel tema (`pub_theme::`)
4. **Compatibilità**: Seguire le esigenze specifiche del progetto

### Motivazioni Corrette
1. **UX Coerente**: Widget auth devono seguire il design del tema
2. **Separazione Logica**: Widget funzionali appartengono al modulo
3. **Flessibilità**: Non rigidità assoluta ma logica contestuale
4. **Manutenibilità**: Seguire le indicazioni dell'utente/progetto
5. **Best Practice**: Adattare alle esigenze specifiche

### Checklist Corretta Pre-Implementazione
- [ ] **Widget AUTH** (login, register, password reset) → `pub_theme::`
- [ ] **Widget FUNZIONALI** modulo User → `user::` (se appropriato)
- [ ] **Widget FUNZIONALI** modulo Cms → `cms::` (se appropriato)
- [ ] **Layout globali** → sempre `pub_theme::`
- [ ] **Seguire SEMPRE** le indicazioni esplicite dell'utente
- [ ] Verificare che il namespace sia logico per il tipo di widget
- [ ] Testare che la view esista nel namespace specificato
- [ ] Documentare la scelta del namespace con motivazione

### Pattern Auth Widget (CORRETTO)
Widget di autenticazione usano SEMPRE il tema:

1. **Widget Auth nel modulo**:
   ```php
   // Modules/User/app/Filament/Widgets/Auth/PasswordResetWidget.php
   protected static string $view = 'pub_theme::filament.widgets.auth.password.reset';
   ```

2. **View nel tema**:
   ```
   /Themes/One/resources/views/filament/widgets/auth/password/reset.blade.php
   ```

3. **Motivazione**: Widget auth sono parte dell'esperienza utente del tema

### Errori da Evitare - CORRETTI
1. ❌ Ignorare le indicazioni esplicite dell'utente
2. ❌ Applicare regole rigide senza considerare il contesto  
3. ❌ Non distinguere tra widget auth e funzionali
4. ❌ Cambiare namespace senza consultare l'utente
5. ❌ Assumere che "sempre namespace modulo" sia corretto
