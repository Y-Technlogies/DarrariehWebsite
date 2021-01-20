<?php

use Illuminate\Database\Seeder;

class ProductCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = \App\Product::where('product_code','=', '')->get();

        $products->chunk(20 ,function ($product) {
            $product->product_code = rand(10000, 99999);
            $product->save();
        });

    }
}
