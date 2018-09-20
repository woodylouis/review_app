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


// Route::get('/', function () {return view('home'); });

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test', function () {
    // $user = User::find(1);
    // $products = $user->products;
    // //dd($products);
    // $name = 'Apple';
    // $prods = $user->products()->whereRaw('product_name like ?', 
    //                 array("%$name%")) -> get();
    // $product = Product::find(1);
    // $review = $product ->users;
    // $name = $input['name'];
    // $products = Product::whereHas('manufacturers', function($query) use ($name){return $query->whereRaw('manufacturer_name like ?', array("%$name%"));})->get();
    
    // dd($products);
    
});
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::view('/', 'welcome');
// Auth::routes();
Route::get('/home', 'HomeController@index')    
    ->name('home');
Route::get('/admin', 'AdminController@admin')    
    ->middleware('is_admin')    
    ->name('admin');