<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    public function attributes() {
    	return $this->hasMany('App\ProductsAttributes', 'product_id');
    }

    public function reviews() {
    	return $this->hasMany('App\Review', 'product_id');
    }

    public function images() {
    	return $this->hasMany('App\ProductsAlternateImage', 'product_id');
    }

}
