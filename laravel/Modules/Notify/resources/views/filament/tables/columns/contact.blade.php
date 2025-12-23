<?php

declare(strict_types=1);

?>
@php
    $record = $getRecord();
@endphp

<div class="flex flex-col space-y-1">
    {{-- Nome completo --}}
    @foreach($contact_types as $contact_type)
    @php
    $contact_value = $record->{$contact_type->value};
    @endphp
    @if($contact_value)
    <div class="flex items-center space-x-2">
        <x-filament::icon
        :icon="$contact_type->getIcon()"
        :label="$contact_type->getLabel()"
        :color="$contact_type->getColor()"
        class="w-4 h-4 flex-shrink-0"
    />
    <span class="text-sm font-medium">{{ $contact_value }}</span>
    </div>    
    @endif    
    @endforeach

</div>
