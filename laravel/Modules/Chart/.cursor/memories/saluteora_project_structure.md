# SaluteOra Project Structure - Key Learnings

## Project Root Structure
- **Root**: `/var/www/html/_bases/base_saluteora/`
- **Laravel**: `/var/www/html/_bases/base_saluteora/laravel/`
- **Modules**: `/var/www/html/_bases/base_saluteora/laravel/Modules/`
- **Themes**: `/var/www/html/_bases/base_saluteora/laravel/Themes/One/`

## Key Modules Identified
- **SaluteOra**: Main module with models (Patient, Doctor, Appointment)
- **SaluteMo**: Dashboard and main application logic
- **User**: User management and authentication
- **Xot**: Base framework module with common functionality

## Translation Structure
- **Module Translations**: `laravel/Modules/SaluteOra/lang/{locale}/`
- **Theme Translations**: `laravel/Themes/One/lang/{locale}/`
- **Languages**: Italian (it), English (en), German (de)

## Critical Translation Files
- `widgets.php`: Widget translations for charts and components
- `states.php`: State translations for models (active, integration_requested, integration_completed)

## Widget Architecture
- **Base Widget**: `XotBaseChartWidget` with `InteractsWithPageFilters`
- **Dynamic Keys**: `transClass($this->model, 'widgets.{widget_name}.heading')`
- **Supported Models**: Patient, Doctor, Appointment, User

## Dashboard Architecture
- **Base Dashboard**: `XotBaseDashboard` with `HasFiltersForm`
- **Filter Flow**: Dashboard → Blade View → Widget Data
- **Critical Views**: 
  - `laravel/Modules/Xot/resources/views/filament/pages/dashboard.blade.php`
  - `laravel/Modules/Xot/app/Resources/views/filament/pages/dashboard.blade.php`

## State Management
- **Patient States**: active, integration_requested, integration_completed
- **Doctor States**: active, integration_requested, integration_completed
- **User States**: pending, active, inactive, rejected

## Common Issues and Solutions
1. **Missing Translations**: Check ALL possible models for widgets
2. **Filter Access**: Ensure Blade views are not commented out
3. **Multi-language**: Always add translations in all three languages
4. **State Completeness**: Add ALL states, not just some

## Development Workflow
1. Identify missing translation keys from error logs
2. Check which model is using the widget (`$this->model`)
3. Add translations in ALL three languages
4. Test with actual widget usage
5. Document fixes in module docs

*Last updated: 2025-01-06* 