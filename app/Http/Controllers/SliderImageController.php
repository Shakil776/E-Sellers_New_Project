<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SliderImage;
use Image;

class SliderImageController extends Controller
{
    public function index(){
    	return view('admin.slider.add_slider_image');
    }

    public function saveSliderImage(Request $request){

    	$sliderImage = new SliderImage();

    	$this->validate($request, [
            'slider_image' => 'required|image|mimes:jpeg,png,jpg|max:3072',
            'publication_status' => 'required'
        ]);

    	if ($request->hasFile('slider_image')) {

    		$image = $request->file('slider_image');

    		$imageExtension = $image->getClientOriginalExtension();

	        $imageName      = 'si_'.time().'.'.$imageExtension;

	        $directory      = 'uploads/slider-image/';
            $img = Image::make($image);
            $img->fit(1920, 800)->save($directory . $imageName); 

	        $imagePath = $directory . $imageName;
	        $sliderImage->slider_image   = $imagePath;
	        $sliderImage->publication_status   = $request->publication_status;
    		$sliderImage->save();
	 
	        return redirect('/slider')->with('message', "Slider Image Uploaded Successfully.");
    	}     
	}

    public function manageSliderImage(){
        $showSliders = SliderImage::all();
        return view('admin.slider.manage_slider_image',['showSliders' => $showSliders]);
    }

    // unpublished slider
    public function unpublishedSlider($id) {
        $sliderImage = SliderImage::find($id);
        $sliderImage->publication_status = 0;
        $sliderImage->save();
        return redirect('/slider/manage')->with('message', 'Slider Image Unpublished.');
    }

    // published slider
    public function publishedSlider($id) {
        $sliderImage = SliderImage::find($id);
        $sliderImage->publication_status = 1;
        $sliderImage->save();
        return redirect('/slider/manage')->with('message', 'Slider Image Published.');
    }

    // delete slider
    public function deleteSlider($id) {
        $sliderImage = SliderImage::find($id);
        $sliderImage->delete();
        return redirect('/slider/manage')->with('message', 'Slider Image Deleted.');
    }


}
