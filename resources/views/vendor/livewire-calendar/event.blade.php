<div @if ($eventClickEnabled) wire:click.stop="onEventClick('{{ $event['id'] }}')" @endif
    class="px-3 py-2 bg-white border rounded-lg shadow-md cursor-pointer">

    <p class="text-sm font-medium">

        @if (str_contains($event->event_model->name, 'TR') && str_contains($event->event_model->name, 'GS'))
            <span class="text-blue-400">
                <i class="fa-solid fa-graduation-cap"></i>
            </span>
        @else
            <span class="text-yellow-700">
                <i class="fa-solid fa-wand-magic-sparkles"></i>
            </span>
        @endif

        {{ $event->event_model->name }}
    </p>
    <p class="px-1 py-1 text-xs text-white bg-red-400 rounded-lg ">
        {{ date('g:i a', strtotime($event['date'])) }}
    </p>
</div>
