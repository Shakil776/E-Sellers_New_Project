<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Session;

class ContactController extends Controller
{
     // shipping
     public function shippingReturn(){
        return view('front-end.content.shipping');
    }

    //secue shopping
    public function secureshopping(){
        return view('front-end.content.secure');
    }

    //affiliates
    public function affiliates(){
        return view('front-end.content.affiliate');
    }

    // show contact us
    public function showContact(){
        return view('front-end.content.contact');
    }

    //shopkeeper dashboard
    public function shopperDashboard(){
        return view('front-end.custom-category.shopkeeper-dashboad');
    }

    //create product page
    public  function createProductSample(){
        return view('front-end.custom-category.create-product');
    }

    // add contact details
    public function contact(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            if(empty($data['first_name']) || empty($data['last_name']) || empty($data['phone']) || empty($data['email'])){
                echo "errors";
            }else{
                 // add contact details into table
                 $contact = new Contact();
                 $contact->first_name = $data['first_name'];
                 $contact->last_name = $data['last_name'];
                 $contact->mobile = $data['phone'];
                 $contact->email = $data['email'];
                 $contact->address = $data['message'];
                 $contact->save();
                 echo "saved";

                // $name = $data['first_name'].' '.$data['last_name'];
                // $mobile = $data['phone'];
                // $email = $data['email'];
                // $message = $data['message'];
                // $messageData = [
                //     'name' => $name,
                //     'email' => $email,
                //     'mobile' => $mobile,
                //     'message' => $message,
                // ];

                // Mail::send('front-end.mails.contact_us_mail', $messageData, function($message) use ($email) {
                //     $message->from($email);
                //     $message->to('esellersecommerse@gmail.com', 'E-Sellers Online Shop');
                //     $message->subject('Contact Us');
                // });
            }

        }
    }

}