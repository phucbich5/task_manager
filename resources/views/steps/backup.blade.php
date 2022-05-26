<div class="container mx-auto tab_content">
    <div class="flex items-center justify-between mb-5 content_header">
        <h1 class="text-3xl font-bold text-blue-600">STEPS</h1>
        <button
            class="px-10 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button" data-modal-toggle="step-modal">
            Add
        </button>

    </div>

    @include('steps.create')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg table_content">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="20 text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Task_id
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Assigned_to
                    </th>
                    <th scope="col" class="px-4 py-3 text-center">
                        Description
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
                            {{ $st->status }}
                        </td>
                        <td class="px-4 py-4 ">
                            {{ $st->assigned_user->name }} 
                        </td>
                        <td class="px-4 py-4 ">
                            {{ $st->description }}
                        </td>

                        <td class="px-4 py-4 text-center">
                            <div class="flex items-center">
                                {{-- <div class="px-2">
                            <button type="button" class="text-blue-500" data-modal-toggle="stepsModal"
                                wire:click="addStep({{ $st->id }})">
                                <i class="fa-brands fa-nfc-symbol"></i>
                            </button>
                        </div> --}}
                                <div class="px-2">
                                    <button type="button" class="text-blue-500" data-modal-toggle="step-modal"
                                        wire:click="edit({{ $st->id }})">
                                        Edit
                                    </button>
                                </div>
                                {{-- <div class="px-2">
                            <a href="/view-task/?id={{ $st->id }}" class="text-blue-500"
                                wire:click="edit({{ $st->id }})">
                                View
                            </a>
                        </div> --}}
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
