{{-- Password Reset Widget View per Tema One --}}
<x-filament-widgets::widget>
    <div class="max-w-4xl mx-auto">
        @if($this->emailSent)
            {{-- Success State --}}
            <div class="bg-white/70 backdrop-blur-md rounded-xl shadow-xl p-8 text-center space-y-6">
                <div class="flex justify-center">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full flex items-center justify-center shadow-lg">
                        <x-filament::icon name="heroicon-o-check-circle" class="w-8 h-8 text-white" />
                    </div>
                </div>
                
                <div>
                    <h3 class="text-2xl font-bold text-[#272C4D] mb-3">
                        {{ __('pub_theme::auth.password.reset.email_sent') }}
                    </h3>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        {{ __('user::auth.password_reset.email_sent.message') }}
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <x-filament::button 
                            wire:click="resetForm"
                            color="primary"
                            size="lg"
                            class="bg-gradient-to-r from-[#4F46E5] to-[#7C3AED] hover:from-[#4338CA] hover:to-[#6D28D9]"
                        >
                            {{ __('user::auth.password_reset.send_another') }}
                        </x-filament::button>
                        
                        <x-filament::button 
                            tag="a"
                            href="{{ route('login') }}"
                            outlined
                            size="lg"
                            color="gray"
                        >
                            {{ __('user::auth.password_reset.back_to_login') }}
                        </x-filament::button>
                    </div>
                </div>
            </div>
        @else
            {{-- Form State --}}
            <div class="bg-white/70 backdrop-blur-md rounded-xl shadow-xl p-8">
                {{-- Header --}}
                <div class="text-center mb-8">
                    <div class="flex justify-center mb-4">
                        <div class="w-16 h-16 bg-gradient-to-r from-[#4F46E5] to-[#7C3AED] rounded-full flex items-center justify-center shadow-lg">
                            <x-filament::icon name="heroicon-o-key" class="w-8 h-8 text-white" />
                        </div>
                    </div>
                    
                    <h2 class="text-3xl font-bold text-[#272C4D] mb-3">
                        {{ __('pub_theme::auth.password.reset.title') }}
                    </h2>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        {{ __('pub_theme::auth.password.reset.subtitle') }}
                    </p>
                </div>

                {{-- Form --}}
                <form wire:submit.prevent="sendResetPasswordLink" class="space-y-6">
                    <div class="space-y-6">
                        {{ $this->form }}
                    </div>

                    <div class="space-y-4">
                        <x-filament::button 
                            type="submit"
                            size="xl"
                            class="w-full bg-gradient-to-r from-[#4F46E5] to-[#7C3AED] hover:from-[#4338CA] hover:to-[#6D28D9] text-white font-semibold py-4 rounded-lg shadow-lg transition-all duration-200 transform hover:scale-[1.02]"
                        >
                            <x-filament::loading-indicator class="h-5 w-5 mr-2" wire:loading wire:target="sendResetPasswordLink" />
                            <span wire:loading.remove wire:target="sendResetPasswordLink">
                                {{ __('user::auth.password_reset.send_button') }}
                            </span>
                            <span wire:loading wire:target="sendResetPasswordLink">
                                {{ __('pub_theme::auth.actions.sending') }}
                            </span>
                        </x-filament::button>

                        <div class="text-center">
                            <a href="{{ route('login') }}" 
                               class="text-[#4F46E5] hover:text-[#4338CA] font-medium transition-colors duration-200 hover:underline">
                                {{ __('user::auth.password_reset.back_to_login') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        @endif
    </div>
</x-filament-widgets::widget> 