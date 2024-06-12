<?php

namespace App\Http\Controllers;

use App\Models\SettingModel;
use App\Models\SubDepartements;
use Illuminate\Http\Request;

class MasterSubDepartementsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lastId = SubDepartements::latest('id')->value('id');
        // $lastId = MasterCompanies::count();
        $nextId = $lastId ? $lastId + 1 : 1; 
        $subdepartementscode = "SDEP".str_pad($nextId, 4, '0', STR_PAD_LEFT);
        $datasubdepartements=SubDepartements::all();

        $settingweb = SettingModel::first();
        return view('master.subdepartements',[
            'settingwebcom'=>$settingweb,
            'slide'=>'subdepartements',
            'title'=>'Sub Departement',
            'codeno'=>$subdepartementscode,
            'datasubdepartements'=>$datasubdepartements
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
            'subdepartementscode'=> 'required',
            'subdepartements'=> 'required',
        ]);
        if($request->status=='on'){
            $status=1;
        }else{
            $status=0;
        }

        //create SubDepartements
        SubDepartements::create([
            'subdepartementscode'     => $request->subdepartementscode,
            'subdepartements'   => $request->subdepartements,
            'status'   => $status
        ]);

        //redirect to index
        return redirect('/subdepartements')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(SubDepartements $subDepartements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubDepartements $subDepartements)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'subdepartementscode'=> 'required',
            'subdepartements'=> 'required',
        ]);
        
        if($request->status=='on'){
            $status=1;
        }else{
            $status=0;
        }
        SubDepartements::where('id',$id)->update([            
            'subdepartementscode'     => $request->subdepartementscode,
            'subdepartements'   => $request->subdepartements,
            'status'   => $status
        ]);
        
        return redirect('/subdepartements')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // dd($id);
        
        SubDepartements::destroy($id);
        return redirect('/subdepartements');
    }
}
