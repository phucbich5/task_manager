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

class CountstepAll extends Component
{
    public function render()
    {
        $this->steps_review_all = DB::table('steps')
            ->where('status', '=', 'review')
            ->count();
        $this->steps_progress_all = DB::table('steps')
            ->where('status', '=', 'progress')
            ->count();
        $this->steps_complete_all = DB::table('steps')
            ->where('status', '=', 'completed')
            ->count();
        $this->steps_notproress_all = DB::table('steps')
            ->where('status', '=', 'not started')
            ->count();
        return view('livewire.countstep-all');
    }
}
