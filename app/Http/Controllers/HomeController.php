<?php

namespace App\Http\Controllers;


use App\Models\Candidate;
use App\Models\Priode;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $priode = Priode::latest('created_at')->first();
        if ($priode) {
            $candidates = Candidate::where('priode_id', $priode->id)->get();
        } else {
            $candidates = collect();
        }
        return view('home.index', compact('candidates'));
    }
}
