<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;
use App\Models\EventType;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Events extends Component
{
    // public $events;

    public $event_id;



    public $title, $description,$location;
    public $date, $duration, $keyperson;

    public $status, $event_type;


    // public $event_type;


    public $updateMode = false;
    public $users;



    public function render()
    {
        $this->events = DB::table('events')
            ->leftjoin('event_types', 'events.id', '=', 'event_types.id')
            ->leftjoin('users', 'events.id', '=', 'users.id')
            ->selectRaw('events.*, event_types.name as event_types_name , users.name as users_name')
            ->orderBy('date', 'ASC')
            ->get();
        $this->event_types = DB::table('event_types')->get();
        $this->users = User::all();
        return view('livewire.events');
    }

    public function clearInput()
    {
        $this->title = '';
        $this->description = '';
        $this->date = '';
        $this->keyperson = '';
        $this->duration = '';
        $this->status = '';
        $this->event_type = '';
        $this->location = '';
        $this->updateMode = false;
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'keyperson' => 'required',
            'duration' => 'required',
            'status' => 'required',
            'event_type' => 'required'
        ]);


        Event::create([
            'title' => $this->title,
            'description' => $this->description,
            'date' => $this->date,
            'keyperson' => $this->keyperson,
            'duration' => $this->duration,
            'status' => $this->status,
            'location' => $this->location,
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
        $this->title = $event_info->title;
        $this->keyperson = $event_info->keyperson;
        $this->date = date('Y-m-d\TH:i', strtotime($event_info->date));
        $this->duration = $event_info->duration;
        $this->description = $event_info->description;
        $this->status = $event_info->status;
        $this->location = $event_info->location;
        $this->event_type = $event_info->event_type;
    }

    public function update()
    {

        $event_info = Event::find($this->event_id);
        $this->validate([
            'title' => 'required',
            'keyperson' => 'required',
            'date' => 'required',
            'duration' => 'required',
            'description' => 'required',
            'status' => 'required',
            'event_type' => 'required'
        ]);

        $event_info->update([
            'title' => $this->title,
            'keyperson' => $this->keyperson,
            'date' => $this->date,
            'duration' => $this->duration,
            'description' => $this->description,
            'status' => $this->status,
            'location' => $this->location,
            'event_type' => $this->event_type
        ]);
        $this->clearInput();
    }
    public function deleteId($id)
    {
        $this->deleteId = $id;
    }
    public function delete_event()
    {
        Event::find($this->deleteId)->delete();
    }
}
