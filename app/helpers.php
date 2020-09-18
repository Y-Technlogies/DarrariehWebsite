<?php

use App\Product;

function productTranslation($id, $attribute = 'description') {

    $product = Product::find($id)->first();
    $product->load('translations');

    return $product->getTranslatedAttribute($attribute);

}