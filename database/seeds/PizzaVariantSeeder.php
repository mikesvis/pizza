<?php

use App\Models\Size;
use App\Models\Crust;
use App\Models\Pizza;
use App\Models\PizzaVariant;
use Illuminate\Database\Seeder;

class PizzaVariantSeeder extends Seeder
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

        foreach ($pizzas as $pizza) {
            foreach ($sizes as $size) {
                foreach ($crusts as $crust) {

                    $title = [$pizza->title, $size->title, $crust->title];
                    PizzaVariant::create([
                        'crust_id' => $crust->id,
                        'pizza_id' => $pizza->id,
                        'size_id' => $size->id,
                        'title' => implode(', ', $title),
                        'weight' => (500 + 100 * $crust->id + 200 * $size->id).' gr'
                    ]);
                }
            }
        }

    }
}
