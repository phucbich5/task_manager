<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Step;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Steps extends Component
{
    public $name, $task_id, $status, $assigned_to, $description;
    public $updateMode = false;
    // public $steps;

    public function render()
    {
        $this->users = DB::table('users')->get();
        $this->tasks = Task::with('assigned_user')->get();
        $this->steps = Step::with('task_info')->get();
        // $steps = DB::table('steps')
        //     ->leftjoin('tasks', 'steps.task_id', '=', 'tasks.id')
        //     ->leftjoin('users', 'steps.task_id', '=', 'users.id')
        //     ->select('steps.*','tasks.name')->get();

        // $steps  = Step::with('assigned_user', 'task_info')->get();
        // dd($steps);
        return view('steps.index');
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
        $this->clearInput();
    }
}
