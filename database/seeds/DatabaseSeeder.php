<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SizeSeeder::class);
        $this->call(CrustSeeder::class);
        $this->call(PizzaSeeder::class);
        $this->call(PizzaVariantSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(PriceSeeder::class);
    }
}
