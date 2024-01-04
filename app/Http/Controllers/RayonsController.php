<?php

namespace App\Http\Controllers;

use App\Models\rayons;
use App\Models\User;
use Illuminate\Http\Request;

class RayonsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mendapatkan data rayon dari model atau sumber data lainnya
        $rayon = Rayons::all(); // Gantilah Rayon dengan nama model yang sesuai
        // Mengirimkan data rayon ke view
        return view('rayons.index', compact('rayon'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', 'ps')->get();
        return view('rayons.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
// RayonsController.php
public function store(Request $request)
{
    $request->validate([
        'rayon' => 'required',
        'user_id' => 'required',
    ]);

    Rayons::create([
        'rayon' => $request->rayon,
        'user_id' => $request->user_id,
    ]);

    return redirect()->route('rayons.index')->with('success', 'Berhasil menambahkan data rayon!');
}



    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rayon = Rayons::find($id);
        // ...
        return view('rayons.edit', compact('rayon'));
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'rayon' => 'required',
            'user_id' => 'required',
            // tambahkan validasi lainnya sesuai kebutuhan
        ]);

        $rayon = rayons::findOrFail($id);
        $rayon->update([
            'rayon' => $request->rayon,
            'user_id' => $request->user_id,
            // tambahkan kolom lainnya sesuai kebutuhan
        ]);

        return redirect()->route('rayons.index')->with('success', 'Rayon berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        Rayons::where('id', $id)->delete();
        return redirect()->route('rayons.index')->with('deleted', 'Berhasil menghapus data!');
}

}
