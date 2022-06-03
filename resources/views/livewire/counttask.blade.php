@can('isAdmin')
    <p class="px-3 mx-1 bg-yellow-500 rounded-lg text-white py-2">Task Close: <span
            class="font-bold text-white">{{ $tasks_close }}</span>
    </p>
    <p class="px-3 mx-1 rounded-lg bg-blue-700 text-white py-2">Task Open: <span
            class="font-bold text-white">{{ $tasks_open }}</span>
    </p>
@endcan
@cannot('isAdmin')
<p class="px-3 mx-1 bg-yellow-500 rounded-lg text-white py-2">Task Close: <span
        class="font-bold text-white">{{ $tasks_close }}</span>
</p>
<p class="px-3 mx-1 rounded-lg bg-blue-700 text-white py-2">Task Open: <span
        class="font-bold text-white">{{ $tasks_open }}</span>
</p>
@endcan
