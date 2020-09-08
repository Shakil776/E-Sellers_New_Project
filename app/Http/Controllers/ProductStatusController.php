<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductStatus;

class ProductStatusController extends Controller
{
    public function addProductStatus() {
		return view('admin.product_status_name.add_product_status');
	}

	public function saveProductStatus(Request $request) {
		$product_status = new ProductStatus();
		$product_status->status_name        = $request->status_name;
		$product_status->publication_status   = $request->publication_status;
		$product_status->save();
		return redirect('/status/add')->with('message', 'Product Status Name Save Successfully.');
	}

	public function manageProductStatus() {
		$product_statuses = ProductStatus::all();
		return view('admin.product_status_name.manage_product_status', ['product_statuses' => $product_statuses]);
	}

	public function unpublishedProductStatus($id) {
		$product_status = ProductStatus::find($id);
		$product_status->publication_status = 0;
		$product_status->save();
		return redirect('/status/manage')->with('message', 'Product Status Name Unpublished.');
	}

	public function publishedProductStatus($id) {
		$product_status = ProductStatus::find($id);
		$product_status->publication_status = 1;
		$product_status->save();
		return redirect('/status/manage')->with('message', 'Product Status Name Published.');
	}

	public function editProductStatus($id) {
		$product_status = ProductStatus::find($id);
		return view('admin.product_status_name.edit_product_status', ['product_status' => $product_status]);
	}

	public function updateProductStatus(Request $request) {
		$product_status = ProductStatus::find($request->status_id);
		$product_status->status_name = $request->status_name;
		$product_status->publication_status = $request->publication_status;
		$category->save();
		return redirect('/status/manage')->with('message', 'Product Status Updated Successfully.');
	}

	public function deleteProductStatus($id) {
		$product_status = ProductStatus::find($id);
		$product_status->delete();
		return redirect('/status/manage')->with('message', 'Product Status Name Deleted.');
	}
}
