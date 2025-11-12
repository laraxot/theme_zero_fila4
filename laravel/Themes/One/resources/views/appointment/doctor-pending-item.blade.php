<!-- Appointment card -->
    <div class="w-full flex flex-col justify-center items-center py-9 px-4">
        <div class="bg-[#D1DDEF] w-full lg:w-2/4 flex flex-row justify-between p-4 rounded-[15px]">
            
            <!-- Info -->
            <div class="flex flex-row items-center">
                <div>
                    <span class="text-lg">{{ $appointment->patient?->full_name }}</span>
                    <div>
                        <p class="text-xs">{{ $appointment->starts_at?->format('d/m/Y') }}</p>
                        <p class="text-xs">{{ $appointment->time_range }}</p>
                    </div>
                </div>
            </div>

            <!-- Placeholder for layout (can be used for actions or icons later) -->
            <div class="flex flex-col-reverse items-center lg:flex-row"></div>

            <!-- Actions -->
            <div class="cursor-pointer flex flex-row items-center">
                
                {{ ($this->infoAction)(['appointment' => $appointment->id]) }}
                {{ ($this->confirmAction)(['appointment' => $appointment->id]) }}
                {{ ($this->rejectAction)(['appointment' => $appointment->id]) }}
                <!-- Eye icon + Modal -->
                <div x-data="{ showInfo: false }" class="relative">
                    <div @click="showInfo = true" class="mr-5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="#272C4D" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </div>

                    <!-- Modal info -->
                    <div x-show="showInfo" x-cloak class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
                        <div class="bg-white p-6 rounded-xl max-w-md w-3/4 lg:w-full">
                            <h2 class="text-lg font-semibold text-gray-800 mb-4">@lang('pub_theme::appointment.appointment_details')</h2>
                            <div class="text-sm text-gray-700 space-y-2">
                                <p><strong>@lang('pub_theme::appointment.fields.name.label'):</strong> {{ $appointment->patient?->full_name }}</p>
                                <p><strong>@lang('pub_theme::appointment.fields.date.label'):</strong> {{ $appointment->starts_at?->format('d F Y') }}</p>
                                <p><strong>@lang('pub_theme::appointment.fields.time.label'):</strong> {{ $appointment->time_range }}</p>
                                @if($appointment->patient?->phone)
                                    <p><strong>@lang('pub_theme::appointment.fields.phone.label'):</strong> {{ $appointment->patient?->phone }}</p>
                                @endif
                                @if($appointment->patient?->email)
                                    <p><strong>@lang('pub_theme::appointment.fields.email.label'):</strong> {{ $appointment->patient?->email }}</p>
                                @endif
                                @if($appointment->notes)
                                    <p><strong>@lang('pub_theme::appointment.fields.notes.label'):</strong> {{ $appointment->notes }}</p>
                                @endif
                            </div>
                            <div class="mt-6 flex justify-end">
                                <button @click="showInfo = false" class="px-4 py-2 bg-[#FF5F7E] text-white rounded-md">
                                    @lang('pub_theme::appointment.buttons.close')
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Confirm icon + Tooltip -->
                <div x-data="{ showInfo: false }" class="relative inline-block">
                    <div @click="showInfo = true" class="mr-5 p-2 rounded-full bg-[#B4E1BE] text-[#3E783E]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="m4.5 12.75 6 6 9-13.5" />
                        </svg>
                    </div>
                      <!-- Modal confirm -->
                      <div x-show="showInfo" x-cloak class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
                        <div class="bg-white p-6 rounded-xl max-w-md w-3/4 lg:w-full">
                            <h2 class="text-[#272C4D] text-lg font-semibold mb-4">Accetta Appuntamento</h2>
                            <p class="text-sm text-gray-600">Sei sicuro di voler accettare l'appuntamento con {{ $appointment->patient?->full_name }}?</p>
                            <div class="mt-6 flex justify-end gap-2">
                                <button @click="showInfo = false" class="px-4 py-2 bg-gray-200 rounded-md">
                                    Annulla
                                </button>
                                <button @click="$wire.call('confirmAppointment', {{ $appointment->id }}); showInfo = false" class="px-4 py-2 bg-[#B4E1BE] text-[#3E783E] rounded-md">
                                    Accetta
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete icon + Modal -->
                <div x-data="{ open: false }">
                    <div @click="open = true" class="p-2 rounded-full bg-[#F38B8B] text-[#BF0303]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21
                                     c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673
                                     a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79
                                     m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562
                                     c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397
                                     m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0
                                     c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                    </div>

                    <!-- Modal reject -->
                    <div x-show="open" x-cloak class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
                        <div class="bg-white p-6 rounded-xl max-w-md w-3/4 lg:w-full">
                            <h2 class="text-[#272C4D] text-lg font-semibold mb-4">Rifiuta Appuntamento</h2>
                            <p class="text-sm text-gray-600">Sei sicuro di voler rifiutare l'appuntamento con {{ $appointment->patient?->full_name }}?</p>
                            <div class="mt-6 flex justify-end gap-2">
                                <button @click="open = false" class="px-4 py-2 bg-gray-200 rounded-md">
                                    Annulla
                                </button>
                                <button @click="$wire.call('rejectAppointment', {{ $appointment->id }}); open = false" class="px-4 py-2 bg-[#F38B8B] text-[#BF0303] rounded-md">
                                    Rifiuta
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Delete -->

            </div>
        </div>
    </div>