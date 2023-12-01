<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use App\Models\Import;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

ini_set('max_execution_time', '0');
class ImportController extends Controller
{
    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        try {
            Excel::import(new UsersImport, $request->file('file'));

            return redirect()->back()->with('success', 'Data pemilih berhasil di import');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error importing data. Please check the file format.');
        }
    }
}
