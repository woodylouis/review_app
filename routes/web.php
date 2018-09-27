<?php
use App\Product;
use App\Manufacturer;
use App\Country;
use App\User;
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

Route::resource('product', 'ProductController');
Route::resource('manufacturer', 'ManufacturerController');
Route::resource('review', 'ReviewController');
Route::resource('user', 'UserController');

Route::get('/user/{user}/followings', 'UserController@followings')->name('users.followings');
Route::get('/user/{user}/followers', 'UserController@followers')->name('users.followers');
// Route::get('/', function () {return view('home'); });

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')    
    ->name('home');
Route::get('/admin', 'AdminController@admin')    
    ->middleware('is_admin')    
    ->name('admin');

Route::get('/sortbyreviews', 'ProductController@numberOfReviewsDESC');
Route::get('/sortbyrating', 'ProductController@avgRatingDESC');


Route::get('/sortNumberOfReviews', 'ManufacturerController@sortByNumbersOfReviews');
Route::get('/sortAverageRating', 'ManufacturerController@sortByAverageRating');
Route::get('/sortBrand', 'ManufacturerController@sortByBrand');

Route::post('/like', 'LikeDislikeController@storeLike');
Route::post('/dislike', 'LikeDislikeController@storeDislike');

// Route::get('login', 'SessionsController@create')->name('login');
// Route::post('login', 'SessionsController@store')->name('login');
// Route::delete('logout', 'SessionsController@destroy')->name('logout');