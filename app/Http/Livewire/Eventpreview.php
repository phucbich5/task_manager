<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class Eventpreview extends Component
{

    public $events;


    public function render()
    {   
        $today = date('Y-m-d')."%";
        $this->events = DB::table('events as e')
                        ->join('event_types','event_types.id','=','e.event_type')
                        ->where('date','>',Carbon::yesterday())
                        ->where('date','<',Carbon::tomorrow())
                        // ->Where('date','<=',function($query){
                        //     $query->select('date')
                        //     ->from('events')
                        //     ->where('date','>=',Carbon::today())
                        //     ->where('date','<=',Carbon::now()->addHours('e.duration'));
                        // })
                        ->where('e.status','1')
                        ->orderBy('e.date','asc')
                       
                        ->selectRaw('e.*,event_types.name as event_type_name')
                        ->get();
        return view('livewire.eventpreview');
    }
}
