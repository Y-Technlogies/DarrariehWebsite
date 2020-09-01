<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function index()
    {
        $products = Product::all();

        return view('product.index',compact('products'));
    }

    public function show(Product $product)
    {
        $products = Product::all();
        return view('product.view',compact('product', 'products'));
    }
}
