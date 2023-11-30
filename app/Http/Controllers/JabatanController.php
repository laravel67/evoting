<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
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
        $rule = $request->validate([
            'jabatan' => 'required|unique:jabatans|max:255'
        ]);
        Jabatan::create($rule);
        return back()->with('success', 'Jabatan berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jabatan $jabatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        $rules = [
            'jabatan' => 'required|unique:locals',
        ];

        if ($request->jabatan !== $jabatan->jabatan) {
            $rules['jabatan'] = 'required|unique:jabatans';
        }

        $validate = $request->validate($rules);

        Jabatan::where('id', $jabatan->id)->update($validate);
        return back()->with('success', 'Data Berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jabatan $jabatan)
    {
        Jabatan::destroy($jabatan->id);
        return back()->with('success', 'Data berhasil dihapus');
    }
}
