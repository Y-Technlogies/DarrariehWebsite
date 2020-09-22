<?php

use App\Product;

function productTranslation($id, $attribute = 'description') {

    $product = Product::find($id)->first();
    $product->load('translations');

    return $product->getTranslatedAttribute($attribute);
}

function productSizeList() {

    $dataType = Voyager::model('DataType')->where('slug', '=', 'products')->first();
    $dataTypeContent = (strlen($dataType->model_name) != 0)
                        ? new $dataType->model_name()
                        : false;
    $rows = array_search('size', array_column($dataType->readRows->all(), 'field'));

    return $dataType->readRows->all()[$rows]->details->options;
}

function getSizeFromOption($size) {
    return productSizeList()->{$size};
}