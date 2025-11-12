<div class="w-full lg:w-2/4 flex items-center p-9">
    <div class="w-full lg:w-2/4 bg-white rounded-lg shadow-2xl">
        <div class="p-5">
            <h4 class="mb-5 font-semibold">@lang('pub_theme::txt.appointment.title')</h4>

            <div class="flex flex-row items-center mb-2">
                <span class="mr-2 font-medium">@lang('pub_theme::txt.appointment.data')</span>
                <p>{{ $appointment->starts_at->format('d/m/Y') }} </p>
            </div>
            <div class="flex flex-row items-center mb-2">
                <span class="mr-2 font-medium">@lang('pub_theme::txt.appointment.time')</span>
                <p>10:00 - 11:00</p>
            </div>
            <div class="flex flex-row items-center mb-2">
                <span class="mr-2 font-medium">@lang('pub_theme::txt.appointment.studio')</span>
                <p>{{ $appointment->studio->name }}</p>
            </div>
            <div class="flex flex-row items-center mb-2">
                <span class="mr-2 font-medium">@lang('pub_theme::txt.appointment.studio_address')</span>
                <p>{{ $appointment->studio->full_address }}</p>
            </div>
            <div class="flex flex-row items-center mb-2">
                <span class="mr-2 font-medium">@lang('pub_theme::txt.appointment.phone')</span>
                <p>{{ $appointment->studio->phone }}</p>
            </div>
            <div class="flex flex-row items-center">
                <span class="mr-2 font-medium">@lang('pub_theme::txt.appointment.email')</span>
                <p>{{ $appointment->studio->email }}</p>
            </div>
        </div>
    </div>
</div>



<!-- <div class="ml-5">
<div class="flex flex-col justify-center">
   <h3 class="text-[#FF5F7E]">
       Il tuo referto è pronto!
   </h3>

   <div class="relative w-64 h-48 mt-5 rounded-[25px] bg-[#E6EBF7] shadow-2xl overflow-hidden">
       <img src="/img/referto.svg" class="w-full h-full" />

       <button class="flex items-center justify-between absolute bottom-0 left-0 w-full bg-[#E6EBF7B3] text-[#272C4D] px-3 text-center text-xl font-extrabold py-5 transition-all duration-300 ease-in-out hover:py-9">
           Scarica referto!
           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
               <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
           </svg>
       </button>
   </div>
</div>
</div> -->