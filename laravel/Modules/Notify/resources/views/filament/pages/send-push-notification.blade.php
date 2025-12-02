<?php

declare(strict_types=1);

?>
<x-filament-panels::page>
    <div class="space-y-6">
        <div class="bg-white shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg font-medium text-gray-900">
                    Test Invio Notifiche Push
                </h3>
                <p class="mt-1 text-sm text-gray-600">
                    Utilizza questo form per testare l'invio di notifiche push ai dispositivi mobili tramite diversi servizi.
                </p>

                <div class="mt-6">
                    {{ $this->notificationForm }}
                </div>
                <div>
                    <x-filament::actions :actions="$this->getNotificationFormActions()" />
                </div>
            </div>
        </div>
    </div>
</x-filament-panels::page>
