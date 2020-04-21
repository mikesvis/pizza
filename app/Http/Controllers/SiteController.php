<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Apps main page controller
     *
     * @return void
     */
    public function index()
    {
        return view('main');
    }
}
