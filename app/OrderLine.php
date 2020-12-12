<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    //
    protected $fillable = ['product_id', 'quantity', 'price', 'order_id', 'color', 'size'];
}
