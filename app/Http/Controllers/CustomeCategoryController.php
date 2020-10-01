<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomeCategory;
use App\Product;
use App\Manufacturer;
use App\ProductsAlternateImage;
use App\DesignImage;
use App\Shoper;
use Session;
use Image;
use App\Review;

class CustomeCategoryController extends Controller
{
    // save custom category
    public function customCategory(Request $request) {
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            $request->validate([
                'category_name' => 'required',
                'url' => 'required',
                'category_description' => 'required',
                'publication_status' => 'required'
            ]);
            $customCategory = new CustomeCategory;
            $customCategory->category_name        = $data['category_name'];
            $customCategory->url                  = $data['url'];
            $customCategory->category_description = $data['category_description'];
            $customCategory->publication_status   = $data['publication_status'];
            $customCategory->save();
            return redirect()->back()->with('success', 'Custom Category Info Save Successfully.');
        }
		return view('admin.category.add_custom_category');
    }
    
    // manage custom category
    public function manageCustomCategory() {
		$customCategories = CustomeCategory::all();
		return view('admin.category.manage_custom_category')->with(compact('customCategories'));
    }
    
    // unpublished 
    public function unpublishedCustomCategory($id) {
		$category = CustomeCategory::find($id);
		$category->publication_status = 0;
		$category->save();
		return redirect()->back()->with('success', 'Custom Category Info Unpublished.');
	}

    // published
	public function publishedCustomCategory($id) {
		$category = CustomeCategory::find($id);
		$category->publication_status = 1;
		$category->save();
		return redirect()->back()->with('success', 'Custom Category Info Published.');
    }
    
    // edit
    public function updateCustomCategory(Request $request, $id) {
        if($request->isMethod('post')){
            $data = $request->all();

            $request->validate([
                'category_name' => 'required',
                'url' => 'required',
                'category_description' => 'required',
                'publication_status' => 'required'
            ]);

            CustomeCategory::where('id', $id)->update(['category_name'=>$data['category_name'],'url'=>$data['url'],'category_description'=>$data['category_description'],'publication_status'=>$data['publication_status']]);

            return redirect('manage-custom-category')->with('success', 'Custom Category Info Updated Successfully.');
        }

		$category = CustomeCategory::find($id);
		return view('admin.category.update_custom_category')->with(compact('category'));
    }
    
    // delete custom category
    public function deleteCustomCategory($id) {
		$category = CustomeCategory::find($id)->delete();
		return redirect('manage-custom-category')->with('success', 'Custom Category Info Deleted.');
    }
    
    // custom category products
    public function customCategoryProducts($url = null){

        // show 404 page if category URL does not exist
        $countCustomCategory = CustomeCategory::where(['url' => $url])->count();
        if ($countCustomCategory == 0) {
            abort(404);
        }

        $customCategories = CustomeCategory::where(['url' => $url])->first();

        $allCustomProducts = Product::where('custom_category_id', $customCategories->id)
                                ->where('custom_category_id', '!=', 0)
                                ->inRandomOrder()
                                ->paginate(20);
        // return response($allCustomProducts); die;

        return view('front-end.category.custom_category_content')->with(compact('customCategories', 'allCustomProducts'));
    }

    // custom dress/product details
    public function dressDetails($id = null) {
        //get product details of particular id
        $productDetails = Product::with('designImages')->with('attributes')->where('id', $id)->first();
        // return response($productDetails); die;
        // $productDetails = json_decode(json_encode($productDetails));
        
        $brandName = Manufacturer::where('id', $productDetails->manufacturer_id)->first();
        $shopName = Shoper::where('id', $productDetails->shopper_id)->first();
        $customeCategoryName = CustomeCategory::select('category_name')->where('id', 2)->first();
        // return response($productDetails); die;
        
        // related product show in dress details page
        $relatedProducts = Product::where('id','!=',$id)
                                    ->where(['custom_category_id'=>$productDetails->custom_category_id])
                                    ->get();


        $reviews = Review::where('product_id', $id)->get(); 
        foreach ($reviews as $key => $val) {
            $customerName = User::where(['id'=>$val->customer_id])->first();
            if(!empty($customerName)){
                $reviews[$key]->customer_name = $customerName['name'];
            }
        }

        $productAltImages = ProductsAlternateImage::where('product_id', $id)->get();
        
        return view('front-end.custom-category.dress_details')->with(compact('productDetails', 'brandName', 'productAltImages', 'customeCategoryName', 'shopName', 'relatedProducts' ,'reviews'));
    }

    //select service
    public function selectService(Request $request){
        if($request->isMethod('post')){
            
            if ($request->hasFile('customer_design_image')) {
                $image   = $request->file('customer_design_image');

                $image_tmp = Image::make($image);
                $imageExtension = $image->getClientOriginalExtension();
                $imageName      = 'cus_d'.rand(111, 999999).time().'.'.$imageExtension;
                $image_path = 'uploads/design-image/'.$imageName;
                Image::make($image_tmp)->resize(650, 700)->save($image_path); 

                $designImage = new DesignImage();
                $designImage->product_id = $request->product_id;
                $designImage->design_image = $image_path;
                $designImage->status = 1;
                $designImage->save();
                $customer_design_image = $designImage->design_image;
            }
            

            $qty = $request->qty;
            $product_id = $request->product_id;

            if($request->design_image){
                $design_image = $request->design_image;
            }else{
                $design_image = 0;
            }

            if(!empty($customer_design_image)){
                $customer_design_image = $customer_design_image;
            }else{
                $customer_design_image = 0;
            }
            
            $data = ['qty'=>$qty, 'product_id'=>$product_id, 'design_image'=>$design_image, 'customer_design_image'=>$customer_design_image]; 
           
            Session::put('chooseProduct', $data);
            // return response($data); die;
            return view('front-end.custom-category.select-service');
        }
        return view('front-end.custom-category.select-service');
    }

}
