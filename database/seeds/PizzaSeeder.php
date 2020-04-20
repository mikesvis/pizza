<?php

use App\Models\Pizza;
use Illuminate\Database\Seeder;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pizza::create([
            'title' => 'Cheese',
            'description' => 'Mozzarella, marinara sauce, fresh basil',
            'status' => 1
        ]);
        Pizza::create([
            'title' => 'Pepperoni',
            'description' => 'Double pepperoni, mozzarella, marinara sauce, fresh basil',
            'status' => 1
        ]);
        Pizza::create([
            'title' => 'Half Pepperoni Half Cheese',
            'description' => 'Pepperoni, mozzarella, marinara sauce, fresh basil',
            'status' => 1
        ]);
        Pizza::create([
            'title' => 'Sausage',
            'description' => 'Double italian sausage, mozzarella, marinara sauce, fresh basil',
            'status' => 1
        ]);
        Pizza::create([
            'title' => 'Supreme',
            'description' => 'Pepperoni, fresh basil, mozzarella, italian sausage, bacon, mushrooms, red onions, black olives, green peppers, marinara sauce',
            'status' => 1
        ]);
        Pizza::create([
            'title' => 'The Meats',
            'description' => 'Pepperoni, ham, italian sausage, mozzarella, bacon, marinara sauce, fresh basil',
            'status' => 1
        ]);
        Pizza::create([
            'title' => 'Buffalo Chicken',
            'description' => 'Grilled chicken, buffalo sauce, mozzarella, cheddar, red onions',
            'status' => 1
        ]);
        Pizza::create([
            'title' => 'Chicken BBQ',
            'description' => 'Grilled chicken, bbq sauce, bacon, mozzarella, fresh basil, red onions',
            'status' => 1
        ]);
    }
}
