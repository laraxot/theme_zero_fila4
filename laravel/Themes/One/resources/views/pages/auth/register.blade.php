<?php
declare(strict_types=1);
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Arr;
use Livewire\Volt\Component;
use Modules\Xot\Datas\XotData;

use function Laravel\Folio\{middleware, name};

middleware(['guest']);
name('register');

new class () extends Component {
    public array $types = [];

    public function mount(): void
    {
        $this->types = XotData::make()->getUserChildTypes();
    }
};
?>

<x-layouts.app>
    @volt('register')
    <!-- background-image: url('/img/background-filigrana-chiaro.png'); background-size: cover; background-position: center -->
    <div class="p-5 m-auto">
    <div class="register-container">
        <div class="mb-16">
            <!-- Logo e intestazione -->
            <div class="text-center mb-16">
                <div class="flex justify-center mb-4">
                    <x-ui.logo class="h-12 text-blue-900" />
                </div>
                <h1 class="text-3xl font-light text-blue-900">{!! __('pub_theme::auth.register.welcome_message') !!}</h1>
                <p class="text-gray-600 mt-2">{{ __('pub_theme::auth.register.description') }}</p>
            </div>

            <!-- Card contenente il form di registrazione -->
            <div class="w-full lg:flex justify-around">
                @foreach($types as $type )
                @if($type->canRegister())
                <div class="flex justify-center">
                    <a class="w-full flex flex-col items-center mb-7" href="{{ $type->getRoute('register') }}" tag="a">
                        <div class="relative w-80 h-80 rounded-[25px] bg-[#E6EBF7] shadow-2xl overflow-hidden">
                        <img src="{{ $type->getImage() }}" class="w-full h-full object-contain"/>
                        <button class="flex items-center justify-between absolute bottom-0 left-0 w-full bg-[#E6EBF7B3] text-[#272C4D] px-3 text-center text-xl font-extrabold py-5 transition-all duration-300 ease-in-out hover:py-9">
                            {{ $type->getLabel() }}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </button>
                        <!-- <x-filament::button class="text-2xl !text-white transition-colors rounded-lg flex justify-center items-center !bg-[#272C4D] hover:bg-[#FF5F7E] hover:cursor-pointer shadow-2xl mt-5 text-lg p-5">
                                {{ $type->getLabel() }}
                        </x-filament::button> -->
                        </div>
                    </a>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    </div>
</x-layouts.app>
