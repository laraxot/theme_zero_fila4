---
trigger: always_on
description: 
globs: 
---
# FindDoctorAndAppointmentWidget Rules

## Architecture Rules
1. Use correct namespace: `Modules\<nome progetto>\Filament\Widgets\Patient`
2. Extend `XotBaseWidget` from `Modules\Xot\Filament\Widgets`
3. Use module's translation files in `Modules/<nome progetto>/lang/<language>`
4. Never use `->label()` directly, use translation files
5. Separate wizard steps into distinct functions for clean code

## Form Structure Rules
1. Use hierarchical Select components for location:
   - Region -> Province -> City -> CAP
2. Implement proper field dependencies
3. Use `live()` for real-time updates
4. Clear dependent fields when parent changes
5. Show/hide fields based on parent selection

## Code Quality Rules
1. Add `declare(strict_types=1);` at file start
2. Use proper type hints
3. Follow PSR-12 coding standards
4. Document all public methods
5. Handle errors gracefully

## UI/UX Rules
1. Follow design patterns from documentation
2. Implement proper loading states
3. Show clear feedback messages
4. Maintain consistent styling
5. Ensure responsive design

## Testing Rules
1. Test all field dependencies
2. Verify translations
3. Check error handling
4. Test responsive behavior
5. Validate form submission
