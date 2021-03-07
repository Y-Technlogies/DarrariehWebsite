<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Exception\NotReadableException;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Translatable;


class Product extends Model
{
    use Resizable, Translatable;

    protected $translatable = ['description', 'season', 'style', 'pattern', 'clothing_noun', 'applicable_scene', 'fabric', 'suitable_age', 'style_color'];

    public function getImage()
    {
        if (!preg_match('/\.([Jj][Pp][Ee]?[Gg]|[Pp][Nn][Gg]|[Gg][Ii][Ff])/m', $this->images))
            return ['logo.png'];

        return sizeof(json_decode($this->images)) > 0 ? json_decode($this->images) : $this->images;
    }

    public function color()
    {
        return $this->belongsToMany(Color::class, 'product_colors', 'product_id', 'color_id');
    }

    public function getCover()
    {
        $images = $this->getImage();

        return (json_last_error() == JSON_ERROR_NONE) ? $images[0] : $images;
    }
}
