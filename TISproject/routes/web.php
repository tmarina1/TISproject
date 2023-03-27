<?php

use Illuminate\Support\Facades\Route;

//Tomas
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name('home.about');
Route::get('/', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/product/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');
Route::get('/cart/delete', 'App\Http\Controllers\CartController@remove')->name('cart.remove');
Route::get('/cart/delete/{id}', 'App\Http\Controllers\CartController@removeElement')->name('cart.removeElement');
Route::post('/products/filter', 'App\Http\Controllers\ProductController@filter')->name('product.filter');
Route::post('/products/filterBrand', 'App\Http\Controllers\ProductController@filterBrand')->name('product.filterBrand');

Route::get('/wish', 'App\Http\Controllers\WishController@index')->name('wish.index');
Route::get('/wish/save/{id}', 'App\Http\Controllers\WishController@save')->name('wish.save');
Route::get('/wish/delete/{id}', 'App\Http\Controllers\WishController@delete')->name('wish.delete');

//Admin restricted routes
Route::middleware('admin')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name('admin.home.index');
    Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name('admin.product.index');
    Route::post('/admin/product/save', 'App\Http\Controllers\Admin\AdminProductController@save')->name('admin.product.save');
    Route::get('/admin/products/delete/{id}', 'App\Http\Controllers\Admin\AdminProductController@delete')->name('admin.product.delete');
    Route::get('/admin/products/viewUpdate/{id}', 'App\Http\Controllers\Admin\AdminProductController@viewUpdate')->name('admin.product.viewUpdate');
    Route::post('/admin/products/update/{id}', 'App\Http\Controllers\Admin\AdminProductController@update')->name('admin.product.update');

    Route::get('/admin/reviews', 'App\Http\Controllers\Admin\AdminReviewController@index')->name('admin.review.index');
    Route::post('/admin/reviews/save', 'App\Http\Controllers\Admin\AdminReviewController@save')->name('admin.review.save');
    Route::get('/admin/reviews/delete/{id}', 'App\Http\Controllers\Admin\AdminReviewController@delete')->name('admin.review.delete');
    Route::get('/admin/reviews/update/{id}', 'App\Http\Controllers\Admin\AdminReviewController@update')->name('admin.review.update');
    Route::post('/admin/reviews/saveUpdate/{id}', 'App\Http\Controllers\Admin\AdminReviewController@saveUpdate')->name('admin.review.saveUpdate');

    Route::get('/admin/filmOrder', 'App\Http\Controllers\Admin\AdminDevelopOrderController@index')->name('admin.filmOrder.index');
    Route::get('/admin/filmOrder/update/{id}', 'App\Http\Controllers\Admin\AdminDevelopOrderController@update')->name('admin.filmOrder.update');
    Route::post('/admin/filmOrder/saveUpdate/{id}', 'App\Http\Controllers\Admin\AdminDevelopOrderController@saveUpdate')->name('admin.filmOrder.saveUpdate');
});
//Juan Pablo
Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name('cart.purchase');
Route::middleware('auth')->group(function () {
    Route::get('/order/show/{id}', 'App\Http\Controllers\OrderController@show')->name('order.show');
    Route::get('/order', 'App\Http\Controllers\OrderController@index')->name('order.index');

    Route::get('/filmOrder', 'App\Http\Controllers\FilmDevelopOrderController@index')->name('filmOrder.index');
    Route::get('/filmOrder/show/{id}', 'App\Http\Controllers\FilmDevelopOrderController@show')->name('filmOrder.show');
    Route::get('/filmOrder/create', 'App\Http\Controllers\FilmDevelopOrderController@create')->name('filmOrder.create');
    Route::post('/filmOrder/save', 'App\Http\Controllers\FilmDevelopOrderController@save')->name('filmOrder.save');
});

//Simon
Route::get('/review/{id}', 'App\Http\Controllers\ReviewController@create')->name('review.create');
Route::post('/review/save/{id}', 'App\Http\Controllers\ReviewController@save')->name('review.save');
Auth::routes();
