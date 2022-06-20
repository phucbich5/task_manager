<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Task;
use App\Models\User;
use App\Models\Step;
use App\Http\Livewire\Viewtasks;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

use Auth;

class Counttask extends Component
{
    public function render()
    {
        // public $tasks;
        if (Gate::allows('isAdmin')) {
            $this->tasks_close = DB::table('tasks')
                ->where('status', '=', 'closed')
                ->count();
            $this->tasks_open = DB::table('tasks')
                ->where('status', '=', 'open')
                ->count();
            return view('livewire.counttask');
        } else {
            $this->tasks_close = DB::table('tasks')
                ->leftjoin('steps', 'tasks.id', '=', 'steps.task_id')
                ->select('tasks.*')
                ->where('tasks.status', '=', 'closed')
                ->where('assigned_to', Auth::user()->id)
                ->count();
            $this->tasks_open = DB::table('tasks')
                ->leftjoin('steps', 'tasks.id', '=', 'steps.task_id')
                ->select('tasks.*')
                ->where('tasks.status', '=', 'open')
                ->where('assigned_to', Auth::user()->id)
                ->count();
            return view('livewire.counttask');
        }
    }
}
