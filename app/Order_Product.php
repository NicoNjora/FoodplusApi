<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Product extends Model
{
    //
    protected $fillable = [
        'order_id', 'product_id', 'quantity',
    ];
}
