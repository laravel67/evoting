<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Priode;
use Illuminate\Http\Request;


class PriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.data.index', []);
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
        $validate = $request->validate([
            'priode' => 'required|max:9|unique:priodes',
        ]);
        Priode::create($validate);

        User::query()->update(['voting' => false, 'candidate_id' => null]);

        return redirect('/dashboard/master-data')->with('success', 'Priode berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Priode $priode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Priode $priode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Priode $priode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Priode $priode)
    {
        Priode::destroy($priode->id);
        return back()->with('success', 'Data berhasil dihapus');
    }
}
