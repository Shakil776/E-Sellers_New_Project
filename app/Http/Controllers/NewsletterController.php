<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newsletter;
use Excel;

class NewsletterController extends Controller
{
    // check subscriber email
    public function checkSubscriberEmail(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $emailCount = Newsletter::where('email', $data['subscriber_email'])->count();
            if($emailCount > 0) {
                echo "exists";
            }
        }
    }
    
    // add subscriber email
    public function addSubscriberEmail(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $emailCount = Newsletter::where('email', $data['subscriber_email'])->count();
            if($emailCount > 0) {
                echo "exists";
            }else{
                // add newslater email into table
                $newslater = new Newsletter();
                $newslater->email = $data['subscriber_email'];
                $newslater->save();
                echo "saved";
            }
        }
    }

    // show newsletter subscriber
    public function showNewsletter(){
        $newsletters = Newsletter::orderBy('id', 'DESC')->get();
        return view('admin.newsletter.show_newsletter')->with(compact('newsletters'));
    }

    // update status
    public function updateNewsletterStatus($id, $status){
        Newsletter::where('id', $id)->update(['status'=>$status]);
        return redirect()->back()->with('success', 'Newsletter Status has been updated Successfully.');
    }
    
    // delete newsletter
    public function deleteNewsletter($id){
        Newsletter::find($id)->delete();
        return redirect()->back()->with('success', 'Newsletter deleted Successfully.');
    }
}
