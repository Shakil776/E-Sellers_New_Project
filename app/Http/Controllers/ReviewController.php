<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Product;

class ReviewController extends Controller
{
    //manage review from admin
    public function manageReviewInfo(){
        $product_reviews = Product::with('reviews')->get();

        // foreach ($product_reviews as $key => $value) {
        //     $vendor = Vendor::find($value["vendor_id"]);
        //     if(isset($vendor["name"]))
        //     $product_reviews[$key]->vendor_name = $vendor["name"];
        // }

        return view('admin.review.manage_review')->with(compact('product_reviews'));
    }

    // unpublished
    public function unpublishedReview($id) {
		$review = Review::findOrFail($id);
		$review->status = 0;
		$review->save();
		return redirect('/review/manage')->with('message', 'Review Unpublished.');
	}

    // published
	public function publishedReview($id) {
		$review = Review::findOrFail($id);
		$review->status = 1;
		$review->save();
		return redirect('/review/manage')->with('message', 'Review Published.');
	}
    
    // delete review
    public function deleteReview($id = null){
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect('/review/manage')->with('message', 'Review delete Successfully.');
    }
}
