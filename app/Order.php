<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderDetails() {
    	return $this->hasMany('App\OrderDetail', 'order_id')->with('products');
    }
    
    public function payments() {
    	return $this->hasMany('App\Payment', 'order_id');
    }
}
