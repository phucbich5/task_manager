<div wire:poll class="my-5">
    {{-- Current time: {{ now() }} --}}

    @can('isAdmin')
        <div class="ml-5">
            <button
                class="my-5 px-10 block text-white bg-blue-700 hover:bg-blue-800
            focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium
            rounded-lg px-5 py-2 text-center dark:bg-blue-600
            dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                style="background: #205081;" type="button" data-modal-toggle="event_type-modal">
                Add
            </button>
            
        </div>

        <!-- Main modal -->
        <div id="event_type-modal" wire:ignore.self tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden
        overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-full h-full max-w-2xl p-4 md:h-auto h_form">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div
                        class="w-full flex justify-between items-center px-10 py-5
                    border-b text-white bg-blue-600 rounded-t-lg">
                        <h3 class="text-xl font-medium text-white">
                            @if ($updateMode)
                                Edit Event
                            @else
                                Add Event
                            @endif

                        </h3>
                        <button type="button" onclick="location.href='/event_types'"
                            class="text-white bg-transparent hover:bg-gray-200
                        hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto
                        inline-flex items-center dark:hover:bg-gray-800
                        dark:hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20
                                            20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10
                                                8.586l4.293-4.293a1 1 0 111.414 1.414L11.414
                                                10l4.293 4.293a1 1 0 01-1.414 1.414L10
                                                11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586
                                                10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="px-6 py-6 lg:px-8">
                        <form class="space-y-4">
                            @if ($updateMode)
                                <div class="hidden">
                                    <input type="hidden" value="$event_id">
                                </div>
                            @endif
                            <div>
                                <label for="name"
                                    class="block mb-2 text-sm
                                font-medium text-gray-900 dark:text-gray-300">
                                    Name</label>
                                <input type="text" wire:model="name" name="name"
                                    class="bg-gray-50 border border-gray-300
                                text-gray-900 text-sm rounded-lg
                                focus:ring-blue-500 focus:border-blue-500 block
                                w-full p-2.5 dark:bg-gray-600
                                dark:border-gray-500 dark:placeholder-gray-400
                                dark:text-white"
                                    required>
                                @error('name')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="status"
                                    class="block mb-2 text-sm font-medium
                                text-gray-900 dark:text-gray-400">Status</label>
                                <select id="status" wire:model.defer="status"
                                    class="bg-gray-50 border border-gray-300
                                text-gray-900 text-sm rounded-lg
                                focus:ring-blue-500 focus:border-blue-500 block
                                w-full p-2.5 dark:bg-gray-700
                                dark:border-gray-600 dark:placeholder-gray-400
                                dark:text-white dark:focus:ring-blue-500
                                dark:focus:border-blue-500">
                                    <option value="">--select--</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>

                                </select>
                                @error('status')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            @if ($updateMode)
                                <button type="submit" wire:click.prevent="update"
                                    class="w-full text-white bg-blue-700
                            hover:bg-blue-800 focus:ring-4 focus:outline-none
                            focus:ring-blue-300 font-medium rounded-lg text-sm
                            px-5 py-2.5 text-center dark:bg-blue-600
                            dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                            @else
                                <button type="submit" wire:click.prevent="store"
                                    class="w-full text-white bg-blue-700
                            hover:bg-blue-800 focus:ring-4 focus:outline-none
                            focus:ring-blue-300 font-medium rounded-lg text-sm
                            px-5 py-2.5 text-center dark:bg-blue-600
                            dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                            @endif

                        </form>
                    </div>
                </div>
            </div>
        </div>




        <div class="relative overflow-x-auto shadow-md sm:rounded-lg table_content">
            <table class="w-full text-sm text-left text-gray-500
            dark:text-gray-400">
                <thead
                    class="text-xs text-gray-700 uppercase bg-gray-200
                dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">
                            Name
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
                    @foreach ($event_types as $event_type)
                        <tr class="bg-white border-b dark:bg-gray-800
                    dark:border-gray-700">
                            <td class="px-4 py-4 text-xs">
                                {{ $event_type->name }}
                            </td>
                            <td class="px-4 py-4 text-xs">
                                @if ($event_type->status == '1')
                                    <span class="p-1 text-xs text-white bg-blue-600 rounded-md">
                                        Active
                                    </span>
                                @elseif($event_type->status == '0')
                                    <span class="p-1 text-xs text-white bg-red-600 rounded-md">
                                        In active
                                    </span>
                                @endif

                            </td>

                            <td class="px-4 py-4 text-center">
                                <div class="flex items-center justify-center">
                                    <div class="px-2">
                                        <button type="button" class="text-red-600" data-modal-toggle="event_type-modal"
                                            wire:click="edit({{ $event_type->id }})">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>


        </div>
    @endcan
    @cannot('isAdmin')
        <p class="ml-5">Bạn không có quyền truy cập</p>
    @endcan
</div>
