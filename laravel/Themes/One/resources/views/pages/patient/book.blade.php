<?php

declare(strict_types=1);
use Modules\User\Http\Middleware\EnsureUserHasType;
use function Laravel\Folio\{middleware, name};
use function Livewire\Volt\{state, rules};

middleware(['auth',EnsureUserHasType::class.':patient']);
name('patient.book');



?>
{{--
    Questa pagina include direttamente il widget Filament modularizzato per la prenotazione paziente.
    Policy: nessun form custom, solo widget Filament.
    Vedi docs/roadmap_frontoffice/30-patient-book.md e docs/rules/filament_best_practices.md
--}}

{{-- Template standard per l'integrazione dei widget --}}
<x-layouts.app>
<div>
    @volt('patient.book')
    <div class="w-full min-h-[600px] lg:min-h-[725px] flex flex-col items-center">
        <h1 class="m-5">Prenota la tua visita</h1>
        <div class="w-full lg:w-2/4 p-5">
            @livewire(\Modules\SaluteOra\Filament\Widgets\Patient\FindDoctorAndAppointmentWidget::class)
        </div>
    </div>
    @endvolt
</div>
</x-layouts.app>

