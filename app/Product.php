<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;


class Product extends Model
{
    use Resizable;

    public function getImage()
    {
        return sizeof(json_decode($this->images)) > 0 ? json_decode($this->images) : $this->images;
    }
}
