<?php

declare(strict_types=1);
use Modules\User\Http\Middleware\EnsureUserHasType;
use function Laravel\Folio\{middleware, name};
use function Livewire\Volt\{state, rules};

//middleware(['auth',EnsureUserHasType::class.':patient']);
name('patient.referto');



?>
{{--
    Questa pagina include direttamente il widget Filament modularizzato per la prenotazione paziente.
    Policy: nessun form custom, solo widget Filament.
    Vedi docs/roadmap_frontoffice/30-patient-book.md e docs/rules/filament_best_practices.md
--}}

{{-- Template standard per l'integrazione dei widget --}}
<x-layouts.app>
    @volt('patient.referto')
    <div>
        <livewire:bolt.fill-form slug="referto" inline="true" />
    </div>
    @endvolt
</x-layouts.app>