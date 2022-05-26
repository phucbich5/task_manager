<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','description','deadline','status','task_id'
    ];

    public function steps(){
        return $this->hasMany('App\Models\Step','task_id');
    }
    public function assigned_user(){
        return $this->hasMany('App\Models\User','id','assigned_to');
    }
}
