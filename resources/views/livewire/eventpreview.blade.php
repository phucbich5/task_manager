<div class="py-6 mr-3" wire:poll>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

    @if(count($events) != 0)
    @foreach($events as $event)

<div class="mb-4 bg-orange-500 rounded-lg">
    
    <div class="grid content-center grid-cols-3 gap-4 py-4 pl-4 md:grid-cols-3">
        <div class="col-span-2">
            <h2 class="text-3xl text-yellow-200">
                {{$event->title}}
            </h2>
        
        
            <p class="text-3xl text-white">
                
                {{date('d-M', strtotime($event->date))}}
                <span>
                    {{date('g:i A', strtotime($event->date))}}
                </span>
                
            </p>
            <p class="text-xl font-black text-white">
                ( {{$event->duration}} ) hours
            </p>
        </div>
        <div class="flex items-center mx-auto text-center text-white">
           <div class="p-3 text-center bg-blue-400 rounded-xl">
            {{$event->event_type_name}}
           </div>
        </div>
    </div>
    
    

    
</div>

@endforeach

@else
<div class="flex items-center min-h-screen text-center ">
   <div class="flex-grow text-3xl animate-bounce">
    No Events {{date('d-M')}}
   </div>
   
</div>


@endif

</div>
