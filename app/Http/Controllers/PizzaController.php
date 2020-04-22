<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;
use App\Http\Resources\PizzaResource;
use App\Http\Resources\PizzaVariantResource;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pizzas = Pizza::with(['image', 'cheapest'])->where('pizzas.status', 1)->get();
        return PizzaResource::collection($pizzas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pizza = Pizza::with('variants.image', 'variants.price', 'variants.size', 'variants.crust')->find($id);

        if(empty($pizza))
            return response()->json(['message' => 'Not Found.'], 404);

        $result = [
            'possibilities' => [
                'sizes' => $pizza->variants->pluck('size.title', 'size.id'),
                'crusts' => $pizza->variants->pluck('crust.title', 'crust.id'),
            ],
            'variants' => PizzaVariantResource::collection($pizza->variants),
            'selectedVariantIndex' => 0
        ];

        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
