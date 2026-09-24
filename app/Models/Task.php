<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table='tasks';
    protected $fillable=[
        'title',
        'description',
        'due_date',
        'status',
        'event_id',
        'member_id',
    ];
    public function member(){
        return $this->belongsTo(Member::class);
    }
    public function event(){
        return $this->belongsTo(Event::class);
    }
    
}
