<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::resource('photho', 'PhothoController');
Route::get('/photho-table', 'PhothoController@anyData');
Route::resource('product', 'ProductController');
Route::get('/product-table', 'ProductController@anyData');
Route::get('/logout', function () {
    Auth::logout();
    return view('welcome');
});
Route::get('/search', 'ProductController@search');
Route::resource('/sub-category', 'SubCategoryController');
Route::get('/sub-category-table', 'SubCategoryController@anyData');
Route::get('/addproduct', 'ProductController@addproduct');
Route::post('/storeproduct', 'ProductController@storeproduct');

Route::get('/boys','ProductCotroller@getboys');

