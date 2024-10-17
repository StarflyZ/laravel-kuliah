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
        return view("place.index", ["data" => $place]);
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
    public function show(string $id) {}

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
        $places = Place::withCount('tickets')->get();
        return view('place.totalticket', compact('places'));
    }

    public function showlist()
    {
        $places = Place::all();
        return view('place.showlist', compact('places'));
    }

    public function showinfo()
    {
        $result = Place::join('tickets as t', 'places.id', "=", 't.place_id')->orderBy('t.id', 'DESC')
            ->select('places.name')->first();
        return response()->json(array(
            'status' => 'oke',
            'msg' => "<div class='alert alert-info'>
 Did you know? <br>The recently reported location is a " . $result->name . "</div>"
        ), 200);
    }

    public function showTickets()
    {
        $place = Place::find($_POST['place_id']);
        $name = $place->name;
        $data = $place->tickets;
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('place.showTickets', compact('name', 'data'))->render()
        ), 200);
    }
}
