<div
    @if($pollMillis !== null && $pollAction !== null)
        wire:poll.{{ $pollMillis }}ms="{{ $pollAction }}"
    @elseif($pollMillis !== null)
        wire:poll.{{ $pollMillis }}ms
    @endif
>
    <div class="mb-2 ml-5">
        <x-jet-button type="button" wire:click="$emit('openModal', 'event.create-event')">{{ __('Create New Event') }}</x-jet-button>
        <x-jet-button wire:click="goToPreviousMonth()">{{ __('GO TO PREVIOUS MONTH') }}</x-jet-button>
        <x-jet-button wire:click="goToCurrentMonth()">{{ __('GO TO CURRENT MONTH') }}</x-jet-button>
        <x-jet-button wire:click="goToNextMonth()">{{ __('GO TO NEXT MONTH') }}</x-jet-button>
        <div wire:ignore class="inline">
                <input
                    wire:model="selection"
                    x-data
                    x-init="flatpickr($refs.input,  );"
                    x-ref="input"
                    type="text"
                    data-input
                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                />
            </div>
        <x-jet-secondary-button wire:click="findByDate()">{{ __('FIND') }}</x-jet-secondary-button>
    </div>

    <div class="flex">
        <div class="overflow-x-auto w-full">
            <div class="inline-block min-w-full overflow-hidden">

                <div class="w-full flex flex-row">
                    @foreach($monthGrid->first() as $day)
                        @include($dayOfWeekView, ['day' => $day])
                    @endforeach
                </div>

                @foreach($monthGrid as $week)
                    <div class="w-full flex flex-row">
                        @foreach($week as $day)
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
