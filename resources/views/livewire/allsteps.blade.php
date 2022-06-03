<div class="container mx-auto tab_content">
    <div class="flex items-center justify-between mb-5 content_header">
        <h1 class="text-3xl font-bold text-blue-600">ALL STEPS</h1>

        <div class="flex items-center">


            @livewire('countstep-all')
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
                    {{-- <th scope="col" class="px-4 py-3 text-center">
                        Action
                    </th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($steps_all as $st)
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

                        <td class="px-4 py-4 ">
                            {{ $st->assigned_user->name }}
                        </td>
                        <td class="px-4 py-4 ">
                            {{ $st->description }}
                        </td>
                        <td class="px-4 py-4 ">
                            {{ $st->deadline }}
                        </td>

                        {{-- <td class="px-4 py-4 text-center">
                            @if (auth()->user()->id == $st->assigned_to)
                                <div class="flex items-center justify-center">
                                    <div class="px-2">
                                        <button type="button" class="text-red-600" data-modal-toggle="step-modal"
                                            wire:click="edit({{ $st->id }})">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </div>
                                </div>
                            @endif




                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div class="flex justify-center my-5">
        {{ $steps_all->links() }}
    </div>
</div>
