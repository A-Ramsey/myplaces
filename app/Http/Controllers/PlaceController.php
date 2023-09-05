<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function create() 
    {
        return view('places.create');
    }

    public function store(Request $request)
    {
        return "Hello";
    }
}
