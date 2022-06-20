<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EventType;
use App\Models\Event;

class EventTypes extends Component
{


    // inputs
    public $name, $status;


    public $updateMode = false;

    public function render()
    {
        $this->event_types = EventType::all();
        return view('livewire.event-types');
    }
    public function clearInput()
    {
        $this->name = '';
        $this->status = '';
        $this->updateMode = false;
    }
    public function store()
    {
        $this->validate([
            'name'=>'required',
            'status'=>'required',
        ]);
        EventType::create([
            'name' => $this->name,
            'status' => $this->status,
        ]);
        $this->clearInput();
    }

    public function edit($id)
    {

        $this->updateMode = true;
        $event_type_info = EventType::find($id);
        $this->event_type_id = $event_type_info->id;
        $this->name = $event_type_info->name;
        $this->status = $event_type_info->status;
    }

    public function update()
    {

        $event_type_info = EventType::find($this->event_type_id);
        $this->validate([
            'name' => 'required', 
            'status' => 'required',
        ]);

        $event_type_info->update([
            'name' => $this->name,
            'status' => $this->status,
        ]);
        $this->clearInput();
    }

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }
    public function delete_event()
    {
        $events = Event::where('event_type',$this->deleteId)->get();
        if(count($events) == 0 ){
            EventType::find($this->deleteId)->delete();
        }else{
            dd('cannot be deleted');
        }
    }
}
