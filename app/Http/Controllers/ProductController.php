<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Facades\Voyager;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(6);
        $html = '';
        foreach ($products as $index => $product) {

            $spaceBtween = ($index%2 == 0) ? 'pr-1 pl-0' : 'pr-0 pl-1';

            $html .= '<div class="col-6 mb-3 px-0 '.$spaceBtween.'">
                         <a href="'.route('product.show', $product).'">
                            <div class="card">
                                <img class="card-img-top" height="200" src="'.Voyager::image($product->getCover()).'" alt=" '.$product->getTranslatedAttribute('description').'">
                                <div class="card-body @if($isArabic) text-right @endif">
                                    <p class="card-text two-line mb-3">
                                        '.$product->getTranslatedAttribute('description').'
                                    </p>
                                    <p class="card-text card-price mb-2">
                                        '.$product->price .' '. __('product-detail.currency').'
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>';
        }

        if ($request->ajax())
            return $html;


        return view('product.index',compact('products'));
    }

    public function show(Product $product, Request $request)
    {
        $dataType = Voyager::model('DataType')->where('slug', '=', 'products')->first();

        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);
            $dataTypeContent = call_user_func([$model, 'findOrFail'], $product->id);
        }

        $products = Product::where('id', '!=' ,$product->id)->orderBy('created_at', 'desc')->paginate(6);
        $html = '';
        foreach ($products as $index => $product) {

            $spaceBtween = ($index%2 == 0) ? 'pr-1 pl-0' : 'pr-0 pl-1';

            $html .= '<div class="col-6 mb-3 px-0 '.$spaceBtween.'">
                         <a href="'.route('product.show', $product).'">
                            <div class="card">
                                <img class="card-img-top" height="200" src="'.Voyager::image($product->getCover()).'" alt=" '.$product->getTranslatedAttribute('description').'">
                                <div class="card-body @if($isArabic) text-right @endif">
                                    <p class="card-text two-line mb-3">
                                        '.$product->getTranslatedAttribute('description').'
                                    </p>
                                    <p class="card-text card-price mb-2">
                                        '.$product->price .' '. __('product-detail.currency').'
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>';
        }

        if ($request->ajax())
            return $html;

        return view('product.view',compact('dataType', 'dataTypeContent', 'products'));
    }
}
