<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomeCategory;
use App\Product;
use App\Manufacturer;
use App\ProductsAlternateImage;
use Session;

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

        return view('front-end.category.custom_category_content')->with(compact('customCategories', 'allCustomProducts'));
    }

    // custom dress/product details
    public function dressDetails($id = null) {
        //get product details of particular id
        $productDetails = Product::with('attributes')->where('id', $id)->first();
        $productDetails = json_decode(json_encode($productDetails));

        $brandName = Manufacturer::where('id', $productDetails->manufacturer_id)->first();
        
        // related product show in product details page
        // $relatedProducts = Product::where('id','!=',$id)
        //                             ->where(['category_id'=>$productDetails->category_id])
        //                             ->get();

        //$total_stock = ProductsAttributes::where('product_id', $id)->sum('stock'); 

        // $reviews = Review::where('product_id', $id)->get(); 
        // foreach ($reviews as $key => $val) {
        //     $customerName = User::where(['id'=>$val->customer_id])->first();
        //     if(!empty($customerName)){
        //         $reviews[$key]->customer_name = $customerName['name'];
        //     }
        // }
        // $reviews_count = Review::where('product_id', $id)->count('review'); 

        $productAltImages = ProductsAlternateImage::where('product_id', $id)->get();

        return view('front-end.custom-category.dress_details')->with(compact('productDetails', 'brandName', 'productAltImages'));
    }

    //select service
    public function selectService(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // return response($data); die;
            Session::put('chooseProduct', $data);
            return view('front-end.custom-category.select-service');
        }
        return view('front-end.custom-category.select-service');
    }

}
