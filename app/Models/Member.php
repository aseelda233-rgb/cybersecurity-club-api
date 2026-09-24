<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table='members';
    protected $fillable=[
        'name',
        'university_id',
        'email',
        'phone',
        'major',
        'committee_id',
        'position',
    ];
    public function committee(){
        return $this->belongsTo(Committee::class);
    }
    public function events(){
        return $this->belongsToMany(Event::class, 'event_members')
            ->withPivot('attendance')
            ->withTimestamps();
    }
    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
