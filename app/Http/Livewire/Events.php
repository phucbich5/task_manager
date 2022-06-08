<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;
use App\Models\EventType;

class Events extends Component
{
    public $events;

    public $event_id;


    // inputs
    public $name, $keyperson, $date, $start_time, $end_time, $status, $event_type;


    public $updateMode = false;



    public function render()
    {
        $this->events = Event::all();
        $this->event_type = EventType::all();
        

        return view('livewire.events');
    }

    public function clearInput(){


        $this->name = '';
        $this->keyperson = '';
        $this->date = '';

        $this->start_time = '';
        $this->end_time = '';
        $this->status = '';

        $this->event_type = '';
        $this->updateMode = false;
    }

    public function store(){


        $this->validate([
            'name'=>required,
            'keyperson'=>required,
            'date'=>required,
            'start_time'=>required,
            'end_time'=>required,
            'status'=>required,
            'event_type'=>required
        ]);


        Event::create([
            'name' => $this->name,
            'keyperson' => $this->keyperson,
            'date' => $this->date,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'status' => $this->status,
            'event_type' => $this->event_type
        ]);

        $this->clearInput();
    }

    public function edit($id){

        $event_info = Event::find($this->event_id);

        $this->name = $event_info->name;
        $this->keyperson = $event_info->name;
        $this->date = $event_info->name;
        $this->start_time = $event_info->name;
        $this->end_time = $event_info->name;
        $this->status = $event_info->name;
        $this->event_type = $event_info->name;
        $this->updateMode = true;
    }

    public function update(){

        $event_info = Event::find($this->event_id);

        $event_info::update([
            'name' => $this->name,
            'keyperson' => $this->keyperson,
            'date' => $this->date,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'status' => $this->status,
            'event_type' => $this->event_type
        ]);
        $this->clearInput();
    }

    public function delete($id){

       
    }
    public function store_event_type(){


        $this->validate([
            'name'=>required,
            'status'=>required,
        ]);


        Event::create([
            'name' => $this->name,
            'status' => $this->status,
        ]);

        $this->clearInput();
    }

}
