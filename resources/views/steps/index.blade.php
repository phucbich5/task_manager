<div class="container mx-auto tab_content">
    <div class="flex items-center justify-between mb-5 content_header">
        <h1 class="text-3xl font-bold text-blue-600">STEPS</h1>

        <div class="flex items-center">


            @livewire('countstep')
            @can('isAdmin')
                <button
                    class="ml-5 px-10 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    style="background: #205081;" type="button" data-modal-toggle="step-modal">
                    Add
                </button>
            @endcan
        </div>

    </div>

    @include('steps.create')

    <div class="flex justify-end my-5 mr-5">
        {{ $steps->links() }}
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg table_content">

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="20 text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Task Name
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Person in Charge
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Deadline
                    </th>
                    <th scope="col" class="px-4 py-3 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($steps as $st)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-4 py-4 ">
                            {{ $st->name }}
                        </td>
                        <td class="px-4 py-4 ">
                            {{ $st->task_info->name }}
                        </td>

                        <td class="px-4 py-4 ">
                            @if ($st->status == 'review')
                                <p class="p-1 text-xs text-white bg-purple-400 rounded-md px-2 border-0" name="status">
                                    review
                                </p>

                                <span class="ml-2 text-green-500"
                                    wire.click="mark_status_complete({{ $st->task_id, $st->id }})"></span>
                            @elseif ($st->status == 'completed')
                                <p class="p-1 text-xs text-white bg-blue-400 rounded-md px-2 border-0" name="status">
                                    complete
                                </p>
                            @elseif($st->status == 'progress')
                                <p class="p-1 text-xs text-white bg-yellow-500 rounded-md px-2 border-0" name="status">
                                    progress
                                </p>
                            @elseif($st->status == 'cancelled')
                                <p class="p-1 text-xs text-white bg-green-500 rounded-md px-2 border-0" name="status">
                                    complete
                                </p>
                            @elseif($st->status == 'not started')
                                <p class="p-1 text-xs text-white bg-red-400 rounded-md px-2 border-0" name="status">not
                                    started
                                </p>
                            @endif
                        </td>

                        <td class="px-4 py-4" style="display:table-cell">
                            <div class="flex items-center">
                                <img src="/storage/{{ $st->assigned_user->image }}" alt=""
                                    style="width:30px;height:30px;border-radius:50%;">
                                <p class="ml-2">{{ $st->assigned_user->name }}</p>
                            </div>
                        </td>
                        <td class="px-4 py-4 ">
                            {{ $st->description }}
                        </td>
                        <td class="px-4 py-4 ">
                            {{ $st->deadline }}
                        </td>

                        <td class="px-4 py-4 text-center">
                            <div class="flex items-center justify-center">
                                <div class="px-2">
                                    <button type="button" class="text-red-600" data-modal-toggle="step-modal"
                                        wire:click="edit({{ $st->id }})">
                                        <i class="fa-solid fa-pen-to-square mx-2"></i>
                                    </button>
                                </div>
                                @can('isAdmin')
                                    <div>
                                        <button type="button" wire:click="deleteId({{ $st->id }})"
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
                                                            Are you sure want to delete?
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
                                                            wire:click.prevent="delete_step()"
                                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                                                            Yes</button>
                                                        <button data-modal-toggle="confirm_delete" type="button"
                                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div class="flex justify-end my-5 mr-5">
        {{ $steps->links() }}
    </div>
</div>
