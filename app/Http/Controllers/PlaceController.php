<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $place = Place::all();
        return view("place.index", ["data"=>$place]);
        // $places = Place::withCount('tickets')->get();
        // return view('place.totalticket', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showTotalTicket()
    {
        $places = Place::all();
        dd($places);
        return view('place.totalticket', compact('places'));
    }
}
