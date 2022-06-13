<div  class="my-5">
    {{-- Current time: {{ now() }} --}}

    @can('isAdmin')
        <div class="flex justify-between">
            <button
            class="block px-5 px-10 py-2 my-5 font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            style="background: #205081;" type="button" data-modal-toggle="event-modal">
            Add
        </button>
        <a href="/tasks" class="block px-5 px-10 py-2 my-5 font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Dashboard
        </a>
        </div>
        
        <!-- Main modal -->
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
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
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
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
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
                            <div class="w-1/2 mr-3">
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
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
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
    @endcan


    
    @foreach ($events as $event)
        <div class="px-3 py-4 mb-5 bg-blue-400 rounded-xl">
            {{-- Success is as dangerous as failure. --}}
            <div class="flex flex-row justify-between mb-3">
                <div class="flex">
                    <div class="text-white basis-3/4">
                        {{ $event->name }}
                    </div>
                    <div class="ml-5 basis-1/4">
                        <span class="text-white">
                            <i class="fas fa-location-pin"></i>
                            Jeff Bezos
                        </span>
    
                    </div>
                </div>
                @can('isAdmin')
                <button type="button" class="text-white" data-modal-toggle="event-modal"
                    wire:click="edit({{ $event->id }})">
                    <i class="fa-solid fa-pen-to-square"></i>
                </button>
                @endcan
            </div>
            <hr>

            <h1 class="mt-3 mb-3 text-2xl text-white">
                {{ $event->duration }} hours
            </h1>

            <h3 class="mb-3 text-3xl text-white">
                {{ $event->title }}
            </h3>

            <hr>
            <p class="mb-3 text-white">Team assigned</p>

            <div class="flex">
                <img class="w-10 h-10 mx-1 border-2 border-white rounded-full dark:border-gray-800"
                    src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="">
                <img class="w-10 h-10 mx-1 border-2 border-white rounded-full dark:border-gray-800"
                    src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="">
                <img class="w-10 h-10 mx-1 border-2 border-white rounded-full dark:border-gray-800"
                    src="https://flowbite.com/docs/images/people/profile-picture-3.jpg" alt="">
                <img class="w-10 h-10 mx-1 border-2 border-white rounded-full dark:border-gray-800"
                    src="https://flowbite.com/docs/images/people/profile-picture-4.jpg" alt="">
            </div>

        </div>
    @endforeach
</div>
