<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description', 'assigned_to', 'status', 'task_id'
    ];


    public function assigned_user()
    {
        return $this->belongsTo('App\Models\User', 'assigned_to', 'id');
    }

    public function task_info()
    {
        // fix here   
        return $this->belongsTo('App\Models\Task', 'task_id', 'id');
    }
}
