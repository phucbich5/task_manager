<div class="relative" style="height:auto">
    
    <div class="container mx-auto py-5 pl-20">
        <div class="mx-auto w-full py-10">
            <h1 class="text-3xl font-bold">Task name: <span class="text-blue-500">{{ $task->name }}</span></h1>
        </div>

        <ol class="relative border-l border-blue-500 dark:border-gray-700">

            @if (count($task->steps) != 0)
                @foreach ($steps as $step)
                    {{-- {{dd($s)}} --}}
                    <li class="mb-10 ml-6 border-b">
                        <div
                            class="absolute w-3 h-3 bg-blue-500 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                        </div>
                        <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                            {{ $step->name }}
                            <span
                                class="text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">
                                @if ($step->status == 'review')
                                    <select class="p-1 text-xs text-white bg-purple-400 rounded-md px-10 border-0"
                                        name="status">
                                        <option value="not started">not started</option>
                                        <option value="progress">progress</option>
                                        <option value="complete">complete</option>
                                        <option value="review" selected>review</option>
                                    </select>

                                    <span class="ml-2 text-green-500"
                                        wire.click="mark_status_complete({{ $step->task_id, $step->id }})"><i
                                            class="fas fa-check"></i></span>
                                @elseif ($step->status == 'completed')
                                    <select class="p-1 text-xs text-white bg-blue-400 rounded-md px-10 border-0"
                                        name="status">
                                        <option value="not started">not started</option>
                                        <option value="progress">progress</option>
                                        <option value="complete" selected>complete</option>
                                        <option value="review">review</option>
                                    </select>
                                @elseif($step->status == 'progress')
                                    <select class="p-1 text-xs text-white bg-yellow-500 rounded-md px-10 border-0"
                                        name="status">
                                        <option value="not started">not started</option>
                                        <option value="progress" selected>progress</option>
                                        <option value="complete">complete</option>
                                        <option value="review">review</option>
                                    </select>
                                    {{-- <span class="ml-2 text-green-500" wire.click="mark_status_complete({{$step->task_id,$step->id}})"><i class="fas fa-check"></i></span> --}}
                                @elseif($step->status == 'cancelled')
                                    <select class="p-1 text-xs text-white bg-green-500 rounded-md px-10 border-0"
                                        name="status">
                                        <option value="not started">not started</option>
                                        <option value="progress">progress</option>
                                        <option value="complete" selected>complete</option>
                                        <option value="review">review</option>
                                    </select>
                                    {{-- <span class="ml-2 text-green-500" wire.click="mark_status_complete({{$step->task_id,$step->id}})"><i class="fas fa-check"></i></span> --}}
                                @elseif($step->status == 'not started')
                                    <select class="p-1 text-xs text-white bg-red-400 rounded-md px-10 border-0"
                                        name="status">
                                        <option value="not started" selected>not started</option>
                                        <option value="progress">progress</option>
                                        <option value="complete">complete</option>
                                        <option value="review">review</option>
                                    </select>
                                    <button class="ml-2 text-green-500" type="button"
                                        wire:click="changestatus({{ $step->id }})"><i
                                            class="fas fa-check"></i></button>
                                @endif
                            </span>
                        </h3>
                        <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">
                            <span class="mr-2 text-blue-300"><i class="fas fa-user"></i></span>
                            
                            {{($step->assigned_user->name)}}
                            {{-- {{ $step->assigned_users }} --}}
                            
                        </p>
                        <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">
                            {{ $step->description }}</p>
                    </li>
                @endforeach
            @else
                <h3 class="flex items-center mb-1 text-lg font-semibold text-red-500 dark:text-white pl-10">
                    Don't have step
                </h3>
            @endif

        </ol>
    </div>


</div>

