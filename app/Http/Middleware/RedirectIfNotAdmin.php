<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Session;
use App\Admin;

class RedirectIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = "admin")
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('/admin-login');
        }else{
            // get admin/sub amdin details
            $adminDetails = Admin::where('id', Session::get('adminId'))->first();
            if($adminDetails->type == "Admin"){
                $adminDetails->customer_access = 1;
                $adminDetails->categories_access = 1;
                $adminDetails->manufacturer_access = 1;
                $adminDetails->product_status_access = 1;
                $adminDetails->product_access = 1;
                $adminDetails->review_access = 1;
                $adminDetails->order_access = 1;
                $adminDetails->slider_access = 1;
                $adminDetails->newsletter_access = 1;
            }

            Session::put('adminDetails', $adminDetails);

            $currentPath = Route::getFacadeRoot()->current()->uri();
            //echo $currentPath; die;

            // customer / user
            if(($currentPath == "customer/manage" || $currentPath == "customer/active/{id}" || $currentPath == "customer/deactive/{id}" || $currentPath == "customer/delete/{id}") && Session::get('adminDetails')['customer_access'] == 0){
                return redirect('/dashboard')->with('error', 'You have no access for this module.');
            }
            
            // category
            if(($currentPath == "category/add" || $currentPath == "category/save" || $currentPath == "category/manage" || $currentPath == "category/unpublished/{id}" || $currentPath == "category/published/{id}" || $currentPath == "category/edit/{id}" || $currentPath == "category/update" || $currentPath == "category/delete/{id}") && Session::get('adminDetails')['categories_access'] == 0){
                return redirect('/dashboard')->with('error', 'You have no access for this module.');
            }
            
            // manufacturer
            if(($currentPath == "manufacturer/add" || $currentPath == "manufacturer/save" || $currentPath == "manufacturer/manage" || $currentPath == "manufacturer/unpublished/{id}" || $currentPath == "manufacturer/published/{id}" || $currentPath == "manufacturer/edit/{id}" || $currentPath == "manufacturer/update" || $currentPath == "manufacturer/delete/{id}") && Session::get('adminDetails')['manufacturer_access'] == 0){
                return redirect('/dashboard')->with('error', 'You have no access for this module.');
            }

            // product status name
            if(($currentPath == "status/add" || $currentPath == "status/save" || $currentPath == "status/manage" || $currentPath == "status/unpublished/{id}" || $currentPath == "status/published/{id}" || $currentPath == "status/edit/{id}" || $currentPath == "status/update" || $currentPath == "status/delete/{id}") && Session::get('adminDetails')['product_status_access'] == 0){
                return redirect('/dashboard')->with('error', 'You have no access for this module.');
            }


            // product
            if(($currentPath == "product/add" || $currentPath == "product/save" || $currentPath == "product/manage" || $currentPath == "product/unpublished/{id}" || $currentPath == "product/published/{id}" || $currentPath == "product/edit/{id}" || $currentPath == "product/update" || $currentPath == "product/delete/{id}" || $currentPath == "add-image/{id}" || $currentPath == "update-image-status/{id}/{status}" || $currentPath == "delete-image-status/{id}") && Session::get('adminDetails')['product_access'] == 0){
                return redirect('/dashboard')->with('error', 'You have no access for this module.');
            }

            // product attributes
            if(($currentPath == "product/add-attribute/{id}" || $currentPath == "product/save-attribute/{id}" || $currentPath == "product/delete-attribute/{id}") && Session::get('adminDetails')['product_access'] == 0){
                return redirect('/dashboard')->with('error', 'You have no access for this module.');
            }

            // review
            if(($currentPath == "review/manage" || $currentPath == "review/unpublished/{id}" || $currentPath == "review/published/{id}" || $currentPath == "review/delete/{id}") && Session::get('adminDetails')['review_access'] == 0){
                return redirect('/dashboard')->with('error', 'You have no access for this module.');
            }

            // order
            if(($currentPath == "order/manage-order" || $currentPath == "order/order-details/{id}" || $currentPath == "order/status-update/{id}" || $currentPath == "order/payment-status-update/{id}" || $currentPath == "order/view-invoice/{id}") && Session::get('adminDetails')['order_access'] == 0){
                return redirect('/dashboard')->with('error', 'You have no access for this module.');
            }

            // slider
            if(($currentPath == "slider" || $currentPath == "slider/save" || $currentPath == "slider/manage" || $currentPath == "slider/unpublished/{id}" || $currentPath == "slider/published/{id}" || $currentPath == "slider/delete/{id}") && Session::get('adminDetails')['slider_access'] == 0){
                return redirect('/dashboard')->with('error', 'You have no access for this module.');
            }

            // newsletter
            if(($currentPath == "show-newsletter" || $currentPath == "update-newsletter-status/{id}/{status}" || $currentPath == "delete_newsletter/{id}") && Session::get('adminDetails')['newsletter_access'] == 0){
                return redirect('/dashboard')->with('error', 'You have no access for this module.');
            }


            
           
            
            









        }

        return $next($request);
    }
}
