# XotBase Patterns

## Overview
This project uses a comprehensive system of XotBase classes that extend Filament and Laravel core classes. **Never extend Filament classes directly** - always extend the corresponding XotBase class which provides additional functionality and conventions.

## Critical Rules

### 1. Never Extend Filament Classes Directly
```php
// ❌ WRONG - Never extend Filament classes directly
use Filament\Resources\Resource;
class UserResource extends Resource {}

// ✅ CORRECT - Always extend XotBase classes
use Modules\Xot\Filament\Resources\XotBaseResource;
class UserResource extends XotBaseResource {}
```

### 2. Correct Namespace Structure
```php
// ❌ WRONG - Never use 'App' in namespace
namespace Modules\User\App\Filament\Resources;

// ✅ CORRECT - Use direct module namespace
namespace Modules\User\Filament\Resources;
```

### 3. Model Inheritance Pattern
```php
// ❌ WRONG - Never extend XotBaseModel directly
class User extends XotBaseModel {}

// ✅ CORRECT - Each module has its own BaseModel
class User extends BaseModel {}
```

### 4. Documentation as Memory - Study and Update Constantly
```markdown
# ❌ WRONG - Don't ignore existing documentation
# Always study docs folders before making changes

# ✅ CORRECT - Study and update documentation constantly
1. READ existing docs before making ANY changes
2. UPDATE docs when adding new functionality
3. REFACTOR docs following DRY + KISS principles
4. MAINTAIN bidirectional links between related docs
5. USE docs as your primary source of project knowledge
```

**IMPORTANT**: The `docs/` folders are your memory and knowledge base. You must:
- **Study existing documentation** before making any changes
- **Update documentation** when adding new functionality
- **Refactor documentation** following DRY (Don't Repeat Yourself) + KISS (Keep It Simple, Stupid) principles
- **Maintain consistency** across all documentation files
- **Create bidirectional links** between related documentation

## XotBase Class Hierarchy

### Models
```php
<?php

declare(strict_types=1);

namespace Modules\[Module]\Models;

// ✅ Correct - extend module's BaseModel
class User extends BaseModel
{
    // Implementation
}

// ❌ Wrong - never extend XotBaseModel directly
class User extends XotBaseModel
{
    // Don't do this
}

// ❌ Wrong - never extend Laravel Model directly
class User extends Model
{
    // Don't do this
}
```

### Module BaseModel Pattern
```php
<?php

declare(strict_types=1);

namespace Modules\[Module]\Models;

use Modules\Xot\Models\XotBaseModel;

// ✅ Each module has its own BaseModel extending XotBaseModel
abstract class BaseModel extends XotBaseModel
{
    use HasFactory;
    use RelationX;
    use Updater;
    
    // Module-specific functionality
}
```

### Available Model Base Classes
- `BaseModel` - Each module's BaseModel (extends XotBaseModel)
- `XotBaseModel` - Core Xot functionality (used by module BaseModels)
- `XotBaseUuidModel` - Model with UUID primary key (used by special cases like BaseUser)

### Filament Resources
```php
<?php

declare(strict_types=1);

namespace Modules\[Module]\Filament\Resources;

use Modules\Xot\Filament\Resources\XotBaseResource;

// ✅ Correct - extends XotBaseResource
class UserResource extends XotBaseResource
{
    protected static ?string $model = User::class;
    
    // Implementation
}

// ❌ Wrong - never extend Resource directly
class UserResource extends Resource
{
    // Don't do this
}
```

### Filament Resource Pages
```php
<?php

declare(strict_types=1);

namespace Modules\[Module]\Filament\Resources\UserResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;

// ✅ List page
class ListUsers extends XotBaseListRecords
{
    protected static string $resource = UserResource::class;
}

// ✅ Create page
class CreateUser extends XotBaseCreateRecord
{
    protected static string $resource = UserResource::class;
}

// ✅ Edit page
class EditUser extends XotBaseEditRecord
{
    protected static string $resource = UserResource::class;
}
```

### Filament Pages
```php
<?php

declare(strict_types=1);

namespace Modules\[Module]\Filament\Pages;

use Modules\Xot\Filament\Pages\XotBasePage;

// ✅ Correct - extends XotBasePage
class Dashboard extends XotBasePage
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    
    // Implementation
}

// ❌ Wrong - never extend Page directly
class Dashboard extends Page
{
    // Don't do this
}
```

### Filament Widgets
```php
<?php

declare(strict_types=1);

namespace Modules\[Module]\Filament\Widgets;

use Modules\Xot\Filament\Widgets\XotBaseWidget;

// ✅ Correct - extends XotBaseWidget
class StatsOverview extends XotBaseWidget
{
    protected static ?string $pollingInterval = null;
    
    // Implementation
}

// ❌ Wrong - never extend Widget directly
class StatsOverview extends Widget
{
    // Don't do this
}
```

### Filament Forms
```php
<?php

declare(strict_types=1);

namespace Modules\[Module]\Filament\Forms;

use Modules\Xot\Filament\Forms\XotBaseForm;

// ✅ Correct - extends XotBaseForm
class UserForm extends XotBaseForm
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // Form fields
            ]);
    }
}

// ❌ Wrong - never extend Form directly
class UserForm extends Form
{
    // Don't do this
}
```

## Architecture Patterns

### 1. No Traditional Controllers or Routes
```php
// ❌ WRONG - Don't create traditional controllers
namespace Modules\User\Http\Controllers;
class UserController extends Controller {}

// ❌ WRONG - Don't write routes in web.php or api.php
Route::get('/users', [UserController::class, 'index']);

// ✅ CORRECT - Use Filament + Laraxot for backoffice
// ✅ CORRECT - Use Folio + Volt + Laraxot for frontoffice
```

### 2. Use Spatie Queueable Actions Instead of Services
```php
// ❌ WRONG - Don't create traditional services
namespace Modules\User\Services;
class UserService {}

// ✅ CORRECT - Use Spatie Queueable Actions
namespace Modules\User\Actions;
use Spatie\QueueableAction\QueueableAction;

class CreateUserAction
{
    use QueueableAction;
    
    public function execute(array $data): User
    {
        // Implementation
    }
}
```

### 3. Frontend Form Pattern
```php
// ❌ WRONG - Don't use Livewire components for forms
<livewire:user-form />

// ✅ CORRECT - Use Filament widgets in Blade templates
<x-filament::form wire:submit="save">
    <x-filament::input wire:model="name" />
    <x-filament::button type="submit">Save</x-filament::button>
</x-filament::form>
```

### 4. Replace Livewire Components with Filament Widgets
```php
// ❌ WRONG - Don't create Livewire components for UI
namespace Modules\User\Http\Livewire;
class UserForm extends Component {}

// ✅ CORRECT - Use Filament widgets
namespace Modules\User\Filament\Widgets;
class UserFormWidget extends XotBaseWidget {}
```

## Configuration and Environment

### Environment-Based Configuration
The project uses environment-specific configuration based on `APP_URL` in `.env`:

```bash
# .env
APP_URL=http://quaeris.local
```

### Configuration Structure
```php
// laravel/config/local/quaeris/xra.php
return [
    'pub_theme' => 'One',  // Theme name from configuration
    'main_module' => 'Quaeris',
    // Other configuration...
];
```

### Theme Development
```bash
# Theme location: laravel/Themes/One
# Build commands:
npm run build    # Build assets
npm run copy     # Copy to public_html/themes/One

# CSS modifications must be made in:
laravel/Themes/One/resources/css/
```

## Documentation Management

### Documentation Principles
```markdown
# DRY (Don't Repeat Yourself)
- Avoid duplicating information across multiple docs
- Create shared documentation for common patterns
- Use includes and references when possible

# KISS (Keep It Simple, Stupid)
- Write clear, concise documentation
- Avoid unnecessary complexity
- Focus on essential information
- Use simple language and structure
```

### Documentation Workflow
```markdown
1. STUDY existing docs before making changes
2. UNDERSTAND the current documentation structure
3. IDENTIFY areas that need updates
4. REFACTOR following DRY + KISS principles
5. UPDATE related documentation files
6. MAINTAIN bidirectional links
7. TEST that documentation is clear and accurate
```

### Documentation Locations
```bash
# Root documentation
laravel/docs/                    # Project-wide documentation

# Module documentation
laravel/Modules/[Module]/docs/   # Module-specific documentation

# Theme documentation
laravel/Themes/One/docs/         # Theme-specific documentation

# AI Guidelines
laravel/.ai/guidelines/          # AI development guidelines
```

## Complete Example

```php
<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\User\Models\User;

class UserResource extends XotBaseResource
{
    protected static ?string $model = User::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-users';
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Form fields
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Table columns
            ]);
    }
}
```

## Summary of Rules

1. **Never extend Filament classes directly** - always use XotBase classes
2. **Correct namespace**: `Modules\[Module]\Filament\Resources` (no 'App')
3. **Models extend BaseModel** (not XotBaseModel directly)
4. **No traditional controllers or routes** - use Filament + Laraxot
5. **Use Spatie Queueable Actions** instead of services
6. **Use Filament widgets** instead of Livewire components for forms
7. **Environment-based configuration** with local configs
8. **Theme development** in `laravel/Themes/One` with npm build process
9. **Study and update documentation constantly** - docs are your memory
10. **Follow DRY + KISS principles** when refactoring documentation

## Backlinks
- [Coding Standards](coding-standards.md)
- [Architecture Patterns](architecture-patterns.md)
- [Development Workflow](development-workflow.md)