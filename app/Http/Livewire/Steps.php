<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Step;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
// use Illuminate\Auth\Middleware\Authorize;
use Auth;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Steps extends Component
{
    public $name, $task_id, $status, $assigned_to, $description;
    public $updateMode = false;
    // public $steps;
    use AuthorizesRequests;

    public function render(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            $users = DB::table('users')->get();
            $tasks = Task::with('assigned_user')->get();
            $steps = Step::with('task_info')->get();
            return view('steps.index', compact('users', 'tasks', 'steps'));
        } else {
            $users = DB::table('users')->get();
            $tasks = Task::with('assigned_user')->get();

            $steps = Step::with('task_info')->where('assigned_to', Auth::user()->id)->get();
            // $steps = DB::table('steps')
            //     ->leftjoin('tasks', 'steps.task_id', '=', 'tasks.id')
            //     ->leftjoin('users', 'steps.task_id', '=', 'users.id')
            //     ->select('steps.*','tasks.name')->get();

            // $steps  = Step::with('assigned_user', 'task_info')->get();
            // dd($steps);
            // if ($this->user()->can('grantview', $steps)) {
            //     abort(403);
            // }


            // $this->authorize($users,$tasks,$steps,'grantview');
            return view('steps.index', compact('users', 'tasks', 'steps'));
        }
    }

    public function clearInput()
    {
        $this->name = '';
        $this->task_id = '';
        $this->status = '';
        $this->assigned_to = '';
        $this->description = '';

        $this->updateMode = false;
    }

    public function store()
    {
        Step::create([
            'name' => $this->name,
            'task_id' => $this->task_id,
            'assigned_to' => $this->assigned_to,
            'status' => $this->status,
            'description' => $this->description
        ]);

        $this->clearInput();
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $step_info = Step::find($id);
        $this->name = $step_info->name;
        $this->task_id = $step_info->task_id;
        $this->assigned_to = $step_info->assigned_to;
        $this->description = $step_info->description;
        $this->status = $step_info->status;
        $this->step_id = $step_info->id;
    }

    public function update()
    {

        $step_info = Step::find($this->step_id);

        $step_info->update([
            'name' => $this->name,
            'task_id' => $this->task_id,
            'assigned_to' => $this->assigned_to,
            'description' => $this->description,
            'status' => $this->status
        ]);
        $this->authorize('update', $step_info);
        $this->clearInput();
    }
}
