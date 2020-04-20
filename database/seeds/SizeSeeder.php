<?php

use App\Models\Size;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Size::create(['title' => 'Small']);
        Size::create(['title' => 'Medium']);
        Size::create(['title' => 'Big']);
    }
}
