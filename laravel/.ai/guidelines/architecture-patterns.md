# Architecture Patterns

## Modular Architecture Guidelines

### Module Structure
Each module follows a consistent Laravel package structure:

```
Modules/[ModuleName]/
├── app/
│   ├── Models/          # Eloquent models
│   ├── Providers/       # Service providers
│   ├── Filament/        # Filament resources, pages, widgets
│   ├── Actions/         # Single-purpose action classes
│   ├── Services/        # Business logic services
│   └── Http/           # Controllers and middleware
├── config/             # Module-specific configuration
├── database/           # Migrations, seeders, factories
├── resources/          # Views, assets, translations
├── routes/             # Web and API routes
├── tests/              # Pest tests
├── docs/               # Module documentation
└── composer.json       # Module dependencies
```

### Service Provider Pattern
Each module has providers for:
- **ModuleServiceProvider**: Main module registration (extends `Modules\Xot\Providers\XotBaseServiceProvider`)
- **RouteServiceProvider**: Route registration (extends `Modules\Xot\Providers\XotBaseRouteServiceProvider`)
- **EventServiceProvider**: Event listeners
- **Filament/AdminPanelProvider**: Filament resources

### Model Patterns

#### Base Models
- Use `XotBaseModel` classes for shared functionality
- Implement strict typing: `declare(strict_types=1);`
- Use PHP 8 constructor property promotion
- Follow Laravel 12 casts pattern (method over property)
- Never extend `Illuminate\Database\Eloquent\Model` directly

#### Dynamic Models (LimeSurvey)
- Dynamic model generation for survey responses
- Naming pattern: `LimeSurvey[ID]`, `LimeTokens[ID]`
- Database table mapping for external LimeSurvey data

### Filament Integration

#### Resources Structure
```
Modules/[Module]/Filament/Resources/
├── [EntityName]Resource.php (extends `Modules\Xot\Filament\Resources\XotBaseResource`)
├── [EntityName]Resource/
│   ├── Pages/
│   │   ├── List[EntityName].php (extends `Modules\Xot\Filament\Resources\Pages\XotBaseListRecords`)
│   │   ├── Create[EntityName].php (extends `Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord`)
│   │   └── Edit[EntityName].php (extends `Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord`)
│   └── RelationManagers/ (extends `Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager`)
```

#### Widget Pattern
- Dashboard widgets in `Modules/[Module]/Filament/Widgets/` (extend `Modules\Xot\Filament\Widgets\XotBaseWidget` classes)
- Page-specific widgets embedded in resources
- Translation-aware widget labels
- Never extend Filament base classes directly
- Available XotBase widget classes: XotBaseStatsOverviewWidget, XotBaseChartWidget, XotBaseTableWidget

### Frontend Architecture

#### Livewire/Volt Integration
- Single-file components using Volt
- Class-based components for complex logic
- Functional API for simple interactions
- Wire directives for reactivity

#### Flux UI Components
- Use Flux components when available
- Fallback to standard Blade components
- Consistent component naming

### Database Architecture

#### Migration Patterns
- Module-specific migrations
- Cross-module relationships handled carefully
- LimeSurvey integration via external database connections

#### Multi-tenancy
- Tenant-aware models and scoping
- Separate configurations per tenant
- Database connection management

### Testing Architecture

#### Pest Testing Structure
```
tests/
├── Feature/           # Integration tests
├── Unit/             # Unit tests
└── Pest.php         # Test configuration
```

#### Testing Patterns
- Feature tests for user workflows
- Unit tests for business logic
- Filament component testing
- Database factories for test data

### Asset Management

#### Build Tools
- Vite for module asset compilation
- PostCSS and Tailwind CSS
- Module-specific build configurations
- Shared design system

### Quality Assurance

#### Code Quality Tools
- PHPStan for static analysis
- Laravel Pint for code formatting
- Pest for testing
- Rector for automated refactoring

#### Documentation Standards
- Module-specific documentation
- Bilingual documentation (IT/EN)
- Architecture decision records
- API documentation