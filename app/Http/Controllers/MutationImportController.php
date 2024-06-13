<?php

namespace App\Http\Controllers;

use App\Imports\MutationsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class MutationImportController extends Controller
{
    public function showImportForm()
    {
        return view('import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);
        
        // Excel::import(new MutationsImport, $request->file('file'));
        try {
            Excel::import(new MutationsImport, $request->file('file'));
            Log::info('Import berhasil.');
            return back()->with('success', 'File berhasil diimpor!');
        } catch (\Exception $e) {
            Log::error('Error during import: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat impor file.');
        }        
        // dd($request);

        return back()->with('success', 'File berhasil diimpor!');
    }
}
