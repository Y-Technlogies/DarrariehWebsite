<?php

use App\Http\Resources\OfferCollection;
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

Route::get('/products', 'ApiProductController@getProducts')->name('product.all');
Route::get('/product/{id}', 'ApiProductController@getProduct');
Route::get('/offers', function (){
   return new OfferCollection(\App\ProductOffer::all());
});

Route::post('/checkout', 'PaymentController@apiPay');
