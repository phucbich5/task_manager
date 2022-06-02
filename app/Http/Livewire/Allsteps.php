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

class Allsteps extends Component
{
    public $name, $task_id, $status, $assigned_to, $description, $deadline;
    public $updateMode = false;
    public function render()
    {
        // $this->steps_all = DB::table('steps')->orderBy('deadline', 'asc')
        //     ->get();
        // return view('livewire.allsteps');
        $users = DB::table('users')->get();
        $tasks = Task::with('assigned_user')->get();
        $steps_all = Step::with('task_info')
            ->orderBy('deadline', 'ASC')
            ->paginate(10);
        return view('livewire.allsteps', compact('users', 'tasks', 'steps_all'));
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
    }
}
