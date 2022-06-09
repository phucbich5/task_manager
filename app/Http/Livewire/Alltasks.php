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

class Alltasks extends Component
{
    public function render()
    {
            $tasks_all = DB::table('tasks')->orderBy('deadline', 'asc')->paginate(10);
            return view('livewire.alltasks', compact('tasks_all'));
    }
}
