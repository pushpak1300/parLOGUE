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
    return view('new-welcome');
})->middleware('auth');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::resource('photho', 'PhothoController')->middleware('auth');
Route::get('/photho-table', 'PhothoController@anyData')->middleware('auth');
Route::resource('product', 'ProductController')->middleware('auth');
Route::get('/product-table', 'ProductController@anyData')->middleware('auth');
Route::get('/logout', function () {
    Auth::logout();
    return view('welcome');
})->middleware('auth');
Route::get('/search', 'ProductController@search')->middleware('auth');
Route::resource('/sub-category', 'SubCategoryController')->middleware('auth');
Route::get('/sub-category-table', 'SubCategoryController@anyData')->middleware('auth');
Route::get('/addproduct', 'ProductController@addproduct')->middleware('auth');
Route::post('/storeproduct', 'ProductController@storeproduct')->middleware('auth');

Route::get('/boys','ProductController@getboys')->middleware('auth');
Route::get('/boys/{size}','ProductController@getboysize')->middleware('auth');
Route::get('/girls','ProductController@getgirls')->middleware('auth');
Route::get('/girls/{size}','ProductController@getgirlsize')->middleware('auth');
Route::get('/wishlist','ProductController@wishlist')->middleware('auth');