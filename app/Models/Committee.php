<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    protected $table='committees';
    protected $fillable=[
        'name',
        'description',
    ];
    public function members(){
        return $this->hasMany(Member::class);
    }
    
}
