<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use Validator;
use Session;
use Mail;
use Image;

class UserController extends Controller
{
    // show register form
    public function showRegister(){
        return view('front-end.customer.register');
    }

    // customer register 
    public function saveCustomerRegister(Request $request) {

        $this->validate($request, [
            'name' => 'required | string | max:25',
            'email' => 'required | email | unique:users',
            'mobile' => 'required | min:11', 
            'password' => 'required | string | min:8',
        ]);

       $data = $request->all();
       
       $userCount = User::where('email' , $data['email'])->count();
       if ($userCount > 0) {
          return redirect()->back()->with('error', 'Email Already Exists.');
       } else {
            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->mobile = $data['mobile'];
            $user->password = Hash::make($data['password']);

            if (empty($data['state']) || empty('city') || empty('address')) {
                $user->address = '';
            } else {
                $user->address = str_replace(',', '-', $data['address']).', '.$data['city'].', '.$data['state'];
            }
            
            $user->save();

            $customerId = $user->id;
            $customerName = $user->name;
            Session::put('customerId', $customerId);
            Session::put('customerName', $customerName);

            return redirect('/cart-show');
       }
    }

    // login form
    public function showUserLoginForm() {
        return view('front-end.customer.login');
    }

    // customer login 
    public function checkCustomerLogin(Request $request) {

        $this->validate($request, [
            'email' => 'required | email',
            'password' => 'required | string | min:8'
        ]);

        if(empty($request->email) || empty($request->password)){
            return redirect()->back()->with('success', 'Field must not be empty.');
        }

        $userdata = array(
            'email'     => $request->email,
            'password'  => $request->password
        );

        if (Auth::attempt($userdata)) {
            if(Auth::check()){
                $customerId = Auth::user()->id;
                Session::put('customerId', $customerId);
            }
            return redirect('/cart-show');
        } else {
            return redirect()->back()->with('error', 'Invalid Credentials!');
        }
    }

    
    // customer profile
    public function profile(Request $request){
        $user_id = Session::get('customerId');
        $user = User::findOrFail($user_id);

        if ($request->isMethod('post')) {

            $this->validate($request, [
                'name' => 'required | string | max:25',
                'email' => 'email | unique:users,email,'.$user->id,
                'mobile' => 'required | min:11',
            ]);

            $data = $request->all();
           
            // $userCount = User::where('email' , $data['email'])->count();
            //if (User::where('email', $data['email'])->exists()) {
                //return redirect()->back()->with('error', 'Email Already Exists.');
            //s} else {

                $user->name = $data['name'];

                if (empty($data['email'])) {
                    if(!empty($user->email)){
                        $user->email = $user->email;
                    } else {
                        $user->email = '';    
                    }  
                } else {
                    $user->email = $data['email'];
                }

                $user->mobile = $data['mobile'];

                if (empty($data['district']) || empty($data['city']) || empty($data['state']) || empty($data['address'])) {
                    if (!empty($user->address)) {
                        $user->address = $user->address;
                    }else{
                        $user->address = '';
                    }
                } else {
                    $user->address = str_replace(',', '-', $data['address']).', '.$data['city'].', '.$data['district'];
                }
                
                $user->save();

                return redirect()->back()->with('success', 'Profile Updated Successfully.');
           // }
        }

        return view('front-end.customer.profile', compact('user'));
    }


    // customer logout
    public function customerLogout(){
        Session::forget('customerId');
        Session::forget('customerName');
        return redirect('/');
    }

    // change password
    public function showPassChangeForm(){
        return view('front-end.customer.change_password');
    }

    public function updatePassword(Request $request){
        
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|string|min:8',
            'password_confirm' => 'same:new_password',
        ]);    

        $user_id = Session::get('customerId');
        $userById = User::where('id', $user_id)->first(); 

        if (!Hash::check($request->old_password, $userById->password)) {
            // The passwords not matches
            return redirect()->back()->with("error","Current password does not matches.");
        }


        // checke new password and current password is same
        // if(strcmp($request->get('old_password'), $request->get('new_password')) == 0){
        //     //Current password and new password are same
        //     return redirect()->back()->with("message","New Password cannot be same as your current password."); 
        // }

        // Change Password
        $user = User::find($user_id);
        $user->password = Hash::make($request->get('new_password'));
        $user->save();
        return redirect()->back()->with("success", "Your password has been updated successfully.");
    }

    // forgot password
    public function forgotPassword(Request $request){
        if ($request->isMethod('post')) {

            $this->validate($request, [
                'email' => 'email | required'
            ]);

            $data = $request->all();
            // user email count
            $emailCount = User::where('email', $data['email'])->count();
            if ($emailCount == 0) {
                return redirect()->back()->with('error', 'Email does not exists!');
            }
            // get user details
            $userDetails = User::where('email', $data['email'])->first();
            // generate random password
            $randomPassword = str_random(10);
            // new hash password
            $newPassword = Hash::make($randomPassword);
            // update password
            User::where('email', $data['email'])->update(['password' => $newPassword]);
            // send new forgot password to the email code
            // $email = $data['email'];
            // $name = $userDetails->name;
            // $messageData = [
            //     'email' => $email,
            //     'name' => $name,
            //     'password' => $randomPassword
            // ];

            // Mail::send('front-end.mails.forgot_pass_mail', $messageData, function($message) use ($email) {
            //     $message->from('esellersecommerse@gmail.com', 'E-Sellers Online Shop');
            //     $message->to($email);
            //     $message->subject('New Password');
            // });
            return redirect('login')->with('success', 'Please check your email for new Password.');
        }
        return view('front-end.customer.forgot_password');
    }

    // manage customer info
    public function manageCustomer(){
        $customers = User::all();
        return view('admin.customer.customer_manage')->with(compact('customers'));
    }

    // active customer status
    public function activeCustomerStatus($id) {
        $customer = User::find($id);
        $customer->status = 1;
        $customer->save();
        return redirect('/customer/manage')->with('message', 'Customer Active.');
    }

    // deactive customer status
    public function deactiveCustomerStatus($id) {
        $customer = User::find($id);
        $customer->status = 0;
        $customer->save();
        return redirect('/customer/manage')->with('message', 'Customer Deactive.');
    }

    // delete customer
    public function deleteCustomer($id) {
        $customer = User::find($id);
        $customer->delete();
        return redirect('/customer/manage')->with('message', 'Customer Info Deleted.');
    }







/*
    // customer registration validation
    // protected function validateRegister(Request $request){
    //     $request->validate([
    //         'name' => 'required | string | max:25',
            
    //         'mobile' => 'required | min:11', 
    //         'password' => 'required | string | min:8',
    //     ]);

    //     if(isset($request->email)) {

    //         $this->validate($request,
    //             [
    //                 'email' => 'email | unique:users',
    //             ]);
    //     }
    // }

    


    public function showUserLoginForm() {
        return view('frontEnd.customer.customer-login');
    }

    public function showUserRegisterForm() {
        return view('frontEnd.customer.customer-register');
    }

    // // customer login 
    public function checkCustomerLogin(Request $request) {
        $this->validate($request, [
            'email' => 'required| email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (password_verify($request->password, $user->password)) {
            Session::put('customerId', $user->id);
            Session::put('customerName', $user->name);
            return redirect('/');
        } else {
            return redirect('/login')->with('error', 'Invalid Credentials!');
        }
    }


    // // save register
    public function saveCustomer(Request $request){

        $this->validateRegister($request);
        $imageUrl = $this->customerProfilePhotoUpload($request);
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->mobile = $request->get('mobile');
        $user->address = $request->get('address');
        $user->user_profile_photo = $imageUrl;
        $user->password = Hash::make($request->get('password'));
        $user->remember_token = $request->get('_token');
        $user->save();

        $customerId = $user->id;
        $customerName = $user->name;
        Session::put('customerId', $customerId);
        Session::put('customerName', $customerName);

        // $data = $user->toArray();
        // Mail::send('frontEnd.mails.confirmation-mail', $data, function($message) use ($data) {
        //     $message->from('esellersonlineshop@gmail.com', 'eSellers Online Shop');
        //     $message->to($data['email']);
        //     $message->subject('Confirmation Mail');
        // });

        return redirect('/')->with("message", "Registration Successfully.");
    }

    


    //     // customer login after choose product for buying
    public function customerLoginCheck(Request $request) {
        $this->validate($request, [
            'email' => 'required| email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (password_verify($request->password, $user->password)) {
            Session::put('customerId', $user->id);
            Session::put('customerName', $user->name);

            return redirect('/checkout/shipping');
        } else {
            return redirect('/checkout')->with('message', 'Invalid Credentials!');
        }

    }

    

    // customer profile photo upload
    protected function customerProfilePhotoUpload($request) {

        if ($request->hasFile('user_profile_photo')) {
            $profileImage   = $request->file('user_profile_photo');
            $imageExtension = $profileImage->getClientOriginalExtension();
            $imageName      = 'cpp_'.time().'.'.$imageExtension;
            $directory      = 'uploads/customer-profile-image/';
            $img = Image::make($profileImage);
            $img->resize(200,200)->save($directory . $imageName);
            $imagePath = $directory . $imageName;
            return $imagePath;
        }    

    }



    // customer profile update
    public function updateCustomerProfile(Request $request){
        $user_id = Session::get('customerId');

        $this->validate($request, [
            'name' => 'required | string | max:25',
            'email' => 'required | email | unique:users,email,'.$user_id,
            'mobile' => 'required | min:11',
            'address' => 'required',
        ]);
        
        if(isset($request->user_profile_photo)) {

            $this->validate($request,
                [
                    'user_profile_photo' => 'image | mimes:jpeg,jpg,png | max:5000',
                ]);
        }
        

        // if (User::where('email', $request->get('email'))->exists()) {
        //     return redirect('/customer/profile')->with('message', 'Email Address already exists!');
        // } else {

            $imageUrl = $this->imageExistigStatus($request);

            $user = User::findOrFail($user_id);
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->mobile = $request->get('mobile');
            $user->user_profile_photo = $imageUrl;
            $user->address = $request->get('address');
            $user->save();
            return redirect('/')->with('message', 'Profile Info Updated Successfully.');
        //}
    }

    // profile image existing check
    private function imageExistigStatus($request){
        $user_id = Session::get('customerId');
        //$user = User::findOrFail($user_id); // line:1, 1 and 2 no line same kaj kore
        $userById = User::where('id', $user_id)->first(); // line:2, 1 and 2 no line same kaj kore

        $existingImageUrl = $userById->user_profile_photo;
        $userProfileImage = $request->file('user_profile_photo');
    
        if(is_null($existingImageUrl)){
            $imagePath = "Image not set";
        } 
        else{
            
            if($userProfileImage) {
                $imageExtension = $userProfileImage->getClientOriginalExtension();
                $imageName      = 'upp_'.time().'.'.$imageExtension;
                $directory      = public_path().'/uploads/customer-profile-image/';
                $databaseImgPath      = '/uploads/customer-profile-image/';
                $img = Image::make($userProfileImage);
                $img->resize(200,200)->save($directory . $imageName);
                $imagePath = url($databaseImgPath . $imageName);
            }
            else {
                $imagePath = url($userById->user_profile_photo);
            }
            return $imagePath;
        }
        return $imagePath;
    }

    // change password
    public function showPassChangeForm(){
        return view('frontEnd.customer.change_password');
    }

    public function updatePassword(Request $request){
        
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|string|min:8',
            'password_confirm' => 'same:new_password',
        ]);    

        $user_id = Session::get('customerId');
        $userById = User::where('id', $user_id)->first(); 

        if (!Hash::check($request->old_password, $userById->password)) {
            // The passwords not matches
            return redirect()->back()->with("error","Current password does not matches.");
            // return response()->json([
            //     'errors' => [
            //         'current'=> [
            //             'Current password does not match'
            //         ]
            //     ]
            // ], 422);
        }


        // //comment this if you need to validate that the new password is same as old one
        // if(strcmp($request->get('old_password'), $request->get('new_password')) == 0){
        //     //Current password and new password are same
        //     return redirect()->back()->with("message","New Password cannot be same as your current password.");
        //     // return response()->json(['errors' => ['current'=> ['New Password cannot be same as your current password']]], 422);
        // }

        //Change Password
        $user = User::find($user_id);
        $user->password = Hash::make($request->get('new_password'));
        $user->save();
        return redirect()->back()->with("success", "Your password has been updated successfully.");
    }

    // customer logout
    // public function customerLogout(){
    //     Session::forget('customerId');
    //     Session::forget('customerName');
    //     return redirect('/');
    // }

*/

}
