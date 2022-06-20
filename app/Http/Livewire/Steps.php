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
    public $name, $task_id, $status, $assigned_to, $description, $deadline;
    public $updateMode = false;
    public $deleteId ='';
    // public $steps;
    use AuthorizesRequests;

    public function render(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            $users = DB::table('users')->get();
            $tasks = Task::with('assigned_user')->get();
            $steps = Step::with('task_info')
                ->orderBy('deadline', 'ASC')
                ->paginate(5);
            return view('steps.index', compact('users', 'tasks', 'steps'));
        } else {
            $users = DB::table('users')->get();
            $tasks = Task::with('assigned_user')->get();
            $steps = Step::with('task_info')->where('assigned_to', Auth::user()->id)->paginate(5);
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
        $this->deadline = '';
        $this->updateMode = false;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'task_id' => 'required',
            'assigned_to' => 'required',
            'status' => 'required',
            'description' => 'required',
            'deadline' => 'required',
        ]);
        Step::create([
            'name' => $this->name,
            'task_id' => $this->task_id,
            'assigned_to' => $this->assigned_to,
            'status' => $this->status,
            'description' => $this->description,
            'deadline' => $this->deadline,
        ]);

        $this->clearInput();
        return redirect('/steps');
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $step_info = Step::find($id);
        $this->step_id = $step_info->id;
        if (Gate::allows('isAdmin')) {
            $this->name = $step_info->name;
            $this->task_id = $step_info->task_id;
            $this->assigned_to = $step_info->assigned_to;
            $this->description = $step_info->description;
            $this->status = $step_info->status;
            $this->deadline = str_replace(' ', 'T', $step_info->deadline);
        } else {
            $this->status = $step_info->status;
        }
    }

    public function update()
    {
        $step_info = Step::find($this->step_id);
        if (Gate::allows('isAdmin')) {
            $step_info->update([
                'name' => $this->name,
                'task_id' => $this->task_id,
                'assigned_to' => $this->assigned_to,
                'description' => $this->description,
                'status' => $this->status,
                'deadline' => $this->deadline,
            ]);
        } else {
            $step_info->update([
                'status' => $this->status
            ]);
        }
        $this->clearInput();
        return redirect('/steps');
    }

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }
    public function delete_step()
    {
        Step::find($this->deleteId)->delete();
    }

}
