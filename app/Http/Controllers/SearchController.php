<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Resources\ProductCollection;
use DB;

class SearchController extends Controller
{
    public function search(Request $request) {

        if ($request->isMethod('post')) {
            $keyword = $request->get('search-key');

            if ($keyword != '') {
                $searchProducts = DB::table('products')
                                ->join('categories', 'products.category_id', '=', 'categories.id')
                                ->join('manufacturers', 'products.manufacturer_id', '=', 'manufacturers.id')
                                ->where('product_name', 'LIKE', '%' .$keyword. '%')
                                ->orWhere('product_price', 'LIKE', '%' .$keyword. '%')
                                ->orWhere('product_code', 'LIKE', '%' .$keyword. '%')
                                ->orWhere('category_name', 'LIKE', '%' .$keyword. '%')
                                ->orWhere('manufacturer_name', 'LIKE', '%' .$keyword. '%')
                                ->select('products.*', 'categories.category_name', 'manufacturers.manufacturer_name')
                                ->paginate(30);
            } else {
                return redirect()->back();
            }

            return view('front-end.search.search_result', compact('searchProducts', 'keyword'));
            
        }
        return redirect()->back();
    }

    // filter search
    public function filterSearch(Request $request){
       if($request->isMethod('post')){

            $query = Product::where('category_id', '!=', 0);

            $name_keyword = '';
            $min_price = 0;
            $max_price = 0;

            if($request->has('name_keyword')){
                $name_keyword = $request->get('name_keyword');
            }

            if($request->has('min_price')){
                $min_price = $request->get('min_price');
            }

            if($request->has('max_price')){
                $max_price = $request->get('max_price');
            }

            if(!empty($name_keyword)) {
                $query->where('product_name', 'LIKE', '%' .$name_keyword. '%');
            }

            if(($min_price) && ($max_price)) {
                $query->whereBetween('product_price', [$min_price, $max_price]);
            }
            elseif(!is_null($min_price)) {
                $query->where('product_price', '>=', $min_price);
            }
            elseif(!is_null($max_price)) {
                $query->where('product_price', '<=', $max_price);
            }

            $searchProducts = $query->paginate(30);

            return view('front-end.search.filter_search_result', compact('searchProducts'));
       }
       return redirect()->back();
    }


}
