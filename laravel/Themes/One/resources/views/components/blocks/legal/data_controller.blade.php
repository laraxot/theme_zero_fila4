<?php

declare(strict_types=1);

use Livewire\Volt\Component;

new class extends Component {
    public string $title;
    public string $content;
}; ?>

{{--
/**
 * Data Controller Section - SaluteOra
 *
 * Sezione legale che presenta le informazioni del titolare
 * del trattamento dati con design professionale e
 * dettagli di contatto chiaramente visibili.
 *
 * @param string $title - Titolo sezione
 * @param string $content - Contenuto HTML con informazioni
 */
--}}

@props([
    'title' => '1. Titolare del Trattamento',
    'content' => ''
])

<section class="py-12 bg-white relative">

    {{-- Anchor per navigazione --}}
    <div id="titolare-trattamento" class="absolute -top-20"></div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Titolo sezione --}}
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                    </svg>
                </div>
                {{ $title }}
            </h2>
        </div>

        {{-- Container contenuto --}}
        <div class="bg-gradient-to-br from-gray-50 to-blue-50 rounded-2xl p-8 border border-gray-100">

            {{-- Header con logo aziendale --}}
            <div class="flex items-start gap-6 mb-8">
                {{-- Logo placeholder --}}
                <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-teal-500 rounded-2xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m3-3H9"/>
                    </svg>
                </div>

                {{-- Informazioni azienda --}}
                <div class="flex-1">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">SaluteOra S.r.l.</h3>
                    <p class="text-gray-600 mb-4">Specialisti in salute orale materno-infantile</p>

                    {{-- Badge certificazioni --}}
                    <div class="flex flex-wrap gap-2">
                        <span class="inline-flex items-center gap-1 bg-green-100 text-green-800 text-xs font-medium px-3 py-1 rounded-full">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            GDPR Compliant
                        </span>

                        <span class="inline-flex items-center gap-1 bg-blue-100 text-blue-800 text-xs font-medium px-3 py-1 rounded-full">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            ISO 9001:2015
                        </span>

                        <span class="inline-flex items-center gap-1 bg-purple-100 text-purple-800 text-xs font-medium px-3 py-1 rounded-full">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Accreditato SSN
                        </span>
                    </div>
                </div>
            </div>

            {{-- Dettagli di contatto --}}
            <div class="grid md:grid-cols-2 gap-6">

                {{-- Informazioni legali --}}
                <div class="bg-white rounded-xl p-6 border border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                        </svg>
                        Dati Legali
                    </h4>

                    <dl class="space-y-3">
                        <div class="flex justify-between">
                            <dt class="text-sm font-medium text-gray-500">Sede legale:</dt>
                            <dd class="text-sm text-gray-900 text-right">Via della Salute, 123<br>00100 Roma (RM)</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-sm font-medium text-gray-500">Partita IVA:</dt>
                            <dd class="text-sm text-gray-900">12345678901</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-sm font-medium text-gray-500">REA:</dt>
                            <dd class="text-sm text-gray-900">RM-1234567</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-sm font-medium text-gray-500">Cap. Sociale:</dt>
                            <dd class="text-sm text-gray-900">€ 100.000 i.v.</dd>
                        </div>
                    </dl>
                </div>

                {{-- Contatti privacy --}}
                <div class="bg-white rounded-xl p-6 border border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                        </svg>
                        Contatti Privacy
                    </h4>

                    <dl class="space-y-3">
                        <div>
                            <dt class="text-sm font-medium text-gray-500 mb-1">Email Privacy:</dt>
                            <dd class="text-sm">
                                <a href="mailto:privacy@saluteora.it" class="text-blue-600 hover:text-blue-800 transition-colors">
                                    privacy@saluteora.it
                                </a>
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 mb-1">PEC:</dt>
                            <dd class="text-sm">
                                <a href="mailto:privacy@pec.saluteora.it" class="text-blue-600 hover:text-blue-800 transition-colors">
                                    privacy@pec.saluteora.it
                                </a>
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 mb-1">Data Protection Officer:</dt>
                            <dd class="text-sm">
                                <a href="mailto:dpo@saluteora.it" class="text-blue-600 hover:text-blue-800 transition-colors">
                                    dpo@saluteora.it
                                </a>
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 mb-1">Telefono:</dt>
                            <dd class="text-sm">
                                <a href="tel:+390612345678" class="text-blue-600 hover:text-blue-800 transition-colors">
                                    +39 06 1234567
                                </a>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>

            {{-- Footer con contenuto HTML custom --}}
            @if($content)
            <div class="mt-8 pt-8 border-t border-gray-200">
                <div class="prose prose-sm max-w-none text-gray-700">
                    {!! $content !!}
                </div>
            </div>
            @endif

            {{-- CTA informativa --}}
            <div class="mt-8 bg-blue-50 rounded-xl p-6 border border-blue-100">
                <div class="flex items-start gap-4">
                    <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"/>
                        </svg>
                    </div>
                    <div>
                        <h5 class="font-semibold text-blue-900 mb-2">Hai domande sui tuoi dati?</h5>
                        <p class="text-sm text-blue-800 mb-3">
                            Il nostro Data Protection Officer è disponibile per rispondere a qualsiasi domanda
                            riguardante il trattamento dei tuoi dati personali e sanitari.
                        </p>
                        <a href="mailto:dpo@saluteora.it"
                           class="inline-flex items-center gap-2 text-sm font-medium text-blue-600 hover:text-blue-800 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                            </svg>
                            Contatta il DPO
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
