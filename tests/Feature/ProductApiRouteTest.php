<?php

namespace Tests\Feature;

use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductApiRouteTest extends TestCase
{
    /** @test */
    public function all_product_route_test()
    {
        $products = factory(Product::class, 2)->create();

        $this->get(route('product.all'))
            ->assertStatus(200)
            ->assertJson($products->toArray());
    }
}
