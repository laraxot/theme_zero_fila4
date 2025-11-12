# Filament Widgets in Frontend

## Filament Widgets Replace Livewire Components

**CRITICAL**: In this project, we **DO NOT** use traditional Livewire components in Blade templates. Instead, we use **Filament Widgets** even in the frontend/public pages.

## ❌ What We DON'T Use

### Traditional Livewire Components in Blade
```blade
{{-- ❌ Don't use Livewire components directly --}}
<livewire:user-form />
<livewire:product-list />
<livewire:contact-form />

{{-- ❌ Don't use @livewire directive --}}
@livewire('user-form', ['userId' => $user->id])
```

### Traditional Form Components
```blade
{{-- ❌ Don't use traditional form elements --}}
<form method="POST" action="/users">
    @csrf
    <input type="text" name="name" />
    <button type="submit">Save</button>
</form>

{{-- ❌ Don't use Flux components directly for forms --}}
<form wire:submit="save">
    <flux:input wire:model="name" />
    <flux:button type="submit">Save</flux:button>
</form>
```

## ✅ What We USE Instead: Filament Widgets

### Filament Widgets in Frontend
```blade
{{-- ✅ Use Filament widgets in Blade templates --}}
@livewire(\Modules\User\Filament\Widgets\UserFormWidget::class)
@livewire(\Modules\Product\Filament\Widgets\ProductListWidget::class)
@livewire(\Modules\Contact\Filament\Widgets\ContactFormWidget::class)
```

### Filament Form Widgets
```php
<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Modules\User\Actions\CreateUserAction;
use Modules\User\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;

// ✅ Filament Widget for forms in frontend
class UserFormWidget extends XotBaseWidget implements HasForms
{
    use InteractsWithForms;
    
    protected static string $view = 'user::filament.widgets.user-form-widget';
    
    public ?array $data = [];
    
    public function mount(): void
    {
        $this->form->fill();
    }
    
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                    
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(User::class, 'email'),
                    
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->minLength(8),
            ])
            ->statePath('data');
    }
    
    public function create(): void
    {
        $this->validate();
        
        $user = app(CreateUserAction::class)->execute($this->data);
        
        $this->form->fill();
        
        $this->dispatch('user-created', userId: $user->id);
        
        session()->flash('success', 'User created successfully!');
    }
}
```

### Widget Blade Template
```blade
{{-- resources/views/filament/widgets/user-form-widget.blade.php --}}
<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">
            Create New User
        </x-slot>
        
        <form wire:submit="create">
            {{ $this->form }}
            
            <x-filament::button type="submit" class="mt-4">
                Create User
            </x-filament::button>
        </form>
    </x-filament::section>
</x-filament-widgets::widget>
```

## Widget Types for Frontend

### 1. Form Widgets
```php
<?php

declare(strict_types=1);

namespace Modules\Contact\Filament\Widgets;

use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Modules\Contact\Actions\SendContactMessageAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;

class ContactFormWidget extends XotBaseWidget implements HasForms
{
    use InteractsWithForms;
    
    protected static string $view = 'contact::filament.widgets.contact-form-widget';
    
    public ?array $data = [];
    
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                    
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required(),
                    
                Forms\Components\Textarea::make('message')
                    ->required()
                    ->rows(5),
            ])
            ->statePath('data');
    }
    
    public function submit(): void
    {
        $this->validate();
        
        app(SendContactMessageAction::class)->execute($this->data);
        
        $this->form->fill();
        
        session()->flash('success', 'Message sent successfully!');
    }
}
```

### 2. List/Table Widgets  
```php
<?php

declare(strict_types=1);

namespace Modules\Product\Filament\Widgets;

use Modules\Xot\Filament\Widgets\XotBaseTableWidget;
use Modules\Product\Models\Product;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ProductListWidget extends XotBaseTableWidget
{
    protected static string $view = 'product::filament.widgets.product-list-widget';
    
    protected function getTableQuery(): Builder
    {
        return Product::query()
            ->published()
            ->latest();
    }
    
    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\ImageColumn::make('image')
                ->circular(),
                
            Tables\Columns\TextColumn::make('name')
                ->searchable()
                ->sortable(),
                
            Tables\Columns\TextColumn::make('price')
                ->money('EUR')
                ->sortable(),
                
            Tables\Columns\TextColumn::make('category.name')
                ->badge(),
        ];
    }
    
    protected function getTableActions(): array
    {
        return [
            Tables\Actions\Action::make('view')
                ->icon('heroicon-o-eye')
                ->url(fn (Product $record) => "/products/{$record->slug}"),
        ];
    }
}
```

### 3. Stats/Dashboard Widgets
```php
<?php

declare(strict_types=1);

namespace Modules\Order\Filament\Widgets;

use Modules\Xot\Filament\Widgets\XotBaseStatsOverviewWidget;
use Modules\Order\Models\Order;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OrderStatsWidget extends XotBaseStatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Orders', Order::count())
                ->description('All time orders')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
                
            Stat::make('Pending Orders', Order::pending()->count())
                ->description('Orders awaiting processing')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
                
            Stat::make('Revenue', '€' . number_format(Order::completed()->sum('total'), 2))
                ->description('Total completed orders')
                ->descriptionIcon('heroicon-m-currency-euro')
                ->color('primary'),
        ];
    }
}
```

### 4. Chart Widgets
```php
<?php

declare(strict_types=1);

namespace Modules\Analytics\Filament\Widgets;

use Modules\Xot\Filament\Widgets\XotBaseChartWidget;
use Modules\Order\Models\Order;

class SalesChartWidget extends XotBaseChartWidget
{
    protected static string $view = 'analytics::filament.widgets.sales-chart-widget';
    
    protected static ?string $heading = 'Monthly Sales';
    
    protected function getData(): array
    {
        $data = Order::completed()
            ->selectRaw('MONTH(created_at) as month, SUM(total) as total')
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();
            
        return [
            'datasets' => [
                [
                    'label' => 'Sales',
                    'data' => array_values($data),
                    'backgroundColor' => '#10B981',
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }
    
    protected function getType(): string
    {
        return 'line';
    }
}
```

## Usage in Folio Pages

### Folio Page with Widgets
```php
<?php
// resources/views/folio/products/index.blade.php

use function Laravel\Folio\name;
use function Laravel\Folio\middleware;

name('products.index');
middleware(['web']);

?>

<x-layouts.public>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-8">Products</h1>
        
        {{-- ✅ Use Filament widgets for all functionality --}}
        @livewire(\Modules\Product\Filament\Widgets\ProductFilterWidget::class)
        
        @livewire(\Modules\Product\Filament\Widgets\ProductListWidget::class)
    </div>
</x-layouts.public>
```

### Complex Page with Multiple Widgets
```php
<?php
// resources/views/folio/dashboard.blade.php

use function Laravel\Folio\name;
use function Laravel\Folio\middleware;

name('dashboard');
middleware(['auth']);

?>

<x-layouts.app>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- ✅ Stats widgets --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                @livewire(\Modules\Order\Filament\Widgets\OrderStatsWidget::class)
            </div>
            
            {{-- ✅ Chart widgets --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                @livewire(\Modules\Analytics\Filament\Widgets\SalesChartWidget::class)
                @livewire(\Modules\Analytics\Filament\Widgets\UserGrowthChartWidget::class)
            </div>
            
            {{-- ✅ Table widgets --}}
            @livewire(\Modules\Order\Filament\Widgets\RecentOrdersWidget::class)
        </div>
    </div>
</x-layouts.app>
```

## Widget Configuration

### Widget Base Classes
```php
// ✅ Always extend appropriate XotBase widget class
class MyFormWidget extends XotBaseWidget implements HasForms
class MyTableWidget extends XotBaseTableWidget  
class MyStatsWidget extends XotBaseStatsOverviewWidget
class MyChartWidget extends XotBaseChartWidget
```

### Widget Views
```php
// ✅ Each widget has its own view
protected static string $view = 'module::filament.widgets.widget-name';
```

### Widget Registration
```php
// In ModuleServiceProvider or FilamentServiceProvider
public function boot(): void
{
    // ✅ Widgets auto-register through XotBase classes
    // No manual registration needed
}
```

## Benefits of This Approach

### 1. Consistent UI Components
- All forms use Filament's form builder
- Consistent styling and behavior
- Built-in validation and error handling

### 2. Admin and Frontend Consistency  
```php
// ✅ Same form logic for admin and frontend
class UserFormWidget extends XotBaseWidget
{
    // Used in both admin panel and public pages
}
```

### 3. Rich Functionality
- Built-in CRUD operations
- Advanced table features (sorting, filtering, pagination)
- Chart and stats components
- Form validation and interactions

### 4. XotBase Integration
- Module detection
- Translation support  
- Permission handling
- Caching strategies

## Testing Widgets in Frontend

### Widget Testing
```php
<?php

use Modules\User\Filament\Widgets\UserFormWidget;
use Livewire\Livewire;

it('can render user form widget', function () {
    Livewire::test(UserFormWidget::class)
        ->assertSuccessful()
        ->assertSee('Create New User');
});

it('can create user through widget', function () {
    Livewire::test(UserFormWidget::class)
        ->fillForm([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
        ])
        ->call('create')
        ->assertHasNoFormErrors();
        
    assertDatabaseHas('users', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
    ]);
});
```

### Frontend Integration Testing
```php
it('displays product list widget on products page', function () {
    $products = Product::factory()->count(3)->create();
    
    get('/products')
        ->assertOk()
        ->assertSeeLivewire(ProductListWidget::class)
        ->assertSee($products[0]->name);
});
```

## Widget Creation Commands

### Create Widget
```bash
# Create form widget
php artisan make:filament-widget UserFormWidget --module=User

# Create table widget  
php artisan make:filament-widget ProductListWidget --table --module=Product

# Create stats widget
php artisan make:filament-widget OrderStatsWidget --stats-overview --module=Order

# Create chart widget
php artisan make:filament-widget SalesChartWidget --chart --module=Analytics
```

## Migration from Livewire Components

### ❌ Old Pattern
```blade
{{-- Old Livewire component --}}
<livewire:user-registration-form />

{{-- Old component class --}}
<?php
namespace App\Http\Livewire;
class UserRegistrationForm extends Component { }
```

### ✅ New Pattern  
```blade
{{-- New Filament widget --}}
@livewire(\Modules\User\Filament\Widgets\UserRegistrationWidget::class)

{{-- New widget class --}}
<?php
namespace Modules\User\Filament\Widgets;
class UserRegistrationWidget extends XotBaseWidget implements HasForms { }
```

## Summary

- **All forms use Filament Widgets** - No traditional forms or Livewire components
- **Rich UI Components** - Forms, tables, charts, stats through Filament
- **Frontend Integration** - Widgets used in public Folio pages  
- **XotBase Benefits** - Module detection, translations, permissions
- **Consistent Experience** - Same components in admin and frontend
- **Testing** - Standard Livewire testing for widgets
- **Easy Creation** - Artisan commands for all widget types