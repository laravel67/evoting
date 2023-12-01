<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

ini_set('max_execution_time', '0');
class ImportController extends Controller
{
    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        HeadingRowFormatter::default('none');
        $import = new UsersImport;
        try {
            Excel::import($import, $request->file('file'));
            $successCount = $import->getSuccessCount();

            return redirect()->back()->with('success', $successCount . ' data pemilih berhasil diimport');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error importing data. Please check the file format.');
        }
    }
}
