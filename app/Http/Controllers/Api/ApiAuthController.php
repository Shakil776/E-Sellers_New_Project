<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Image;

class ApiAuthController extends Controller
{
    // user login
    public function login(Request $request) {

        $this->validate($request, [
            'email' => 'required | email',
            'password' => 'required | string'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

         $user = User::where('email', '=', $email)->first();

         if (!$user) {
            return response()->json([
                'status' => 0,
                'message' => 'Invalid Credentials!'
            ],201);
         }

         if (strlen(trim($password)) < 8) {
            return response()->json([
                'status' => 0,
                'message' => 'Password must be at least 8 Characters'
            ],201);
        }

         if (!Hash::check($password, $user->password)) {
            return response()->json([
                'status' => 0,
                'message' => 'Invalid Credentials!'
            ],201);
         }

         $credentials = $request->only('email', 'password');

        if (!$token = auth()->attempt($credentials)) {
            return response()->json([
                'status' => 0,
                'message' => 'Unauthorized Users.'
            ], 401);
        } else{
            return response()->json([
                'status' => 1,
                'message' => 'Successfully login.',
                'token' => $this->respondWithToken($token)
            ], 200);
        }

    }


    // user register
    public function userRegister(Request $request) {

        if (strlen(trim($request->password)) < 8) {

            return response()->json([
                'status' => 0,
                'message' => 'Password must be at least 8 Characters.'
            ],201);

        } else if (User::where('email', $request->get('email'))->exists()) {

            return response()->json([
                'status' => 0,
                'message' => 'This Email Address is already exists.'
            ],201);

        } else {

            $this->validateRegister($request);
            $imageUrl = $this->userProfilePhotoUpload($request);
            $user = new User();
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->mobile = $request->get('mobile');
            $user->user_profile_photo = $imageUrl;
            $user->address = $request->get('address');
            $user->password = Hash::make($request->get('password'));
            $user->save();

            if ($token = auth()->login($user)) {
                return response()->json([
                    'status' => 1,
                    'message' => 'Registration Successfull.',
                    'token' => $this->respondWithToken($token)
                ], 201);
            } else {
                return response()->json([
                    'status' => 0,
                    'message' => 'Registration Not Successfull.'
                ], 201);
            }
        }

    }

    protected function validateRegister(Request $request){
        $request->validate([
            'name' => 'string | max:25',
            'email' => 'required | string | email | unique:users',
            'mobile' => 'min:11',
            'user_profile_photo' => 'image | max:5000',
            'password' => 'required | string | min:8',
        ]);
    }

    // user profile photo upload
    protected function userProfilePhotoUpload($request) {

        if ($request->hasFile('user_profile_photo')) {
            $profileImage   = $request->file('user_profile_photo');
            $imageExtension = $profileImage->getClientOriginalExtension();
            $imageName      = 'cpp_'.time().'.'.$imageExtension;
            $directory      = 'uploads/customer-profile-image/';
            $img = Image::make($profileImage);
            $img->resize(200, 200)->save($directory . $imageName);
            return $imagePath = $directory . $imageName;
        }

    }

    // show user profile
    public function userProfile() {
        return response()->json(auth()->user());
    }

    // update user profile
    public function userProfileUpdate(Request $request,$id) {
        
        //$myfile = fopen("log.txt", "w") or die("Unable to open file!");
        //fwrite($myfile, $request);
        
        $this->validate($request, [
            'name' => 'string | max:25',
            'email' => 'email | unique:users,email,'.$id,
            'mobile' => 'min:11',
            //'address' => '',
        ]);
        
            $imageName      = 'cpp_'.time().'.'.'png';

            file_put_contents('uploads/customer-profile-image/'.$imageName,base64_decode($request->get('user_profile_photo')));
            $user = User::findOrFail($id);
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->mobile = $request->get('mobile');
            $user->has_different_address = true;
            $user->user_profile_photo = 'uploads/customer-profile-image/'.$imageName;
            $user->address = $request->get('address');
            $user->save();

            if ($user) {
                return response()->json([
                    'status' => 1,
                    'message' => 'Profile Update Successfull.',
                    'user' => $user,
                ], 201);

            } else {
                return response()->json([
                    'status' => 0,
                    'message' => 'Profile not updated.'
                ], 201);
            }

    }

    // profile image existing check
    private function imageExistigStatus($request, $id){

        $userById = User::where('id', $id)->first();

        $existingImageUrl = $userById->user_profile_photo;
        $userProfileImage = $request->file('user_profile_photo');
    
        if(empty($existingImageUrl)){
            if($userProfileImage) {
                $imageExtension = $userProfileImage->getClientOriginalExtension();
                $imageName      = 'cpp_'.time().'.'.$imageExtension;
                $directory      = 'uploads/customer-profile-image/';
                $img = Image::make($userProfileImage);
                $img->resize(200,200)->save($directory . $imageName);
                $imagePath = $directory . $imageName;
            }else{
                $imagePath = "";
            }
            return $imagePath;
        } else{
            if($userProfileImage) {
                $imageExtension = $userProfileImage->getClientOriginalExtension();
                $imageName      = 'cpp_'.time().'.'.$imageExtension;
                $directory      = 'uploads/customer-profile-image/';
                $img = Image::make($userProfileImage);
                $img->resize(200,200)->save($directory . $imageName);
                $imagePath = $directory . $imageName;
            }else{
                $imagePath = $userById->user_profile_photo;
            }
            return $imagePath;
        }   
    }

    // update password
    public function updatePassword(Request $request, $id) {
        
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|string|min:8',
            'password_confirm' => 'same:new_password',
        ]);    

        $userById = User::where('id', $id)->first(); 

        if (!Hash::check($request->old_password, $userById->password)) {

            return response()->json([
                'status' => 0,
                'message' => 'Current password does not match.'
            ], 201);
        }

        if(strcmp($request->get('old_password'), $request->get('new_password')) == 0){

            return response()->json([
                'status' => 0,
                'message' => 'New Password cannot be same as your current password.'
            ], 201);
        }

        // Change Password
        $user = User::find($userById->id);
        $user->password = Hash::make($request->get('new_password'));
        $user->save();
        
        if ($user) {
            return response()->json([
                'status' => 1,
                'message' => 'Password change Successfully.'
            ], 201);
        }
    }


    // user logout
    public function logout() {
        auth()->logout();

        return response()->json([
            'status' => 1,
            'message' => 'Successfully logged Out'
        ],200);
    }

    // refresh for new token
    public function refresh() {
        return $this->respondWithToken(auth()->refresh());
    }


    protected function respondWithToken($token) {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ],200);
    }
}
