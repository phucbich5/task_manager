<div class="container mx-auto tab_content">
    <div class="flex items-center justify-between mb-5 content_header">
        <h1 class="text-3xl font-bold text-blue-600">TASKS</h1>
        <button
            class="px-10 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button" data-modal-toggle="authentication-modal">
            Add
        </button>
        
    </div>
    @include('tasks.create')
    @include('tasks.steps')
    {{-- {{ $count_task }} --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg table_content">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="table_task">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-3">
                        Task
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Deadline
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Status
                    </th>

                    <th scope="col" class="px-4 py-3 text-center">
                        Edit
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-4 py-4">
                            @if ($task->status == 'cancelled')
                                <span class="p-1 text-xs font-black text-black line-through">
                                    {{ $task->name }}
                                </span>
                            @else
                                <span class="p-1 text-xs font-black text-black">
                                    {{ $task->name }}
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-4 text-xs">
                            {{ $task->description }}
                        </td>
                        <td class="px-4 py-4 text-xs">
                            {{ $task->deadline }}
                        </td>
                        <td class="px-4 py-4">

                            @if ($task->status == 'open')
                                <span class="p-1 text-xs text-white bg-yellow-400 rounded-md">
                                    Open
                                </span>
                            @elseif($task->status == 'closed')
                                <span class="p-1 text-xs text-white bg-green-400 rounded-md">
                                    Closed
                                </span>
                            @elseif($task->status == 'cancelled')
                                <span class="p-1 text-xs text-white bg-red-400 rounded-md">
                                    Cancelled
                                </span>
                            @endif

                        </td>

                        <td class="px-4 py-4 text-center">
                            <div class="flex items-center">
                                <div class="px-2">
                                    <button type="button" class="text-blue-500" data-modal-toggle="stepsModal"
                                        wire:click="addStep({{ $task->id }})">
                                        <i class="fa-brands fa-nfc-symbol"></i>
                                    </button>

                                </div>
                                <div class="px-2">
                                    <button type="button" class="text-blue-500"
                                        data-modal-toggle="authentication-modal" wire:click="edit({{ $task->id }})">
                                        Edit
                                    </button>
                                </div>
                                <div class="px-2">
                                    <a href="/view-task/?id={{ $task->id }}" class="text-blue-500"
                                        wire:click="edit({{ $task->id }})">
                                        View
                                    </a>
                                </div>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

<script>
    $(document).ready(function () {
        $('#table_id').DataTable();
    });
</script>