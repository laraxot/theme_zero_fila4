<div class="flex flex-col justify-center items-center">

    <!-- Back Button -->
    <div class="w-full flex justify-start">
        {{-- DA AGGIORNARE URL --}}
        <a href="{{ route('home') }}">
            <div class="cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="size-9">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                </svg>
            </div>
        </a>
    </div>

    <!-- Page title -->
    <div class="p-10 w-full flex justify-center">
        <h1 class="text-center">FAQ'S</h1>
    </div>

    <!-- FAQ Content -->
    <div class="w-full lg:w-2/4 flex flex-col justify-center p-5">

        <!-- FAQ Item -->
        <div>
            <h3 class="text-[#272C4D]">@lang('pub_theme::faqs.questions.who_is_service_for.question.label')</h3>
            <p class="text-[#272C4D] pt-2 text-lg">
                @lang('pub_theme::faqs.questions.who_is_service_for.answer.label')
            </p>
        </div>

        <div class="mt-5">
            <h3 class="text-[#272C4D]">@lang('pub_theme::faqs.questions.what_service_offers.question.label')</h3>
            <p class="text-[#272C4D] pt-2 text-lg">
                @lang('pub_theme::faqs.questions.what_service_offers.answer.label')
            </p>
        </div>

        <div class="mt-5">
            <h3 class="text-[#272C4D]">@lang('pub_theme::faqs.questions.how_to_access.question.label')</h3>
            <p class="text-[#272C4D] pt-2 text-lg">
                @lang('pub_theme::faqs.questions.how_to_access.answer.label')
            </p>
        </div>

        <div class="mt-5">
            <h3 class="text-[#272C4D]">@lang('pub_theme::faqs.questions.how_to_request_visit.question.label')</h3>
            <p class="text-[#272C4D] pt-2 text-lg">
                @lang('pub_theme::faqs.questions.how_to_request_visit.answer.label')
            </p>
        </div>

        <div class="mt-5">
            <h3 class="text-[#272C4D]">@lang('pub_theme::faqs.questions.how_to_book_appointment.question.label')</h3>
            <p class="text-[#272C4D] pt-2 text-lg">
                @lang('pub_theme::faqs.questions.how_to_book_appointment.answer.label')
            </p>
        </div>

        <div class="mt-5">
            <h3 class="text-[#272C4D]">@lang('pub_theme::faqs.questions.location_flexibility.question.label')</h3>
            <p class="text-[#272C4D] pt-2 text-lg">
                @lang('pub_theme::faqs.questions.location_flexibility.answer.label')
            </p>
        </div>

        <div class="mt-5">
            <h3 class="text-[#272C4D]">@lang('pub_theme::faqs.questions.appointment_rejection.question.label')</h3>
            <p class="text-[#272C4D] pt-2 text-lg">
                @lang('pub_theme::faqs.questions.appointment_rejection.answer.label')
            </p>
        </div>

        <div class="mt-5">
            <h3 class="text-[#272C4D]">@lang('pub_theme::faqs.questions.cancelling_appointment.question.label')</h3>
            <p class="text-[#272C4D] pt-2 text-lg">
                @lang('pub_theme::faqs.questions.cancelling_appointment.answer.label')
            </p>
        </div>

        <!-- Call to Action Box -->
        <div class="mt-5">
            <h3 class="text-[#FF5F7E]">
                Hai altri dubbi? <strong>CONSULTA LA GUIDA!</strong>
            </h3>

            <div class="pt-5 flex flex-col lg:flex-row justify-center items-center">

                <!-- Card 1 -->
                <div class="w-64 h-44 bg-cover bg-[#FCD5D0] rounded-[25px] shadow-2xl m-5 transform origin-center scale-100 hover:scale-110 transition-transform duration-100">
                    <div class="grid grid-cols-2">
                        <div class="flex justify-center">
                            <img class="h-44 px-2 pt-2" src="/img/woman-characterrr.png" />
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <span class="text-[#FF5F7E] text-xl lg:text-2xl">
                                Vai alla guida
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="w-64 h-44 bg-[#FCD5D0] rounded-[25px] shadow-2xl m-5 transform origin-center scale-100 hover:scale-110 transition-transform duration-100">
                    <div class="grid grid-cols-2 gap-2">
                        <div class="flex justify-center">
                            <img class="h-44 p-2" src="/img/dentist.png" />
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <span class="text-[#FF5F7E] text-xl lg:text-2xl">
                                Vai alla guida
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
