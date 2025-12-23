# Regole Widget Filament

## Indice
- [Regole Fondamentali](#regole-fondamentali)
- [Struttura](#struttura)
- [Best Practices](#best-practices)
- [Checklist](#checklist)

## Regole Fondamentali

### Widget
- **REGOLA FONDAMENTALE**: Ogni widget deve essere una classe dedicata
- Estendere `Filament\Widgets\Widget`
- Implementare metodi obbligatori
- Documentare il widget

### Esempio Corretto
```php
// CORRETTO
class StatsOverview extends Widget
{
    protected static ?string $pollingInterval = '15s';
    
    protected int|string|array $columnSpan = 'full';
    
    protected function getColumns(): int|string|array
    {
        return 4;
    }
    
    protected function getCards(): array
    {
        return [
            Card::make(__('filament.widgets.stats_overview.cards.total_users.label'), User::count())
                ->description(__('filament.widgets.stats_overview.cards.total_users.description'))
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),
            
            Card::make(__('filament.widgets.stats_overview.cards.total_orders.label'), Order::count())
                ->description(__('filament.widgets.stats_overview.cards.total_orders.description'))
                ->descriptionIcon('heroicon-m-shopping-cart')
                ->color('warning'),
            
            Card::make(__('filament.widgets.stats_overview.cards.total_products.label'), Product::count())
                ->description(__('filament.widgets.stats_overview.cards.total_products.description'))
                ->descriptionIcon('heroicon-m-cube')
                ->color('danger'),
            
            Card::make(__('filament.widgets.stats_overview.cards.total_categories.label'), Category::count())
                ->description(__('filament.widgets.stats_overview.cards.total_categories.description'))
                ->descriptionIcon('heroicon-m-tag')
                ->color('primary'),
        ];
    }
}

// ERRATO
class StatsOverview extends Widget
{
    protected static ?string $pollingInterval = '15s';
    
    protected int|string|array $columnSpan = 'full';
    
    protected function getColumns(): int|string|array
    {
        return 4;
    }
    
    protected function getCards(): array
    {
        return [
            Card::make('Total Users', User::count()) // ❌ No traduzione
                ->description('Total number of users') // ❌ No traduzione
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),
            
            Card::make('Total Orders', Order::count()) // ❌ No traduzione
                ->description('Total number of orders') // ❌ No traduzione
                ->descriptionIcon('heroicon-m-shopping-cart')
                ->color('warning'),
            
            Card::make('Total Products', Product::count()) // ❌ No traduzione
                ->description('Total number of products') // ❌ No traduzione
                ->descriptionIcon('heroicon-m-cube')
                ->color('danger'),
            
            Card::make('Total Categories', Category::count()) // ❌ No traduzione
                ->description('Total number of categories') // ❌ No traduzione
                ->descriptionIcon('heroicon-m-tag')
                ->color('primary'),
        ];
    }
}
```

## Struttura

### Regole Fondamentali
1. **Namespace**
   - `App\Filament\Widgets`
   - `Modules\{Module}\Filament\Widgets`

2. **Nome Classe**
   - Nome descrittivo
   - PascalCase
   - No suffisso `Widget`

3. **Metodi**
   - `getColumns()`: Colonne
   - `getCards()`: Cards
   - `getTableColumns()`: Colonne tabella
   - `getTableData()`: Dati tabella

### Esempi

#### Widget Base
```php
// CORRETTO
class StatsOverview extends Widget
{
    protected static ?string $pollingInterval = '15s';
    
    protected int|string|array $columnSpan = 'full';
    
    protected function getColumns(): int|string|array
    {
        return 4;
    }
    
    protected function getCards(): array
    {
        return [
            Card::make(__('filament.widgets.stats_overview.cards.total_users.label'), User::count())
                ->description(__('filament.widgets.stats_overview.cards.total_users.description'))
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),
            
            Card::make(__('filament.widgets.stats_overview.cards.total_orders.label'), Order::count())
                ->description(__('filament.widgets.stats_overview.cards.total_orders.description'))
                ->descriptionIcon('heroicon-m-shopping-cart')
                ->color('warning'),
            
            Card::make(__('filament.widgets.stats_overview.cards.total_products.label'), Product::count())
                ->description(__('filament.widgets.stats_overview.cards.total_products.description'))
                ->descriptionIcon('heroicon-m-cube')
                ->color('danger'),
            
            Card::make(__('filament.widgets.stats_overview.cards.total_categories.label'), Category::count())
                ->description(__('filament.widgets.stats_overview.cards.total_categories.description'))
                ->descriptionIcon('heroicon-m-tag')
                ->color('primary'),
        ];
    }
}

// ERRATO
class StatsOverview extends Widget
{
    protected static ?string $pollingInterval = '15s';
    
    protected int|string|array $columnSpan = 'full';
    
    protected function getColumns(): int|string|array
    {
        return 4;
    }
    
    protected function getCards(): array
    {
        return [
            Card::make('Total Users', User::count()) // ❌ No traduzione
                ->description('Total number of users') // ❌ No traduzione
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),
            
            Card::make('Total Orders', Order::count()) // ❌ No traduzione
                ->description('Total number of orders') // ❌ No traduzione
                ->descriptionIcon('heroicon-m-shopping-cart')
                ->color('warning'),
            
            Card::make('Total Products', Product::count()) // ❌ No traduzione
                ->description('Total number of products') // ❌ No traduzione
                ->descriptionIcon('heroicon-m-cube')
                ->color('danger'),
            
            Card::make('Total Categories', Category::count()) // ❌ No traduzione
                ->description('Total number of categories') // ❌ No traduzione
                ->descriptionIcon('heroicon-m-tag')
                ->color('primary'),
        ];
    }
}
```

#### Widget con Tabella
```php
// CORRETTO
class LatestOrders extends Widget
{
    protected static ?string $pollingInterval = '15s';
    
    protected int|string|array $columnSpan = 'full';
    
    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('id')
                ->label(__('filament.widgets.latest_orders.table.id.label'))
                ->sortable(),
            
            Tables\Columns\TextColumn::make('user.name')
                ->label(__('filament.widgets.latest_orders.table.user.label'))
                ->sortable(),
            
            Tables\Columns\TextColumn::make('total')
                ->label(__('filament.widgets.latest_orders.table.total.label'))
                ->money('EUR')
                ->sortable(),
            
            Tables\Columns\TextColumn::make('status')
                ->label(__('filament.widgets.latest_orders.table.status.label'))
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'pending' => 'warning',
                    'processing' => 'info',
                    'completed' => 'success',
                    'cancelled' => 'danger',
                }),
            
            Tables\Columns\TextColumn::make('created_at')
                ->label(__('filament.widgets.latest_orders.table.created_at.label'))
                ->dateTime()
                ->sortable(),
        ];
    }
    
    protected function getTableData(): array
    {
        return Order::query()
            ->latest()
            ->limit(5)
            ->get()
            ->toArray();
    }
}

// ERRATO
class LatestOrders extends Widget
{
    protected static ?string $pollingInterval = '15s';
    
    protected int|string|array $columnSpan = 'full';
    
    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('id')
                ->sortable(), // ❌ No label, no traduzione
            
            Tables\Columns\TextColumn::make('user.name')
                ->sortable(), // ❌ No label, no traduzione
            
            Tables\Columns\TextColumn::make('total')
                ->money('EUR')
                ->sortable(), // ❌ No label, no traduzione
            
            Tables\Columns\TextColumn::make('status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'pending' => 'warning',
                    'processing' => 'info',
                    'completed' => 'success',
                    'cancelled' => 'danger',
                }), // ❌ No label, no traduzione
            
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable(), // ❌ No label, no traduzione
        ];
    }
    
    protected function getTableData(): array
    {
        return Order::query()
            ->latest()
            ->limit(5)
            ->get()
            ->toArray();
    }
}
```

## Best Practices

### Regole Fondamentali
1. **Widget**
   - Classe dedicata
   - Estensione corretta
   - Metodi obbligatori
   - Documentazione

2. **Cards**
   - Cards dedicate
   - Layout ottimizzato
   - Traduzioni
   - Performance

3. **Tabelle**
   - Colonne complete
   - Dati ottimizzati
   - Traduzioni
   - Performance

4. **Test**
   - Test unitari
   - Test integrazione
   - Test UI
   - Test performance

### Esempi

#### Widget Completo
```php
// CORRETTO
class StatsOverview extends Widget
{
    protected static ?string $pollingInterval = '15s';
    
    protected int|string|array $columnSpan = 'full';
    
    protected function getColumns(): int|string|array
    {
        return 4;
    }
    
    protected function getCards(): array
    {
        return [
            Card::make(__('filament.widgets.stats_overview.cards.total_users.label'), User::count())
                ->description(__('filament.widgets.stats_overview.cards.total_users.description'))
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),
            
            Card::make(__('filament.widgets.stats_overview.cards.total_orders.label'), Order::count())
                ->description(__('filament.widgets.stats_overview.cards.total_orders.description'))
                ->descriptionIcon('heroicon-m-shopping-cart')
                ->color('warning'),
            
            Card::make(__('filament.widgets.stats_overview.cards.total_products.label'), Product::count())
                ->description(__('filament.widgets.stats_overview.cards.total_products.description'))
                ->descriptionIcon('heroicon-m-cube')
                ->color('danger'),
            
            Card::make(__('filament.widgets.stats_overview.cards.total_categories.label'), Category::count())
                ->description(__('filament.widgets.stats_overview.cards.total_categories.description'))
                ->descriptionIcon('heroicon-m-tag')
                ->color('primary'),
        ];
    }
    
    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('id')
                ->label(__('filament.widgets.stats_overview.table.id.label'))
                ->sortable(),
            
            Tables\Columns\TextColumn::make('name')
                ->label(__('filament.widgets.stats_overview.table.name.label'))
                ->sortable(),
            
            Tables\Columns\TextColumn::make('email')
                ->label(__('filament.widgets.stats_overview.table.email.label'))
                ->sortable(),
            
            Tables\Columns\TextColumn::make('created_at')
                ->label(__('filament.widgets.stats_overview.table.created_at.label'))
                ->dateTime()
                ->sortable(),
        ];
    }
    
    protected function getTableData(): array
    {
        return User::query()
            ->latest()
            ->limit(5)
            ->get()
            ->toArray();
    }
}

// ERRATO
class StatsOverview extends Widget
{
    protected static ?string $pollingInterval = '15s';
    
    protected int|string|array $columnSpan = 'full';
    
    protected function getColumns(): int|string|array
    {
        return 4;
    }
    
    protected function getCards(): array
    {
        return [
            Card::make('Total Users', User::count()) // ❌ No traduzione
                ->description('Total number of users') // ❌ No traduzione
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),
            
            Card::make('Total Orders', Order::count()) // ❌ No traduzione
                ->description('Total number of orders') // ❌ No traduzione
                ->descriptionIcon('heroicon-m-shopping-cart')
                ->color('warning'),
            
            Card::make('Total Products', Product::count()) // ❌ No traduzione
                ->description('Total number of products') // ❌ No traduzione
                ->descriptionIcon('heroicon-m-cube')
                ->color('danger'),
            
            Card::make('Total Categories', Category::count()) // ❌ No traduzione
                ->description('Total number of categories') // ❌ No traduzione
                ->descriptionIcon('heroicon-m-tag')
                ->color('primary'),
        ];
    }
    
    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('id')
                ->sortable(), // ❌ No label, no traduzione
            
            Tables\Columns\TextColumn::make('name')
                ->sortable(), // ❌ No label, no traduzione
            
            Tables\Columns\TextColumn::make('email')
                ->sortable(), // ❌ No label, no traduzione
            
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable(), // ❌ No label, no traduzione
        ];
    }
    
    protected function getTableData(): array
    {
        return User::query()
            ->latest()
            ->limit(5)
            ->get()
            ->toArray();
    }
}
```

## Checklist

### Per Ogni Widget
- [ ] Classe dedicata
- [ ] Estensione corretta
- [ ] Metodi obbligatori
- [ ] Documentata

### Per Cards
- [ ] Cards dedicate
- [ ] Layout ottimizzato
- [ ] Traduzioni
- [ ] Performance

### Per Tabelle
- [ ] Colonne complete
- [ ] Dati ottimizzati
- [ ] Traduzioni
- [ ] Performance

### Per Test
- [ ] Unitari
- [ ] Integrazione
- [ ] UI
- [ ] Performance
- [ ] Copertura 
