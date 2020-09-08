<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductsAlternateImage;
use Image;

class ProductsAlternateImageController extends Controller
{
    // add image
    public function addImage(Request $request, $id=null){

        if($request->isMethod('post')){
            if ($request->hasFile('images')) {
                $images   = $request->file('images');

                foreach ($images as $key => $image) {
                    $productImage = new ProductsAlternateImage();
                    $image_tmp = Image::make($image);
                    $imageExtension = $image->getClientOriginalExtension();
                    $imageName      = 'pi_'.rand(111, 999999).time().'.'.$imageExtension;
                    $image_path = 'uploads/product-image/'.$imageName;
                    Image::make($image_tmp)->resize(650, 700)->save($image_path); 
                    
                    $productImage->product_id = $id;
                    $productImage->image = $image_path;
                    $productImage->status = 1;
                    $productImage->save();
                }
                return redirect()->back()->with('success', 'Product alternate image uploaded successfully.');
            }
        }


        $productDetails = Product::with('images')->select('id', 'product_name', 'product_price', 'product_code', 'product_image')->find($id);
        return view('admin.product.add_images')->with(compact('productDetails'));
    }

    // update image status
    public function updateImageStatus($id, $status){
        ProductsAlternateImage::where('id', $id)->update(['status'=>$status]);
        return redirect()->back()->with('success', 'Image Status has been updated Successfully.');
    }
    
    // delete image
    public function deleteImage($id){
        $productImage = ProductsAlternateImage::select('image')->where('id', $id)->first();

        if(file_exists($productImage->image)){
            unlink($productImage->image);
        }

        ProductsAlternateImage::find($id)->delete();
        return redirect()->back()->with('success', 'Image deleted Successfully.');
    }
}
