<?php

namespace App\FormFields;


use TCG\Voyager\FormFields\AbstractHandler;

class RandnumField extends AbstractHandler {

    protected $codename = 'random-number';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('vendor.voyager.formfields.random-number', [
            'row' => $row,
            'options' => $options,
            'dataType' => $dataType,
            'dataTypeContent' => $dataTypeContent
        ]);
    }
}