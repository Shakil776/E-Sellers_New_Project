<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class ApiCategoryController extends Controller
{

	// display all category
	public function showAllCategory() {
		$categories = Category::with('subCategories')->where(['parent_id'=>0])->get();

		if (!collect($categories)->isEmpty()) { 

			return response()->json([
				'status' => 1,
				'message' => 'Success',
				'categories' => $categories
			], 200);

		} else {

			return response()->json([
				'status' => 0,
				'message' => 'No Data Found'
			], 200);
		}
	}


}
