<?php

namespace App\Http\Controllers;

use App\Models\Mutation;
use App\Models\SettingModel;
use App\Models\SuratPeringatan;
use Illuminate\Http\Request;

class MutationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        $mutation = Mutation::with('companies','branches','departements','positions')->get();

        // $lastId = Mutation::count();
        $lastId = Mutation::latest('id')->value('id');
        $nextId = $lastId ? $lastId + 1 : 1; 
        $mutationcode = "MT" . str_pad($nextId, 4, '0', STR_PAD_LEFT);
        $datamutation=Mutation::all();
        $settingweb = SettingModel::first();
        return view('mutation.employeemutation',[
            'settingwebcom'=>$settingweb,
            'slide'=>'mutation',
            'title'=>'Mutation',
            'mutation'=>$mutation,
            'codeno'=>$mutationcode,
            'datamutation'=>$datamutation,
        ]);
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
            'mutation_ke'=> 'required',
            'tglawal'=> 'required',
        ]);
        // dd($request);
            $tglawal=date('Y-m-d',strtotime($request->tglawal));
            $tglakhir=date('Y-m-d',strtotime($request->tglakhir));
        Mutation::create([   
            'employee_id'   => $request->employee_id,
            'mutation_ke'   => $request->mutation_ke,
            'tglawal'   => $tglawal,
            'tglakhir'   => $tglakhir,
            'companies_id'   => $request->companies_id,
            'departement_id'   => $request->departement_id,
            'branch_id'   => $request->branch_id,
            'position_id'   => $request->position_id,
        ]);

        //ubah company,cabang, departement, jabatan
        
        return redirect('/employeesdetail/'.$request->employee_id)->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Mutation $mutation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mutation $mutation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'mutation_ke'=> 'required',
            'tglawal'=> 'required',
        ]);
        // dd($request);
            $tglawal=date('Y-m-d',strtotime($request->tglawal));
            $tglakhir=date('Y-m-d',strtotime($request->tglakhir));

        $karyawan = Mutation::findOrFail($id);
        // dd($karyawan);

        $karyawan->update([   
            // 'employee_id'   => $request->employee_id,
            'mutation_ke'   => $request->mutation_ke,
            'tglawal'   => $tglawal,
            'tglakhir'   => $tglakhir,
            'companies_id'   => $request->companies_id,
            'departement_id'   => $request->departement_id,
            'branch_id'   => $request->branch_id,
            'position_id'   => $request->position_id,
        ]);
        
        //ubah company,cabang, departement, jabatan
        return redirect('/employeesdetail/'.$request->employee_id)->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mutation = Mutation::findOrFail($id);

        $mutation->delete();
        return redirect('/employeesdetail/'.$id)->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
