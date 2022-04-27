<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrdersProduct;

class Order extends Model
{
    use HasFactory;

    public function order_details()
    {
        return $this->hasMany('App\Models\OrdersProduct','order_id');
    }
}