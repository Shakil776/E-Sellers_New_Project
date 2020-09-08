<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Category;
use App\Manufacturer;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // header menu common for all frontend page
    public static function mainCategories(){
    	$mainCategories = Category::where(['parent_id' => 0])->get();
    	return $mainCategories;
    }

    // footer bands common for all frontend page
    public static function footerBands(){
    	$footerBands = Manufacturer::where(['publication_status' => 1])->get();
    	return $footerBands;
    }

}
