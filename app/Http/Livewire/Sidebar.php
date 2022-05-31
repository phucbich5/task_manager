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
            $this->tasks = Task::where('status', '=', 'open')->count();
            $this->users = User::where('status', 1)->count();
            $this->steps = DB::table('steps')
                ->where('status', '<>', 'completed')
                ->count();
            $this->users = User::where('status', 1)->count();
            return view('livewire.sidebar');
        } else {
            $this->tasks = DB::table('tasks')
                ->join('steps', 'tasks.id', '=', 'steps.task_id')
                ->select('tasks.*')
                ->where('assigned_to', Auth::user()->id)
                ->count();
            $this->steps = Step::with('task_info')->where('status', '<>', 'completed')->where('assigned_to', Auth::user()->id)->count();
            return view('livewire.sidebar');
        }
    }
}
