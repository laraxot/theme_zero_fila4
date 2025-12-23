<x-filament-widgets::widget>

        <div class="max-w-4xl mx-auto">
            <form wire:submit.prevent="register" class="space-y-6">
                {{ $this->form }}
            </form>
        </div>
</x-filament-widgets::widget>