<?php
/**
 * Created by PhpStorm.
 * User: BDO
 * Date: 3/4/2021
 * Time: 8:59 PM
 */

namespace App\Service;


class CustomException {

    private $exception;

    /**
     * CustomException constructor.
     * @param $exception
     */
    public function __construct($exception)
    {
        $this->exception = $exception;
    }


    public function toJson()
    {
        return json_encode([
            'title' => $this->exception->getFile(),
            'code' => $this->exception->getCode(),
            'message' => $this->exception->getMessage(),
        ]);
    }
}