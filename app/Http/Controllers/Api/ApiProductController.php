<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;

use App\Category;
use App\Manufacturer;
use App\Product;
use App\ProductStatus;
use DB;

class ApiProductController extends Controller
{
     // show all product
    public function showAllProduct() {
        $products = Product::with('attributes')->with('reviews')->paginate(40);

        foreach ($products as $key => $val) {
            $categoryName = Category::where(['id'=>$val->category_id])->first();
            $manufacturerName = Manufacturer::where(['id'=>$val->manufacturer_id])->first();
            $productStatusName = ProductStatus::where(['id'=>$val->status_id])->first();
            if(!empty($categoryName)){
                $products[$key]->category_name = $categoryName['category_name'];
            }
            $products[$key]->manufacturer_name = $manufacturerName['manufacturer_name'];
            $products[$key]->product_status_name = $productStatusName['status_name'];
        }

        return new ProductCollection($products);
    }


    // show product by category
    public function showProductByCategory($id = null){

        $categoryDetails = Category::with('subCategories')->where(['id' => $id])->first();
            // if url is main category url
            $allCategories = Category::with('subCategories')
                                        ->where(['parent_id'=>$categoryDetails->id])
                                        ->get();

            $cat_ids = array($categoryDetails->id);
            if(!empty($allCategories)){                            
                foreach ($allCategories as $subCat) {
                    $cat_ids[] = $subCat->id;
                    foreach ($subCat->subCategories as $sub_sub_cat) {
                        $cat_ids[] = $sub_sub_cat->id;
                    }
                }
            }else {
                 $cat_ids[] = $categoryDetails->id;
            }

            $allProducts = Product::with('attributes')->with('reviews')->whereIn('category_id', $cat_ids)->paginate(20);
            
            foreach ($allProducts as $key => $val) {
                $categoryName = Category::where(['id'=>$val->category_id])->first();
                $manufacturerName = Manufacturer::where(['id'=>$val->manufacturer_id])->first();
                $productStatusName = ProductStatus::where(['id'=>$val->status_id])->first();
                $allProducts[$key]->category_name = $categoryName['category_name'];
                $allProducts[$key]->manufacturer_name = $manufacturerName['manufacturer_name'];
                $allProducts[$key]->product_status_name = $productStatusName['status_name'];
            }

            return new ProductCollection($allProducts);
    }
       
}
