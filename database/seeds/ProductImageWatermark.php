<?php

use Illuminate\Database\Seeder;

class ProductImageWatermark extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = \App\Product::all();

        $products->chunk(20, function ($product) {

            foreach ($product->getImage() as $image) {
                $i = Image::make(Storage::disk(config('voyager.storage.disk'))->get($image));
                $i->insert(storage_path('app/public/watermark/watermark.png'), 'bottom-left', 0, 0);
                $i->save();
            }

        });

    }
}
