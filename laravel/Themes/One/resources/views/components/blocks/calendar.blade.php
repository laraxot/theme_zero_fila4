{{-- Componente Calendar Minimalista per SaluteOra --}}
@props([
    'type' => 'patient', // patient|doctor|admin
])

<div class="calendar-container">
    @livewire(\Modules\UI\Filament\Widgets\UserCalendarWidget::class, ['type' => $type])
</div>
