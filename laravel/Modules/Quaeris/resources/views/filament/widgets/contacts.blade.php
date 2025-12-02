<x-filament::card>
        <div class="flex items-center justify-center">
                <p>Contacts</p>
        </div>

            @foreach ($grouped_contact as $v)
                <div class="flex items-center justify-center">
                    {{ $v->day }} - {{ $v->q }} -                     <button type="button"
                    x-bind:class="{ 'enabled:opacity-70 enabled:cursor-wait': isUploadingFile }" class="filament-button filament-button-size-md inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset min-h-[2.25rem] px-4 text-sm text-white shadow focus:ring-white border-transparent bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700">
                        <span class="flex items-center gap-1">
                            {{-- <svg class="mr-3 h-5 w-5 animate-spin text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg> --}}
                                Visualizza
                        </span>

                    </button>
                </div>
                {{-- <p>
                    <button class="btn btn-secondary"
                        onclick="Livewire.emit('modal.open', 'modal.contact.show.by.day', {'survey_pdf_id': '{{ $surveyPdf->id }}','day': '{{ $v->day }}' })">
                        Detail</button>
                </p> --}}
            @endforeach

</x-filament::card>

