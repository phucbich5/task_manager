<?php

namespace App\Http\Livewire;

// use Livewire\Component;

use Asantibanez\LivewireCalendar\LivewireCalendar;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\EventType;

class AppointmentsCalendar extends LivewireCalendar
{
  
    public $title,$description;
    public $event_date,$duration,$keyperson;

    public $status,$event_type,$users;
    public $event_types;

    public $updateMode = false;

    public function events() : Collection
{

    $events = Event::with(['event_model','event_key_person'])->get();

                


    return collect($events);

    // return Model::query('select * from events')
    //     ->get()
    //     ->map(function (Model $model) {
    //         return [
    //             'id' => $model->id,
    //             'title' => $model->title,
    //             'description' => $model->notes,
    //             'date' => $model->scheduled_at,
    //         ];
    //     });

    // return collect([
    //     [
    //         'id' => 1,
    //         'title' => 'Breakfast',
    //         'description' => 'Pancakes! 🥞',
    //         'date' => Carbon::today(),
            
    //     ],
    //     [
    //         'id' => 2,
    //         'title' => 'Meeting with Pamela',
    //         'description' => 'Work stuff',
    //         'date' => Carbon::tomorrow(),
    //     ],
    //     [
    //         'id' => 2,
    //         'title' => 'Meeting with leon ngu',
    //         'description' => 'Work stuff',
    //         'date' => Carbon::tomorrow(),
    //     ],
    //     [
    //         'id' => 3,
    //         'title' => 'Test',
    //         'description' => 'Work stuff',
    //         'date' => '2022-06-10',
    //     ],
    // ]);
    }
    public function onDayClick($year, $month, $day)
{
    // This event is triggered when a day is clicked
    // You will be given the $year, $month and $day for that day
    

    // add new event

}

public function onEventClick($eventId)
{
    // This event is triggered when an event card is clicked
    // You will be given the event id that was clicked 

    // edit event
    $this->users = User::all();
    $this->event_types = EventType::all();
    $event_info = Event::with(['event_model','event_key_person'])->where('id',$eventId)->first();
        $this->event_id = $event_info->id;
        $this->title = $event_info->title;
        $this->keyperson = $event_info->keyperson;
        $this->event_date = $event_info->date;
        $this->duration = $event_info->duration;
        $this->description = $event_info->description;
        $this->status = $event_info->status;
        $this->event_type = $event_info->event_type;

        



    $this->emit('editevent');



}

public function onEventDropped($eventId, $year, $month, $day)
{
    // This event will fire when an event is dragged and dropped into another calendar day
    // You will get the event id, year, month and day where it was dragged to

    $event = Event::find($eventId);

    $date = $year.'-'.$month.'-'.$day;
    $time = explode(' ',$event->date)[1];



    Event::where('id', $eventId)
      ->update(['date' => $date.' '.$time]);

    //   2022-06-11 14:44:07

    $this->render();



}
}
