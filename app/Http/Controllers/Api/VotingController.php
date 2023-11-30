<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Voting;
use App\Models\Candidate;
use App\Http\Controllers\Controller;
use App\Models\Priode;

class VotingController extends Controller
{
    public function getVote()
    {
        $latesPriode = Priode::latest('created_at')->first();
        $totalVotes = Candidate::where('priode_id', $latesPriode->id)->sum('votes'); // Calculate the total votes
        return response()->json($totalVotes);
    }

    public function getNewVoters()
    {
        $newVoters = Voting::with(['user'])->orderBy('created_at', 'desc')->limit(4)->get();
        return json_decode($newVoters);
    }

    public function allNewVoters()
    {
        $allNews = User::where('voting', true);
        return json_decode($allNews);
    }

    public function getVoters()
    {
        $getVoters = User::where('role', 'user')->count();
        return response()->json(['count' => $getVoters]);
    }

    public function getVoted()
    {
        $voted = User::where('voting', true)->where('role', 'user')->count();
        return response()->json($voted);
    }

    public function voteYet()
    {
        $voteYet = User::where('voting', false)->where('role', 'user')->count();
        return response()->json($voteYet);
    }

    // Menghitung Jumlah Kandidate berdasarkan Priode Terbaru
    public function getCandidate()
    {
        $latestPriode = Priode::latest('created_at')->first();
        $getCandidate = Candidate::where('priode_id', $latestPriode->id)->count();
        return response()->json($getCandidate);
    }

    public function getResult()
    {
        $latestPriode = Priode::latest('created_at')->first();
        $priodeId = $latestPriode->id;

        $getResultPutra = Candidate::where('priode_id', $priodeId)
            ->orderBy('votes', 'desc')
            ->count();

        // Anda bisa mengganti 'BEM PUTRA' dengan jenis BEM yang sesuai
        $getResultPutri = Candidate::where('priode_id', $priodeId)
            ->orderBy('votes', 'desc')
            ->count();

        return view('dashboard.results.index', compact('getResultPutra', 'getResultPutri'));
    }
}
