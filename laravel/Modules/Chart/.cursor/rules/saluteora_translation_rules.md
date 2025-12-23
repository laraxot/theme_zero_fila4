# SaluteOra Translation Rules - Critical Guidelines

## Dynamic Translation Key Pattern
When widgets use `transClass($this->model, 'widgets.{widget_name}.heading')`, the generated keys follow this pattern:
- `saluteora::{model_lowercase}.widgets.{widget_name}.{key}`
- **Example**: `transClass(Appointment::class, 'widgets.states_chart.heading')` → `saluteora::appointment.widgets.states_chart.heading`

## Complete State Translation Requirements
For ANY model with states, ALWAYS include ALL three states:
```php
'{model}' => [
    'active' => [
        'label' => 'Attivo',
        'description' => '...',
        'tooltip' => '...',
    ],
    'integration_requested' => [
        'label' => 'Integrazione richiesta',
        'description' => '...',
        'tooltip' => '...',
    ],
    'integration_completed' => [
        'label' => 'Integrazione completata',
        'description' => '...',
        'tooltip' => '...',
    ],
],
```

## Multi-Language Translation Files
ALWAYS update ALL three language files simultaneously:
- `laravel/Modules/SaluteOra/lang/it/{file}.php`
- `laravel/Modules/SaluteOra/lang/en/{file}.php`
- `laravel/Modules/SaluteOra/lang/de/{file}.php`

## Widget Translation Structure
Widget translations MUST include all required keys:
```php
'{widget_name}' => [
    'heading' => '...',
    'title' => '...',
    'label' => '...',
    'description' => '...',
],
```

## Critical Files to Check
When adding translations, ALWAYS check:
1. `laravel/Modules/SaluteOra/lang/{locale}/widgets.php`
2. `laravel/Modules/SaluteOra/lang/{locale}/states.php`
3. `laravel/Themes/One/lang/{locale}/` (for theme-specific translations)

## Common Missing Translation Patterns
- `saluteora::{model}.widgets.{widget_name}.heading`
- `saluteora::{model}.states.{state_name}.label`
- `saluteora::{model}.states.{state_name}.description`
- `saluteora::{model}.states.{state_name}.tooltip`

## Translation Audit Checklist
- [ ] Check ALL possible models that can use each widget
- [ ] Verify ALL states for each model (active, integration_requested, integration_completed)
- [ ] Add translations in ALL three languages (it, en, de)
- [ ] Follow exact nesting structure used by transClass()
- [ ] Include all required keys (heading, title, label, description)
- [ ] Test with actual widget usage

## Key Learning from This Session
**NEVER assume a widget is only used by one model - check ALL possible models and add translations for each combination.**

*Last updated: 2025-01-06* 