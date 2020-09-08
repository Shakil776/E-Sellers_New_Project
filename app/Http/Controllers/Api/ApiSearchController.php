<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Product;
use DB;

class ApiSearchController extends Controller
{

    public function search(Request $request) {
        
        $searchKey = $request->get('key');


        if($searchKey != ""){

            $searchProducts = DB::table('products')
                                ->join('categories', 'products.category_id', '=', 'categories.id')
                                ->join('manufacturers', 'products.manufacturer_id', '=', 'manufacturers.id')
                                ->join('vendors', 'products.vendor_id', '=', 'vendors.id')
                                ->where('product_name', 'LIKE', '%' .$searchKey. '%')
                                ->orWhere('product_price', 'LIKE', '%' .$searchKey. '%')
                                ->orWhere('product_code', 'LIKE', '%' .$searchKey. '%')
                                ->orWhere('category_name', 'LIKE', '%' .$searchKey. '%')
                                ->orWhere('manufacturer_name', 'LIKE', '%' .$searchKey. '%')
                                ->orWhere('name', 'LIKE', '%' .$searchKey. '%')
                                ->select('products.*', 'categories.category_name', 'manufacturers.manufacturer_name', 'vendors.name AS vendor_name')
                                ->paginate(20);
        }


        if (count($searchProducts) > 0){
            return new ProductCollection($searchProducts);
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Not Found'
            ]);
        }

    }



	public function advanceSearch(Request $request) {

        $searchProducts = Product::where('publication_status', 1);

        if ($request->searchForm['search_key'] != "") {
             $searchProducts->where('product_name', $request->searchForm['search_key']);
        }

        // if ($request->searchForm['category'] != "") {
        //     $searchProducts->where('product_name', $request->input('product_name'));
        // }

        if($request->min_price != ""){
             $searchProducts->where("product_price", ">=", $request->min_price);
        }

        if($request->max_price != ""){
             $searchProducts->where("product_price", "<", $request->max_price);
        }

       return  $searchProducts->get();

        //return new ProductCollection($searchProducts);


    }
}
