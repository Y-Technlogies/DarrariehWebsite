<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'description' => $this->getTranslatedAttribute('description', 'ar'),
            'price' => $this->price,
            'images' =>  array_map(function ($image) {

                $path = Storage::disk(config('voyager.storage.disk'))->path($this->getThumbnail($image, 'resize-500'));
                return file_exists($path) ?  $this->getThumbnail($image, 'resize-500') : $image;

            }, $this->getImage()),
            'suitable_age' => $this->suitable_age,
            'size' => $this->size,
            'product_code' => $this->product_code,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
