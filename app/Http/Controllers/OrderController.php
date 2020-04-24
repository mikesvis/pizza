<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Orders\CreateOrderRequest;

class OrderController extends Controller
{
    public function create(CreateOrderRequest $request)
    {
        return [''];
    }
}
