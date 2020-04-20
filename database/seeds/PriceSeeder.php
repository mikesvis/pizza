<?php

use App\Models\Size;
use App\Models\Crust;
use App\Models\Pizza;
use App\Models\Price;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $crusts = Crust::all();
        $pizzas = Pizza::all();
        $sizes = Size::all();

        $i = 0;
        foreach ($pizzas as $pizza) {
            foreach ($sizes as $size) {
                foreach ($crusts as $crust) {
                    $i++;
                    Price::create([
                        'price' => (15 + $pizza->id + $size->id),
                        'priceable_type' => 'App\Models\PriceVariant',
                        'priceable_id' => $i
                    ]);
                }
            }
        }

    }
}
