<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
     protected $fillable = [
        'Name',
        'Category',
        'Price',
        'Stock',
        'Available',
    ];
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'product_order_pivot')
        ->withPivot('quantity','price')->withTimestamps();
    }
}
