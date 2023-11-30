<?php

namespace App\Http\Controllers;

use App\Models\Priode;
use App\Models\Jabatan;
use App\Models\Local;

class DataController extends Controller
{
    public function index()
    {
        return view('dashboard.data.index', [
            'title' => 'Master Data',
        ]);
    }
}