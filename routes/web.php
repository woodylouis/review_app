<?php
use App\Product;
use App\Manufacturer;
use App\Country;
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


// Route::get('/', function () {return view('home'); });

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test', function () {
    $product = Product::all();
    dd($product);
    
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
