<?php

namespace App\Http\Controllers;

use App\Models\Citizen;
use Illuminate\Http\Request;

class CitizenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citizen = Citizen::all();
        return view('citizen.index', compact('citizen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('citizen.formcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Citizen();
        $data->citizen_id = $request->get('citizen_id');
        $data->name = $request->get('name');
        $data->address = $request->get('address');
        $data->telephone = $request->get('telephone');
        $data->save();

        return redirect()->route('citizen.index')->with('status', 'Data warga berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Citizen $citizen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Citizen $citizen)
    {
        return view('citizen.edit', compact('citizen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Citizen $citizen)
    {
        //request = hasil post name
        $citizen->name = $request->name;
        $citizen->address = $request->address;
        $citizen->save();
        return redirect()->route('citizen.index')->with('status', 'Data warga berhasil diubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Citizen $citizen)
    {
        try {
            $citizen->delete();
            return redirect()->route('citizen.index')->with('status', 'Data warga sukses dihapus !');
        } catch (\PDOException $e) {
            return redirect()->route('citizen.index')->with('status', 'Data warga gagal dihapus !');
        }
    }
}
