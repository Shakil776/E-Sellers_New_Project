<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacturer;
use App\Product;
use App\ProductStatus;
use App\ProductsAttributes;
use App\CustomeCategory;
use App\DesignImage;
use Image;
use DB;
use Session;
use Auth;

class ProductController extends Controller
{
    // add product
    public function addProduct() {

        // categories dropdown start
        $categories = Category::where('parent_id', 0)->get();
        $categories_dropdowns = "<option selected disabled>Select Category Level Name</option>";
        foreach ($categories as $cat) {
            $categories_dropdowns .= "<option value='".$cat->id."'>".$cat->category_name."</option>";
            $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
            foreach ($sub_categories as $sub_cat) {
                $categories_dropdowns .= "<option value='".$sub_cat->id."'>&nbsp; --&nbsp;".$sub_cat->category_name."</option>";

                    $sub_sub_categories = Category::where(['parent_id'=>$sub_cat->id])->get();
                    foreach ($sub_sub_categories as $sub_sub_cat) {
                        $categories_dropdowns .= "<option value='".$sub_sub_cat->id."'>&nbsp; -----&nbsp;".$sub_sub_cat->category_name."</option>";
                    }
            }
        }
        // categories dropdown end

        $manufacturers = Manufacturer::where('publication_status', 1)->get();
        $product_statuses = ProductStatus::where('publication_status', 1)->get();
        $custom_categorys = CustomeCategory::where('publication_status', 1)->get();



        return view('admin.product.add-product', [
            'categories_dropdowns' => $categories_dropdowns,
            'manufacturers' => $manufacturers,
            'product_statuses' => $product_statuses,
            'custom_categorys' => $custom_categorys
        ]);
    }

   //save product
    public function saveProduct(Request $request) {
        // $data = $request->all();
        // echo "<pre>"; print_r($data); die;
        
        $this->productInfoValidation($request);
        $imageUrl_front = $this->productImageUpload($request);
        $imageUrl_back = $this->productBackImageUpload($request);
        $this->productBasicInfoSave($request, $imageUrl_front, $imageUrl_back);

        return redirect()->back()->withSuccess('Product Info Save Successfully.');
    }

    // product info validate
    protected function productInfoValidation($request) {

        $this->validate($request, [
            'product_name' => 'required',
            'product_price' => 'required',
            'product_code' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,jpg|max:4096',
            'publication_status' => 'required'
        ]);
    }

    // product front image upload
    protected function productImageUpload($request) {

        if ($request->hasFile('product_image')) {
            $productImage   = $request->file('product_image');
            $imageExtension = $productImage->getClientOriginalExtension();
            $imageName      = 'pi_'.time().'.'.$imageExtension;
            $directory      = 'uploads/product-image/';
            $image = Image::make($productImage);
            $image->resize(650, 700)->save($directory . $imageName); 
            $imageUrl_front   = $directory . $imageName;
        }
        return $imageUrl_front;
    }

    // product back image upload
    protected function productBackImageUpload($request) {

        if ($request->hasFile('back_image')) {
            $productImage   = $request->file('back_image');
            $imageExtension = $productImage->getClientOriginalExtension();
            $imageName      = 'pi_'.rand(111, 999999).time().'.'.$imageExtension;
            $directory      = 'uploads/product-image/';
            $image = Image::make($productImage);
            $image->resize(650, 700)->save($directory . $imageName); 
            $imageUrl_back   = $directory . $imageName;
        }else{
            $imageUrl_back = "";
        }
        return $imageUrl_back;
    }

    // product save basic info
    protected function productBasicInfoSave($request, $imageUrl_front, $imageUrl_back){
        $product = new Product;

        if(empty($request->category_id)){
            $request->category_id = 0;
        }
        if(empty($request->custom_category_id)){
            $request->custom_category_id = 0;
        }
        if(empty($request->shopper_id)){
            $request->shopper_id = 0;
        }
        if(empty($request->manufacturer_id)){
            $request->manufacturer_id = 0;
        }
        if(empty($request->status_id)){
            $request->status_id = 0;
        }
        if(empty($imageUrl_back)){
            $imageUrl_back = "";
        }

        $product->category_id          = $request->category_id;
        $product->custom_category_id   = $request->custom_category_id;
        $product->manufacturer_id      = $request->manufacturer_id;
        $product->shopper_id           = $request->shopper_id;
        $product->product_name         = $request->product_name;
        $product->product_price        = $request->product_price;
        $product->product_code         = $request->product_code;
        $product->status_id            = $request->status_id;
        $product->short_description    = $request->short_description;
        $product->long_description     = $request->long_description;
        $product->product_image        = $imageUrl_front;
        $product->back_image           = $imageUrl_back;
        $product->publication_status   = $request->publication_status;
        $product->save();

        if (!empty($request->images)) {

            if ($request->hasFile('images')) {
                $images   = $request->file('images');

                foreach ($images as $key => $image) {
                    $designImage = new DesignImage();
                    $image_tmp = Image::make($image);
                    $imageExtension = $image->getClientOriginalExtension();
                    $imageName      = 'di_'.rand(111, 999999).time().'.'.$imageExtension;
                    $image_path = 'uploads/design-image/'.$imageName;
                    Image::make($image_tmp)->resize(650, 700)->save($image_path);
                    
                    $designImage->product_id = $product->id;
                    $designImage->design_image = $image_path;
                    $designImage->status = 1;
                    $designImage->save();
                }
            }
        }



    }

    // manage product 
    public function manageProduct() {

        // $products = DB::table('products')
        //                 ->join('categories', 'products.category_id', '=', 'categories.id')
        //                 ->join('manufacturers', 'products.manufacturer_id', '=', 'manufacturers.id')
        //                 ->join('product_statuses', 'products.status_id', '=', 'product_statuses.id')
        //                 ->select('products.*', 'categories.category_name', 'manufacturers.manufacturer_name', 'product_statuses.status_name')
        //                 ->orderBy('id', 'DESC')
        //                 ->get();

        $products = Product::get();

        foreach ($products as $key => $val) {
            $categoryName = Category::where(['id'=>$val->category_id])->first();
            $customCategoryName = CustomeCategory::where(['id'=>$val->custom_category_id])->first();
            $manufacturerName = Manufacturer::where(['id'=>$val->manufacturer_id])->first();
            $productStatusName = ProductStatus::where(['id'=>$val->status_id])->first();
            
            if(!empty($categoryName)){
                $products[$key]->category_name = $categoryName['category_name'];
            }
            if (!empty($customCategoryName)) {
                $products[$key]->custom_category_name = $customCategoryName['category_name'];
            }
            $products[$key]->manufacturer_name = $manufacturerName['manufacturer_name'];
            $products[$key]->product_status_name = $productStatusName['status_name'];
        }

        // return response($products);die;

        return view('admin.product.manage-product')->with(compact('products'));
    }


    // unpublished product
    public function unpublishedProduct($id) {
        $product = Product::find($id);
        $product->publication_status = 0;
        $product->save();
        return redirect('/product/manage')->with('message', 'Product Info Unpublished.');
    }

    // published product
    public function publishedProduct($id) {
        $product = Product::find($id);
        $product->publication_status = 1;
        $product->save();
        return redirect('/product/manage')->with('message', 'Product Info Published.');
    }

    // edit product
    public function editProduct($id) {
        // categories dropdown start
        $categories = Category::where('parent_id', 0)->get();
        $categories_dropdowns = "<option selected disabled>Select Category Level Name</option>";
        foreach ($categories as $cat) {
            $categories_dropdowns .= "<option value='".$cat->id."'>".$cat->category_name."</option>";
            $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
            foreach ($sub_categories as $sub_cat) {
                $categories_dropdowns .= "<option value='".$sub_cat->id."'>&nbsp; --&nbsp;".$sub_cat->category_name."</option>";
            }
        }
        // categories dropdown end

        $manufacturers = Manufacturer::where('publication_status', 1)->get();
        $product_statuses = ProductStatus::where('publication_status', 1)->get();
        // get product details by product id
        $productById = Product::where('id',$id)->first();
        return view('admin.product.edit-product',[
            'productById'=>$productById,
            'categories_dropdowns'=>$categories_dropdowns,
            'manufacturers'=>$manufacturers, 
            'product_statuses' => $product_statuses
        ]);
    }

    // update product
    public function updateProduct(Request $request){
        $imageUrl = $this->imageExistStatus($request);
        $product = Product::find( $request->product_id );
        $product->category_id        = $request->category_id;
        $product->manufacturer_id    = $request->manufacturer_id;
        $product->product_name       = $request->product_name;
        $product->product_price      = $request->product_price;
        $product->product_code       = $request->product_code;
        $product->status_id          = $request->status_id;
        $product->short_description  = $request->short_description;
        $product->long_description   = $request->long_description;
        $product->product_image      = $imageUrl;
        $product->publication_status = $request->publication_status;
        $product->save();
        return redirect('/product/manage')->with('message','Product Info Update Successfully!');
    }

    private function imageExistStatus($request){
        $productById = Product::where('id', $request->product_id)->first();
        $productImage = $request->file('product_image');

        if($productImage) {
            $imageExtension = $productImage->getClientOriginalExtension();
            $imageName      = 'pi_'.time().'.'.$imageExtension;
            $directory      = 'uploads/product-image/';
            $image = Image::make($productImage);
            $image->resize(650, 700)->save($directory . $imageName); 

            $imageUrl   = $directory.$imageName;
        }
        else {
            $imageUrl = $productById->product_image;
        }
        return $imageUrl;
    }


    // delete product
    public function deleteProduct($id) {
        $product = Product::find($id);
        $product->delete();
        return redirect('/product/manage')->with('message', 'Product Info Deleted.');
    }

    // add product attributes
    public function addAttribute(Request $request, $id=null){
        $productDetails = Product::with('attributes')->where(['id'=>$id])->first();

        return view('admin.product.add_attributes')->with(compact('productDetails'));
    }
    // save product attributes
    public function saveAttribute(Request $request, $id=null){
        if ($request->isMethod('post')) {
            $data = $request->all();

            foreach ($data['sku'] as $key => $val) {
                if (!empty($val)) {
                    // check duplicate SKU
                    // $attrCountSKU = ProductsAttributes::where('sku',$val)->count();
                    // if ($attrCountSKU>0) {
                    //     return redirect('/product/add-attribute/'.$id)->with('error', 'SKU already exists! Please provide another SKU.');
                    // }

                    // check duplicate size
                    // $attrCountSize = ProductsAttributes::where(['product_id'=>$id, 'size'=>$data['size'][$key]])->count();
                    // if ($attrCountSize>0) {
                    //     return redirect('/product/add-attribute/'.$id)->with('error', '"'.$data['size'][$key].'" Size already exists! Please provide another Size.');
                    // }

                    $attribute = new ProductsAttributes;
                    $attribute->product_id = $id;
                    $attribute->sku = $val;
                    $attribute->size = $data['size'][$key];
                    $attribute->color = $data['color'][$key];
                    $attribute->price = $data['price'][$key];
                    $attribute->stock = $data['stock'][$key];
                    $attribute->save();
                }
            }
        }
        return redirect('/product/add-attribute/'.$id)->with('message', 'Product Attribute added Successfully.');
    }

    // delete product attribute
    public function deleteAttribute($id=null){
        ProductsAttributes::where(['id'=>$id])->delete();
        return redirect()->back()->with('message', 'Product Attribute delete Successfully.');
    }

}
