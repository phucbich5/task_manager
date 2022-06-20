<div class="container mx-auto tab_content">

    <div class="flex items-center justify-between mb-5 content_header">
        <h1 class="text-3xl font-bold text-blue-600">Event</h1>
        @can('isAdmin')
            <button
                class="block px-5 px-10 py-2 my-5 font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                style="background: #205081;" type="button" data-modal-toggle="event-modal">
                Add
            </button>
        @endcan
    </div>

    <div id="event-modal" wire:ignore.self tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-2xl p-4 md:h-auto h_form">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div
                    class="flex items-center justify-between w-full px-10 py-5 text-white bg-blue-600 border-b rounded-t-lg">
                    <h3 class="text-xl font-medium text-white">
                        @if ($updateMode)
                            Edit Event
                        @else
                            Add Event
                        @endif

                    </h3>
                    <button type="button"
                        class="text-white bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                        data-modal-toggle="event-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
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
                        <div class="flex ">
                            <div class="w-1/2 mr-3">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Name</label>
                                <input type="text" wire:model="title" name="title"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required>
                                @error('title')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="w-1/2 ml-3">
                                <label for="keyperson"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Key
                                    Person</label>
                                <select id="status" wire:model.defer="keyperson"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">--select--</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('keyperson')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div>
                            <label for="date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Date</label>
                            <input type="datetime-local" wire:model="date" name="date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required>
                            @error('date')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex">
                            <div class="w-1/2 mr-2">
                                <label for="duration"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Duration</label>
                                <input type="number" wire:model="duration" name="duration"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required>
                                @error('duration')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="w-1/2 ml-2">
                                <label for="location"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Location</label>
                                <select id="location" wire:model.defer="location"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">--select--</option>
                                    <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                                    <option value="Hải Phòng">Hải Phòng</option>
                                    <option value="Hà Nội">Hà Nội</option>
                                    <option value="Đà Nẵng">Đà Nẵng</option>
                                </select>
                                {{-- @error('location')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror --}}
                            </div>
                        </div>
                        <div>
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>
                            <input type="text" wire:model="description" name="description"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required>
                            @error('description')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-2 mb-4 md:grid-cols-2">
                            <div>
                                <label for="status"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Status</label>
                                <select id="status" wire:model.defer="status"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">--select--</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>

                                </select>
                                @error('status')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="event_type"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Event
                                    Type</label>
                                <select id="event_type" wire:model.defer="event_type"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">--select--</option>
                                    @foreach ($event_types as $type)
                                        <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @error('event_type')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>



                        @if ($updateMode)
                            <button type="submit" wire:click.prevent="update"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                        @else
                            <button type="submit" wire:click.prevent="store"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg table_content">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Date
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Duration
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Key Person
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Event Type
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Location
                    </th>
                    @can('isAdmin')
                        <th scope="col" class="px-4 py-3 text-center">
                            Action
                        </th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-4 py-4 text-xs">
                            {{ $event->title }}
                        </td>
                        <td class="px-4 py-4 text-xs">
                            {{ $event->description }}
                        </td>
                        <td class="px-4 py-4 text-xs">
                            {{ $event->date }}
                        </td>
                        <td class="px-4 py-4 text-xs">
                            {{ $event->duration }}
                        </td>
                        <td class="px-4 py-4 text-xs">
                            {{ $event->users_name }}
                        </td>
                        <td class="px-4 py-4">
                            @if ($event->status == '1')
                                <span class="p-1 text-xs text-white bg-blue-600 rounded-md">
                                    Active
                                </span>
                            @elseif($event->status == '0')
                                <span class="p-1 text-xs text-white bg-red-600 rounded-md">
                                    In active
                                </span>
                            @endif

                        </td>

                        <td class="px-4 py-4 text-xs">
                            {{ $event->event_types_name }}
                        </td>
                        <td class="px-4 py-4 text-xs">
                            {{ $event->location }}
                        </td>

                        @can('isAdmin')
                            <td class="px-4 py-4 text-center">
                                <div class="flex items-center justify-center">

                                    <div class="px-2">
                                        <button type="button" class="text-red-600" data-modal-toggle="event-modal"
                                            wire:click="edit({{ $event->id }})">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </div>

                                    <div>
                                        <button type="button" wire:click="deleteId({{ $event->id }})"
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
                                                            Are you sure want to delete event <span
                                                                class="text-blue-500">{{ $event->title }}</span> ?
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
                        @endcan
                    </tr>
                @endforeach

            </tbody>

        </table>


    </div>
</div>
