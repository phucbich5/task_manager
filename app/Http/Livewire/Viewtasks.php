<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Step;
use App\Models\Task;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class Viewtasks extends Component
{
    // public $task_id;

    public function render()
    {

        $id = request('id');


        if ($id) {
            $task = Task::with('steps')->where('id', $id)->first();

            // $user_step = DB::table('steps')
            //             ->join('users','steps.assigned_to','=','users.id')
            //             ->select('users.name')
            //             ->where('steps.task_id',$id)
            //             ->get();

            $steps  = Step::with('assigned_user', 'task_info')->where('task_id', $id)->get();

            // dd($steps);
            return view('tasks.show', compact('task', 'steps'));
            // return view('tasks.index',compact('tasks'));
        } else {
            echo 'ngu';
        }
    }


    public function changestatus($step_id)
    {

        $step_info = Step::find($step_id);

        $step_info->status = 'completed';
        $step_info->save();
    }
}
