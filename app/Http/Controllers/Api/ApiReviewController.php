<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewCollection;
use App\Product;
use App\Review;
use App\User;

class ApiReviewController extends Controller
{
    //save review
    public function saveReview(Request $request, $c_id, $p_id){

        $product = Product::find($p_id);
        $review = Review::where('customer_id',$c_id)->where('product_id',$p_id)->first();
        
        $avg_rating = $product->rating;
        if($product->rating_count==0){
           
            $product->rating  = $request->get('rating');
            //$product->rating_count = 1;
            $product->rating_count = $product->rating_count + 1;
            $avg_rating =  $product->rating/$product->rating_count;
            $product->save();
        }else{
            $avg_rating= (($product->rating_count*$product->rating)+$request->get('rating'))/($product->rating_count+1);
            
            $product->rating  = $avg_rating;
            $product->rating_count = $product->rating_count + 1;
            $product->save();
        }


        if(!empty($review)){
            return response()->json([
                'status' => 0,
                'message' => 'Previously Reviewed.'
            ], 201);
           
        }else {
            $review = new Review();
            $review->product_id = $p_id;
            $review->customer_id = $c_id;
            $review->rating = $request->get('rating');
            $review->review = $request->get('review');
            $review->save();
        }

       
        // if(!empty($review)){
        //     $review = new Review();
        //     $review->product_id = $p_id;
        //     $review->customer_id = $c_id;
        //     $review->rating = $request->get('rating');
        //     $review->review = $request->get('review');
        //     $review->save();
        // }else{
        //     return response()->json([
        //         'status' => 0,
        //         'message' => 'Previously Reviewed.'
        //     ], 201);
        // }
        

        if ($review) {
            return response()->json([
                'status' => 1,
                'message' => 'Successfull.',
                'review' => $review,
                'avg_rating' => $avg_rating
            ], 201);

        }
    }

       // get review
        public function getReview($p_id){
    
            $reviews = Review::where('product_id',$p_id)->paginate(20);
    
            if(!$reviews->isEmpty()) {
                return new ReviewCollection($reviews);
            }else{
                 return response()->json([
                    'status' => 0,
                    'message' => 'No Review.',
                ], 201);
            }
    
        }
}
