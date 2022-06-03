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

class Sidebar extends Component
{
    public $tasks, $steps, $users;

    public function render()
    {

        if (Gate::allows('isAdmin')) {
            $this->tasks = DB::table('steps')->count();
            $this->steps = DB::table('steps')->count();
            $this->allusers = DB::table('users')->count();
            return view('livewire.sidebar');
        } else {$this->alltasks = DB::table('tasks')->count();
            $this->allsteps = DB::table('steps')->count();
            $this->tasks = DB::table('tasks')
                ->join('steps', 'tasks.id', '=', 'steps.task_id')
                ->select('tasks.*')
                ->where('assigned_to', Auth::user()->id)
                ->count();
            $this->steps = Step::with('task_info')
                ->where('assigned_to', Auth::user()->id)
                ->count();
            return view('livewire.sidebar');
        }
    }
}
