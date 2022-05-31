<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Step;
use App\Models\Task;
use Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;

class Viewtasks extends Component
{
    // public $task_id;
    use AuthorizesRequests;

    public function render()
    {

        $id = request('id');


        if ($id) {
            $users = Auth::user();
            $steps =  Step::with('assigned_user', 'task_info')->where('task_id', $id)->get();


            // if (Gate::allows('isAdmin')) {
                $task = Task::with('steps')->where('id', $id)->first();

                // $user_step = DB::table('steps')
                //             ->join('users','steps.assigned_to','=','users.id')
                //             ->select('users.name')
                //             ->where('steps.task_id',$id)
                //             ->get();


                //fix here

                $steps  = Step::with('assigned_user', 'task_info')->where('task_id', $id)->get();


                // end fix




                // dd($steps);
                return view('tasks.show', compact('task', 'steps'));
            // } else {

            //     $this->authorize($users, $steps, 'grantview');

            //     abort(403, "you don't have no access to this content");
            // }




            // return view('tasks.index',compact('tasks'));
        } else {
            // echo 'ngu';
        }
    }


    public function changestatus($step_id)
    {

        $step_info = Step::find($step_id);

        $step_info->status = 'completed';
        $step_info->save();
    }
}
