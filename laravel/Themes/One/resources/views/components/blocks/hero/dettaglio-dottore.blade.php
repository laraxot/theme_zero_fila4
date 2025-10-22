@props([
    'title' => 'Titolo Hero',
    'subtitle' => 'Sottotitolo della hero section',
    'image' => null,
    'cta_text' => null,
    'cta_link' => '#',
    'background_color' => 'bg-white',
    'text_color' => 'text-slate-900',
    'cta_color' => 'bg-primary-600 hover:bg-primary-700',
    '[widget]'
])


<section 
    class="flex items-start relative overflow-hidden">
    <div class="w-full px-4 sm:px-6 lg:px-8 pt-12">
        <div>
            <div class="w-full flex flex-col-reverse lg:flex-row justify-evenly gap-8">
                <div class="flex justify-center">
                    <div class="h-full flex flex-col items-start justify-center">
                    <h1
                        class="text-[#272C4D] text-4xl tracking-tight font-extrabold sm:text-5xl lg:text-5xl text-center">
                        {{ $title }}
                    </h1>
                    <span class="text-lg mt-4 text-center lg:text-left">@lang('pub_theme::doctor.hero.description')</span>
                    </div>

                </div>
             
                <div class="flex justify-center">
                    <img class="w-44 lg:w-64" src="/img/dentist.png"/>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CALENDAR MONTH --}}
<div class="flex flex-col-reverse lg:flex-row justify-center items-center p-1 lg:p-12">

<div class="w-full lg:w-2/4">
    {{--  
    <x-dynamic-component :component="$widget"/>
    --}}
    <div>
      @livewire($widget, ['calendarContainerClass' => 'bg-black p-4 rounded-lg'])
    </div>
</div>

<div class="flex">
     <div class="flex flex-col justify-center p-6 lg:p-12">
      <div class="w-full">
      <div class="overflow-hidden rounded-lg bg-white shadow mt-5 lg:m-5">
        
                      <a href="{{ route('pages.view', ['slug' => 'appuntamenti-entrata']) }}">
                    <div class="px-4 py-5 sm:p-6 flex flex-row">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#272C4D" class="size-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9 3.75H6.912a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859M12 3v8.25m0 0-3-3m3 3 3-3" />
                    </svg>
                    <span class="ml-2 text-[#272C4D]">@lang('pub_theme::doctor.actions.incoming_appointments.label')</span>
                    </div>
                    </a>
                    </div>
         <div class="overflow-hidden rounded-lg bg-white shadow mt-5 lg:m-5">
          
          <a href="{{ route('pages.view', ['slug' => 'appuntamenti-accettati']) }}">
          <div class="bg-[#272C4D] px-4 py-5 sm:p-6 flex flex-row">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                </svg>
                   <span class="ml-2 text-white">@lang('pub_theme::doctor.actions.accepted_appointments.label')</span>
               </div>
          </a>
          </div>
          <div class="overflow-hidden rounded-lg bg-white shadow mt-5 lg:m-5">
            
              <a href="{{ route('pages.view', ['slug' => 'appuntamenti-rifiutati']) }}">  
            <div class="bg-[#F38B8B] px-4 py-5 sm:p-6 flex flex-row">
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#BF0303" class="size-6">
               <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
              </svg>
              <span class="ml-2 text-[#BF0303]">@lang('pub_theme::doctor.actions.rejected_appointments.label')</span>
             </div>
            </a>
          </div>
          <div class="overflow-hidden rounded-lg bg-white shadow mt-5 lg:m-5">
            
            <a href="{{ route('pages.view', ['slug' => 'appuntamenti-conclusi']) }}">
            <div class="bg-[#B4E1BE] px-4 py-5 sm:p-6 flex flex-row">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#3E783E" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
            </svg>
              <span class="ml-2 text-[#3E783E]">@lang('pub_theme::doctor.actions.completed_appointments.label')</span>
             </div>
            </a>
          </div>
      </div>
     </div>
    </div>
</div>


