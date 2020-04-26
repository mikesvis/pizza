<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Price;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class OrderTest extends TestCase
{
    use DatabaseMigrations, WithFaker;

    /** @test */
    public function customer_can_order_pizza()
    {
        $this->artisan("db:seed");

        $orderItemIds = Price::inRandomOrder()->get(5)->pluck('id', 'id');

        $response = $this->json('POST', '/api/order', [
            'name' => $this->faker->firstName(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->streetAddress(),
            'user_currency' => 'USD',
            'ids' => $orderItemIds,
        ]);

        $response->assertStatus(200)->assertJsonStructure(['uuid']);

        $this->assertNotEmpty($response['uuid']);
    }
}
