<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','keyperson',
        'date','duration',
        'description','status',
        'event_type'
    ];

    public function event_model(){
        return $this->belongsTo('App\Models\EventType','event_type');
    }
    public function event_key_person(){
        return $this->belongsTo('App\Models\User','keyperson');
    }
}
