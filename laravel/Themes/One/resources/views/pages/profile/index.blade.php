<?php
declare(strict_types=1);
use function Laravel\Folio\{middleware, name};
use Filament\Notifications\Notification;
use Filament\Notifications\Livewire\Notifications;
use Filament\Notifications\Actions\Action;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\VerticalAlignment;
use Livewire\Volt\Component;
use Modules\Tenant\Services\TenantService;

/** @var array */
//$middleware=TenantService::config('middleware');
//$base_middleware=Arr::get($middleware,'base',[]);
$base_middleware=['auth'];

name('profile');
middleware($base_middleware);

new class extends Component
{

};

?>

<x-layouts.app>
    @volt('profile')
    <div>
        {{--  route('pages.view',['slug'=>'patient_register_complete'])  --}}
        <x-page side="content" slug="profile" :type="auth()->user()?->type?->value"/>
    </div>
    @endvolt
</x-layouts.app>
