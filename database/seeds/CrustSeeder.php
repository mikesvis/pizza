<?php

use App\Models\Crust;
use Illuminate\Database\Seeder;

class CrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Crust::create(['title' => 'Traditional']);
        Crust::create(['title' => 'Thin']);
    }
}
