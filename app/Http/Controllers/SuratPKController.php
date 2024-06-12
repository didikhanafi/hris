<?php

namespace App\Http\Controllers;

use App\Models\SuratPK;
use Illuminate\Http\Request;

class SuratPKController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'spk'=> 'required',
            'tglspk'=> 'required',
        ]);
        $tglspk=date('Y-m-d',strtotime($request->tglspk));
        
        SuratPK::create([
            'employee_id'   => $request->employee_id,
            'spk'   => $request->spk,
            'keteranganspk'   => $request->keteranganspk,
            'tglspk'   => $tglspk,
        ]);

        //redirect to index
        return redirect('/employeesdetail/'.$request->employee_id)->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratPK $suratPK)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratPK $suratPK)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'spk'=> 'required',
            'tglsp'=> 'required',
        ]);

        $tglspk=date('Y-m-d',strtotime($request->tglspk));
        $spk = SuratPK::findOrFail($id);
        
        $spk->update([
            'employee_id'   => $request->employee_id,
            'spk'   => $request->spk,
            'keteranganspk'   => $request->keteranganspk,
            'tglspk'   => $tglspk,
        ]);

        //redirect to index
        return redirect('/employeesdetail/'.$request->employee_id)->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $spk = SuratPK::findOrFail($id);

        $spk->delete();
        return redirect('/employeesdetail/'.$id)->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
