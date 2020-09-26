<?php

use App\Customer;
use App\Http\Requests\CartRequest;
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

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/', function () {
    return redirect()->route('product.index');
});

Route::resource('/product','ProductController');
Route::resource('/customer','CustomerController');

Route::get('/cart/{id}',function ($id) {

    $dataType = Voyager::model('DataType')->where('slug', '=', 'products')->first();

    if (strlen($dataType->model_name) != 0) {
        $model = app($dataType->model_name);
        $dataTypeContent = call_user_func([$model, 'findOrFail'], $id);
    }

    $product = Product::find($id);
    $product->load('translations');

    return view('cart.add', compact('product', 'dataType', 'dataTypeContent'));

})->name('cart.add');

Route::post('/cart',function (CartRequest $request) {

   // $request->session()->forget('products');
    $product = [];

    if (!$request->session()->has('products')) {
        $product[0] = $request->except('_token');
    } else {
        $product = $request->session()->get('products');
        $product[sizeof($product)] = $request->except('_token');
    }

    $request->session()->put('products', $product);
    $request->session()->put('products_count', sizeof($product));

    return redirect()->route('product.show',$request->get('product_id'));

})->name('cart.post');


Route::get('/cart-list', function (){

    $products = Session::get('products');
    $total = 0;

    if (empty($products)) {
        return view('cart.list', compact('products'));
    }

    foreach ($products as $key=>$product)
    {
        $temp = Product::find($products[$key]['product_id']);
        $products[$key]['description'] = $temp->description;
        $products[$key]['image'] = $temp->getImage()[0];
        $products[$key]['price'] = $temp->price;
        $total += $temp->price * $product['quantity'];
    }

    Session::put('total', $total);
    Session::put('products', $products);
    Session::put('products_count', sizeof($products));

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

Route::get('/cart-reset', function() {
    Session::forget('products');
});

Route::get('/checkout', function() {

    return view('cart.checkout');


})->name('cart.checkout');

Route::get('/invoice', function () {

    $products = Session::get('products');
    $customer = Customer::find(Session::get('customer_id'));

    return view('cart.invoice', compact('products', 'customer'));
});

//Route::get('/show-card', function () {
//   return view('card.getway');
//});

Route::get('/pay', 'PaymentController@pay')->name('pay');
Route::get('/pay/success', 'PaymentController@success')->name('pay.success');
Route::get('/pay/faild', 'PaymentController@faild')->name('pay.faild');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
