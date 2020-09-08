<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['parent_id','category_name', 'category_description', 'url','category_icon', 'publication_status'];

    public function categories(){
    	return $this->hasMany('App\Category', 'parent_id')->with('subCategories');
    }

    public function subCategories(){
    	return $this->hasMany('App\Category', 'parent_id')->with('subSubCategories');
    }

    public function subSubCategories(){
    	return $this->hasMany('App\Category', 'parent_id');
    }

}
