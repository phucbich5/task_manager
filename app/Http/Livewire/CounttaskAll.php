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

class CounttaskAll extends Component
{
    public function render()
    {
        $this->tasks_close_all = DB::table('tasks')
            ->where('status', '=', 'closed')
            ->count();
        $this->tasks_open_all = DB::table('tasks')
            ->where('status', '=', 'open')
            ->count();
        return view('livewire.counttask-all');
    }
}
