<div class="w-full flex justify-center">
    <div class="w-full lg:w-2/4 flex justify-center">
        <div class="w-full lg:w-5/6 bg-[#E6EBF7] shadow-2xl rounded-[15px] mt-5 lg:mt-0">
            <div class="flex flex-row items-center justify-between bg-[#E6EBF7] m-5 px-2">
                <h2>{{ __('pub_theme::widgets.patient.profile.title') }}</h2>
                <button wire:click="mountAction('edit', { id: 12345 })">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                </svg>
                </button>
            </div>

            <div class="flex flex-col lg:flex-row justify-center items-center">
                <div class="w-full lg:w-3/6 p-5">
                    {{ $user->first_name }}
                </div>
                <div class="w-full lg:w-3/6 p-5">
                    {{ $user->last_name }}
                </div>
            </div>
            <div class="flex flex-col lg:flex-row justify-center items-center">
                <div class="w-full lg:w-3/6 p-5">
                    {{ $user->email }}
                </div>
                <div class="w-full lg:w-3/6 p-5">
                    {{ $user->phone }}
                </div>
            </div>
            <div class="flex flex-col lg:flex-row justify-center items-center">
                <div class="w-full lg:w-3/6 p-5">
                    {{ $user->full_address }}
                </div>
            </div>
        </div>
    </div>
    <x-filament-actions::modals />
</div>