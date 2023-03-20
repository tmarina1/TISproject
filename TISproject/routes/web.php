<?php

use Illuminate\Support\Facades\Route;

#Tomas
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name("home.about");
Route::get('/', 'App\Http\Controllers\ProductController@index')->name("product.index");
Route::get('/product/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index"); 
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");
Route::get('/cart/delete', 'App\Http\Controllers\CartController@remove')->name("cart.remove"); 
Route::get('/cart/delete/{id}', 'App\Http\Controllers\CartController@removeElement')->name("cart.removeElement"); 
Route::post('/products/filter', 'App\Http\Controllers\ProductController@filter')->name("product.filter");
Route::post('/products/filterBrand', 'App\Http\Controllers\ProductController@filterBrand')->name("product.filterBrand");

//Admin restricted routes
Route::middleware('admin')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");
    Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name("admin.product.index");
    Route::post('/admin/product/save', 'App\Http\Controllers\Admin\AdminProductController@save')->name("admin.product.save");
    Route::get('/admin/products/delete/{id}', 'App\Http\Controllers\Admin\AdminProductController@delete')->name("admin.product.delete");
    Route::get('/admin/products/indexupdate/{id}', 'App\Http\Controllers\Admin\AdminProductController@viewUpDate')->name("admin.product.indexUpDate");
    Route::post('/admin/products/update/{id}', 'App\Http\Controllers\Admin\AdminProductController@upDate')->name("admin.product.upDate");

    Route::get('/admin/reviews', 'App\Http\Controllers\Admin\AdminReviewController@index')->name("admin.review.index");
    Route::post('/admin/reviews/save', 'App\Http\Controllers\Admin\AdminReviewController@save')->name("admin.review.save");
    Route::get('/admin/reviews/delete/{id}', 'App\Http\Controllers\Admin\AdminReviewController@delete')->name("admin.review.delete");
    Route::get('/admin/reviews/update/{id}', 'App\Http\Controllers\Admin\AdminReviewController@update')->name("admin.review.update");
    Route::post('/admin/reviews/saveUpdate/{id}', 'App\Http\Controllers\Admin\AdminReviewController@saveUpdate')->name("admin.review.saveUpdate");





});
#Juan Pablo
Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name("cart.purchase"); 


#Simon
Auth::routes();

