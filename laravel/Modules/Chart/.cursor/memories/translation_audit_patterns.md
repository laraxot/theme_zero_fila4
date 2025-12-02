# Translation Audit Patterns - SaluteOra Project

## Critical Translation Patterns Learned

### 1. Dynamic Translation Keys with transClass()
- **Pattern**: `transClass($this->model, 'widgets.states_chart.heading')`
- **Generated Keys**: 
  - `saluteora::patient.widgets.states_chart.heading` (when model = Patient::class)
  - `saluteora::doctor.widgets.states_chart.heading` (when model = Doctor::class)
  - `saluteora::appointment.widgets.states_chart.heading` (when model = Appointment::class)
- **Rule**: ALWAYS check ALL possible models that can use a widget

### 2. Complete State Translation Structure
- **Required States**: `active`, `integration_requested`, `integration_completed`
- **Structure**: Each state needs `label`, `description`, `tooltip`
- **Models**: `patient`, `doctor`, `user` (and potentially others)
- **Rule**: NEVER add partial states - always add complete set

### 3. Widget Translation Structure
- **Required Keys**: `heading`, `title`, `label`, `description`
- **Nested Structure**: `appointment.widgets.states_chart.heading`
- **Rule**: Follow exact nesting pattern used by transClass()

### 4. Multi-Language Translation Audit
- **Languages**: Italian (it), English (en), German (de)
- **Rule**: ALWAYS add translations in ALL three languages simultaneously
- **Files**: `laravel/Modules/SaluteOra/lang/{locale}/widgets.php` and `states.php`

### 5. Translation Key Generation Logic
- **Base**: `saluteora::` (module namespace)
- **Model**: Extracted from `$this->model` class name (lowercase)
- **Path**: `widgets.{widget_name}.{key}` or `states.{state_name}.{key}`
- **Rule**: Understand the dynamic key generation to predict missing translations

## Common Missing Translation Patterns

### Widget Translations
```
saluteora::{model}.widgets.{widget_name}.heading
saluteora::{model}.widgets.{widget_name}.title
saluteora::{model}.widgets.{widget_name}.label
saluteora::{model}.widgets.{widget_name}.description
```

### State Translations
```
saluteora::{model}.states.{state_name}.label
saluteora::{model}.states.{state_name}.description
saluteora::{model}.states.{state_name}.tooltip
```

## Audit Checklist
- [ ] Check ALL possible models for each widget
- [ ] Verify ALL states for each model (active, integration_requested, integration_completed)
- [ ] Add translations in ALL three languages (it, en, de)
- [ ] Follow exact nesting structure
- [ ] Include all required keys (heading, title, label, description)
- [ ] Test with actual widget usage

## Files to Always Check
- `laravel/Modules/SaluteOra/lang/it/widgets.php`
- `laravel/Modules/SaluteOra/lang/en/widgets.php`
- `laravel/Modules/SaluteOra/lang/de/widgets.php`
- `laravel/Modules/SaluteOra/lang/it/states.php`
- `laravel/Modules/SaluteOra/lang/en/states.php`
- `laravel/Modules/SaluteOra/lang/de/states.php`

*Last updated: 2025-01-06* 