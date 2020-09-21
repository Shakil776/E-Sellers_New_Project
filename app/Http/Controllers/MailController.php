<?php

namespace App\Http\Controllers;

use App\Mail\ShopperEmail;
use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public static function sendShoppersEmail($name, $email, $verification_code){
        $data = [
            'name' => $name,
            'verification_code' => $verification_code
        ];
        Mail::to($email)->send(new ShopperEmail($data));
    }
}
