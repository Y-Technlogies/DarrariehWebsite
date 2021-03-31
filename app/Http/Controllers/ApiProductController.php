<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product;
use App\Http\Resources\ProductCollection;
use App\Service\CustomException;
use Illuminate\Http\Request;
use App\Product as ProductModel;

class ApiProductController extends Controller
{
    public function getProducts(Request $request)
    {
        return new ProductCollection(
            ProductModel::orderBy('id', 'desc') 
                ->paginate(6)
        );
    }

    public function getProduct(Request $request)
    {
        try {
            $product = ProductModel::findOrFail($request->id);
        } catch (\Exception $exception) {
            return (new CustomException($exception))->toJson();
        }

        return new Product($product);
    }
}
