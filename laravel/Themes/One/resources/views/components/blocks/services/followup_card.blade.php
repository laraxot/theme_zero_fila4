{{--
/**
 * Card Servizio Follow-up - SaluteOra
 *
 * Card specializzata per il follow-up e supporto post-trattamento.
 * Enfatizza la continuità del percorso di cura che va oltre la nascita,
 * accompagnando la famiglia nella salute orale del neonato.
 *
 * @param string $title - Titolo del servizio
 * @param string $description - Descrizione dettagliata
 * @param string $icon - Icona heroicon
 * @param string $color - Colore del tema (indigo)
 * @param array $services - Lista dei servizi inclusi
 * @param string $badge - Badge descrittivo
 * @param string $duration - Durata del supporto
 */
--}}

@props([
    'title' => 'Follow-up e Supporto',
    'description' => 'Controlli post-trattamento, supporto continuo, pianificazione cure post-parto.',
    'icon' => 'heroicon-o-calendar-days',
    'color' => 'indigo',
    'services' => [],
    'badge' => 'Supporto continuo',
    'duration' => 'Fino a 12 mesi post-parto'
])

<div class="group bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-indigo-200 overflow-hidden">

    {{-- Header card con icona e badge --}}
    <div class="relative bg-gradient-to-br from-indigo-50 to-blue-50 p-6 border-b border-indigo-100">

        {{-- Badge supporto --}}
        @if($badge)
        <div class="absolute top-4 right-4">
            <span class="inline-flex items-center gap-1 bg-indigo-600 text-white text-xs font-medium px-3 py-1 rounded-full">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
                {{ $badge }}
            </span>
        </div>
        @endif

        {{-- Icona principale --}}
        <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5a2.25 2.25 0 002.25-2.25m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5a2.25 2.25 0 012.25 2.25v7.5"></path>
            </svg>
        </div>

        {{-- Titolo servizio --}}
        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-700 transition-colors">
            {{ $title }}
        </h3>

        {{-- Descrizione --}}
        <p class="text-gray-600 leading-relaxed">
            {{ $description }}
        </p>
    </div>

    {{-- Contenuto card --}}
    <div class="p-6">

        {{-- Lista servizi follow-up --}}
        @if(!empty($services))
        <div class="mb-6">
            <h4 class="text-sm font-semibold text-gray-900 mb-3">Servizi di Follow-up:</h4>
            <ul class="space-y-2">
                @foreach($services as $service)
                <li class="flex items-start gap-2">
                    <svg class="w-4 h-4 text-indigo-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="text-sm text-gray-600">{{ $service }}</span>
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Durata del supporto --}}
        @if($duration)
        <div class="bg-indigo-50 rounded-lg p-4 mb-6">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-sm font-medium text-indigo-800">Durata Supporto: {{ $duration }}</span>
            </div>
        </div>
        @endif

        {{-- Timeline follow-up --}}
        <div class="space-y-4 mb-6">
            <h5 class="text-sm font-semibold text-gray-900">Timeline del Follow-up:</h5>

            {{-- Primo controllo --}}
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mt-1">
                    <span class="text-xs font-bold text-green-600">1</span>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900">1 Settimana Post-Trattamento</p>
                    <p class="text-xs text-gray-600">Controllo cicatrizzazione e verifica comfort</p>
                </div>
            </div>

            {{-- Controllo pre-parto --}}
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mt-1">
                    <span class="text-xs font-bold text-blue-600">2</span>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900">Prima del Parto</p>
                    <p class="text-xs text-gray-600">Ultimo controllo e preparazione post-parto</p>
                </div>
            </div>

            {{-- Follow-up post-parto --}}
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center mt-1">
                    <span class="text-xs font-bold text-purple-600">3</span>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900">2-3 Mesi Post-Parto</p>
                    <p class="text-xs text-gray-600">Controllo mamma e educazione neonato</p>
                </div>
            </div>

            {{-- Controllo bambino --}}
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 bg-pink-100 rounded-full flex items-center justify-center mt-1">
                    <span class="text-xs font-bold text-pink-600">4</span>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900">6-12 Mesi</p>
                    <p class="text-xs text-gray-600">Primi dentini e igiene orale famiglia</p>
                </div>
            </div>
        </div>

        {{-- Educazione neonatale --}}
        <div class="bg-pink-50 rounded-lg p-4 mb-6">
            <h5 class="text-sm font-semibold text-pink-900 mb-2">@lang('pub_theme::content.services.followup.education_neonatal_title.label')</h5>
            <ul class="text-sm text-pink-800 space-y-1">
                <li>• @lang('pub_theme::content.services.followup.oral_hygiene_first_tooth.label')</li>
                <li>• @lang('pub_theme::content.services.followup.bottle_caries_prevention.label')</li>
                <li>• @lang('pub_theme::content.services.followup.healthy_eating_teeth.label')</li>
                <li>• @lang('pub_theme::content.services.followup.first_visit_timing.label')</li>
            </ul>
        </div>

        {{-- Supporto famiglia --}}
        <div class="bg-blue-50 rounded-lg p-4 mb-6">
            <h5 class="text-sm font-semibold text-blue-900 mb-2">@lang('pub_theme::content.services.followup.family_support_title.label')</h5>
            <ul class="text-sm text-blue-800 space-y-1">
                <li>• @lang('pub_theme::content.services.followup.free_phone_consultations.label')</li>
                <li>• @lang('pub_theme::content.services.followup.personalized_educational_material.label')</li>
                <li>• @lang('pub_theme::content.services.followup.support_groups_mothers.label')</li>
                <li>• @lang('pub_theme::content.services.followup.future_care_planning.label')</li>
            </ul>
        </div>

        {{-- Testimonianza veloce --}}
        <div class="border-l-4 border-indigo-500 bg-gray-50 p-4 mb-6">
            <p class="text-sm italic text-gray-600 mb-2">
                "@lang('pub_theme::content.services.followup.testimonial.text.label')"
            </p>
            <p class="text-xs text-gray-500">- @lang('pub_theme::content.services.followup.testimonial.author.label')</p>
        </div>

        {{-- Call to action --}}
        <div class="text-center">
            <a
                href="{{ route('register') }}"
                class="inline-flex items-center justify-center w-full px-4 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors duration-200 group/btn"
            >
                <span>Inizia il Percorso</span>
                <svg class="w-4 h-4 ml-2 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>

            <p class="mt-2 text-xs text-gray-500">
                Supporto continuativo per tutta la famiglia
            </p>
        </div>

    </div>

    {{-- Decorazione bottom --}}
    <div class="h-1 bg-gradient-to-r from-indigo-500 to-blue-500 group-hover:from-indigo-400 group-hover:to-blue-400 transition-colors"></div>
</div>
