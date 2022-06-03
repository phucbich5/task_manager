@can('isAdmin')
    <p class="px-3 mx-1 bg-purple-400 rounded-lg text-white py-2">Review: <span
            class="font-bold text-white">{{ $steps_review }}</span>
    </p>
    <p class="px-3 mx-1 bg-yellow-500 rounded-lg text-white py-2">Progress: <span
            class="font-bold text-white">{{ $steps_progress }}</span>
    </p>
    <p class="px-3 mx-1 bg-blue-400 rounded-lg text-white py-2">Complete: <span
            class="font-bold text-white">{{ $steps_complete }}</span>
    </p>
    <p class="px-3 mx-1 bg-red-400 rounded-lg text-white py-2">Not started: <span
            class="font-bold text-white">{{ $steps_notproress }}</span>
    </p>
@endcan
@cannot('isAdmin')
    <p class="px-3 mx-1 bg-purple-400 rounded-lg text-white py-2">Review: <span
            class="font-bold text-white">{{ $steps_review }}</span>
    </p>
    <p class="px-3 mx-1 bg-yellow-500 rounded-lg text-white py-2">Progress: <span
            class="font-bold text-white">{{ $steps_progress }}</span>
    </p>
    <p class="px-3 mx-1 bg-blue-400 rounded-lg text-white py-2">Complete: <span
            class="font-bold text-white">{{ $steps_complete }}</span>
    </p>
    <p class="px-3 mx-1 bg-red-400 rounded-lg text-white py-2">Not started: <span
            class="font-bold text-white">{{ $steps_notproress }}</span>
    </p>
@endcan
