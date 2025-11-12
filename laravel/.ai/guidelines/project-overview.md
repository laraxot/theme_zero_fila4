# Project Overview - Quaeris Fila3 Mono

## Architecture
This is a modular Laravel 12 application with a complex multi-module architecture. The project follows a sophisticated modular pattern with independent modules in the `Modules/` directory.

## Key Characteristics

### Modular Architecture
- **Base Application**: Core Laravel 12 application in the root
- **Modules System**: Independent modules in `Modules/` directory using nwidart/laravel-modules
- **Module Structure**: Each module has its own:
  - `app/` directory with Models, Controllers, Providers
  - `config/` files
  - `database/` migrations and seeders
  - `resources/` views and assets
  - `routes/` API and web routes
  - `tests/` with Pest testing framework
  - Independent `composer.json`, `package.json`, build tools

### Technology Stack
- **Backend**: Laravel 12.25.0, PHP 8.3.20
- **Frontend**: Livewire 3.6.4, Volt 1.7.2, Flux UI Free 2.2.4
- **Admin Panel**: Filament 3
- **Routing**: Laravel Folio 1.1.10 for file-based routing
- **Database**: MySQL with extensive LimeSurvey integration
- **Testing**: Pest 3.8.3
- **Code Quality**: PHPStan 3.6.0 (Larastan), Laravel Pint 1.24.0
- **Features**: Pennant 1.18.2 for feature flags

### Key Modules
1. **Activity** - Event sourcing and activity tracking
2. **Chart** - Data visualization and charting
3. **CloudStorage** - Google Drive integration
4. **Cms** - Content management system
5. **Gdpr** - GDPR compliance
6. **Geo** - Geographic/location services
7. **Job** - Queue and job management
8. **Lang** - Multi-language support
9. **Limesurvey** - Extensive survey system integration
10. **Media** - File and media management
11. **Notify** - Notification system
12. **Quaeris** - Core business logic
13. **Setting** - Application settings and configuration
14. **Tenant** - Multi-tenancy support
15. **UI** - User interface components
16. **User** - User management and authentication
17. **Xot** - Core framework extensions

### Special Features
- **Multi-language Support**: Comprehensive i18n with Italian and English
- **Survey Integration**: Deep LimeSurvey integration with dynamic model generation
- **File-based Routing**: Folio for page-based routing
- **Component System**: Volt single-file components
- **Extensive Documentation**: Each module has comprehensive docs in multiple languages
- **Quality Tools**: PHPStan level analysis, Pint formatting, Pest testing

## Development Patterns
- Follows Laravel 12 conventions (no Kernel.php, streamlined structure)
- Uses PHP 8.3 features (constructor property promotion, strict typing)
- **NEVER extends Filament base classes directly** - always use XotBase classes
- Extensive use of Filament for admin interfaces through XotBase wrappers
- Livewire/Volt for reactive interfaces
- Comprehensive testing with Pest
- Modular service providers (extend XotBaseServiceProvider)
- Git subtree management for modules
- All models extend XotBaseModel, never Illuminate\Database\Eloquent\Model directly