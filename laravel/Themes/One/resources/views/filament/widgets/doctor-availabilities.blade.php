@props(['doctor'])
@php
    $studio=\Modules\SaluteOra\Models\Studio::inRandomOrder()->first();
    $studios=$doctor->studios()->withPivot(['schedule', 'is_primary'])->orderBy('studio_user.is_primary', 'desc')->get();
    if($studios->isEmpty()){
        $doctor->studios()->attach($studio);
        $studios=$doctor->studios()->withPivot(['schedule', 'is_primary'])->get();
    }
@endphp
<div>
    <x-filament::widget>
            <div class="w-full space-y-6 my-5">
                @each('pub_theme::filament.widgets.doctor-availabilities.studio.item', $doctor->studios, 'studio', 'pub_theme::filament.widgets.doctor-availabilities.studio.empty')
            </div>
     
        <x-filament-actions::modals />
    </x-filament::widget> 
</div>