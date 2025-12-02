# Routing Architecture

## No Traditional Controllers or Routes

**CRITICAL**: This project does **NOT** use traditional Laravel Controllers or route definitions in `web.php`/`api.php`. Instead, it uses a modern approach with Filament + Folio + Volt + Xot integration.

## Architecture Overview

```
Frontend (Public)         Backend (Admin)
├── Folio Pages           ├── Filament Resources
├── Volt Components       ├── Filament Pages  
├── XotBase Integration   ├── Filament Widgets
└── File-based Routing    └── XotBase Integration
```

## ❌ What We DON'T Use

### Traditional Controllers
```php
// ❌ Don't create traditional controllers
<?php
namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index() { /* Don't do this */ }
    public function store() { /* Don't do this */ }
}
```

### Traditional Livewire Components
```php
// ❌ Don't create traditional Livewire components
<?php
namespace App\Http\Livewire;

class UserForm extends Component
{
    public function render() { /* Don't do this */ }
}
```

### Traditional Blade Forms
```blade
{{-- ❌ Don't use traditional forms or Livewire components --}}
<livewire:user-form />
<form method="POST">
    <input type="text" name="name" />
</form>
```

### Route Files
```php
// ❌ Don't add routes to web.php
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);

// ❌ Don't add routes to api.php  
Route::apiResource('users', UserController::class);
```

## ✅ What We USE Instead

### 1. Backoffice: Filament + XotBase

#### Filament Resources (Auto-routing)
```php
<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\User\Models\User;

// ✅ Filament auto-generates routes
class UserResource extends XotBaseResource
{
    protected static ?string $model = User::class;
    
    // Auto-routes:
    // /admin/users (list)
    // /admin/users/create (create)
    // /admin/users/{id} (view)
    // /admin/users/{id}/edit (edit)
}
```

#### Filament Pages (Custom Admin Pages)
```php
<?php

declare(strict_types=1);

namespace Modules\Setting\Filament\Pages;

use Modules\Xot\Filament\Pages\XotBasePage;

// ✅ Custom admin page with auto-routing
class BackupMysql extends XotBasePage
{
    protected static ?string $navigationIcon = 'heroicon-o-database';
    
    // Auto-route: /admin/backup-mysql
}
```

#### Filament Widgets (Dashboard Components)
```php
<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

use Modules\Xot\Filament\Widgets\XotBaseStatsOverviewWidget;

// ✅ Widget embedded in dashboard
class UserStatsWidget extends XotBaseStatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            // Stats data
        ];
    }
}
```

### 2. Frontoffice: Folio + Filament Widgets + XotBase

#### Folio Pages (File-based Routing)
```php
<?php
// File: Modules/[Module]/resources/views/folio/products.blade.php

use function Laravel\Folio\name;

name('products.index'); // Named route

?>

<div>
    <h1>Products</h1>
    
    {{-- ✅ Use Filament Widgets, not Livewire components --}}
    @livewire(\Modules\Product\Filament\Widgets\ProductListWidget::class)
    @livewire(\Modules\Product\Filament\Widgets\ProductFilterWidget::class)
</div>
```

Routes automatically generated:
- `resources/views/folio/index.blade.php` → `/`
- `resources/views/folio/products.blade.php` → `/products`
- `resources/views/folio/products/[id].blade.php` → `/products/{id}`

#### Filament Widgets (Interactive Logic)
```php
<?php
// File: Modules/Product/Filament/Widgets/ProductFormWidget.php

namespace Modules\Product\Filament\Widgets;

use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Modules\Product\Actions\CreateProductAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;

class ProductFormWidget extends XotBaseWidget implements HasForms
{
    use InteractsWithForms;
    
    protected static string $view = 'product::filament.widgets.product-form';
    
    public ?array $data = [];
    
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                    
                Forms\Components\Textarea::make('description')
                    ->required(),
            ])
            ->statePath('data');
    }
    
    public function save(): void
    {
        $this->validate();
        
        app(CreateProductAction::class)->execute($this->data);
        
        $this->form->fill();
        
        session()->flash('success', 'Product created successfully!');
    }
}
```

#### Using Widget in Folio Page
```php
<?php
// File: resources/views/folio/products/create.blade.php

use function Laravel\Folio\name;

name('products.create');

?>

<div>
    <h1>Create Product</h1>
    
    {{-- ✅ Use Filament Widget instead of Volt --}}
    @livewire(\Modules\Product\Filament\Widgets\ProductFormWidget::class)
</div>
```

## Routing Structure by Module

### Module Structure
```
Modules/[Module]/
├── Filament/                    # Backoffice (Admin)
│   ├── Resources/              # CRUD interfaces
│   ├── Pages/                  # Custom admin pages
│   └── Widgets/               # Dashboard widgets
├── resources/views/folio/      # Frontoffice (Public)
│   ├── index.blade.php        # Homepage
│   ├── products.blade.php     # Products list
│   └── products/
│       ├── [id].blade.php     # Product detail
│       └── create.blade.php   # Create form
└── routes/                     # Only for special cases
    ├── api.php                # External APIs only
    └── web.php                # Special routes only
```

## When to Use Route Files

### Limited Use Cases for web.php/api.php

#### 1. External API Endpoints
```php
// routes/api.php - Only for external APIs
Route::prefix('api/v1')->group(function () {
    Route::get('/webhook/stripe', WebhookController::class);
    Route::post('/import/external', ImportController::class);
});
```

#### 2. Special System Routes
```php
// routes/web.php - Only for special system routes
Route::get('/health-check', HealthCheckController::class);
Route::get('/sitemap.xml', SitemapController::class);
```

#### 3. Legacy Integration
```php
// routes/web.php - Only for legacy system integration
Route::post('/legacy-callback', LegacyCallbackController::class);
```

## Development Workflow

### Creating New Functionality

#### For Admin (Backoffice)
```bash
# Create Filament resource (auto-routing)
php artisan make:filament-resource User --generate --no-interaction

# Create custom admin page
php artisan make:filament-page Settings --type=custom

# Create widget
php artisan make:filament-widget UserStats --stats-overview
```

#### For Public (Frontoffice)
```bash
# Create Folio page (auto-routing)
php artisan folio:page products
php artisan folio:page products/[id]

# Create Volt component
php artisan make:volt products/create --test --pest
```

## URL Patterns

### Backoffice URLs (Filament)
- `/admin` - Dashboard
- `/admin/users` - User resource list
- `/admin/users/create` - Create user
- `/admin/users/{id}/edit` - Edit user
- `/admin/settings` - Custom settings page

### Frontoffice URLs (Folio)
- `/` - Homepage
- `/products` - Products list
- `/products/{id}` - Product detail
- `/products/create` - Create product form
- `/about` - About page

## Benefits of This Architecture

### 1. No Route Maintenance
- Filament auto-generates admin routes
- Folio auto-generates public routes
- No manual route definitions needed

### 2. Convention over Configuration
- Predictable URL patterns
- Consistent structure across modules
- Reduced boilerplate code

### 3. Integrated Functionality
- XotBase classes provide shared functionality
- Automatic module detection and navigation
- Built-in permission and authentication

### 4. Clean Separation
- Admin functionality isolated in Filament
- Public functionality isolated in Folio/Volt
- Clear boundaries between concerns

## Migration from Traditional Laravel

### ❌ Old Way
```php
// Controller
class UserController extends Controller {
    public function index() { return view('users.index'); }
    public function create() { return view('users.create'); }
}

// Routes
Route::resource('users', UserController::class);

// Views
resources/views/users/index.blade.php
resources/views/users/create.blade.php
```

### ✅ New Way
```php
// Filament Resource (Admin)
class UserResource extends XotBaseResource {
    // Auto-generates all admin routes and views
}

// Folio Pages (Public)
resources/views/folio/users.blade.php     // List
resources/views/folio/users/create.blade.php  // Create form with Volt
```

## Testing

### Filament Testing
```php
use Modules\User\Filament\Resources\UserResource\Pages\ListUsers;

it('can access user list page', function () {
    livewire(ListUsers::class)
        ->assertSuccessful();
});
```

### Folio Testing  
```php
it('can access products page', function () {
    get('/products')
        ->assertOk()
        ->assertSee('Products');
});
```

### Volt Testing
```php
use Livewire\Volt\Volt;

it('can create product', function () {
    Volt::test('products.create')
        ->set('name', 'Test Product')
        ->call('save')
        ->assertRedirect('/products');
});
```

## Summary

- **Backoffice**: Filament Resources, Pages, Widgets (no controllers)
- **Frontoffice**: Folio Pages + Filament Widgets (no controllers, no Livewire components)
- **Forms**: All forms use Filament Widgets (admin and frontend)
- **Routes**: Only for external APIs and special cases
- **XotBase**: Provides shared functionality across both
- **Auto-routing**: Convention-based URL generation
- **Clean Architecture**: Clear separation with consistent UI components