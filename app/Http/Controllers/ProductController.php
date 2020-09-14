<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Facades\Voyager;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index',compact('products'));
    }

    public function show(Product $product)
    {
        $dataType = Voyager::model('DataType')->where('slug', '=', 'products')->first();

        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);
            $dataTypeContent = call_user_func([$model, 'findOrFail'], $product->id);
        }

        $products = Product::all();
        return view('product.view',compact('dataType', 'dataTypeContent', 'products'));
    }
}
