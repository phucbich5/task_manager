<div
    @if ($pollMillis !== null && $pollAction !== null) wire:poll.{{ $pollMillis }}ms="{{ $pollAction }}"
    @elseif($pollMillis !== null)
        wire:poll.{{ $pollMillis }}ms @endif>
    <div>
        @includeIf($beforeCalendarView)
    </div>

    <div class="flex">
        <div class="w-full overflow-x-auto">
            <div class="inline-block min-w-full overflow-hidden">

                <div class="flex flex-row w-full">
                    @foreach ($monthGrid->first() as $day)
                        @include($dayOfWeekView, ['day' => $day])
                    @endforeach
                </div>

                @foreach ($monthGrid as $week)
                    <div class="flex flex-row w-full">
                        @foreach ($week as $day)
                          {{-- {{dd($day)}} --}}
                        
                            @include($dayView, [
                                'componentId' => $componentId,
                                'day' => $day,
                                'dayInMonth' => $day->isSameMonth($startsAt),
                                'isToday' => $day->isToday(),
                                'events' => $getEventsForDay($day, $events),
                            ])
                       
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div>
        @includeIf($afterCalendarView)
    </div>
    
</div>
