<x-filament::widget>
    <div class="space-y-4 overflow-y-auto">
        @if($this->appointments->isNotEmpty())
            @each('pub_theme::appointment.doctor-item', $this->appointments, 'appointment')
        @else
            <div class="text-center py-12">
                <div class="mx-auto h-12 w-12 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5a2.25 2.25 0 0 1 21 9v7.5m-9-13.5h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008ZM5.25 15h.008v.008H5.25V15Zm0 2.25h.008v.008H5.25v-.008ZM3 15h.008v.008H3V15Zm0 2.25h.008v.008H3v-.008ZM14.25 15h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008ZM16.5 15h.008v.008H16.5V15Zm0 2.25h.008v.008H16.5v-.008ZM18.75 15h.008v.008H18.75V15Zm0 2.25h.008v.008H18.75v-.008ZM21 15h.008v.008H21V15Zm0 2.25h.008v.008H21v-.008Z" />
                    </svg>
                </div>
                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                    {{ __('saluteora::widgets.doctor_appointments.empty.title') }}
                </h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    {{ __('saluteora::widgets.doctor_appointments.empty.description') }}
                </p>
            </div>
        @endif
    </div>
    
    
    
    {{-- ✅ CORRETTO: Modals inclusi dentro l'elemento root --}}
    <x-filament-actions::modals />
</x-filament::widget>