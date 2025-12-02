{{-- Widget per la selezione e visualizzazione dello studio corrente --}}
<x-filament::widget class="fi-studio-filter-widget">
    <x-filament::card>
        {{-- Header del widget --}}
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center space-x-3">
                <x-filament::icon 
                    icon="heroicon-o-building-office-2" 
                    class="h-6 w-6 text-gray-500"
                />
                <h3 class="text-lg font-semibold text-gray-900">
                    {{ __('saluteora::widgets.studio_filter.title') }}
                </h3>
            </div>
            
            {{-- Refresh button --}}
            <x-filament::button
                wire:click="refresh"
                color="gray"
                size="sm"
                icon="heroicon-o-arrow-path"
                tooltip="{{ __('saluteora::widgets.studio_filter.actions.refresh') }}"
            />
        </div>

        {{-- Studio corrente --}}
        @if($currentStudio)
            <div class="space-y-4">
                {{-- Nome e descrizione studio --}}
                <div>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">
                        {{ $currentStudio->name }}
                    </h4>
                    
                    @if($currentStudio->description)
                        <p class="text-sm text-gray-600 mb-3">
                            {{ $currentStudio->description }}
                        </p>
                    @endif
                </div>

                {{-- Informazioni studio --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- Indirizzo --}}
                    @if($this->getStudioFullAddress())
                        <div class="flex items-start space-x-2">
                            <x-filament::icon 
                                icon="heroicon-o-map-pin" 
                                class="h-4 w-4 text-gray-400 mt-0.5 flex-shrink-0"
                            />
                            <div>
                                <p class="text-sm font-medium text-gray-900">
                                    {{ __('saluteora::widgets.studio_filter.studio.address') }}
                                </p>
                                <p class="text-sm text-gray-600">
                                    {{ $this->getStudioFullAddress() }}
                                </p>
                            </div>
                        </div>
                    @endif

                    {{-- Contatti --}}
                    @foreach($this->getStudioContactInfo() as $type => $value)
                        <div class="flex items-start space-x-2">
                            <x-filament::icon 
                                :icon="match($type) {
                                    'phone' => 'heroicon-o-phone',
                                    'email' => 'heroicon-o-envelope',
                                    'website' => 'heroicon-o-globe-alt',
                                    default => 'heroicon-o-information-circle'
                                }" 
                                class="h-4 w-4 text-gray-400 mt-0.5 flex-shrink-0"
                            />
                            <div>
                                <p class="text-sm font-medium text-gray-900">
                                    {{ __("saluteora::widgets.studio_filter.studio.{$type}") }}
                                </p>
                                <p class="text-sm text-gray-600">
                                    @if($type === 'email')
                                        <a href="mailto:{{ $value }}" class="text-primary-600 hover:text-primary-700">
                                            {{ $value }}
                                        </a>
                                    @elseif($type === 'website')
                                        <a href="{{ $value }}" target="_blank" class="text-primary-600 hover:text-primary-700">
                                            {{ $value }}
                                        </a>
                                    @elseif($type === 'phone')
                                        <a href="tel:{{ $value }}" class="text-primary-600 hover:text-primary-700">
                                            {{ $value }}
                                        </a>
                                    @else
                                        {{ $value }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Selector studio (se ha più studi) --}}
                @if($hasMultipleStudios && $availableStudios->count() > 1)
                    <div class="mt-6 pt-4 border-t border-gray-200">
                        <label class="block text-sm font-medium text-gray-900 mb-2">
                            {{ __('saluteora::widgets.studio_filter.change_studio.label') }}
                        </label>
                        
                        <div class="flex items-center space-x-3">
                            <div class="flex-1">
                                <select 
                                    wire:change="changeStudio($event.target.value)"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm"
                                >
                                    @foreach($availableStudios as $studio)
                                        <option 
                                            value="{{ $studio->id }}" 
                                            @if($studio->id === $currentStudioId) selected @endif
                                        >
                                            {{ $studio->name }}
                                            @if($studio->address)
                                                - {{ $studio->address }}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <span class="text-xs text-gray-500">
                                {{ $availableStudios->count() }} 
                                {{ __('saluteora::widgets.studio_filter.total_studios') }}
                            </span>
                        </div>
                    </div>
                @endif

                {{-- Info dottore --}}
                @if($doctor)
                    <div class="mt-6 pt-4 border-t border-gray-200">
                        <div class="flex items-center space-x-3">
                            <x-filament::icon 
                                icon="heroicon-o-user-circle" 
                                class="h-5 w-5 text-gray-400"
                            />
                            <div>
                                <p class="text-sm font-medium text-gray-900">
                                    {{ __('saluteora::widgets.studio_filter.doctor.label') }}
                                </p>
                                <p class="text-sm text-gray-600">
                                    {{ $doctor->first_name }} {{ $doctor->last_name }}
                                    @if($doctor->registration_number)
                                        <span class="text-xs text-gray-500">
                                            ({{ __('saluteora::widgets.studio_filter.doctor.registration_number') }}: {{ $doctor->registration_number }})
                                        </span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @else
            {{-- Nessuno studio disponibile --}}
            <div class="text-center py-8">
                <x-filament::icon 
                    icon="heroicon-o-exclamation-triangle" 
                    class="h-12 w-12 text-gray-400 mx-auto mb-4"
                />
                <h3 class="text-lg font-medium text-gray-900 mb-2">
                    {{ __('saluteora::widgets.studio_filter.no_studio.title') }}
                </h3>
                <p class="text-sm text-gray-600">
                    {{ __('saluteora::widgets.studio_filter.no_studio.description') }}
                </p>
            </div>
        @endif
    </x-filament::card>
</x-filament::widget> 