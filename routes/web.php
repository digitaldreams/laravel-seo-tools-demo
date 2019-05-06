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
Route::group(['prefix' => 'app', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('tags', 'TagController');
    Route::resource('categories', 'CategoryController');
    Route::resource('posts', 'PostController');
    Route::resource('photos', 'PhotoController');
    Route::resource('products', 'ProductController');
    Route::resource('businesses', 'BusinessController');
});
Route::get('posts', 'Frontend\BlogController@index')->name('posts.frontend.index');
Route::get('products', 'Frontend\ProductController@index')->name('products.frontend.index');
Route::get('businesses', 'Frontend\BusinessController@index')->name('businesses.frontend.index');

Route::get('location', function () {
    $hereGeocoding = new \App\Services\HereGeocoding('Dhaka college, New Market');
    print_r($hereGeocoding->fetch()->response());
});