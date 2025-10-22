@props([
    'title' => __('pub_theme::contact.title'),
    'subtitle' => __('pub_theme::contact.subtitle'),
    'form_action' => '/api/contact/submit',
    'fields' => [],
    'background_color' => 'bg-gray-50',
    'text_color' => 'text-gray-900'
])

<div class="relative {{ $background_color }} py-16 sm:py-24 overflow-hidden"
     x-data="{
        isVisible: false,
        formData: {
            full_name: '',
            email: '',
            phone: '',
            message: '',
            priority: 'normal',
            service_type: ''
        },
        isSubmitting: false,
        showSuccess: false,
        errors: {},
        charCount: 0
     }"
     x-intersect="isVisible = true">

    {{-- Background Elements --}}
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-50/50 via-transparent to-teal-50/50"></div>

        {{-- Medical form icons pattern --}}
        <div class="absolute inset-0 opacity-5">
            <div class="grid grid-cols-8 gap-16 h-full items-center justify-items-center">
                @for($i = 0; $i < 32; $i++)
                    <div class="text-4xl {{ $i % 4 == 0 ? 'animate-float-slow' : ($i % 4 == 1 ? 'animate-float-medium' : ($i % 4 == 2 ? 'animate-float-fast' : 'animate-pulse')) }}">
                        {{ ['📝', '📋', '💬', '📧', '📞', '🩺', '💊', '🏥'][$i % 8] }}
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header Section --}}
        <div class="text-center mb-12"
             x-show="isVisible"
             x-transition:enter="transition ease-out duration-1000"
             x-transition:enter-start="opacity-0 transform translate-y-16"
             x-transition:enter-end="opacity-100 transform translate-y-0">

            {{-- Response Time Badge --}}
            <div class="inline-flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-green-100 to-blue-100 border border-green-200/50 backdrop-blur-sm mb-6">
                <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-sm font-medium text-green-700">Risposta garantita entro 2 ore</span>
            </div>

            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold {{ $text_color }} mb-6 leading-tight">
                {{ $title }}
            </h2>

            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                {{ $subtitle }}
            </p>
        </div>

        <div class="grid lg:grid-cols-2 gap-12 items-start">

            {{-- Left Column: Contact Form --}}
            <div x-show="isVisible"
                 x-transition:enter="transition ease-out duration-1000 delay-300"
                 x-transition:enter-start="opacity-0 transform translate-x-16"
                 x-transition:enter-end="opacity-100 transform translate-x-0">

                {{-- Form Container --}}
                <div class="bg-white/80 backdrop-blur-lg rounded-3xl p-8 shadow-xl border border-white/20">

                    {{-- Success Message --}}
                    <div x-show="showSuccess"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform -translate-y-4"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <div>
                                <h3 class="text-green-800 font-semibold">Messaggio inviato con successo!</h3>
                                <p class="text-green-600 text-sm">Ti risponderemo entro 2 ore lavorative.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Contact Form --}}
                    <form @submit.prevent="submitForm" x-show="!showSuccess">

                        {{-- Priority Level Selector --}}
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-3">@lang('pub_theme::contact.form.priority.label')</label>
                            <div class="grid grid-cols-3 gap-3">
                                <button type="button"
                                        @click="formData.priority = 'low'"
                                        :class="formData.priority === 'low' ? 'bg-green-100 border-green-500 text-green-700' : 'bg-gray-50 border-gray-200 text-gray-600'"
                                        class="p-3 border-2 rounded-xl transition-all duration-300 hover:shadow-md">
                                    <div class="text-2xl mb-1">🟢</div>
                                    <span class="block text-sm font-medium">@lang('pub_theme::contact.form.priority.low')</span>
                                </button>

                                <button type="button"
                                        @click="formData.priority = 'normal'"
                                        :class="formData.priority === 'normal' ? 'bg-blue-100 border-blue-500 text-blue-700' : 'bg-gray-50 border-gray-200 text-gray-600'"
                                        class="p-3 border-2 rounded-xl transition-all duration-300 hover:shadow-md">
                                    <div class="text-2xl mb-1">🔵</div>
                                    <span class="block text-sm font-medium">@lang('pub_theme::contact.form.priority.normal')</span>
                                </button>

                                <button type="button"
                                        @click="formData.priority = 'high'"
                                        :class="formData.priority === 'high' ? 'bg-red-100 border-red-500 text-red-700' : 'bg-gray-50 border-gray-200 text-gray-600'"
                                        class="p-3 border-2 rounded-xl transition-all duration-300 hover:shadow-md">
                                    <div class="text-2xl mb-1">🔴</div>
                                    <span class="block text-sm font-medium">@lang('pub_theme::contact.form.priority.high')</span>
                                </button>
                            </div>
                        </div>

                        {{-- Service Type --}}
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-3">@lang('pub_theme::contact.form.service_type.label')</label>
                            <select x-model="formData.service_type"
                                    class="w-full p-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-all duration-300 bg-white">
                                <option value="">Seleziona il tipo di richiesta</option>
                                <option value="consultation">Consulenza Generale</option>
                                <option value="pregnancy">Odontoiatria in Gravidanza</option>
                                <option value="general">@lang('pub_theme::contact.form.service_type.general')</option>
                                <option value="appointment">@lang('pub_theme::contact.form.service_type.appointment')</option>
                                <option value="billing">@lang('pub_theme::contact.form.service_type.billing')</option>
                                <option value="other">@lang('pub_theme::contact.form.service_type.other')</option>
                            </select>
                        </div>

                        {{-- Name and Email Row --}}
                        <div class="grid md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">@lang('pub_theme::contact.form.fields.full_name') *</label>
                                <div class="relative">
                                    <input type="text"
                                           x-model="formData.full_name"
                                           placeholder="Es. Maria Rossi"
                                           required
                                           class="w-full p-4 pl-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-all duration-300 bg-white">
                                    <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">@lang('pub_theme::contact.form.fields.email') *</label>
                                <div class="relative">
                                    <input type="email"
                                           x-model="formData.email"
                                           placeholder="maria.rossi@email.com"
                                           required
                                           class="w-full p-4 pl-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-all duration-300 bg-white">
                                    <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        {{-- Phone Number (Optional) --}}
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">@lang('pub_theme::contact.form.fields.phone')</label> (Opzionale)</label>
                            <div class="relative">
                                <input type="tel"
                                       x-model="formData.phone"
                                       placeholder="+39 123 456 7890"
                                       class="w-full p-4 pl-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-all duration-300 bg-white">
                                <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                        </div>

                        {{-- Message --}}
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">@lang('pub_theme::contact.form.fields.message') *</label>
                            <div class="relative">
                                <textarea x-model="formData.message"
                                          @input="charCount = $event.target.value.length"
                                          placeholder="Descrivi la tua richiesta in dettaglio..."
                                          rows="6"
                                          required
                                          maxlength="1000"
                                          class="w-full p-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-all duration-300 resize-none bg-white"></textarea>
                                <div class="absolute bottom-3 right-3 text-xs text-gray-400">
                                    <span x-text="charCount"></span>/1000
                                </div>
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <button type="submit"
                                :disabled="isSubmitting"
                                class="w-full py-4 bg-gradient-to-r from-teal-600 to-blue-600 text-white font-bold rounded-xl hover:from-teal-700 hover:to-blue-700 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-300 transform hover:scale-105 shadow-lg">
                            <span x-show="!isSubmitting" class="flex items-center justify-center">
                                @lang('pub_theme::contact.form.submit')
                                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </span>
                            <span x-show="isSubmitting" class="flex items-center justify-center">
                                @lang('pub_theme::contact.form.submitting')
                                <svg class="animate-spin ml-2 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </span>
                        </button>
                    </form>
                </div>
            </div>

            {{-- Right Column: Contact Information & Features --}}
            <div x-show="isVisible"
                 x-transition:enter="transition ease-out duration-1000 delay-500"
                 x-transition:enter-start="opacity-0 transform translate-x-16"
                 x-transition:enter-end="opacity-100 transform translate-x-0">

                {{-- Contact Methods --}}
                <div class="bg-white/80 backdrop-blur-lg rounded-3xl p-8 shadow-xl border border-white/20 mb-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">@lang('pub_theme::contact.methods.title')</h3>

                    <div class="space-y-4">
                        {{-- Phone --}}
                        <div class="flex items-center p-4 bg-blue-50 rounded-xl border border-blue-200">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="font-bold text-blue-700">@lang('pub_theme::contact.methods.phone.title')</div>
                                <div class="text-blue-600">+39 06 1234 567</div>
                                <div class="text-xs text-blue-500">@lang('pub_theme::contact.methods.phone.description')</div>
                            </div>
                        </div>

                        {{-- Emergency --}}
                        <div class="flex items-center p-4 bg-red-50 rounded-xl border border-red-200">
                            <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.996-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="font-bold text-red-700">@lang('pub_theme::contact.methods.emergency.title')</div>
                                <div class="text-red-600">+39 800 123 456</div>
                                <div class="text-xs text-red-500">@lang('pub_theme::contact.methods.emergency.description')</div>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="flex items-center p-4 bg-green-50 rounded-xl border border-green-200">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="font-bold text-green-700">@lang('pub_theme::contact.methods.email.title')</div>
                                <div class="text-green-600">info@saluteora.it</div>
                                <div class="text-xs text-green-500">@lang('pub_theme::contact.methods.email.description')</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Features --}}
                <div class="bg-white/80 backdrop-blur-lg rounded-3xl p-8 shadow-xl border border-white/20">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">@lang('pub_theme::contact.benefits.title')</h3>

                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-gradient-to-br from-teal-500 to-blue-500 rounded-lg flex items-center justify-center mr-3 mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">@lang('pub_theme::contact.benefits.items.0.title')</h4>
                                <p class="text-gray-600 text-sm">@lang('pub_theme::contact.benefits.items.0.description')</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-pink-500 rounded-lg flex items-center justify-center mr-3 mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">@lang('pub_theme::contact.benefits.items.2.title')</h4>
                                <p class="text-sm text-gray-600">@lang('pub_theme::contact.benefits.items.2.description')</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-gradient-to-br from-orange-500 to-red-500 rounded-lg flex items-center justify-center mr-3 mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">@lang('pub_theme::contact.benefits.items.1.title')</h4>
                                <p class="text-sm text-gray-600">@lang('pub_theme::contact.benefits.items.1.description')</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Form Submission Logic --}}
<script>
function submitForm() {
    this.isSubmitting = true;
    this.errors = {};

    // Simulate form submission
    setTimeout(() => {
        this.isSubmitting = false;
        this.showSuccess = true;

        // Reset form after 3 seconds
        setTimeout(() => {
            this.formData = {
                full_name: '',
                email: '',
                phone: '',
                message: '',
                priority: 'normal',
                service_type: ''
            };
            this.charCount = 0;
            this.showSuccess = false;
        }, 3000);
    }, 2000);
}
</script>

{{-- Custom CSS for Form Animations --}}
<style>
@keyframes float-slow {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(3deg); }
}

@keyframes float-medium {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-15px) rotate(-2deg); }
}

@keyframes float-fast {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-10px) rotate(1deg); }
}

.animate-float-slow {
    animation: float-slow 8s ease-in-out infinite;
}

.animate-float-medium {
    animation: float-medium 6s ease-in-out infinite;
}

.animate-float-fast {
    animation: float-fast 4s ease-in-out infinite;
}
</style>
