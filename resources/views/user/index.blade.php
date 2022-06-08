<div class="container mx-auto tab_content">

    <div class="flex items-center justify-between mb-5 content_header">
        <h1 class="text-3xl font-bold text-blue-600">USERS</h1>
        <button
            class="px-10 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            style="background: #205081;" type="button" data-modal-toggle="user-modal">
            Add
        </button>
    </div>

    @include('user.create')

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg table_content">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Avatar
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Role
                    </th>
                    <th scope="col" class="px-4 py-3 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($users as $user)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-4 py-4 text-xs">
                                {{ $user->name }}
                            </td>
                            <td class="px-4 py-4 text-xs">
                                {{ $user->email }}
                            </td>
                            <td class="px-4 py-4">
                                @if ($user->status == '1')
                                    <span class="p-1 text-xs text-white bg-blue-600 rounded-md">
                                        Active
                                    </span>
                                @elseif($user->status == '0')
                                    <span class="p-1 text-xs text-white bg-red-600 rounded-md">
                                        In active
                                    </span>
                                @endif

                            </td>
                            <td class="px-4 py-4 text-xs">
                                <img src="/storage/{{ $user->image }}" alt="" style="width:50px;height:50px;border-radius:50%">
                            </td>
                            <td class="px-4 py-4 text-xs">
                                {{ $user->role }}
                            </td>

                            <td class="px-4 py-4 text-center">
                                <div class="flex items-center justify-center">
                                    <div class="px-2">
                                        <button type="button" class="text-red-600" data-modal-toggle="user-modal"
                                            wire:click="edit({{ $user->id }})">
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
    <div class="flex justify-center my-5">
        {{ $users->links() }}
    </div>
</div>
