<?php

use App\Product;

function productTranslation($id, $attribute = 'description') {

    $product = Product::find($id)->first();
    $product->load('translations');

    return $product->getTranslatedAttribute($attribute);
}

function productSizeList() {

    $dataType = Voyager::model('DataType')->where('slug', '=', 'products')->first();
    $rows = array_search('size', array_column($dataType->readRows->all(), 'field'));

    return $dataType->readRows->all()[$rows]->details->options;
}

function getSizeFromOption($size) {
    return productSizeList()->{$size};
}

function getPriceWithCurrency($value) {
    return currency($value, currency()->config('default'), currency()->getUserCurrency());
}

function numberFormatter($value) {
    $formatter = new NumberFormatter(config('app.locale'), NumberFormatter::DEFAULT_STYLE);

    return $formatter->format($value);
}