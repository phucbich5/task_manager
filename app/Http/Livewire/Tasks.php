<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Task;
use App\Models\User;
use App\Models\Step;
use App\Http\Livewire\Viewtasks;
use Illuminate\Support\Facades\DB;

class Tasks extends Component
{

    public $tasks, $users;

    public $name, $description, $deadline, $status;

    public $task_id;

    public $updateMode = false;


    public $step_name, $step_order, $step_task_id, $step_status, $assigned_to, $step_description;

    public $step_id;
    public $stepUpdateMode = false;


    public $inputs = [];
    public $i = 0;





    public function render()
    {
        $this->tasks = Task::orderBy('deadline', 'asc')->get();
        $this->users = User::all();
        $count_task = DB::table('tasks')->count();
        return view('tasks.index');
    }

    public function clearInput()
    {
        $this->name = '';
        $this->description = '';
        $this->deadline = '';
        $this->status = '';
        $this->task_id = '';
        $this->updateMode = false;
    }

    public function store()
    {
        Task::create([
            'name' => $this->name,
            'description' => $this->description,
            'deadline' => $this->deadline,
            'status' => $this->status
        ]);
        $this->clearInput();
    }

    public function edit($id)
    {

        $this->updateMode = true;

        $task_info = Task::find($id);
        $this->task_id = $task_info->id;
        $this->name = $task_info->name;
        $this->description = $task_info->description;
        $this->deadline = str_replace(' ', 'T', $task_info->deadline);
        $this->status = $task_info->status;
    }

    public function update()
    {

        $task_info = Task::find($this->task_id);

        $task_info->update([
            'name' => $this->name,
            'description' => $this->description,
            'deadline' => $this->deadline,
            'status' => $this->status
        ]);

        $this->clearInput();
    }

    public function addStep($id)
    {


        $task_info = Task::find($id);
        $this->step_id = $task_info->id;
        $this->step_name = $task_info->name;
        $this->assigned_to = $task_info->assigned_to;
        $this->step_description = $task_info->description;
    }

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }
    public function remove($i)
    {
        unset($this->inputs[$i]);
    }
    public function removeInput($key)
    {
        $this->input->pull($key);
    }

    public function clearInputStep()
    {
        $this->step_name = '';
        $this->status = '';
        $this->assigned_to = '';
        $this->description = '';
        $this->updateMode = false;
    }

    public function createStep()
    {
        foreach ($this->step_name as $key => $value) {
            Step::create([
                'name' => $this->step_name[$key],
                'status' => $this->step_status[$key],
                'task_id' => $this->step_id,
                'assigned_to' => $this->assigned_to[$key],
                'description' => $this->description[$key]
            ]);
        }

        $this->inputs = [];
        $this->clearInputStep();
    }
    public function show_task($id)
    {
        $tasks = Task::with('steps')->where('id', $id)->get();

        // $user_step = DB::table('steps')
        //             ->join('users','steps.assigned_to','=','users.id')
        //             ->select('users.name')
        //             ->where('steps.task_id',$id)
        //             ->get();

        $steps  = Step::with('assigned_users', 'task_info')->get();

        // dd($steps);
        return view('tasks.show', compact('tasks', 'steps'));
    }
    public function editStep()
    {
    }


    public function mark_status_complete($task_id, $step_id)
    {
    }
}
