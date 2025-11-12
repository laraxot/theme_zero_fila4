# Regole Pagine Filament

## Indice
- [Regole Fondamentali](#regole-fondamentali)
- [Struttura](#struttura)
- [Best Practices](#best-practices)
- [Checklist](#checklist)

## Regole Fondamentali

### Pagine
- **REGOLA FONDAMENTALE**: Ogni pagina deve essere una classe dedicata
- Estendere `Filament\Pages\Page`
- Implementare metodi obbligatori
- Documentare la pagina

### Esempio Corretto
```php
// CORRETTO
class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    
    protected static ?string $navigationLabel = __('filament.pages.dashboard.navigation.label');
    
    protected static ?string $title = __('filament.pages.dashboard.title');
    
    protected static ?int $navigationSort = 1;
    
    protected static string $view = 'filament.pages.dashboard';
    
    public function getHeaderWidgets(): array
    {
        return [
            Widgets\StatsOverview::class,
            Widgets\LatestOrders::class,
        ];
    }
    
    public function getFooterWidgets(): array
    {
        return [
            Widgets\LatestUsers::class,
        ];
    }
}

// ERRATO
class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    
    protected static ?string $navigationLabel = 'Dashboard'; // ❌ No traduzione
    
    protected static ?string $title = 'Dashboard'; // ❌ No traduzione
    
    protected static ?int $navigationSort = 1;
    
    protected static string $view = 'filament.pages.dashboard';
    
    public function getHeaderWidgets(): array
    {
        return [
            Widgets\StatsOverview::class,
            Widgets\LatestOrders::class,
        ];
    }
    
    public function getFooterWidgets(): array
    {
        return [
            Widgets\LatestUsers::class,
        ];
    }
}
```

## Struttura

### Regole Fondamentali
1. **Namespace**
   - `App\Filament\Pages`
   - `Modules\{Module}\Filament\Pages`

2. **Nome Classe**
   - Nome descrittivo
   - PascalCase
   - No suffisso `Page`

3. **Metodi**
   - `getHeaderWidgets()`: Widget header
   - `getFooterWidgets()`: Widget footer
   - `getNavigationLabel()`: Label navigazione
   - `getTitle()`: Titolo pagina

### Esempi

#### Pagina Base
```php
// CORRETTO
class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    
    protected static ?string $navigationLabel = __('filament.pages.dashboard.navigation.label');
    
    protected static ?string $title = __('filament.pages.dashboard.title');
    
    protected static ?int $navigationSort = 1;
    
    protected static string $view = 'filament.pages.dashboard';
    
    public function getHeaderWidgets(): array
    {
        return [
            Widgets\StatsOverview::class,
            Widgets\LatestOrders::class,
        ];
    }
    
    public function getFooterWidgets(): array
    {
        return [
            Widgets\LatestUsers::class,
        ];
    }
}

// ERRATO
class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    
    protected static ?string $navigationLabel = 'Dashboard'; // ❌ No traduzione
    
    protected static ?string $title = 'Dashboard'; // ❌ No traduzione
    
    protected static ?int $navigationSort = 1;
    
    protected static string $view = 'filament.pages.dashboard';
    
    public function getHeaderWidgets(): array
    {
        return [
            Widgets\StatsOverview::class,
            Widgets\LatestOrders::class,
        ];
    }
    
    public function getFooterWidgets(): array
    {
        return [
            Widgets\LatestUsers::class,
        ];
    }
}
```

#### Pagina con Widget
```php
// CORRETTO
class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    
    protected static ?string $navigationLabel = __('filament.pages.dashboard.navigation.label');
    
    protected static ?string $title = __('filament.pages.dashboard.title');
    
    protected static ?int $navigationSort = 1;
    
    protected static string $view = 'filament.pages.dashboard';
    
    public function getHeaderWidgets(): array
    {
        return [
            Widgets\StatsOverview::class,
            Widgets\LatestOrders::class,
            Widgets\LatestUsers::class,
        ];
    }
    
    public function getFooterWidgets(): array
    {
        return [
            Widgets\LatestProducts::class,
            Widgets\LatestCategories::class,
        ];
    }
}

// ERRATO
class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    
    protected static ?string $navigationLabel = 'Dashboard'; // ❌ No traduzione
    
    protected static ?string $title = 'Dashboard'; // ❌ No traduzione
    
    protected static ?int $navigationSort = 1;
    
    protected static string $view = 'filament.pages.dashboard';
    
    public function getHeaderWidgets(): array
    {
        return [
            Widgets\StatsOverview::class,
            Widgets\LatestOrders::class,
            Widgets\LatestUsers::class,
        ];
    }
    
    public function getFooterWidgets(): array
    {
        return [
            Widgets\LatestProducts::class,
            Widgets\LatestCategories::class,
        ];
    }
}
```

## Best Practices

### Regole Fondamentali
1. **Pagine**
   - Classe dedicata
   - Estensione corretta
   - Metodi obbligatori
   - Documentazione

2. **Widget**
   - Widget dedicati
   - Layout ottimizzato
   - Traduzioni
   - Performance

3. **Test**
   - Test unitari
   - Test integrazione
   - Test UI
   - Test performance

### Esempi

#### Pagina Completa
```php
// CORRETTO
class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    
    protected static ?string $navigationLabel = __('filament.pages.dashboard.navigation.label');
    
    protected static ?string $title = __('filament.pages.dashboard.title');
    
    protected static ?int $navigationSort = 1;
    
    protected static string $view = 'filament.pages.dashboard';
    
    public function getHeaderWidgets(): array
    {
        return [
            Widgets\StatsOverview::class,
            Widgets\LatestOrders::class,
            Widgets\LatestUsers::class,
        ];
    }
    
    public function getFooterWidgets(): array
    {
        return [
            Widgets\LatestProducts::class,
            Widgets\LatestCategories::class,
        ];
    }
    
    public function getColumns(): int|string|array
    {
        return 2;
    }
    
    public function getMaxContentWidth(): ?string
    {
        return '7xl';
    }
}

// ERRATO
class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    
    protected static ?string $navigationLabel = 'Dashboard'; // ❌ No traduzione
    
    protected static ?string $title = 'Dashboard'; // ❌ No traduzione
    
    protected static ?int $navigationSort = 1;
    
    protected static string $view = 'filament.pages.dashboard';
    
    public function getHeaderWidgets(): array
    {
        return [
            Widgets\StatsOverview::class,
            Widgets\LatestOrders::class,
            Widgets\LatestUsers::class,
        ];
    }
    
    public function getFooterWidgets(): array
    {
        return [
            Widgets\LatestProducts::class,
            Widgets\LatestCategories::class,
        ];
    }
    
    public function getColumns(): int|string|array
    {
        return 2;
    }
    
    public function getMaxContentWidth(): ?string
    {
        return '7xl';
    }
}
```

## Checklist

### Per Ogni Pagina
- [ ] Classe dedicata
- [ ] Estensione corretta
- [ ] Metodi obbligatori
- [ ] Documentata

### Per Widget
- [ ] Widget dedicati
- [ ] Layout ottimizzato
- [ ] Traduzioni
- [ ] Performance

### Per Test
- [ ] Unitari
- [ ] Integrazione
- [ ] UI
- [ ] Performance
- [ ] Copertura 
