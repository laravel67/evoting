<?php

namespace App\Http\Controllers;

use App\Models\Priode;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    // ...

    public function index()
    {
        $title = 'Hasil Pemilihan';
        // Mendapatkan periode terbaru
        $periodeTerbaru = Priode::latest()->first();

        // Mendapatkan calon terbanyak untuk setiap gender dari periode terbaru
        if ($periodeTerbaru) {
            $calonTerbanyakPutra = Candidate::where('priode_id', $periodeTerbaru->id)
                ->where('gender', 'putra')
                ->orderBy('votes', 'desc')
                ->first();

            $calonTerbanyakPutri = Candidate::where('priode_id', $periodeTerbaru->id)
                ->where('gender', 'putri')
                ->orderBy('votes', 'desc')
                ->first();
        } else {
            $calonTerbanyakPutra = null;
            $calonTerbanyakPutri = null;
        }
        // Mengirim data ke tampilan
        return view(
            'dashboard.results.index',
            compact(
                'calonTerbanyakPutra',
                'calonTerbanyakPutri',
                'periodeTerbaru',
                'title'
            )
        );
    }
}
