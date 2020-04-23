<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        return [
            'USD' => [
                'id' => 0,
                'symbol' => '$',
                'course' => 1,
                'code' => 'USD'
            ],
            'EUR' => [
                'id' => 1,
                'symbol' => '€',
                'course' => 0.92,
                'code' => 'EUR'
            ]
        ];
    }
}
