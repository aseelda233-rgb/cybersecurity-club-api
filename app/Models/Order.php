<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'Customer_Name',
        'Customer_Email',
        'Items',
        'Total',
        'Date',
        'Status',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_order_pivot')
            ->withPivot('quantity', 'price')
            ->withTimestamps();
    }
}
