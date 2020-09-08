<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
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


}
