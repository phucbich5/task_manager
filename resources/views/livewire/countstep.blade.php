<div wire:poll class="flex">
@can('isAdmin')
    <p class="px-3 mx-1 bg-red-400 rounded-lg text-white py-2 text-center"><b>{{ $steps_notproress }}</b><br>Not started
    </p>
    <p class="px-3 mx-1 bg-yellow-500 rounded-lg text-white py-1 text-center"><b>{{ $steps_progress }}</b><br>Progress
    </p>
    <p class="px-3 mx-1 bg-purple-400 rounded-lg text-white py-1 text-center"><b>{{ $steps_review }}</b><br>Review
    </p>
    <p class="px-3 mx-1 bg-blue-400 rounded-lg text-white py-1 text-center"><b>{{ $steps_complete }}</b><br>Complete
    </p>
@endcan
@cannot('isAdmin')
    <p class="px-3 mx-1 bg-red-400 rounded-lg text-white py-1 text-center"><b>{{ $steps_notproress }}</b><br>Not started
    </p>
    <p class="px-3 mx-1 bg-yellow-500 rounded-lg text-white py-1 text-center"><b>{{ $steps_progress }}</b><br>Progress
    </p>
    <p class="px-3 mx-1 bg-purple-400 rounded-lg text-white py-1 text-center"><b>{{ $steps_review }}</b><br>Review
    </p>
    <p class="px-3 mx-1 bg-blue-400 rounded-lg text-white py-1 text-center"><b>{{ $steps_complete }}</b><br>Complete
    </p>

@endcan
</div>
