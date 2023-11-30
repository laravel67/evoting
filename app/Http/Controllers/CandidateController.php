<?php

namespace App\Http\Controllers;

use App\Models\Priode;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $latestPriode = Priode::latest('created_at')->first();

        if ($latestPriode) {
            return view('dashboard.candidates.index', [
                'title' => 'Kandidat BEM',
                'candidates' => Candidate::where('priode_id', $latestPriode->id)->get(),
                'priodes' => Priode::latest()->get()
            ]);
        } else {
            // Handle the case when there are no priodes
            return view('dashboard.candidates.index', [
                'title' => 'Kandidat BEM',
                'candidates' => [],
                'priodes' => []
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.candidates.create', [
            'title' => 'Pendaftaran Kandidat',
            'priodes' => Priode::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nisn_ketua' => 'required|string|max:10|unique:candidates,nisn_ketua',
            'nisn_wakil' => 'required|string|max:10|unique:candidates,nisn_wakil',
            'name_ketua' => 'required|max:255|string',
            'name_wakil' => 'required|max:255|string',
            'priode_id'  => 'required',
            'gender' => 'required',
            'image'      => 'max:1024|image|file',
            'visi_misi'  => 'required'
        ]);
        if ($request->file('image')) {
            $validate['image'] = $request->file('image')->store('candidate-images');
        }
        Candidate::create($validate);
        return redirect('/dashboard/candidates')->with('success', 'Pendaftaran Calon BEM berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidate $candidate)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        return view('dashboard.candidates.edit', [
            'title'     => 'Ubah Data Kandidat',
            'candidate' => $candidate,
            'priodes'   => Priode::latest()->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidate $candidate)
    {
        $rules = [
            'name_ketua' => 'required|max:255|string',
            'name_wakil' => 'required|max:255|string',
            'priode_id'  => 'nullable',
            'gender' => 'required',
            'image'      => 'max:1024|image|file',
            'visi_misi'  => 'required'
        ];
        if ($request->nisn_ketua != $candidate->nisn_ketua) {
            $rules['nisn_ketua'] = 'required|unique:candidates,nisn_ketua|max:10';
        }
        if ($request->nisn_wakil != $candidate->nisn_wakil) {
            $rules['nisn_wakil'] = 'required|unique:candidates,nisn_wakil|max:10';
        }
        $validate = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validate['image'] = $request->file('image')->store('candidate-images');
        }

        Candidate::where('id', $candidate->id)->update($validate);
        return redirect('/dashboard/candidates')->with('success', 'Ubah Data Calon BEM berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        Candidate::destroy($candidate->id);
        return back()->with('success', 'Kandidat BEM berhasil dihapus');
    }
}
