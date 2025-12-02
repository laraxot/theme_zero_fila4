<x-filament-widgets::widget>
    <x-filament::section>
        <div class="max-w-4xl mx-auto">
            @if($this->canEdit())
                <form wire:submit.prevent="updateUser" class="space-y-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-medium text-gray-900">
                            {{ __('user::profile.edit_profile_title') }}
                        </h3>
                        <x-filament::icon-button 
                            icon="heroicon-m-pencil"
                            color="primary"
                            tooltip="{{ __('user::profile.edit_tooltip') }}"
                        />
                    </div>
                    
                    {{ $this->form }}
                    
                    <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                        <x-filament::button
                            type="button"
                            color="gray"
                            onclick="window.history.back()"
                        >
                            {{ __('user::profile.cancel') }}
                        </x-filament::button>
                        
                        <x-filament::button
                            type="submit"
                            color="primary"
                        >
                            {{ __('user::profile.save_changes') }}
                            <span wire:loading wire:target="updateUser">
                                <x-filament::loading-indicator class="h-4 w-4 ml-2" />
                            </span>
                        </x-filament::button>
                    </div>
                </form>
            @else
                <div class="text-center py-8">
                    <x-filament::icon 
                        icon="heroicon-o-exclamation-triangle"
                        class="h-12 w-12 text-gray-400 mx-auto mb-4"
                    />
                    <p class="text-gray-500">
                        {{ __('user::profile.no_permission') }}
                    </p>
                </div>
            @endif
            
            @if(session('message'))
                <div class="mt-4 p-4 bg-green-100 border border-green-300 text-green-700 rounded-md">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </x-filament::section>
</x-filament-widgets::widget> 