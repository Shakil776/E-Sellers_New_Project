<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\VendorProductCollection;
use App\Product;
use App\Vendor;

class ApiVendorController extends Controller
{
    public function showVendorHistory(Request $request){

        $vendor_id = $request->get('vendorId');
        $vendor = Vendor::where('id', $vendor_id)->first();
        $products = Product::with('reviews')->where('vendor_id', $vendor->id)->paginate(5);
        $product_collection =  (new VendorProductCollection($products))->setVendor($vendor);
        return $product_collection;
    }
    
    // show individual vendor details
    public function showVendorDetails(Request $request){
    	$vendor_id = $request->get('vendorId');
    	$vendor = Vendor::where('id', $vendor_id)->get();

    	if(!$vendor->isEmpty()) {
            return response()->json([
                'status' => 1,
                'message' => 'Successfull.',
                'vendor' => $vendor
            ], 201);
        }else{
             return response()->json([
                'status' => 0,
                'vendor' => 'No Vendor Found.',
            ], 201);
        }
    }
}
