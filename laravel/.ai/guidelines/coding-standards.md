# Coding Standards

## PHP Standards

### File Structure
```php
<?php

declare(strict_types=1);

namespace Modules\[Module]\Models;

use Modules\[Module]\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExampleModel extends BaseModel
{
    // Implementation
}
```

### Key Requirements
- **Strict Typing**: Always use `declare(strict_types=1);`
- **Type Hints**: Explicit return types and parameter types
- **Constructor Promotion**: Use PHP 8 constructor property promotion
- **No Empty Constructors**: Avoid empty `__construct()` methods

### Code Examples

#### Constructor Pattern
```php
public function __construct(
    public readonly GitHub $github,
    public string $name,
    private UserService $userService
) {}
```

#### Method Signatures
```php
protected function isAccessible(User $user, ?string $path = null): bool
{
    return $this->userService->hasAccess($user, $path);
}
```

#### Model Casts (Laravel 12)
```php
protected function casts(): array
{
    return [
        'created_at' => 'datetime',
        'is_active' => 'boolean',
        'metadata' => 'array',
    ];
}
```

## Laravel Patterns

### Model Relationships
```php
public function author(): BelongsTo
{
    return $this->belongsTo(User::class);
}

public function posts(): HasMany
{
    return $this->hasMany(Post::class);
}
```

### Form Requests
- Always use Form Request classes for validation
- Include both rules and error messages
- Follow existing array vs string pattern in the module

### Service Classes
```php
<?php

declare(strict_types=1);

namespace Modules\[Module]\App\Services;

final readonly class ExampleService
{
    public function __construct(
        private ExampleRepository $repository
    ) {}

    public function processData(array $data): ExampleResult
    {
        // Implementation
    }
}
```

## Filament Standards

### Resource Structure
```php
<?php

declare(strict_types=1);

namespace Modules\[Module]\Filament\Resources;

use Filament\Forms;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Filament\Tables;

class ExampleResource extends XotBaseResource
{
    protected static ?string $model = Example::class;
    
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
                
            Forms\Components\Select::make('user_id')
                ->relationship('user', 'name')
                ->required(),
        ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('user.name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }
}
```

### Widget Patterns
```php
<?php

declare(strict_types=1);

namespace Modules\[Module]\Filament\Widgets;

use Modules\Xot\Filament\Widgets\XotBaseStatsOverviewWidget;

class ExampleWidget extends XotBaseStatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            StatsOverviewWidget\Stat::make('Total Users', User::count())
                ->description('All registered users')
                ->descriptionIcon('heroicon-m-arrow-trending-up'),
        ];
    }
}
```

## Livewire/Volt Standards

### Volt Component (Class-based)
```php
<?php

use Livewire\Volt\Component;
use App\Models\Product;

new class extends Component {
    public string $search = '';
    public Collection $products;
    
    public function mount(): void
    {
        $this->loadProducts();
    }
    
    public function updatedSearch(): void
    {
        $this->loadProducts();
    }
    
    protected function loadProducts(): void
    {
        $this->products = Product::when($this->search, 
            fn($q) => $q->where('name', 'like', "%{$this->search}%")
        )->get();
    }
}; ?>

<div>
    <flux:input 
        wire:model.live.debounce.300ms="search" 
        placeholder="Search products..." 
    />
    
    <div class="grid gap-4">
        @foreach($products as $product)
            <div wire:key="product-{{ $product->id }}">
                {{ $product->name }}
            </div>
        @endforeach
    </div>
</div>
```

### Volt Component (Functional)
```php
<?php

use function Livewire\Volt\{state, computed};
use App\Models\Product;

state(['search' => '']);

$products = computed(fn() => Product::when($this->search,
    fn($q) => $q->where('name', 'like', "%{$this->search}%")
)->get());

?>

<div>
    <flux:input wire:model.live="search" placeholder="Search..." />
    
    @foreach($this->products as $product)
        <div wire:key="product-{{ $product->id }}">
            {{ $product->name }}
        </div>
    @endforeach
</div>
```

## Testing Standards

### Pest Test Structure
```php
<?php

declare(strict_types=1);

use Modules\[Module]\Models\User;
use Modules\[Module]\Models\BaseModel;
use function Pest\Laravel\{actingAs, assertDatabaseHas};

it('creates a new user', function () {
    $admin = User::factory()->admin()->create();
    
    actingAs($admin)
        ->post('/users', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ])
        ->assertRedirect('/users');
        
    assertDatabaseHas('users', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
    ]);
});

it('validates user creation', function (array $data, string $field) {
    actingAs(User::factory()->admin()->create())
        ->post('/users', $data)
        ->assertSessionHasErrors($field);
})->with([
    [['name' => ''], 'name'],
    [['email' => 'invalid'], 'email'],
]);
```

### Filament Testing
```php
use Livewire\Volt\Volt;

it('can create user via filament', function () {
    Volt::test('admin.users.create')
        ->fillForm([
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ])
        ->call('create')
        ->assertHasNoErrors();
        
    expect(User::where('email', 'john@example.com')->exists())
        ->toBeTrue();
});
```

## Naming Conventions

### Files and Classes
- **Models**: `PascalCase` (e.g., `UserProfile`)
- **Controllers**: `PascalCase` + `Controller` (e.g., `UserController`)
- **Resources**: `PascalCase` + `Resource` (e.g., `UserResource`)
- **Services**: `PascalCase` + `Service` (e.g., `UserService`)
- **Actions**: `PascalCase` + `Action` (e.g., `CreateUserAction`)

### Methods and Variables
- **Methods**: `camelCase` with descriptive names (e.g., `isRegisteredForDiscounts`)
- **Variables**: `camelCase` (e.g., `$userProfile`)
- **Properties**: `camelCase` (e.g., `$isActive`)

### Database
- **Tables**: `snake_case` plural (e.g., `user_profiles`)
- **Columns**: `snake_case` (e.g., `created_at`, `is_active`)
- **Foreign Keys**: `model_id` (e.g., `user_id`)

## Documentation Standards

### PHPDoc Blocks
```php
/**
 * Retrieve user profile with caching.
 *
 * @param  int  $userId  The user identifier
 * @param  array{include_deleted?: bool, cache_ttl?: int}  $options  Additional options
 * @return UserProfile|null  The user profile or null if not found
 */
public function getUserProfile(int $userId, array $options = []): ?UserProfile
{
    // Implementation
}
```

### Inline Comments
- Avoid obvious comments
- Explain complex business logic only
- Use PHPDoc blocks for API documentation