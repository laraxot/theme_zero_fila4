{{-- Password Reset Widget View per Tema One --}}
<x-filament-widgets::widget>
    <div class="w-full">
        @if(!$this->emailSent)
            {{-- Form State --}}
            <div class="space-y-6">
                

                {{-- Form --}}
                <form wire:submit="sendResetPasswordLink" class="space-y-6">
                    {{ $this->form }}

                    <x-filament::button type="submit" class="w-full">
                        {{ __('pub_theme::password-reset.submit.label') }}
                    </x-filament::button>
                

                    {{-- Submit button --}}
                    <div class="space-y-4">
                        
                        {{-- Alternative actions --}}
                        <div class="flex justify-center">
                            <a href="{{ route('login') }}" 
                               class="text-sm text-gray-600 hover:text-[#272C4D] transition-colors duration-200">
                                {{ __('user::auth.password_reset.back_to_login') }}
                            </a>
                        </div>
                    </div>
                </form>

                
            </div>

        @else
            {{-- Success State --}}
            <div class="text-center space-y-6 py-8">
                <div class="flex justify-center">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full flex items-center justify-center shadow-lg animate-pulse">
                        <x-filament::icon name="heroicon-o-check-circle" class="w-8 h-8 text-white" />
                    </div>
                </div>
                
                <div>
                    <h3 class="text-xl font-semibold text-[#272C4D] mb-2">
                        {{ __('user::auth.password_reset.email_sent.title') }}
                    </h3>
                    <p class="text-gray-600 mb-6 max-w-md mx-auto">
                        {{ __('user::auth.password_reset.email_sent.message') }}
                    </p>

                    {{-- Action buttons --}}
                    <div class="space-y-3">
                        <button wire:click="sendAnotherLink"
                                class="inline-flex items-center px-6 py-3 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-[#272C4D] to-[#1e40af] hover:from-[#1e293b] hover:to-[#1d4ed8] transition-all duration-200">
                            <x-filament::icon name="heroicon-o-envelope" class="w-4 h-4 mr-2" />
                            {{ __('user::auth.password_reset.send_another') }}
                        </button>
                        
                        <div class="text-sm">
                            <a href="{{ route('login') }}" class="text-gray-600 hover:text-[#272C4D] transition-colors duration-200">
                                {{ __('user::auth.password_reset.back_to_login') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-filament-widgets::widget>
