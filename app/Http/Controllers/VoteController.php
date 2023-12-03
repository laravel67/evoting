<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Voting;
use App\Models\Candidate;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function vote(Request $request, $id)
    {
        // dd($request->user()->id, $id);
        $user = User::where('id', $request->user()->id)->value('voting');

        if ($user == false) {
            User::where('id', $request->user()->id)->update([
                'voting' => true,
                'candidate_id' => $id
            ]);
            Voting::create([
                'user_id' => $request->user()->id,
                'candidate_id' => $id
            ]);
            Candidate::where('id', $id)->increment('votes');
            return view('home.success');
        } else {
            return redirect()->back();
        }
    }

    public function reset($id, $candidate_id)
    {
        Voting::where('user_id', $id)->delete();
        Candidate::where('id', $candidate_id)->decrement('votes');
        User::where('id', $id)->update([
            'voting' => false,
            'candidate_id' => null
        ]);
        return back()->with('success', 'Reset voting berhasil');
    }

    public function lantik($id)
    {
        Candidate::where('id', $id)->update(['lantik' => true]);
        return back()->with('success', 'Pelanktikan berhasil');
    }
}
