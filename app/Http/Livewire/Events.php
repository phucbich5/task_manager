<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;
use App\Models\EventType;
use Illuminate\Support\Facades\DB;

class Events extends Component
{
    // public $events;

    public $event_id;


    // inputs
    public $name, $keyperson, $date, $start_time, $end_time, $status, $event_typesoh;
    // public $event_type;


    public $updateMode = false;



    public function render()
    {
        $events = DB::table('events')->orderBy('start_time', 'ASC')->get();
        $event_types = DB::table('event_types')->get();
        return view('livewire.events',compact('events','event_types'));
    }

    public function clearInput()
    {


        $this->name = '';
        $this->keyperson = '';
        $this->date = '';

        $this->start_time = '';
        $this->end_time = '';
        $this->status = '';

        $this->event_type = '';
        $this->updateMode = false;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'keyperson' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'status' => 'required',
            'event_type' => 'required'
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

        return redirect('/events');
        $this->clearInput();
    }

    public function edit($id)
    {

        $this->updateMode = true;
        $event_info = Event::find($id);
        $this->event_id = $event_info->id;
        $this->name = $event_info->name;
        $this->keyperson = $event_info->keyperson;
        $this->date = $event_info->date;
        $this->start_time = $event_info->start_time;
        $this->end_time = $event_info->end_time;
        $this->status = $event_info->status;
        $this->event_type = $event_info->event_type;
    }

    public function update()
    {

        $event_info = Event::find($this->event_id);
        $this->validate([
            'name' => 'required',
            'keyperson' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'status' => 'required',
            'event_type' => 'required'
        ]);

        $event_info->update([
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

    public function delete($id)
    {
    }
  



    public function render_event_types()
    {
        $this->event_types = EventType::all();
        return view('livewire.event_types');
    }
    public function store_event_type()
    {
        $this->validate([
            'name'=>'required',
            'status'=>'required',
        ]);
        Event::create([
            'name' => $this->name,
            'status' => $this->status,
        ]);
        $this->clearInput();
    }
}
