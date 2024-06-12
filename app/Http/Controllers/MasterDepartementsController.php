<?php

namespace App\Http\Controllers;

use App\Models\Departements;
use App\Models\SettingModel;
use Illuminate\Http\Request;

class MasterDepartementsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lastId = Departements::latest('id')->value('id');
        // $lastId = MasterCompanies::count();
        $nextId = $lastId ? $lastId + 1 : 1; 
        $departementscode = "DEP".str_pad($nextId, 4, '0', STR_PAD_LEFT);
        $datadepartements=Departements::all();
        $settingweb = SettingModel::first();
        return view('master.departements',[
            'settingwebcom'=>$settingweb,
            'slide'=>'departements',
            'title'=>'Departement',
            'codeno'=>$departementscode,
            'datadepartements'=>$datadepartements
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
            'departementscode'=> 'required',
            'departements'=> 'required',
        ]);
        if($request->status=='on'){
            $status=1;
        }else{
            $status=0;
        }

        //create Departements
        Departements::create([
            'departementscode'     => $request->departementscode,
            'departements'   => $request->departements,
            'status'   => $status
        ]);

        //redirect to index
        return redirect('/departements')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Departements $departements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departements $departements)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'departementscode'=> 'required',
            'departements'=> 'required',
        ]);
        
        if($request->status=='on'){
            $status=1;
        }else{
            $status=0;
        }
        Departements::where('id',$id)->update([            
            'departementscode'     => $request->departementscode,
            'departements'   => $request->departements,
            'status'   => $status
        ]);
        
        return redirect('/departements')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // dd($id);
        
        Departements::destroy($id);
        return redirect('/departements');
    }
}
