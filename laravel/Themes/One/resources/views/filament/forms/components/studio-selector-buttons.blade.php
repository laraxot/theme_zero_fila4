{{-- 
    Studio Selector Buttons Component
    
    Gestisce direttamente modelli Studio - DRY + KISS.
    
    @see Modules\SaluteOra\Filament\Forms\Components\StudioSelectorButtons
--}}
@props(['studios'])
@php
   
@endphp

<div class="space-y-4">
    {{-- Section Title --}}
    @if($sectionTitle)
        <div class="text-lg font-semibold text-gray-900 dark:text-white">
            {{ $sectionTitle }}
        </div>
    @endif

    {{-- Studios Grid --}}
    @if($studios->isNotEmpty())
        <div 
            x-data="studioSelector({
                studioField: '{{ $studioField }}',
                doctorField: '{{ $doctorField }}'
            })"
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4"
        >
            @foreach($studios as $studio)
                <div 
                    x-on:click="selectStudio({{ $studio->id }}, {{ optional($studio->doctors->first())->id ?? 'null' }})"
                    :class="selectedStudio === {{ $studio->id }} ? 'ring-2 ring-primary-500 bg-primary-50 dark:bg-primary-900/20' : 'hover:bg-gray-50 dark:hover:bg-gray-800'"
                    class="relative cursor-pointer rounded-lg border border-gray-300 dark:border-gray-600 p-4 shadow-sm transition-all duration-200 hover:shadow-md"
                >
                    {{-- Studio Name --}}
                    <div class="text-base font-semibold text-gray-900 dark:text-white mb-2">
                        {{ $studio->name }}
                    </div>

                    {{-- Studio Address --}}
                    @if($studio->address)
                        <div class="text-sm text-gray-600 dark:text-gray-400 mb-3">
                            <div>{{ $studio->address->street }} {{ $studio->address->civic_number }}</div>
                            <div>{{ $studio->address->postal_code }} {{ $studio->address->city }}</div>
                        </div>
                    @endif

                    {{-- Doctors Count --}}
                    @if($studio->doctors->isNotEmpty())
                        <div class="text-sm text-primary-600 dark:text-primary-400 mb-2">
                            {{ trans_choice('saluteora::widgets.find_doctor_and_appointment.studio_list.doctors_count', $studio->doctors->count(), ['count' => $studio->doctors->count()]) }}
                        </div>

                        {{-- Primary Doctor --}}
                        @if($studio->doctors->first())
                            <div class="text-sm text-gray-700 dark:text-gray-300">
                                <strong>{{ __('saluteora::widgets.find_doctor_and_appointment.studio_list.primary_doctor') }}:</strong>
                                {{ $studio->doctors->first()->name }}
                            </div>
                        @endif
                    @endif

                    {{-- Selected Indicator --}}
                    <div 
                        x-show="selectedStudio === {{ $studio->id }}"
                        x-transition
                        class="absolute top-2 right-2"
                    >
                        <div class="flex h-6 w-6 items-center justify-center rounded-full bg-primary-500 text-white">
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        {{-- Empty State --}}
        <div class="text-center py-8">
            <div class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500 mb-4">
                <svg fill="none" stroke="currentColor" viewBox="0 0 48 48">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M34 40h10v-4a6 6 0 00-10.712-3.714M34 40H14m20 0v-4a9.971 9.971 0 00-.712-3.714M14 40H4v-4a6 6 0 0110.712-3.714M14 40v-4a9.971 9.971 0 01.712-3.714M34 40v-4a9.971 9.971 0 01-.712-3.714M14 40v-4a9.971 9.971 0 00-.712-3.714"></path>
                </svg>
            </div>
            
            @if($emptyStateTitle)
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">
                    {{ $emptyStateTitle }}
                </h3>
            @endif
            
            @if($emptyStateDescription)
                <p class="text-gray-500 dark:text-gray-400">
                    {{ $emptyStateDescription }}
                </p>
            @endif
        </div>
    @endif
</div>

<script>
function studioSelector(config) {
    return {
        selectedStudio: null,
        
        selectStudio(studioId, doctorId) {
            this.selectedStudio = studioId;
            
            // Popola i campi nascosti
            if (config.studioField) {
                const studioInput = document.querySelector(`[name="${config.studioField}"]`);
                if (studioInput) {
                    studioInput.value = studioId;
                    studioInput.dispatchEvent(new Event('change', { bubbles: true }));
                }
            }
            
            if (config.doctorField && doctorId) {
                const doctorInput = document.querySelector(`[name="${config.doctorField}"]`);
                if (doctorInput) {
                    doctorInput.value = doctorId;
                    doctorInput.dispatchEvent(new Event('change', { bubbles: true }));
                }
            }
        }
    }
}
</script> 