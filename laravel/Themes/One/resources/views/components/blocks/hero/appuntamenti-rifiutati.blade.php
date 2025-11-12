<?php
use Livewire\Volt\Component;

$user=auth()->user();
?>

<div>
    
    <!-- Back button -->
    <div class="w-full flex justify-start">
        {{-- DA AGGIORNARE URL --}}
        <a href="{{ route('home') }}">
            <div class="cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="size-9">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                </svg>
            </div>
        </a>
    </div>

    <!-- Page title -->
    <div class="p-10">
        <div class="w-full flex justify-center">
            <h1 class="text-center">@lang('pub_theme::appointment.hero.rejected_appointments.title')</h1>
        </div>
    </div>
    
      <div>
    @livewire(\Modules\SaluteOra\Filament\Widgets\DoctorAppointmentsWidget::class, ['doctor_id' => $user->id,'states' => ['rejected', 'annulled','cancelled','banned']])
    </div>
    
</div>
