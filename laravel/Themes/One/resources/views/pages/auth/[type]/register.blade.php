<?php

declare(strict_types=1);

use function Laravel\Folio\{middleware, name};
use Livewire\Volt\Component;
use Livewire\Attributes\Validate;

middleware(['guest']);
name('register.type');

new class extends Component
{
    #[Validate('required')]
    public $type;
    public $isDoctor;

    public function mount()
    {
        $this->isDoctor = $this->type === 'doctor';
    }
};

?>

<x-layouts.app>
    @volt('register.type')
    <div >
        
        
        <div class="mt-8 mx-auto w-full max-w-4xl ">
            <div class=" bg-white m-6 z-10 backdrop-blur-md rounded-2xl p-8 shadow-lg ring-1 ring-white/20">
                <div class="mx-auto w-full">
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <a href="{{ route('home') }}" class="inline-block mb-4">
                            <x-filament::icon name="heroicon-o-home" class="w-auto h-10 mx-auto text-primary-600" />
                        </a>
                        
                        <h2 class="text-3xl font-extrabold leading-9 text-[#272C4D]">
                             {{  __('pub_theme::auth.register.'.$type.'.title') }}
                        </h2>
                        
                        <p class="mt-2 text-lg text-gray-600">
                            {{ __('pub_theme::auth.register.'.$type.'.subtitle') }}
                        </p>
                        
                        <div class="text-sm leading-5 text-center text-gray-600 dark:text-gray-400 space-x-0.5 mt-4">
                            <span>{{ __('pub_theme::auth.register.already_registered') }}</span>
                            <a href="{{ route('login') }}" class="text-[#FF5F7E] font-medium">
                                {{ __('pub_theme::auth.register.login_link') }}
                            </a>
                        </div>
                    </div>

                    <!-- Registration Form Widget -->
                    <div class="space-y-6">
                        @livewire(\Modules\User\Filament\Widgets\RegistrationWidget::class, ['type' => $type])
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    @endvolt

   
</x-layouts.app>
