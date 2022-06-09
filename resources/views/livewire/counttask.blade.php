<div wire:poll class="flex">
@can('isAdmin')
    <p class="px-3 mx-1 rounded-lg bg-blue-700 text-white py-1 text-center text-center"><b>{{ $tasks_open }}</b><br>Task
        Open
    </p>
    <p class="px-3 mx-1 bg-yellow-500 rounded-lg text-white py-1 text-center text-center"><b>{{ $tasks_close }}</b><br>Task
        Close
    </p>
@endcan
@cannot('isAdmin')
    <p class="px-3 mx-1 rounded-lg bg-blue-700 text-white py-1 text-center text-center">
        <b>{{ $tasks_open }}</b><br>Task Open
    </p>
    <p class="px-3 mx-1 bg-yellow-500 rounded-lg text-white py-1 text-center text-center">
        <b>{{ $tasks_close }}</b><br>Task Close
    </p>

@endcan
</div>