<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomeCategory;

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
}
