<!-- Main modal -->
<div id="stepsModal" wire:ignore.self tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-3xl p-4 md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700" style="max-height:600px;overflow-y:scroll;">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                data-modal-toggle="stepsModal">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                    Steps
                    <span class="text-right">
                        <button class="px-2 py-1 text-white bg-blue-500 rounded-md"
                            wire:click.prevent="add({{ $i }})">Add</button>

                    </span>
                </h3>
                <form class="space-y-6">


                    <div>
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif



                        <form>
                            <div class=" add-input">
                                <div>
                                    <hr class="mb-3 tex-blue-500" />

                                    <div class="grid gap-2 px-5 md:grid-cols-3">

                                        <div>
                                            <label for="name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                Name</label>
                                            <input type="text" wire:model="step_name.0" name="name"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block min-w-md p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                required>
                                            @error('step_name.0')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                Assign to</label>
                                            <select wire:model.defer="assigned_to.0"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="">--select--</option>
                                                @foreach ( $users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach

                                            </select>
                                            @error('assigned_to.0')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                Status</label>
                                            <select wire:model.defer="step_status.0"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="not started">Not Yet Started</option>
                                                <option value="progress">Progress</option>
                                                <option value="review">Review</option>
                                                <option value="complete">Complete</option>
                                                <option value="cancelled">Cancelled</option>

                                            </select>
                                            @error('step_status.0')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="col-span-3">
                                            <label for="description"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>
                                            <textarea name="description" wire:model="description.0"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                                        </div>
                                    </div>

                                </div>

                            </div>








                            <hr class="mt-3 mb-3" />

                            @foreach ($inputs as $key => $value)
                                <div class=" add-input">
                                    <div class=" add-input py-4">
                                        <hr>
                                        <div class="row">
                                            {{-- <div>
                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Task
                                            name</label>
                                        <input type="text" wire:model="name.{{ $value }}" name="name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                            required>
                                        @error('name.' . $value)
                                            {{ $message }}
                                        @enderror
                                    </div> --}}
                                            <div class="grid gap-2 px-5 md:grid-cols-3 pt-5">

                                                <div>
                                                    <label for="name"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                        Name</label>
                                                    <input type="text" wire:model="step_name.{{ $value }}" 
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block min-w-md p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                        required>
                                                    @error('step_name.' . $value)
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                                <div>
                                                    <label for="name"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                        Assign to</label>
                                                    <select wire:model.defer="assigned_to.{{ $value }}"
                                                        name="assigned_to"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option value="">--select--</option>
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                    @error('assigned_to.' . $value)
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                                <div>
                                                    <label for="name"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                        Status</label>
                                                    <select wire:model.defer="step_status.{{ $value }}"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option value="not started">Not Yet Started</option>
                                                        <option value="progress">Progress</option>
                                                        <option value="review">Review</option>
                                                        <option value="complete">Complete</option>
                                                        <option value="cancelled">Cancelled</option>

                                                    </select>
                                                    @error('step_status.' . $value)
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                                <div class="col-span-3">
                                                    <label for="description"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>
                                                    <textarea name="description" wire:model="description.{{ $value }}"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                                                </div>
                                            </div>


                                            <div class="col-md-2">
                                                <button class="px-2 py-1 text-white bg-red-500 rounded-md ml-5 mt-5"
                                                    wire:click.prevent="remove({{ $key }})">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="row">
                                <button class="px-2 py-1 text-white bg-blue-500 rounded-md"
                                    wire:click.prevent="createStep()">Create</button>
                            </div>

                        </form>
                    </div>



                </form>
            </div>
        </div>
    </div>
</div>
