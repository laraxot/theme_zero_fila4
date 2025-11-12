<footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Informazioni il progetto -->
            <div class="col-span-1">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">@lang('pub_theme::footer.project_info.title.label')</h3>
                <p class="text-gray-600 dark:text-gray-300 text-sm">
                    @lang('pub_theme::footer.project_info.description.label')
                </p>
            </div>

            <!-- Link Utili per Gestanti -->
            <div class="col-span-1">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">@lang('pub_theme::footer.for_patients.title.label')</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('patient.dashboard') }}" class="text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 text-sm">
                            @lang('pub_theme::footer.for_patients.personal_area.label')
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('patient.doctors') }}" class="text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 text-sm">
                            @lang('pub_theme::footer.for_patients.find_dentist.label')
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('patient.documentation') }}" class="text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 text-sm">
                            @lang('pub_theme::footer.for_patients.documentation.label')
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Link Utili per Odontoiatri -->
            <div class="col-span-1">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">@lang('pub_theme::footer.for_doctors.title.label')</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('doctor.dashboard') }}" class="text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 text-sm">
                            @lang('pub_theme::footer.for_doctors.professional_area.label')
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('doctor.patients') }}" class="text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 text-sm">
                            @lang('pub_theme::footer.for_doctors.patient_management.label')
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('doctor.documentation') }}" class="text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 text-sm">
                            @lang('pub_theme::footer.for_doctors.clinical_documentation.label')
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contatti e Supporto -->
            <div class="col-span-1">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">@lang('pub_theme::footer.contacts.title.label')</h3>
                <ul class="space-y-2">
                    <li class="text-gray-600 dark:text-gray-300 text-sm">
                        <a href="mailto:supporto@saluteora.it" class="hover:text-primary-600 dark:hover:text-primary-400">
                            @lang('pub_theme::footer.contacts.email.label')
                        </a>
                    </li>
                    <li class="text-gray-600 dark:text-gray-300 text-sm">
                        <a href="tel:+390123456789" class="hover:text-primary-600 dark:hover:text-primary-400">
                            @lang('pub_theme::footer.contacts.phone.label')
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-700">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-gray-600 dark:text-gray-300 text-sm">
                    © {{ date('Y') }} @lang('pub_theme::footer.legal.copyright.label')
                </div>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="{{ route('privacy-policy') }}" class="text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 text-sm">
                        @lang('pub_theme::footer.legal.privacy_policy.label')
                    </a>
                    <a href="{{ route('terms') }}" class="text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 text-sm">
                        @lang('pub_theme::footer.legal.terms_conditions.label')
                    </a>
                    <a href="{{ route('cookie-policy') }}" class="text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 text-sm">
                        @lang('pub_theme::footer.legal.cookie_policy.label')
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
