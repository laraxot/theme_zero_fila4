# AI Guidelines Documentation

Comprehensive AI guidelines for the Quaeris Fila3 Mono Laravel application. These guidelines ensure consistent development practices and proper use of the project's modular architecture.

## 📁 Guidelines Structure

### Core Guidelines
- **[Project Overview](./project-overview.md)** - High-level project architecture and technology stack
- **[Architecture Patterns](./architecture-patterns.md)** - Modular architecture, patterns, and structures
- **[Routing Architecture](./routing-architecture.md)** - ⚠️ **CRITICAL** - No Controllers/Routes pattern
- **[Action Pattern](./action-pattern.md)** - ⚠️ **CRITICAL** - No Services, use Actions instead
- **[Filament Widgets Frontend](./filament-widgets-frontend.md)** - ⚠️ **CRITICAL** - No Livewire components, use Filament Widgets
- **[Coding Standards](./coding-standards.md)** - PHP, Laravel, and framework-specific coding conventions
- **[Development Workflow](./development-workflow.md)** - File creation, testing, and deployment workflows

### Documentation Naming Convention
- **All files and folders in docs/ must use lowercase** (except README.md)
- **Examples**: `coding-standards.md`, `architecture-patterns.md`, `user-module.md`
- **Never use**: `CODING_STANDARDS.md`, `Architecture_Patterns.md`, `UserModule.md`

### Documentation Management (CRITICAL)
- **docs/ folders are the system's memory** - must be constantly studied and updated
- **Always refactor documentation** using DRY (Don't Repeat Yourself) + KISS (Keep It Simple, Stupid) principles
- **Before making any changes**: Study existing docs in the relevant module
- **After making changes**: Update both module docs and root docs with bidirectional links
- **Documentation quality**: Essential for AI agents and human developers

### Specialized Guidelines  
- **[XotBase Patterns](./xot-base-patterns.md)** - ⚠️ **CRITICAL** - XotBase class hierarchy and usage patterns
- **[Module BaseModel Pattern](./module-basemodel-pattern.md)** - ⚠️ **CRITICAL** - Module-specific BaseModel usage
- **[Environment Configuration](./environment-configuration.md)** - ⚠️ **CRITICAL** - APP_URL-based config and theme system
- **[Documentation Management](./documentation-management.md)** - ⚠️ **CRITICAL** - docs/ as memory system, DRY + KISS refactoring
- **[Security Guidelines](./security-guidelines.md)** - Authentication, authorization, and security best practices
- **[Performance Optimization](./performance-optimization.md)** - Database, caching, and performance strategies
- **[Testing Guidelines](./testing-guidelines.md)** - Pest testing framework and testing patterns

## 🚨 Critical Rules

### 1. XotBase Class Usage (MANDATORY)
```php
// ✅ ALWAYS extend XotBase classes
class UserResource extends XotBaseResource {}
class User extends BaseModel {} // Module-specific BaseModel
class UserWidget extends XotBaseStatsOverviewWidget {}

// ❌ NEVER extend Filament/Laravel classes directly
class UserResource extends Resource {} // DON'T DO THIS
class User extends Model {} // DON'T DO THIS
```

### 2. Namespace Structure (MANDATORY)
```php
// ✅ Correct namespace structure
namespace Modules\[Module]\Filament\Resources;
namespace Modules\[Module]\Models;
namespace Modules\[Module]\Http\Controllers;

// ❌ Wrong - app directory doesn't exist in modules
namespace Modules\[Module]\App\Filament\Resources; // DON'T DO THIS
```

### 3. Configuration and Theme System (MANDATORY)
```php
// ✅ Environment-based Configuration
APP_URL=http://quaeris.local  // Determines active configuration

// ✅ Configuration Structure
laravel/config/local/quaeris/     // Active config for quaeris.local
├── xra.php                      // Theme and module settings
│   ├── 'pub_theme' => 'One'     // Active frontend theme
│   └── 'main_module' => 'Quaeris'

// ✅ Theme Location and Build
laravel/Themes/One/              // Frontend theme directory
├── resources/css/app.css        // Main CSS file
├── resources/views/             // Blade templates
└── npm run build && npm run copy  // Build process
```

### 4. No Traditional Controllers/Routes/Services/Livewire
```php
// ❌ DON'T create these
class UserController extends Controller {} // DON'T DO THIS
Route::resource('users', UserController::class); // DON'T DO THIS  
class UserService {} // DON'T DO THIS
<livewire:user-form /> // DON'T DO THIS

// ✅ USE Filament Resources + Filament Widgets + Actions
class UserResource extends XotBaseResource {} // Admin
class UserFormWidget extends XotBaseWidget {} // Forms everywhere
class CreateUserAction {} // Business logic (prefer Spatie Laravel Queueable Actions)
```

### 5. Module BaseModel Pattern
```php
// ✅ Each module has BaseModel extending XotBaseModel
class BaseModel extends XotBaseModel {} // In each module

// ✅ Models extend module's BaseModel
class User extends BaseModel {} // NOT XotBaseModel directly
```

### 6. Documentation and File Naming
```bash
# ✅ CORRECT - All lowercase (except README.md)
docs/
├── coding-standards.md
├── architecture-patterns.md
├── user-module.md
└── README.md

# ❌ WRONG - Mixed case or uppercase
docs/
├── CODING_STANDARDS.md    # DON'T DO THIS
├── ArchitecturePatterns.md # DON'T DO THIS
└── UserModule.md          # DON'T DO THIS
```

### 7. Frontend Development Rules
```php
// ✅ Use Filament Widgets in Blade (NOT Livewire components)
@livewire(\Modules\ModuleName\Filament\Widgets\WidgetName::class)

// ❌ DON'T create custom Livewire components
<livewire:custom-component />  // DON'T DO THIS

// ✅ CSS modifications go in Themes/One/resources/css/
// ✅ Run npm run build && npm run copy after CSS changes
```

### 8. Documentation Management (MANDATORY)
```bash
# ✅ ALWAYS FIRST - Study and update docs
# docs/ folders = system memory
find ./Modules/ModuleName/docs -name "*.md"  # Module-specific docs
find ./docs -name "*.md"                     # Project-wide docs

# ✅ Apply DRY + KISS principles when updating
# - Remove duplicate content
# - Keep explanations simple and clear
# - Create bidirectional links between related docs
# - Refactor regularly to maintain quality

# ❌ NEVER make changes without updating docs
# ❌ NEVER create duplicate documentation
```

## 🛠 Technology Stack

### Core Framework
- **Laravel 12.25.0** with PHP 8.3.20
- **Modular Architecture** using nwidart/laravel-modules

### Frontend Stack  
- **Livewire 3.6.4** for reactive interfaces
- **Volt 1.7.2** for single-file components
- **Flux UI Free 2.2.4** for UI components
- **Filament 3** for admin interfaces

### Development Tools
- **Pest 3.8.3** for testing
- **PHPStan 3.6.0** (Larastan) for static analysis
- **Laravel Pint 1.24.0** for code formatting

### Special Features
- **Laravel Folio 1.1.10** for file-based routing
- **Laravel Pennant 1.18.2** for feature flags
- **LimeSurvey Integration** with dynamic models
- **Multi-language Support** (IT/EN)

## 📋 Quick Reference

### Documentation Workflow (ALWAYS FIRST)
```bash
# 1. BEFORE any changes - Study existing docs
find . -name "docs" -type d | head -5  # Find docs folders
find ./docs -name "*.md" | head -10    # Find relevant docs

# 2. AFTER changes - Update docs (DRY + KISS principles)
# - Update module docs (closest to code)
# - Update root docs (project-wide impact)
# - Create bidirectional links
# - Refactor duplicate content
```

### File Creation Commands
```bash
# Backoffice (Admin) - Filament
php artisan make:filament-resource User --generate --no-interaction
php artisan make:filament-page Settings --type=custom
php artisan make:filament-widget UserStats --stats-overview

# Frontoffice (Public) - Folio + Volt  
php artisan folio:page products
php artisan make:volt products/create --test --pest

# Business Logic - Actions (not Services)
php artisan make:action CreateUserAction
php artisan make:action ProcessOrderAction --queued

# Models (extend module BaseModel)
php artisan make:model User --factory --migration
```

### Quality Assurance
```bash
# Before committing
vendor/bin/pint --dirty              # Format code
vendor/bin/phpstan analyse           # Static analysis  
php artisan test --filter=relevant  # Run tests
```

### Module Development
```bash
# Create new module
php artisan module:make ModuleName

# Module-specific commands
php artisan module:make-model User ModuleName
php artisan module:make-controller UserController ModuleName
```

## 🔍 Common Patterns

### Routing Patterns
```php
// ✅ Backoffice: Filament Resources (auto-routing)
class UserResource extends XotBaseResource
{
    protected static ?string $model = User::class;
    // Auto-generates: /admin/users, /admin/users/create, etc.
}

// ✅ Frontoffice: Folio Pages (file-based routing)
// resources/views/folio/products.blade.php → /products
// resources/views/folio/products/[id].blade.php → /products/{id}
```

### Configuration and Theme System
```php
// ✅ Environment-based Configuration
APP_URL=http://quaeris.local  // Determines active configuration

// ✅ Configuration Structure
laravel/config/local/quaeris/     // Active config for quaeris.local
├── xra.php                      // Theme and module settings
│   ├── 'pub_theme' => 'One'     // Active frontend theme
│   └── 'main_module' => 'Quaeris'
├── filesystems.php              // Storage configuration
├── auth.php                     // Authentication settings
└── other config files...

// ✅ Theme Location and Build
laravel/Themes/One/              // Frontend theme directory
├── resources/css/app.css        // Main CSS file
├── resources/views/             // Blade templates
├── package.json                 // Build scripts
└── npm run build && npm run copy  // Build process
```

### Frontend Development Rules
```php
// ✅ Use Filament Widgets in Blade (NOT Livewire components)
@livewire(\Modules\ModuleName\Filament\Widgets\WidgetName::class)

// ❌ DON'T create custom Livewire components
<livewire:custom-component />  // DON'T DO THIS

// ✅ CSS modifications go in Themes/One/resources/css/
// ✅ Run npm run build && npm run copy after CSS changes
```

### Business Logic Pattern
```php
// ✅ Prefer Spatie Laravel Queueable Actions over Services
use Spatie\QueueableAction\QueueableAction;

class CreateUserAction
{
    use QueueableAction;
    
    public function execute(UserData $data): User
    {
        // Business logic here
    }
}

// ❌ DON'T create traditional Service classes
class UserService {} // DON'T DO THIS - use Actions instead
```

### Model Pattern
```php
// ✅ Module BaseModel
abstract class BaseModel extends XotBaseModel
{
    use HasFactory;
    use RelationX;
    // Module-specific functionality
}

// ✅ Concrete Model
class User extends BaseModel
{
    // Model implementation
}
```

### Filament Widgets in Frontend Pattern
```php
<?php
// File: Modules/Product/Filament/Widgets/ProductFormWidget.php
class ProductFormWidget extends XotBaseWidget implements HasForms
{
    use InteractsWithForms;
    
    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->required(),
        ]);
    }
    
    public function create(): void
    {
        app(CreateProductAction::class)->execute($this->data);
    }
}

{{-- In Folio page --}}
@livewire(\Modules\Product\Filament\Widgets\ProductFormWidget::class)
```

## ⚙️ Environment Setup

### Required Tools
- PHP 8.3.20 with required extensions
- Composer for PHP dependencies
- Node.js for frontend assets
- MySQL for database
- Git for version control

### Development Workflow
1. Create feature branch
2. Use Artisan commands for file creation
3. Follow XotBase patterns
4. Write Pest tests
5. Run quality checks
6. Create pull request

## 📚 Learning Resources

### Essential Reading Order
1. Start with **[Project Overview](./project-overview.md)** for context
2. Read **[XotBase Patterns](./xot-base-patterns.md)** - this is crucial
3. Review **[Architecture Patterns](./architecture-patterns.md)** for structure
4. Follow **[Coding Standards](./coding-standards.md)** for implementation

### Module-Specific Documentation
Each module contains extensive documentation in the `docs/` directory with architecture decisions, implementation guides, and multilingual documentation.

---

> ⚠️ **Important**: Always consult these guidelines before making code changes. The XotBase pattern is fundamental to this project's architecture and must be followed consistently.