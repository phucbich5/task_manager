<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class Users extends Component
{

    public $name, $email, $role, $status,$password,$user_id;

    public $updateMode = false;

    public function render()
    {
        $users = DB::table('users')->paginate(10);
        
        return view('user.index',compact('users'));
    }

    // public function count_user(){    
    //     $count_user = DB::table('users')->count();
       
    //     return view('components.sidebar',compact('count_user'));
    // }
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

        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'role'=>'required',
            'status' => 'required',
        ]);
        $password = Str::random(21);

       
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'status' => $this->status,
            // 'password' => Hash::make($this->password),
            'password' => Hash::make($password),
        ]);



        $details = [
            'username' => $this->email,
            'password' => $password
        ];

        Mail::to($this->email)->send(new \App\Mail\SendMail($details));




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
