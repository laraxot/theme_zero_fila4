<div class="text-sm text-gray-700 space-y-2">
    <p><strong>@lang('pub_theme::appointment.fields.name.label'):</strong> {{ $appointment->patient?->full_name }}</p>
    <p><strong>@lang('pub_theme::appointment.fields.date.label'):</strong> {{ $appointment->starts_at?->format('d F Y') }}</p>
    <p><strong>@lang('pub_theme::appointment.fields.time.label'):</strong> {{ $appointment->time_range }}</p>
    @if($appointment->patient?->phone)
        <p><strong>@lang('pub_theme::appointment.fields.phone.label'):</strong> {{ $appointment->patient?->phone }}</p>
    @endif
    @if($appointment->patient?->email)
        <p><strong>@lang('pub_theme::appointment.fields.email.label'):</strong> {{ $appointment->patient?->email }}</p>
    @endif
    @if($appointment->notes)
        <p><strong>@lang('pub_theme::appointment.fields.notes.label'):</strong> {{ $appointment->notes }}</p>
    @endif
    @if($appointment->state)
        <p><strong>@lang('pub_theme::appointment.fields.notes.label'):</strong> <x-filament::badge color="{{ $appointment->state->color() }}">{{ $appointment->state->label() }}</x-filament::badge></p>
    @endif
</div>
    
