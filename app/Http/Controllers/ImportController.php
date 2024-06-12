<?php

namespace App\Http\Controllers;

use App\Imports\MutationImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MutationsImport;

class ImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        Excel::import(new MutationImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data mutasi karyawan berhasil diimport.');
    }

    public function showImportForm()
    {
        return view('import');
    }
}
