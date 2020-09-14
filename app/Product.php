<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Translatable;


class Product extends Model
{
    use Resizable, Translatable;

    protected $translatable = ['description', 'season', 'style', 'pattern', 'clothing_noun', 'applicable_scene', 'fabric', 'suitable_age', 'style_color'];

    public function getImage()
    {
        return sizeof(json_decode($this->images)) > 0 ? json_decode($this->images) : $this->images;
    }
}
