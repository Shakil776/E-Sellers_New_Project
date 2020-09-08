<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = ['customer_id', 'shipping_name', 'shipping_email', 'shipping_mobile', 'shipping_address'];
}
