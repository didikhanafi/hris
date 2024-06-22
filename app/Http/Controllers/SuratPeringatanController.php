<?php

namespace App\Http\Controllers;

use App\Models\SuratPeringatan;
use Illuminate\Http\Request;

class SuratPeringatanController extends Controller
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
            'suratperingatan'=> 'required',
            'tglsp'=> 'required',
            'keterangansp'=> 'required',
        ]);
        $tglsp=date('Y-m-d',strtotime($request->tglsp));
        $tglawalsp=date('Y-m-d',strtotime($request->tglawalsp));
        $tglakhirsp=date('Y-m-d',strtotime($request->tglakhirsp));
        // dd($request);
        SuratPeringatan::create([
            'employee_id'   => $request->employee_id,
            'companies_id'   => $request->companies_id,
            'position_id'   => $request->position_id,
            'suratperingatan'   => $request->suratperingatan,
            'spke'   => $request->spke,
            'tglawalsp'   => $tglawalsp,
            'tglakhirsp'   => $tglakhirsp,
            'keterangansp'   => $request->keterangansp,
            'tempatsp'   => $request->tempatsp,
            'tglsp'   => $tglsp,
            'syaratsp1'   => $request->syaratsp1,
            'syaratsp2'   => $request->syaratsp2,
            'syaratsp3'   => $request->syaratsp3,
            'atasanlgs'   => $request->atasanlgs,
            'atasanlgsposition'   => $request->atasanlgsposition,
            'mengetahui'   => $request->mengetahui,
            'mengetahuiposition'   => $request->mengetahuiposition,
            'kuasahukum'   => $request->kuasahukum,
            'arsip'   => $request->arsip,
        ]);

        //redirect to index
        return redirect('/employeesdetail/'.$request->employee_id)->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratPeringatan $suratPeringatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratPeringatan $suratPeringatan)
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
            'suratperingatan'=> 'required',
            'tglsp'=> 'required',
            'keterangansp'=> 'required',
        ]);

        $tglsp=date('Y-m-d',strtotime($request->tglsp));
        $suratperingatan = SuratPeringatan::findOrFail($id);

        $suratperingatan->update([
            'employee_id'   => $request->employee_id,
            'suratperingatan'   => $request->suratperingatan,
            'keterangansp'   => $request->keterangansp,
            'tglsp'   => $tglsp,
        ]);

        //redirect to index
        return redirect('/employeesdetail/'.$request->employee_id)->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $suratPeringatan = SuratPeringatan::findOrFail($id);

        $suratPeringatan->delete();
        return redirect('/employeesdetail/'.$id)->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
