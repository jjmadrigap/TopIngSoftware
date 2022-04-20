<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', 'App\Http\Controllers\Api\ProductApi@index')->name("api.product.index");
Route::get('/products/{id}', 'App\Http\Controllers\Api\ProductApi@show')->name("api.product.show");
Route::get('/v2/products', 'App\Http\Controllers\Api\ProductApiV2@index')->name("api.v2.product.index");
Route::get('/v2/products/{id}', 'App\Http\Controllers\Api\ProductApiV2@show')->name("api.v2.product.show");
Route::get('/v3/products', 'App\Http\Controllers\Api\ProductApiV3@index')->name("api.v3.product.index");
Route::get('/v3/products/paginate', 'App\Http\Controllers\Api\ProductApiV3@paginate')->name("api.v3.product.paginate");

