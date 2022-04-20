<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
//esto de aca es mejor no hacerlo asi queda horrible es mejor hacerlo como en la de abajo
Route::get('/about', function () {
    $data1 = "About us - Online Store";
    $data2 = "About us";
    $description = "This is an about page ... Hola Hola";
    $author = "Developed by: Juan Jose Madrigal Palacio";
    return view('home.about')->with("title", $data1)
      ->with("subtitle", $data2)
      ->with("description", $description)
      ->with("author", $author);
})->name("home.about");

//esta de aca es una forma buena de hacerlo
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name("product.create");
Route::post('/products/save', 'App\Http\Controllers\ProductController@save')->name("product.save");
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");

Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
Route::get('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");
Route::get('/cart/removeAll/', 'App\Http\Controllers\CartController@removeAll')->name("cart.removeAll");

//version con inversion de dependencias
Route::get('/image', 'App\Http\Controllers\ImageController@index')->name("image.index");
Route::post('/image/save', 'App\Http\Controllers\ImageController@save')->name("image.save");
//version sin inversion de dependencias
Route::get('/image-not-di', 'App\Http\Controllers\ImageNotDIController@index')->name("imagenotdi.index");
Route::post('/image-not-di/save', 'App\Http\Controllers\ImageNotDIController@save')->name("imagenotdi.save");


//Igualmente una forma fea de hacer la cosa
Route::get('/contact', function () {
    $data1 = "Contact us - Online Store";
    $data2 = "Contact";
    return view('home.contact')->with("title", $data1)
      ->with("subtitle", $data2);
})->name("home.contact");


Auth::routes();

