<?php

namespace App\Http\Controllers;

use App\Models\Comite;
use App\Models\Priode;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class ComiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.comites.index', [
            'title' => 'Penitia',
            'priodes' => Priode::all(),
            'jabatans' => Jabatan::all(),
            'comites' => Comite::latest()->paginate(5),
        ]);
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
    public function show(Comite $comite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comite $comite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comite $comite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comite $comite)
    {
        //
    }
}
