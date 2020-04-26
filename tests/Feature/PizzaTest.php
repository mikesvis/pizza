<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Pizza;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PizzaTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function pizzas_are_fetched()
    {
        $this->artisan("db:seed");

        $response = $this->getJson('/api/pizza');

        $response->assertStatus(200)->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'title',
                    'description',
                    'image',
                    'pricing' => [
                        'id',
                        'type',
                        'prefix',
                        'price',
                    ]
                ]
            ]
        ]);
    }

    /** @test */
    public function pizza_options_are_fetched()
    {
        $this->artisan("db:seed");

        $pizza = Pizza::inRandomOrder()->first();

        $response = $this->getJson('/api/pizza/'.$pizza->id);

        $response->assertStatus(200)->assertJsonStructure([
            'possibilities' => [
                'sizes' => ['*' => []],
                'crusts' => ['*' => []]
            ],
            'variants' => [
                '*' => [
                    'id',
                    'title',
                    'price',
                    'price_id',
                    'image',
                    'image_size',
                    'tree',
                    'size_id',
                    'crust_id'
                ]
            ]
        ]);
    }
}
