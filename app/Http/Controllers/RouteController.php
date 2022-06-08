<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RouteController extends Controller
{
    //

    public function ViewTask($id)
    {
        $task_id = $id;
        return view('show_task', compact('task_id'));
    }

    public function steps()
    {
        return view('steps');
    }
    public function users()
    {
        if (Gate::allows('isAdmin')) {
            return view('users');
        } else {
            abort(403, "you don't have no access to this content");
        }
    }
    public function tasks()
    {
        return view('tasks');
    }
    public function alltasks()
    {
        return view('alltasks');
    }
    public function allsteps()
    {
        return view('allsteps');
    }
    public function profile()
    {
        return view('profile');
    }
    public function events()
    {
        return view('events');
    }
}
