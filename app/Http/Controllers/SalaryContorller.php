<?php

namespace App\Http\Controllers;

use App\Models\Sallary;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class SalaryContorller extends Controller
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
        $request->validate([
            'salary'=> 'required',
        ]);
        // dd($request);
        Sallary::create([   
            'employee_id'   => $request->employee_id,
            'salary'   => $request->salary,
            'salarystd'   => $request->salarystd,
            'uangmakan'   => $request->uangmakan,
            'transport'   => $request->transport,
            'tunjanganjabatan'   => $request->tunjanganjabatan,
            'tunjanganrumah'   => $request->tunjanganrumah,
            'tunjanganphone'   => $request->tunjanganphone,
            'tunjanganperjalanan'   => $request->tunjanganperjalanan,
            'insentif1'   => $request->insentif1,
            'insentif2'   => $request->insentif2,
            'komisi'   => $request->komisi,
            'lembur'   => $request->lembur,
            'sewamotor'   => $request->sewamotor,
            'claimparkir'   => $request->claimparkir,
            'biayalain'   => $request->biayalain,
            'pensiun'   => $request->pensiun,
            'bpjs_tk'   => $request->bpjs_tk,
            'bpjs_kesehatan'   => $request->bpjs_kesehatan,
            'pph21'   => $request->pph21,
            'lainlain'   => $request->lainlain,
            'harikerja'   => $request->harikerja,
            'limitloan'   => $request->limitloan,
        ]);
        
        return redirect('/employeesdetail/'.$request->employee_id)->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sallary $sallary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sallary $sallary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'salary'=> 'required',
        ]);
        
        // dd($request);
        // $sallary = Sallary::findOrFail($id);       

        $sallary = Sallary::where('employee_id', $id)->first();
        //bila data ditemukan, perbarui data
        $sallary->update([   
            'salary'   => $request->salary,
            'salarystd'   => $request->salarystd,
            'uangmakan'   => $request->uangmakan,
            'transport'   => $request->transport,
            'tunjanganjabatan'   => $request->tunjanganjabatan,
            'tunjanganrumah'   => $request->tunjanganrumah,
            'tunjanganphone'   => $request->tunjanganphone,
            'tunjanganperjalanan'   => $request->tunjanganperjalanan,
            'insentif1'   => $request->insentif1,
            'insentif2'   => $request->insentif2,
            'komisi'   => $request->komisi,
            'lembur'   => $request->lembur,
            'sewamotor'   => $request->sewamotor,
            'claimparkir'   => $request->claimparkir,
            'biayalain'   => $request->biayalain,
            'pensiun'   => $request->pensiun,
            'bpjs_tk'   => $request->bpjs_tk,
            'bpjs_kesehatan'   => $request->bpjs_kesehatan,
            'pph21'   => $request->pph21,
            'lainlain'   => $request->lainlain,
            'harikerja'   => $request->harikerja,
            'limitloan'   => $request->limitloan,
        ]);
        
        return redirect('/employeesdetail/'.$id)->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sallary $sallary)
    {
        //
    }
}
