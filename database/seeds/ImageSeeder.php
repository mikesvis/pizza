<?php

use App\Models\Image;
use App\Models\Pizza;
use App\Models\PizzaVariant;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // fill images for pizza
        $pizzas = Pizza::all();
        $pizzaMaps = [
            1 => '/images/cheese-VARIANT.jpg',
            2 => '/images/pepperoni-VARIANT.jpg',
            3 => '/images/half-pepperoni-half-cheese-VARIANT.jpg',
            4 => '/images/sausage-VARIANT.jpg',
            5 => '/images/supreme-VARIANT.jpg',
            6 => '/images/the-meats-VARIANT.jpg',
            7 => '/images/buffalo-chicken-VARIANT.jpg',
            8 => '/images/chicken-bbq-VARIANT.jpg',
        ];
        foreach ($pizzas as $pizza) {
            $path = preg_replace("/VARIANT/", 'main', $pizzaMaps[$pizza->id]);
            Image::create(['path' => $path, 'imageable_type' => 'App\Models\Pizza', 'imageable_id' => $pizza->id]);
        }

        $sizeMaps = [
            1 => 'small',
            2 => 'medium',
            3 => 'big',
        ];

        $variants = PizzaVariant::all();
        foreach ($variants as $variant) {
            $path = preg_replace("/VARIANT/", $sizeMaps[$variant->size_id], $pizzaMaps[$variant->pizza_id]);
            Image::create(['path' => $path, 'imageable_type' => 'App\Models\PizzaVariant', 'imageable_id' => $variant->id]);
        }

    }
}
