@props([
    'title' => 'Titolo Hero',
    'subtitle' => 'Sottotitolo della hero section',
    'image' => null,
    'cta_text' => null,
    'cta_link' => '#',
    'background_color' => 'bg-white',
    'text_color' => 'text-slate-900',
    'cta_color' => 'bg-primary-600 hover:bg-primary-700'
])

@php
    $appointments=$user->appointments;
@endphp
      
<section class="flex items-start relative overflow-hidden">
  <div class="w-full px-4 sm:px-6 lg:px-8 pt-12">
    <div class="flex flex-col items-center justify-center gap-8 lg:flex-row lg:justify-evenly">
      <div class="flex flex-col text-center lg:items-start lg:text-left">
        <h1 class="text-[#272C4D] text-4xl tracking-tight font-extrabold sm:text-5xl lg:text-5xl">
          @lang('pub_theme::common.welcome.label'), {{ $user?->full_name }}
        </h1>
        <!-- <span class="text-lg mt-4">Qui puoi trovare i dettagli del tuo appuntamento</span> -->
      </div>
      <div class="relative w-60 h-60 rounded-full bg-[#E6EBF7] shadow-lg overflow-hidden">
        <img
          src="/img/donna-area-paziente.svg"
          alt="Paziente"
          class="w-full h-full object-contain"
        />
      </div>

    </div>
  </div>
</section>
@each('pub_theme::appointment.item', $appointments, 'appointment','pub_theme::appointment.empty')
@if($user->canBook())
@include('pub_theme::appointment.book')
@endif
{{-- AREA PERSONALE PAZIENTE --}}
<!-- <section 
    class="flex items-start bg-[#E6EBF7] relative overflow-hidden">
    <div class="w-full px-4 sm:px-6 lg:px-8 pt-12">
        <div>
            <div class="w-full flex flex-col-reverse lg:flex-row justify-evenly gap-8">
                <div class="flex justify-center">
                    <div class="h-full flex flex-col items-start justify-center">
                    <h1
                        class="text-[#272C4D] text-4xl tracking-tight font-extrabold sm:text-5xl lg:text-5xl text-center">
                        {{ $title }}
                    </h1>
                    <span class="text-lg mt-4 text-center lg:text-left">Qui puoi trovare i dettagli del tuo appuntamento</span>
                    </div>

                </div>
             
                <div class="flex justify-center">
                    <img class="w-32 lg:w-44" src="/img/donna-area-paziente.svg"/>
                </div>
            </div>
        </div>
    </div>
</section> -->



 
</div>


