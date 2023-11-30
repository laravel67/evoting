<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Priode;
use App\Models\Voting;
use App\Models\Candidate;
use Illuminate\Http\Request;

class DashController extends Controller
{

    public function index()
    {
        $latestPeriod = Priode::latest('created_at')->first();
        if ($latestPeriod) {
            $candidatesData = Candidate::where('priode_id', $latestPeriod->id)->get();
        } else {
            $candidatesData = collect();
        }
        $newVoters = Voting::orderBy('created_at', 'desc')->limit(4)->get();
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'newvoters' => $newVoters,
            'candidatesData' => $candidatesData,
        ]);
    }
}
