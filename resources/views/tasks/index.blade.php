<div class="container mx-auto tab_content">
    <div class="flex items-center justify-between mb-5 content_header">
        <h1 class="text-3xl font-bold text-blue-600">TASKS</h1>
        <div class="flex items-center">
            @livewire('counttask')
            @can('isAdmin')
                <button
                    class="ml-5 px-10 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    style="background: #205081;" type="button" data-modal-toggle="authentication-modal">
                    Add
                </button>
            @endcan
        </div>
    </div>
    @include('tasks.create')
    @include('tasks.steps')
    <div class="flex justify-end my-5 mr-5">
        {{ $tasks->links() }}
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg table_content">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="table_task">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
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
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>


                @foreach ($tasks as $task)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-4 py-4">
                            @if ($task->status == 'cancelled')
                                <span class="p-1 line-through">
                                    {{ $task->name }}
                                </span>
                            @else
                                {{ $task->name }}
                            @endif
                        </td>
                        <td class="px-4 py-4 text-xs">
                            @if ($task->status == 'cancelled')
                                <span class="p-1 line-through">
                                    {{ $task->description }}
                                </span>
                            @else
                                {{ $task->description }}
                            @endif
                        </td>
                        <td class="px-4 py-4 text-xs">
                            @if ($task->status == 'cancelled')
                                <span class="p-1 line-through">
                                    {{ $task->deadline }}
                                </span>
                            @else
                                {{ $task->deadline }}
                            @endif
                        </td>
                        <td class="px-4 py-4">

                            @if ($task->status == 'open')
                                <span class="p-1 text-xs text-white bg-blue-600 rounded-md">
                                    Open
                                </span>
                            @elseif($task->status == 'closed')
                                <span class="p-1 text-xs text-white bg-yellow-500 rounded-md">
                                    Closed
                                </span>
                            @elseif($task->status == 'cancelled')
                                <span class="p-1 text-xs text-white bg-red-600 rounded-md">
                                    Cancelled
                                </span>
                            @endif

                        </td>

                        <td class="px-4 py-4 text-center">
                            <div class="flex items-center justify-center">
                                @can('isAdmin')
                                    <div class="px-4">
                                        <button type="button" class="text-blue-500" data-modal-toggle="stepsModal"
                                            wire:click="addStep({{ $task->id }})">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>

                                    <div class="px-4">
                                        <button type="button" class="text-red-600"
                                            data-modal-toggle="authentication-modal" wire:click="edit({{ $task->id }})">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </div>
                                @endcan
                                <div class="px-4">
                                    <a href="/view-task/?id={{ $task->id }}" class="text-yellow-500"
                                        wire:click="edit({{ $task->id }})">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </div>
                                <div>
                                    <button type="button" wire:click="deleteId({{ $task->id }})"
                                        data-modal-toggle="confirm_delete"><i
                                            class="fa-solid fa-trash text-red-500 mx-2"></i></button>
                                    <div id="confirm_delete" tabindex="-1" aria-hidden="true" wire:ignore.self
                                        tabindex="-1" aria-hidden="true"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                                        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div
                                                    class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                        Are you sure want to delete Task <span
                                                            class="text-blue-500">{{ $task->name }}</span> ?
                                                    </h3>
                                                    <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-toggle="confirm_delete">
                                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div
                                                    class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                                                    <button data-modal-toggle="confirm_delete" type="button"
                                                        wire:click.prevent="delete_event()"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                                                        Yes</button>
                                                    <button data-modal-toggle="confirm_delete" type="button"
                                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div class="flex justify-end my-5 mr-5">
        {{ $tasks->links() }}
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#table_id').DataTable();
    });
</script>
