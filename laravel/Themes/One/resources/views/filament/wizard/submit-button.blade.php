<x-filament::button
    type="submit"
    size="lg"
    color="primary"
    class="w-full"
>
    {{ __('pub_theme::wizard.submit.label') }}
    <span wire:loading >
        <x-filament::loading-indicator class="h-5 w-5" />
    </span>
</x-filament::button> 