<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DesignImage;
use Image;
use Session;

class DesignImageController extends Controller
{
    // add design image
    public function addDesignImage(Request $request){

        if($request->isMethod('post')){

            if ($request->hasFile('images')) {
                $images   = $request->file('images');

                foreach ($images as $key => $image) {
                    $designImage = new DesignImage();
                    $image_tmp = Image::make($image);
                    $imageExtension = $image->getClientOriginalExtension();
                    $imageName      = 'di_'.rand(111, 999999).time().'.'.$imageExtension;
                    $image_path = 'uploads/design-image/'.$imageName;
                    Image::make($image_tmp)->resize(650, 700)->save($image_path); 
                    
                    $designImage->design_image = $image_path;
                    $designImage->status = 1;
                    $designImage->save();
                }
                return redirect()->back()->with('success', 'Product design image uploaded successfully.');
            }
        }

        return view('admin.design.add_design_image');
    }

    // manage design Image
    public function manageDesignImage() {
		$designImage = DesignImage::all();
		return view('admin.design.manage_design_image')->with(compact('designImage'));
    }

    // update design image status
    public function updateDesignImageStatus($id, $status){
        DesignImage::where('id', $id)->update(['status'=>$status]);
        return redirect()->back()->with('success', 'Image Status has been updated Successfully.');
    }
    
    // delete design image
    public function deleteDesignImage($id){
        $designImage = DesignImage::select('design_image')->where('id', $id)->first();

        if(file_exists($designImage->design_image)){
            unlink($designImage->design_image);
        }

        DesignImage::find($id)->delete();
        return redirect()->back()->with('success', 'Image deleted Successfully.');
    }

    // user upload design image
    // public function userUploadDesignImage(Request $request){

    //     if($request->isMethod('post')){

    //         if ($request->hasFile('design_image')) {
    //             $image   = $request->file('design_image');

    //             $designImage = new DesignImage();
    //             $image_tmp = Image::make($image);
    //             $imageExtension = $image->getClientOriginalExtension();
    //             $imageName      = 'di_'.rand(111, 999999).time().'.'.$imageExtension;
    //             $image_path = 'uploads/design-image/'.$imageName;
    //             Image::make($image_tmp)->resize(650, 700)->save($image_path); 
                
    //             $designImage->design_image = $image_path;
    //             $designImage->status = 1;
    //             $designImage->save();
    //             $imageId = $designImage->id;

    //             $uploadedImage = DesignImage::find($imageId);

    //             Session::put('uploadedImage', $uploadedImage);

    //             return redirect()->back()->with(compact('uploadedImage'));
    //         }
    //     }
    // }



}
