<?php

namespace App\Http\Controllers;

use App\Models\Branches;
use App\Models\MasterCompanies;
use App\Models\SettingModel;
use Illuminate\Http\Request;

class MasterBranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $lastId = Branches::count();
        $lastId = Branches::latest('id')->value('id');
        $nextId = $lastId ? $lastId + 1 : 1; 
        $branchcode = "CAB" . str_pad($nextId, 4, '0', STR_PAD_LEFT);
        $databranches=Branches::all();
        $settingweb = SettingModel::first();
        return view('master.branches',[
            'settingwebcom'=>$settingweb,
            'slide'=>'branches',
            'title'=>'Branches',
            'codeno'=>$branchcode,
            'databranches'=>$databranches,
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
        // dd($request);
        $request->validate([
            'branchescode'=> 'required',
            'branches'=> 'required',
        ]);
        if($request->status=='on'){
            $status=1;
        }else{
            $status=0;
        }
        
        //create Branches
        Branches::create([
            'branchescode'     => $request->branchescode,
            'branches'   => $request->branches,
            'status'   => $status
        ]);

        //redirect to index
        return redirect('/branches')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Branches $branches)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branches $branches)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'branchescode'=> 'required',
            'branches'=> 'required',
        ]);
        if($request->status=='on'){
            $status=1;
        }else{
            $status=0;
        }
        Branches::where('id',$id)->update([  
            'branchescode'     => $request->branchescode,
            'branches'   => $request->branches,
            'status'   => $status
        ]);
        
        return redirect('/branches')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $branches = Branches::findOrFail($id);

        $branches->delete();
        return redirect()->route('branches.index')->with('success', 'Cabang berhasil dihapus');
    }
}
