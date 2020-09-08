<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Image;

class CategoryController extends Controller
{
	public function addCategory() {
		$categories = Category::where('parent_id', 0)->get();
		return view('admin.category.add-category', compact('categories'));
	}

	public function saveCategory(Request $request) {

		$request->validate([
            'parent_id' => 'required',
            'category_name' => 'required',
            'category_description' => 'required',
            'url' => 'required',
            'publication_status' => 'required',
        ]);

        if(isset($request->category_icon)) {

            $this->validate($request,
                [
                    'category_icon' => 'image|mimes:jpeg,png,jpg|max:1024',
                ]);
        }

		$imageUrl = $this->categoryIconUpload($request);

		$category = new Category;
		$category->parent_id            = $request->parent_id;
		$category->category_name        = $request->category_name;
		$category->category_description = $request->category_description;
		$category->url                  = $request->url;
		if ($request->category_icon) {
			$category->category_icon    = $imageUrl;
		}else{
			$category->category_icon     = "";
		}
		$category->publication_status   = $request->publication_status;
		$category->save();
		return redirect('/category/add')->with('message', 'Category Info Save Successfully.');
	}

	// category icon upload
    protected function categoryIconUpload($request) {

        if ($request->hasFile('category_icon')) {
            $categoryIcon   = $request->file('category_icon');
            $imageExtension = $categoryIcon->getClientOriginalExtension();
            $imageName      = 'ci_'.time().'.'.$imageExtension;
            $directory      = 'uploads/category-icon/';
            $image = Image::make($categoryIcon);
            $image->save($directory . $imageName); 
            $imageUrl   = $directory . $imageName;
            return $imageUrl;
        }
        
    }

	public function manageCategory() {
		$categories = Category::all();
		return view('admin.category.manage-category', ['categories' => $categories]);
	}

	public function unpublishedCategory($id) {
		$category = Category::find($id);
		$category->publication_status = 0;
		$category->save();
		return redirect('/category/manage')->with('message', 'Category Info Unpublished.');
	}

	public function publishedCategory($id) {
		$category = Category::find($id);
		$category->publication_status = 1;
		$category->save();
		return redirect('/category/manage')->with('message', 'Category Info Published.');
	}

	public function editCategory($id) {
		$category = Category::find($id);
		return view('admin.category.edit-category', ['category' => $category]);
	}

	public function updateCategory(Request $request) {
		$imageUrl = $this->imageExistStatus($request);
		$category = Category::find($request->category_id);
		$category->category_name = $request->category_name;
		$category->category_description = $request->category_description;
		$category->url = $request->url;
		$category->category_icon = $imageUrl;
		$category->publication_status = $request->publication_status;
		$category->save();
		return redirect('/category/manage')->with('message', 'Category Info Updated Successfully.');
	}

	private function imageExistStatus($request){
		$categoryById = Category::where('id', $request->category_id)->first();
		
		$categoryIcon = $request->file('category_icon');
		//dd($categoryIcon);die;

        if($categoryIcon) {
            $imageExtension = $categoryIcon->getClientOriginalExtension();
            $imageName      = 'ci_'.time().'.'.$imageExtension;
            $directory      = 'uploads/category-icon/';
            $image = Image::make($categoryIcon);
            $image->save($directory . $imageName); 
			$imageUrl   = $directory.$imageName;
        }
        else {
            $imageUrl = $categoryById->category_icon;
        }
        return $imageUrl;
    }

	public function deleteCategory($id) {
		$category = Category::find($id);
		$category->delete();
		return redirect('/category/manage')->with('message', 'Category Info Deleted.');
	}


}
