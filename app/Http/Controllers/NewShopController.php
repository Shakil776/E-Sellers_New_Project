<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Manufacturer;
use App\SliderImage;
use App\ProductsAttributes;
use App\Review;
use App\User;
use App\ProductsAlternateImage;
use Session;

class NewShopController extends Controller
{
    public function index() {
    	$allProducts = Product::where('publication_status', 1)
                                ->inRandomOrder()
                                ->get();
                                
        $newProducts = Product::where('publication_status', 1)
                                ->where('status_id', 1)
                                ->inRandomOrder()
    							->take(16)
                                ->get();
                                
        $featureProducts = Product::where('publication_status', 1)
                                ->where('status_id', 2)
                                ->inRandomOrder()
    							->take(16)
                                ->get();
                                
        $bestSellersProducts = Product::where('publication_status', 1)
                                ->where('status_id', 7)
                                ->inRandomOrder()
    							->take(16)
    							->get();

        $showSliders = SliderImage::where('publication_status', 1)
                                ->orderBy('id', 'DESC')
                                ->take(3)
                                ->get();

        return view('front-end.home.home_content')->with(compact('allProducts', 'newProducts', 'featureProducts', 'showSliders', 'bestSellersProducts'));

    }


    // new categoryProducts
    public function categoryProducts($url = null){

        // show 404 page if category URL does not exist
        $countCategory = Category::where(['url' => $url])->count();
        if ($countCategory == 0) {
            abort(404);
        }

        $categories = Category::with('subCategories')->where(['parent_id'=>0])->get();

        $categoryDetails = Category::with('subCategories')->where(['url' => $url])->first();


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

        $allProducts = Product::whereIn('category_id', $cat_ids)->paginate(20);

        $manufacturers = Manufacturer::where(['publication_status' => 1])->get();

        $newProducts1 = Product::where('publication_status', 1)
                                ->inRandomOrder()
    							->take(3)
                                ->get();
        $newProducts2 = Product::where('publication_status', 1)
                                ->inRandomOrder()
    							->take(3)
                                ->get();
      
        return view('front-end.category.category_content')->with(compact('categoryDetails', 'allProducts', 'categories', 'manufacturers', 'newProducts1', 'newProducts2'));
    }

    // new categoryProducts
    public function bandProducts($url = null){

        // show 404 page if category URL does not exist
        $countBand = Manufacturer::where(['url' => $url])->count();

        if ($countBand == 0) {
            abort(404);
        }

        $manufacturers = Manufacturer::where(['publication_status' => 1])->get();

        $bandProdutDetails = Manufacturer::where(['url' => $url])->first();

        $allBandProducts = Product::where(['manufacturer_id' => $bandProdutDetails->id])->paginate(20);

        //$bandName = Manufacturer::where(['manufacturer_name' => $value->id])->first();

        // foreach ($allBandProducts as $key => $value) {
        //     $bandName = Manufacturer::where(['url' => $value->id])->first();
        //     $allBandProducts[$key]->Manufacturer_name = $bandName->manufacturer_name;
        // }

        //echo "<pre>";print_r($allBandProducts);die();

        $newProducts1 = Product::where('publication_status', 1)
                                ->inRandomOrder()
    							->take(3)
                                ->get();
        $newProducts2 = Product::where('publication_status', 1)
                                ->inRandomOrder()
    							->take(3)
                                ->get();
 
        return view('front-end.band.band_products')->with(compact('allBandProducts', 'manufacturers', 'bandProdutDetails', 'newProducts1', 'newProducts2'));
    }


    // product details
    public function productDetails($id = null) {
        //get product details of particular id
        $productDetails = Product::with('attributes')->where('id', $id)->first();
        $productDetails = json_decode(json_encode($productDetails));

        $brandName = Manufacturer::where('id', $productDetails->manufacturer_id)->first();
        
        // related product show in product details page
        $relatedProducts = Product::where('id','!=',$id)
                                    ->where(['category_id'=>$productDetails->category_id])
                                    ->get();

        //$total_stock = ProductsAttributes::where('product_id', $id)->sum('stock'); 

        $reviews = Review::where('product_id', $id)->get(); 
        foreach ($reviews as $key => $val) {
            $customerName = User::where(['id'=>$val->customer_id])->first();
            if(!empty($customerName)){
                $reviews[$key]->customer_name = $customerName['name'];
            }
        }
        // $reviews_count = Review::where('product_id', $id)->count('review'); 

        $productAltImages = ProductsAlternateImage::where('product_id', $id)->get();

        return view('front-end.product.product_details')->with(compact('productDetails', 'relatedProducts', 'brandName', 'reviews', 'productAltImages'));
    }

    // get product price
    public function getProductPrice(Request $request){
        $data = $request->all();
        $proArr = explode("-", $data['idSize']);
        $proAttr = ProductsAttributes::where(['product_id' => $proArr[0], 'size' => $proArr[1]])->first();
        echo $proAttr->price;
    }

}
