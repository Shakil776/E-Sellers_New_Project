<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Admin;
use Auth;
use Mail;
use Session;

class AdminAuthenticationController extends Controller
{
    public function checkAdminLogin(Request $request){

        if($request->isMethod('post')){
            $validator = Validator::make(array(
                "email" => $request->email,
                "password" => $request->password
            ),array(
                "email" => "required",
                "password" => "required"
            ));
    
            if ($validator->fails()) {
                return redirect('admin-login')->withErrors($validator)->withInput();
            } else {
                $admin_info = array(
                    "email" => $request->email,
                    "password" => $request->password
                );
    
                if (auth()->guard('admin')->attempt($admin_info)) {
                    $adminId = Auth::guard('admin')->user()->id;
                    Session::put('adminId', $adminId);
                    return redirect("/dashboard");
                } else{
                    $error_message = "Invalid Email or Password!";
                    return redirect()->back()->withErrors($error_message);
                }
            }
        }

        if (Session::get('adminId')) {
            return redirect('/dashboard');
        } else{
            return view('admin.auth.login.login');
        }
    }

    // admin registration
    public function adminRegister(Request $request) {
        if($request->isMethod('post')){
            // return response($request->all());die;
            $this->validateRegister($request);
            $countAdmin = Admin::where('email', $request->email)->count();
            if($countAdmin > 0){
                return redirect()->back()->with('error', 'Admin Email already exists. Please choose another.');
            } else {
                if($request->type == "Admin"){

                    $pass_without_hash = $request->password;

                    $admin = new Admin();
                    $admin->name = $request->name;
                    $admin->email = $request->email;
                    $admin->mobile = $request->mobile;
                    
                    $admin->password = Hash::make($pass_without_hash);
                    $admin->type = $request->type;
                    $admin->save();
                    
                    if($admin != null){
                        // send email and password to the admin email
                        $email = $admin->email;
                        $name = $admin->name;
                        $password = $pass_without_hash;                        
                        
                        $messageData = [
                            'email' => $email,
                            'name' => $name,
                            'password' => $password
                        ];

                        Mail::send('front-end.mails.admin_details_mail', $messageData, function($message) use ($email) {
                            $message->from('esellersecommerse@gmail.com', 'E-Sellers Online Shop');
                            $message->to($email);
                            $message->subject('Admin Information');
                        });
                        return redirect()->back()->with('success', 'Admin Added Successfully. Please check email for login information.');
                    }

                }else if($request->type == "Sub Admin"){
                    if(empty($request->customer_access)){
                        $request->customer_access = 0;
                    }
                    if(empty($request->categories_access)){
                        $request->categories_access = 0;
                    }
                    if(empty($request->manufacturer_access)){
                        $request->manufacturer_access = 0;
                    }
                    if(empty($request->product_status_access)){
                        $request->product_status_access = 0;
                    }
                    if(empty($request->product_access)){
                        $request->product_access = 0;
                    }
                    if(empty($request->review_access)){
                        $request->review_access = 0;
                    }
                    if(empty($request->order_access)){
                        $request->order_access = 0;
                    }
                    if(empty($request->slider_access)){
                        $request->slider_access = 0;
                    }
                    if(empty($request->newsletter_access)){
                        $request->newsletter_access = 0;
                    }

                    $admin = new Admin();
                    $admin->name = $request->name;
                    $admin->email = $request->email;
                    $admin->mobile = $request->mobile;
                    $admin->password = Hash::make($request->password);
                    $admin->type = $request->type;
                    $admin->customer_access = $request->customer_access;
                    $admin->categories_access = $request->categories_access;
                    $admin->manufacturer_access = $request->manufacturer_access;
                    $admin->product_status_access = $request->product_status_access;
                    $admin->product_access = $request->product_access;
                    $admin->review_access = $request->review_access;
                    $admin->order_access = $request->order_access;
                    $admin->slider_access = $request->slider_access;
                    $admin->newsletter_access = $request->newsletter_access;
                    $admin->save();
                    return redirect()->back()->with('success', 'Sub Admin Added Successfully.');
                }
                
            }  
        }
    	return view('admin.auth.register.register');
    }


    protected function validateRegister(Request $request){
        $request->validate([
            'name' => 'required | max:25',
            'email' => 'required | string | email',
            'mobile' => 'required | min:11',
            'password' => 'required | string | min:6',
            // 'password_confirmation' => 'confirmed'
        ]);
    }

    // logout
    public function adminLogout(){
        Session::flush();
        if(Auth::guard("admin")){
            Auth::guard("admin")->logout();
            return redirect('/admin-login');
        }
    }

    // manage admin
    public function manageAdmin(){
        $admins = Admin::all();
        return view('admin.admins.manage_admin')->with(compact('admins'));
    }

    // update admin status
    public function updateAdminStatus($id, $status){
        Admin::where('id', $id)->update(['status'=>$status]);
        return redirect()->back()->with('success', 'Admin Status has been updated Successfully.');
    }

    // edit admin
    public function editAdmin(Request $request, $id){

        if($request->isMethod('post')){
            
            if($request->type == "Admin"){
                // $admin = new Admin();
                // $admin->name = $request->name;
                // $admin->email = $request->email;
                // $admin->mobile = $request->mobile;
                // $admin->password = Hash::make($request->password);
                // $admin->type = $request->type;
                // $admin->save();
                // return redirect()->back()->with('success', 'Admin Updated Successfully.');
            }else if($request->type == "Sub Admin"){

                if(empty($request->customer_access)){
                    $request->customer_access = 0;
                }
                if(empty($request->categories_access)){
                    $request->categories_access = 0;
                }
                if(empty($request->manufacturer_access)){
                    $request->manufacturer_access = 0;
                }
                if(empty($request->product_status_access)){
                    $request->product_status_access = 0;
                }
                if(empty($request->product_access)){
                    $request->product_access = 0;
                }
                if(empty($request->review_access)){
                    $request->review_access = 0;
                }
                if(empty($request->order_access)){
                    $request->order_access = 0;
                }
                if(empty($request->slider_access)){
                    $request->slider_access = 0;
                }
                if(empty($request->newsletter_access)){
                    $request->newsletter_access = 0;
                }

                Admin::where('id', $id)->update(['customer_access'=>$request->customer_access, 'categories_access'=>$request->categories_access, 'manufacturer_access'=>$request->manufacturer_access, 'product_status_access'=>$request->product_status_access, 'product_access'=>$request->product_access, 'review_access'=>$request->review_access, 'order_access'=>$request->order_access, 'slider_access'=>$request->slider_access, 'newsletter_access'=>$request->newsletter_access]);

                return redirect()->back()->with('success', 'Sub Admin Updatedc Successfully.');
            }    
        }

        $adminDetails = Admin::where('id', $id)->first();
        return view('admin.admins.edit_admin')->with(compact('adminDetails'));
    }

    // delete admin
    public function deleteAdmin($id){
        Admin::find($id)->delete();
        return redirect()->back()->with('success', 'Admin deleted Successfully.');
    }

}
