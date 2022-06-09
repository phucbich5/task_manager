<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Step;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use GuzzleHttp\Psr7\UploadedFile;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Redirect;

class Profile extends Component
{
    use WithFileUploads;
    public $updateMode = false;
    public $email, $user_id, $current_password, $password_confirmation, $password, $image;
    public function render()
    {
        $profile = User::where('id', Auth::user()->id)
            ->first();

        $this->email = $profile->email;
        return view('profile.index', compact('profile'));
    }
    public function clearInput()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->updateMode = false;
    }
    public function edit($user_info)
    {
        $this->validate([
            'current_password' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);
        $this->updateMode = true;
        $user_info = User::find(Auth::user()->id);
        $this->user_id = $user_info->id;
        $this->email = $user_info->email;
        $this->password = $user_info->password;
        $this->image = $user_info->image;
        $this->clearInput();
    }
    public function update()
    {

        
        // $user_info = User::find(Auth::user()->id);
        
        if ($this->image) {
            if (Hash::check($this->current_password, Auth::user()->password)) {
               
                
                if($this->password == $this->password_confirmation){

                    $user_info = User::findOrFail(Auth::user()->id);
                    $user_info->update([
                        'password' => Hash::make($this->password),
                        
                        'image' => $this->image->store('public', 'public'),
                    ]);
                    session()->flash('update_ok', 'Change password successfully');
                    return redirect('/profile');
                }else{
                    session()->flash('update_ok', 'password not matching');
                    return redirect('/profile');

                }
               




            } else {
                session()->flash('msg', 'Wrong old password');
                return redirect('/profile');
            }
        } else {
            if (Hash::check($this->current_password, Auth::user()->password)) {
                
                if($this->password == $this->password_confirmation){

                $user_info = User::findOrFail(Auth::user()->id);
                $user_info->password = Hash::make($this->password);
                $user_info->save();
                session()->flash('update_ok', 'Change password successfully');
                return redirect('/profile');

                }else{
                    session()->flash('update_ok', 'password not matching');
                    return redirect('/profile');
                }


            } else {
                session()->flash('msg', 'Wrong old password');
                return redirect('/profile');
            }
        }
    }
}
