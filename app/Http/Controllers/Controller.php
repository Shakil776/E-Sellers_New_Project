<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Category;
use App\Manufacturer;
use App\CustomeCategory;

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

    // custom category common for all frontend page
    public static function customCategories(){
    	$customeCategories = CustomeCategory::where(['publication_status' => 1])->get();
    	return $customeCategories;
    }

    // date delivery
    public static function getBeforeDays($specDay, $days, $format = 'd-m-Y') {
        $d = date('d', strtotime($specDay)); 
        $m = date('m', strtotime($specDay)); 
        $y = date('Y', strtotime($specDay));
        $dateArray = array();
        for($i=1; $i<=$days; $i++) {
            $dateArray[] = date($format, mktime(0,0,0,$m,($d+$i),$y)); 
        }
        return $dateArray;
    }
}
