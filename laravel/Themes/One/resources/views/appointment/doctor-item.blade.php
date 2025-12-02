<!-- Appointment card -->
    <div class="w-full flex flex-col justify-center items-center py-3 px-4">
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
                @foreach($this->all_states as $state=>$stateClass)
                @if($this->canTransitionTo($appointment->id,$stateClass))
                    @php
                        $action=Str::camel($state).'Action';
                    @endphp
                   {{-- ($this->$action)(['appointment' => $appointment->id]) --}} 
                   {{ ($this->transitionAction)(['appointment' => $appointment->id,'stateClass'=>$stateClass]) }}
                @endif
                @endforeach
                
                
            </div>
        </div>
    </div>