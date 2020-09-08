<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\SliderImage;

class ApiSliderImageController extends Controller
{
    public function showSliderImage(){


    	$sliderImages = SliderImage::where('publication_status', 1)
    								->orderBy('id', 'DESC')
    								->take(5)
                                    ->get();

	    return response()->json([
	        'status' => 1,
	        'message' => 'Success',
	        'sliderImages' => $sliderImages
	    ], 200);

    }
}
