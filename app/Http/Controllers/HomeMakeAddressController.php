<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomeMakeAddress;
use App\Product;
use Session;

class HomeMakeAddressController extends Controller
{
    //Home Make address
    public function HomeMakeAddress(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>";print_r($data);die();
            $this->validate($request, [
                'name' => 'required | string | max:25',
                'mobile' => 'required | min:11',
                'state' => 'required',
                'city' => 'required',
                'address' => 'required'
            ]);

            // return if any field empty
            if (empty($data['name']) || empty($data['mobile']) || empty($data['state']) || empty($data['city']) || empty($data['address'])) {
                return redirect()->back()->with('error', 'Please, filled all fields.');
            }else{
                $homeMakeAddress = new HomeMakeAddress;
                $homeMakeAddress->name = $data['name'];
                $homeMakeAddress->mobile = $data['mobile'];
                $homeMakeAddress->state = $data['state'];
                $homeMakeAddress->city = $data['city'];
                $homeMakeAddress->address = $data['address'];
                $homeMakeAddress->save();

                Session::put('homeMakeAddress', $homeMakeAddress->id);
                return redirect()->action('HomeMakeAddressController@updateHomeAddress');
            }
        }
        return view('front-end.custom-category.home-make-address');
    }


    public function updateHomeAddress(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            
            if(!empty($data['update']) && $data['update'] == "update"){
                HomeMakeAddress::where('id', $data['id'])->update(['name'=>$data['name'], 'mobile'=>$data['mobile'], 'state'=>$data['state'], 'city'=>$data['city'], 'address'=>$data['address']]);

                return redirect()->back()->with('success', 'Successfully Updated.');
            }
            
        }
        $homeMakeAddressId = Session::get('homeMakeAddress');
        $homeMakeAddressDetails = HomeMakeAddress::findOrFail($homeMakeAddressId);
        $product = Product::find(Session::get('chooseProduct')['product_id']);
        return view('front-end.custom-category.show-home-make-address', compact('homeMakeAddressDetails', 'product'));
    }
}
