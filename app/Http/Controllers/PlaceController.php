<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::all();

        return view('places.index', ['places' => $places]);
    }
    
    public function create() 
    {
        return view('places.create');
    }

    public function store(Request $request)
    {
        $formData = $request->validate([
            'name' => 'required|string|max:255',
            'notes' => 'required|string|max:4000',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
        ]);

        $place = Place::create($formData);

        return redirect()->route('dashboard');
    }

    public function show($id)
    {
        $place = Place::findOrFail($id);

        return view('places.show', ['place' => $place]);
    }
}
