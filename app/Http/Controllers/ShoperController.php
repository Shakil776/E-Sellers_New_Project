<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Shoper;
use App\Product;
use Validator;
use Session;
use Mail;
use Image;

class ShoperController extends Controller
{
    // save info
    public function saveShoperInfo(Request $request){
        $data = $request->all();
        // echo "<pre>"; print_r($data); die;

        // validation\
        $this->validate($request, [
            'owner_name' => 'required',
            'email' => 'required',
            'shop_name' => 'required',
            'mobile' => 'required',
            'password' => 'required',
            'nid_image' => 'required|image|max:4096',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required'
        ]);

        if ($request->hasFile('nid_image')) {
            $image   = $request->file('nid_image');
            $image_tmp = Image::make($image);
            $imageExtension = $image->getClientOriginalExtension();
            $imageName      = 's_nid'.rand(111, 999999).time().'.'.$imageExtension;
            $image_path = 'uploads/shoppers/nid/'.$imageName;
            Image::make($image_tmp)->resize(300, 200)->save($image_path); 
        }
        
        // save shopper info on database
        $shpper = new Shoper();
        $shpper->owner_name = $data['owner_name'];
        $shpper->email = $data['email'];
        $shpper->shop_name = $data['shop_name'];
        $shpper->mobile = $data['mobile'];
        $shpper->password = Hash::make($data['password']);
        $shpper->nid_image = $image_path;
        $shpper->state = $data['state'];
        $shpper->city = $data['city'];
        $shpper->address = $data['address'];
        $shpper->service_brief = $data['service_brief'];
        foreach($data['service_provide'] as $serviceProvider){
            $shpper->service_provide = $serviceProvider;
        }
        $shpper->level = $data['level'];
        $shpper->varification_code = sha1(time());
        $shpper->save();
        Session::put('shopperId', $shpper->id);
        
        if($shpper != null){
            // send email
            MailController::sendShoppersEmail($shpper->shop_name, $shpper->email, $shpper->varification_code);
            return redirect()->back()->withSuccess('Your account has been created successfully. Please check your email for verification link and activate your account.');
        }
        return redirect()->back()->withError('Something went wrong.');
    }

    // verify shopper email 
    public function verifyShopper(Request $request){
        $verification_code = $request->get('code'); 
        $shopper = Shoper::where(['varification_code'=>$verification_code])->first();

        if($shopper != null){
            $shopper->is_varified = 1;
            $shopper->save();
            return redirect('shopper-dashboard')->withSuccess('Your account has been activate successfully.');
        }
    }

    // shopper dashboard
    public function shopperDashboard(){
        $shopper_id = Session::get('shopperId');
        $shopperInfo = Shoper::find($shopper_id);
        // echo "<pre>"; print_r($shopper_id); die;
        $shopperProducts = Product::where('shopper_id', $shopper_id)
                                ->where('shopper_id', '!=', 0)
                                ->orderBy('id', 'DESC')
    							->take(16)
                                ->get();

        $lastInsertProduct = Product::where('shopper_id', $shopper_id)
                                ->where('shopper_id', '!=', 0)
                                ->orderBy('id', 'DESC')
    							->take(1)
                                ->first();

        return view('front-end.custom-category.shopkeeper-dashboad')->with(compact('shopperInfo', 'shopperProducts', 'lastInsertProduct'));
    }

    //create product page
    public  function createProductSample(){
        $shopName = Shoper::select('id', 'shop_name')->find(Session::get('shopperId'));
        // echo "<pre>"; print_r($shopName); die;
        return view('front-end.custom-category.create-product')->with(compact('shopName'));
    }

    // show tailors shp product
    public function showTailorsShopProduct(){
        $allTailorProducts = Product::where('shopper_id', '!=', 0)
                                ->inRandomOrder()
                                ->paginate(20);

        // echo "<pre>"; print_r($allTailorProducts); die;
        return view('front-end.custom-category.tailors_shop')->with(compact('allTailorProducts'));
    }
}
