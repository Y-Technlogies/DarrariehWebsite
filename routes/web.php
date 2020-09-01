<?php

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
    return redirect()->route('product.index');
});

Route::resource('/product','ProductController');
Route::get('/cart/{id}',function ($id) {

    $product = Product::find($id);

    return view('cart.add', compact('product'));

})->name('cart.add');

Route::post('/cart',function (Request $request) {

    //$request->session()->forget('products');

    $request->session()->reflash();

    if (!$request->session()->has('products')) {

        $request->session()->put('products', $request->except('_token'));
        $request->session()->put('products_count', 1);

        return redirect()->route('product.show',$request->get('product_id'));
    }

    $product = $request->session()->get('products');
    $product[sizeof($product)] = $request->except('_token');

    $request->session()->put('products', $product);
    $request->session()->put('products_count', sizeof($product));

    return redirect()->route('product.show',$request->get('product_id'));

})->name('cart.post');


Route::get('/cart-list', function (){

    $products = Session::get('products');
    $total = 0;

    foreach ($products as $key=>$product)
    {
        $temp = Product::find($product['product_id']);
        $products[$key]['description'] = $temp->description;
        $products[$key]['image'] = $temp->getImage()[0];
        $products[$key]['price'] = $temp->price;
        $total += $temp->price * $product['quantity'];
    }

    Session::put('total', $total);
    Session::put('products', $products);
    Session::put('products_count', sizeof($products));
//    dd(Session::get('products'));

//    dd(Session::all());

    return view('cart.list', compact('products'));

})->name('cart.list');

Route::get('/cart-remove/{id}', function ($id){

    $products = Session::get('products');
    $count = Session::get('product_count');
    $total = Session::get('total');

    $total = $total - ($products[$id]['quantity'] * $products[$id]['price']);
    unset($products[$id]);
    $count--;

    Session::put('total', $total);
    Session::put('products', $products);
    Session::put('product_count', $count);

    return redirect()->back();

})->name('cart.remove');

Route::get('/checkout', function() {

    return view('cart.checkout');


})->name('cart.checkout');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
