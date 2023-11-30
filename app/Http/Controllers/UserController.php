<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.users.index', [
            'title' => 'Data Pemilih',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('dashboard.users.create', [
        //     'title' => 'Tambah pemilih',
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nisn' => 'required|max:10|unique:users,nisn',
            'name' => 'required|string|max:255',
            'gender' => 'required',
            'password' => 'min:3',
        ]);
        $nisn = $validate['nisn'];
        $validate['password'] = Hash::make($nisn);
        User::create($validate);
        return redirect('/dashboard/users')->with('success', 'Pemilih baru berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'title' => 'Ubah data',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rule = [
            'name' => 'required|string|max:255',
            'gender' => 'required',
        ];
        if ($request->nisn !== $user->nisn) {
            $rule['nisn'] = 'required|max:10|unique:users,nisn';
        }
        $validate = $request->validate($rule);
        User::where('id', $user->id)->update($validate);
        return redirect('/dashboard/users')->with('success', 'Data pemilih berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return back()->with('success', 'Data pemilih berhasil dihapus');
    }
}
