{{-- Password Reset Confirmation Widget View per Tema One --}}
<x-filament-widgets::widget>
    <div class="w-full">
        @if($this->shouldShowForm())
            {{-- Form State --}}
            <div class="space-y-6">
                @if($this->isLoading())
                    {{-- Loading overlay --}}
                    <div class="absolute inset-0 bg-white/50 backdrop-blur-sm rounded-lg flex items-center justify-center z-10">
                        <div class="flex flex-col items-center space-y-4">
                            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-[#272C4D]"></div>
                            <p class="text-sm text-gray-600 font-medium">
                                {{ __('user::auth.password_reset.processing') }}
                            </p>
                        </div>
                    </div>
                @endif

                {{-- Instructions --}}
                <div class="bg-blue-50/50 border border-blue-200/50 rounded-lg p-4">
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0">
                            <x-filament::icon name="heroicon-o-information-circle" class="w-5 h-5 text-blue-600 mt-0.5" />
                        </div>
                        <div class="text-sm text-blue-700">
                            <p class="font-medium mb-1">{{ __('user::auth.password_reset.instructions.title') }}</p>
                            <p>{{ __('user::auth.password_reset.instructions.description') }}</p>
                        </div>
                    </div>
                </div>

                {{-- Form --}}
                <form wire:submit="confirmPasswordReset" class="space-y-6">
                    {{ $this->form }}

                    {{-- Submit button --}}
                    <div class="space-y-4">
                        <button 
                            type="submit"
                            wire:loading.attr="disabled"
                            wire:target="confirmPasswordReset"
                            class="w-full flex justify-center items-center px-4 py-3 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-[#272C4D] to-[#1e40af] hover:from-[#1e293b] hover:to-[#1d4ed8] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#272C4D] disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200"
                        >
                            <span wire:loading.remove wire:target="confirmPasswordReset">
                                {{ __('user::auth.password_reset.confirm_button') }}
                            </span>
                            <span wire:loading wire:target="confirmPasswordReset" class="flex items-center">
                                <div class="animate-spin rounded-full h-4 w-4 border-b-2 border-white mr-2"></div>
                                {{ __('user::auth.password_reset.processing') }}
                            </span>
                        </button>

                        {{-- Alternative actions --}}
                        <div class="flex justify-center">
                            <a href="{{ route('password.request') }}" 
                               class="text-sm text-gray-600 hover:text-[#272C4D] transition-colors duration-200">
                                {{ __('user::auth.password_reset.request_new_link') }}
                            </a>
                        </div>
                    </div>
                </form>

                {{-- Security note --}}
                <div class="bg-gray-50/50 border border-gray-200/50 rounded-lg p-4">
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0">
                            <x-filament::icon name="heroicon-o-shield-check" class="w-5 h-5 text-gray-500 mt-0.5" />
                        </div>
                        <div class="text-xs text-gray-600">
                            <p class="font-medium mb-1">{{ __('user::auth.password_reset.security.title') }}</p>
                            <p>{{ __('user::auth.password_reset.security.note') }}</p>
                        </div>
                    </div>
                </div>
            </div>

        @elseif($this->isSuccess())
            {{-- Success State --}}
            <div class="text-center space-y-6 py-8">
                <div class="flex justify-center">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full flex items-center justify-center shadow-lg animate-pulse">
                        <x-filament::icon name="heroicon-o-check-circle" class="w-8 h-8 text-white" />
                    </div>
                </div>
                
                <div>
                    <h3 class="text-xl font-semibold text-[#272C4D] mb-2">
                        {{ __('user::auth.password_reset.success.title') }}
                    </h3>
                    <p class="text-gray-600 mb-6 max-w-md mx-auto">
                        {{ __('user::auth.password_reset.success.message') }}
                    </p>

                    {{-- Auto-redirect notice --}}
                    <div class="bg-green-50/50 border border-green-200/50 rounded-lg p-4 mb-6">
                        <div class="flex items-center justify-center space-x-2 text-sm text-green-700">
                            <div class="animate-spin rounded-full h-4 w-4 border-b-2 border-green-600"></div>
                            <span>{{ __('user::auth.password_reset.success.redirect_notice') }}</span>
                        </div>
                    </div>

                    {{-- Manual action --}}
                    <div class="space-y-3">
                        <a href="{{ route('home') }}" 
                           class="inline-flex items-center px-6 py-3 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-[#272C4D] to-[#1e40af] hover:from-[#1e293b] hover:to-[#1d4ed8] transition-all duration-200">
                            <x-filament::icon name="heroicon-o-home" class="w-4 h-4 mr-2" />
                            {{ __('user::auth.password_reset.success.go_to_dashboard') }}
                        </a>
                        
                        <div class="text-sm">
                            <a href="{{ route('login') }}" class="text-gray-600 hover:text-[#272C4D] transition-colors duration-200">
                                {{ __('user::auth.password_reset.success.go_to_login') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        @elseif($this->hasError())
            {{-- Error State --}}
            <div class="text-center space-y-6 py-8">
                <div class="flex justify-center">
                    <div class="w-16 h-16 bg-gradient-to-r from-red-400 to-rose-500 rounded-full flex items-center justify-center shadow-lg">
                        <x-filament::icon name="heroicon-o-exclamation-triangle" class="w-8 h-8 text-white" />
                    </div>
                </div>
                
                <div>
                    <h3 class="text-xl font-semibold text-[#272C4D] mb-2">
                        {{ __('user::auth.password_reset.errors.title') }}
                    </h3>
                    <p class="text-gray-600 mb-6 max-w-md mx-auto">
                        {{ $this->getErrorMessage() }}
                    </p>

                    {{-- Error details --}}
                    <div class="bg-red-50/50 border border-red-200/50 rounded-lg p-4 mb-6">
                        <div class="text-sm text-red-700">
                            <p class="font-medium mb-2">{{ __('user::auth.password_reset.errors.possible_causes') }}</p>
                            <ul class="text-left space-y-1 list-disc list-inside">
                                <li>{{ __('user::auth.password_reset.errors.causes.expired_token') }}</li>
                                <li>{{ __('user::auth.password_reset.errors.causes.invalid_email') }}</li>
                                <li>{{ __('user::auth.password_reset.errors.causes.already_used') }}</li>
                            </ul>
                        </div>
                    </div>

                    {{-- Recovery actions --}}
                    <div class="space-y-3">
                        <button wire:click="resetForm"
                                class="inline-flex items-center px-6 py-3 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-[#272C4D] to-[#1e40af] hover:from-[#1e293b] hover:to-[#1d4ed8] transition-all duration-200">
                            <x-filament::icon name="heroicon-o-arrow-path" class="w-4 h-4 mr-2" />
                            {{ __('user::auth.password_reset.errors.try_again') }}
                        </button>
                        
                        <div class="text-sm space-x-4">
                            <a href="{{ route('password.request') }}" class="text-gray-600 hover:text-[#272C4D] transition-colors duration-200">
                                {{ __('user::auth.password_reset.request_new_link') }}
                            </a>
                            <span class="text-gray-300">|</span>
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