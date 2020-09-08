<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\Resource;
use View;
use Cart;
use App\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // View::composer('frontEnd.category.categoryContent', function($view) {
        //     $view->with('categories', Category::where('publication_status', 1)->get());
        // });

        // count total cart product show in header
        View::composer('*', function ($view) {
            $view->with('cart_qty', count(Cart::content()));
        });
		
		Resource::withoutWrapping();
    }
}
