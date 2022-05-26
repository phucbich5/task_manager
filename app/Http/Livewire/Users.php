<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class Users extends Component
{

    public $name, $email, $role, $status,$password,$user_id;

    public $updateMode = false;

    public function render()
    {
        $this->users = User::all();
        return view('user.index');
    }

    public function clearInput()
    {
        $this->name = '';
        $this->email = '';
        $this->role = '';
        $this->status = '';
        $this->password = '';
        $this->updateMode = false;
    }

    public function store()
    {


        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'status' => $this->status,
            'password' => Hash::make($this->password),
        ]);
        $this->clearInput();
    }

    public function edit($id)
    {

        $this->updateMode = true;

        $user_info = User::find($id);
        $this->user_id = $user_info->id;
        $this->name = $user_info->name;
        $this->email = $user_info->email;
        $this->role = $user_info->role;
        $this->status = $user_info->status;
        $this->password = $user_info->password;
    }

    public function update()
    {

        $user_info = User::find($this->user_id);

        $user_info->update([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'status' => $this->status,
            'password' => $this->password
        ]);

        $this->clearInput();
    }
}
