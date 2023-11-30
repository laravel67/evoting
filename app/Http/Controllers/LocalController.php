<?php

namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\Request;

class LocalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // $validate = $request->validate([
        //     'kelas' => 'required|unique:locals',
        //     'stage' => 'required'
        // ]);
        // Local::create($validate);
        // return back()->with('success', 'Kelas baru berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Local $local)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Local $local)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Local $local)
    {
        // $rules = [
        //     'kelas' => 'required|unique:locals',
        //     'stage' => 'required'
        // ];

        // if ($request->kelas !== $local->kelas) {
        //     $rules['kelas'] = 'required|unique:locals';
        // }

        // $validate = $request->validate($rules);

        // Local::where('id', $local->id)->update($validate);
        // return back()->with('success', 'Data Berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Local $local)
    {
        // Local::destroy($local->id);
        // return back()->with('success', 'Data berhasil dihapus');
    }
}
