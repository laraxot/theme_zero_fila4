# Filament Dashboard Filters Debug Rule

## Critical Issue Pattern
When widgets with `InteractsWithPageFilters` trait can't access filters despite correct architecture, ALWAYS check if Blade views are commented out.

## Debug Checklist
1. **Widget has correct trait**: `use InteractsWithPageFilters;`
2. **Dashboard has correct trait**: `use HasFiltersForm;`
3. **Filters are defined**: `getFiltersFormSchema()` method exists
4. **Blade views are active**: Check if dashboard views are commented out

## Critical Files to Check
- `laravel/Modules/Xot/resources/views/filament/pages/dashboard.blade.php`
- `laravel/Modules/Xot/app/Resources/views/filament/pages/dashboard.blade.php`

## Solution Pattern
Decomment the dashboard views to enable filter passing:

```blade
<x-filament-panels::page class="fi-dashboard-page">
    @if (method_exists($this, 'filtersForm'))
        {{ $this->filtersForm }}
    @endif

    <x-filament-widgets::widgets 
        :columns="$this->getColumns()" 
        :data="[...property_exists($this, 'filters') ? ['filters' => $this->filters] : [], ...$this->getWidgetData()]" 
        :widgets="$this->getVisibleWidgets()" 
    />
</x-filament-panels::page>
```

## Widget Debug Pattern
```php
protected function getData(): array
{
    // Debug filters availability
    $filters = $this->filters;
    $getFilters = $this->getFilters();
    
    // Use filters in query
    $query = Model::query();
    if ($filters && isset($filters['date_range'])) {
        $query->whereBetween('created_at', $filters['date_range']);
    }
    
    return $query->get()->toArray();
}
```

## Architecture Flow
Dashboard → Blade View → Widget Data → Filter Access

## Key Learning
**Blade views being commented out is a common cause of filter access issues, even with correct traits and architecture.**

*Last updated: 2025-01-06* 