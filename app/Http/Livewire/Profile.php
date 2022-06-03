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

class Profile extends Component
{
    public $updateMode = false;
    public function render()
    {
        $this->profile = DB::table('users')
        ->where('id',Auth::user()->id)
        ->get();
        return view('profile.index');
    }
    // public function edit($id)
    // {

    //     $this->updateMode = true;

    //     $user_info = Auth::user();
    //     $this->email = $user_info->email;
    //     $this->password = $user_info->password;
    // }

    public function update()
    {

        $user_info = Auth::user();
        $user_info->update([
            'email' => $this->email,
            'password' => $this->password
        ]);
        return redirect('/profile');
        // $user_info->save();
    }
}
