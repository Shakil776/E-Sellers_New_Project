<?php

// User Login
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function () {
    // user login
    Route::post('/user_login', 'Api\ApiAuthController@login');
    // register user
    Route::post('/user_register', 'Api\ApiAuthController@userRegister');

});


Route::group([
    'middleware' => ['api','jwt.verify'],
    'prefix' => 'auth'
], function () {
    // user logout
    Route::post('/logout', 'Api\ApiAuthController@logout');
    Route::post('/refresh', 'Api\ApiAuthController@refresh');
    Route::get('/user_profile', 'Api\ApiAuthController@userProfile');
    Route::post('/profile_update/{id}', 'Api\ApiAuthController@userProfileUpdate');
    Route::post('/password_update/{id}', 'Api\ApiAuthController@updatePassword');

});

// categories
Route::group([
    'middleware' => 'api',
    'prefix' => 'category'
], function () {
    // show all category, sub-category and sub-sub-sub category
    Route::get('/show_category', 'Api\ApiCategoryController@showAllCategory');
});


// products
Route::group([
    'middleware' => 'api',
    'prefix' => 'product'
], function () {
    // show all product
    Route::get('/show_product', 'Api\ApiProductController@showAllProduct');
    Route::get('/category_product/{id}', 'Api\ApiProductController@showProductByCategory');
});

// slider image
Route::group([
    'middleware' => 'api',
    'prefix' => 'slider'
], function () {
    Route::get('/show', 'Api\ApiSliderImageController@showSliderImage');
});

// product review route
Route::group([
    'middleware' => 'api',
    'prefix' => 'review'
], function () {
    Route::post('/save_review/{c_id}/{p_id}', 'Api\ApiReviewController@saveReview');
    Route::get('/get_review/{p_id}', 'Api\ApiReviewController@getReview');
});

// checkout route
Route::group([
    'middleware' => 'api',
    'prefix' => 'checkout'
], function () {
    Route::post('/checkout', 'Api\ApiCheckoutController@checkout');
});

// search route
Route::group([
    'middleware' => 'api',
    'prefix' => 'search'
], function () {
    Route::get('/search', 'Api\ApiSearchController@search');
    Route::post('/advance_search', 'Api\ApiSearchController@advanceSearch');
});

// order history
Route::group([
    'middleware' => 'api',
    'prefix' => 'order'
], function () {
    // show customer order history
    Route::get('/customer_order/{u_id}', 'Api\ApiOrderController@showHistory');
    Route::get('/orderDetails/{orderId}', 'Api\ApiOrderController@orderDetails');
});



