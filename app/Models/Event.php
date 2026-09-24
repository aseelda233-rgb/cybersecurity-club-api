<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table='events';
    protected $fillable=[
        'title',
        'description',
        'event_date',
        'location',
        'status',


    ];
    public function members(){
        return $this->belongsToMany(Member::class,'event_members')
            ->withPivot('attendance')
            ->withTimestamps();
    }
    public function tasks(){
        return $this->hasMany(Task::class);
    }

}
