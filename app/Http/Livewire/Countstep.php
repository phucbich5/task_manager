<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Step;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class Countstep extends Component
{
    public function render()
    {
        // public $steps;
        if (Gate::allows('isAdmin')) {
            $this->steps_review = DB::table('steps')
                ->where('status', '=', 'review')
                ->count();
            $this->steps_progress = DB::table('steps')
                ->where('status', '=', 'progress')
                ->count();
            $this->steps_complete = DB::table('steps')
                ->where('status', '=', 'completed')
                ->count();
            $this->steps_notproress = DB::table('steps')
                ->where('status', '=', 'not started')
                ->count();
            return view('livewire.countstep');
        } else {
            $this->steps_review = Step::with('task_info')->where('status', '=', 'review')->where('assigned_to', Auth::user()->id)->count();
            $this->steps_progress = Step::with('task_info')->where('status', '=', 'progress')->where('assigned_to', Auth::user()->id)->count();
            $this->steps_complete = Step::with('task_info')->where('status', '=', 'completed')->where('assigned_to', Auth::user()->id)->count();
            $this->steps_notproress = Step::with('task_info')->where('status', '=', 'not started')->where('assigned_to', Auth::user()->id)->count();
            return view('livewire.countstep');
        }
    }
}