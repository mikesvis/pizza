<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function index()
    {
        return [
            [
                'image' => '/images/slides/slide-01.jpg',
                'name' => 'Pizzalicious is great',
                'text' => '<div class="slide__slogon text-white text-center">Pizzalicious is delicious</div>',
            ],
            [
                'image' => '/images/slides/slide-02.jpg',
                'name' => 'Instant delivery',
                'text' => '<div class="slide__slogon text-white text-center">Instant delivery</div>',
            ],
            [
                'image' => '/images/slides/slide-03.jpg',
                'name' => 'Fresh ingredients',
                'text' => '<div class="slide__slogon text-white text-center">Fresh ingredients</div>',
            ],
        ];
    }
}
