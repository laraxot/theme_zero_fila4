---
trigger: always_on
description: Rules for integrating and using the FullCalendar component in Laraxot/<nome progetto> applications
globs: ["**/Filament/Widgets/*Calendar*.php", "**/docs/**/full_calendar.md", "**/Models/**/Event.php", "**/Models/*Calendar*.php"]
---

# FullCalendar Integration Rules in Laraxot/<nome progetto>

> **NOTE**: This document is the official reference for integrating Saade's FullCalendar component for Filament in Laraxot <nome progetto> projects. Follow these guidelines strictly.

## Core Principles

- **Base Component Extension**: ALWAYS extend the `BaseCalendarWidget` from the UI module
- **Complete Type Safety**: ALWAYS use explicit return types and parameters with complete PHPDoc
- **Translations**: NEVER hardcode text, ALWAYS use translation files with complete structure
- **Documentation**: Maintain bidirectional documentation between UI and specific modules
- **PHPStan**: All code must pass static analysis at level 9+
- **Naming Convention**: All class names and attributes MUST be in English

## Correct Structure

```php
<?php

declare(strict_types=1);

namespace Modules\{ModuleName}\Filament\Widgets;

use Modules\UI\Filament\Widgets\BaseCalendarWidget;

class {ModuleName}CalendarWidget extends BaseCalendarWidget
{
    /**
     * The model for calendar events.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected string $model = {ModuleName}Event::class;
    
    // Specific implementation...
}
```

## Data Model

The event model must:

1. Extend **ONLY** the BaseModel of its own module (NEVER Eloquent\Model directly)
2. Use the `casts()` method for type casting (NEVER the deprecated `$casts` property)
3. Include complete PHPDoc for all properties and relationships
4. Follow naming conventions: `{ModuleName}Event` or `{ModuleName}CalendarEvent`
5. Declare the `$fillable` property as `protected` with `@var list<string>` annotation

```php
<?php

declare(strict_types=1);

namespace Modules\{ModuleName}\Models;

use Carbon\Carbon;
use Modules\{ModuleName}\Models\BaseModel;

/**
 * Model for calendar events.
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property Carbon $start_date
 * @property Carbon $end_date
 * @property string|null $color
 * @property bool $is_all_day
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Event extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'color',
        'is_all_day',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'start_date' => 'datetime',
            'end_date' => 'datetime',
            'is_all_day' => 'boolean',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
```

## Translation Files

Structure translations properly:

```php
// Modules/{ModuleName}/lang/en/calendar.php
return [
    'widget' => [
        'title' => 'Calendar',
    ],
    'fields' => [
        'title' => [
            'label' => 'Title',
            'placeholder' => 'Enter event title',
            'help' => 'Enter a descriptive title for the event',
        ],
        'description' => [
            'label' => 'Description',
            'placeholder' => 'Enter event description',
            'help' => 'Provide details about the event',
        ],
        'start_date' => [
            'label' => 'Start Date',
            'placeholder' => 'Select start date',
            'help' => 'When the event begins',
        ],
        'end_date' => [
            'label' => 'End Date',
            'placeholder' => 'Select end date',
            'help' => 'When the event ends',
        ],
        'color' => [
            'label' => 'Color',
            'placeholder' => 'Select event color',
            'help' => 'Color for visual identification',
        ],
        'is_all_day' => [
            'label' => 'All Day Event',
            'help' => 'Check if this is an all-day event',
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'Create Event',
            'success' => 'Event created successfully',
            'error' => 'Error creating event',
        ],
        'update' => [
            'label' => 'Update Event',
            'success' => 'Event updated successfully',
            'error' => 'Error updating event',
        ],
        'delete' => [
            'label' => 'Delete Event',
            'success' => 'Event deleted successfully',
            'error' => 'Error deleting event',
            'confirmation' => 'Are you sure you want to delete this event?',
        ],
    ],
];
```

## Documentation Structure

Create detailed documentation:

```markdown

# FullCalendar in {ModuleName} Module

## Introduction
Brief overview of the implementation.

## Model Structure
Description of the data model.

## Widget Implementation
Code examples and explanations.

## Usage
How to use the widget.

## Customizations
How to customize the widget.

## Backlinks
Links to related documentation.
```

## Widget Registration

Register the widget in the module's service provider:

```php
<?php

declare(strict_types=1);

namespace Modules\{ModuleName}\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;
use Modules\{ModuleName}\Filament\Widgets\{ModuleName}CalendarWidget;

class {ModuleName}ServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Widget registration
        Filament::registerWidgets([
            {ModuleName}CalendarWidget::class,
        ]);
    }
}
```

## PHPStan Compatibility

Ensure the code respects PHPStan level 9 rules:

- Explicit generic types in relationships (e.g., `HasMany<Event>`)
- Return types in all methods (never implicit `void`)
- Parameter typing (never parameters without type)
- Avoid `mixed` when possible (use only as a last resort)
- Complete PHPDoc for all properties and relationships
- Use `@property-read` for relationships and read-only properties
- Include `declare(strict_types=1);` in every file
- Properly annotate arrays with `list<T>` or `array<K, V>`

## Design System Compliance

- Use standard Filament UI components
- Respect the defined color palette
- Maintain consistency in user interface
- Follow established interaction patterns

## Compliance Checklist

Before completing a FullCalendar integration, verify:

1. Complete and correct typing
2. Translation of all labels and messages in dedicated files
3. Updated bidirectional documentation in both modules
4. PHPStan level 9 compatibility verified from the `laravel` directory
5. Functionality and regression tests implemented
6. Correct migrations (extend XotBaseMigration, no down() method)
7. Complete and properly structured translation files
8. Widget registered in the module's service provider
9. All class names and attributes follow English naming conventions

## Documentation Links

- [UI Component Documentation](../../laravel/Modules/UI/docs/components/full_calendar.md)
- [Ptv Implementation](../../laravel/Modules/Ptv/docs/features/full_calendar.md)
- [Windsurf General Rules](../windsurf/rules/fullcalendar-rules.mdc)
- [Root Documentation](../../docs/full_calendar.md)

*Last updated: June 2025*
