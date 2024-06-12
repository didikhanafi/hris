<?php

namespace App\Http\Controllers;

use App\Models\Religion;
use App\Models\SettingModel;
use Illuminate\Http\Request;

class MasterReligionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lastId = Religion::latest('id')->value('id');
        // $lastId = MasterCompanies::count();
        $nextId = $lastId ? $lastId + 1 : 1; 
        $religioncode = "AG".str_pad($nextId, 4, '0', STR_PAD_LEFT);
        $datareligion=Religion::all();
        $settingweb = SettingModel::first();
        return view('master.religion',[
            'settingwebcom'=>$settingweb,
            'slide'=>'religion',
            'title'=>'Religion',
            'codeno'=>$religioncode,
            'datareligion'=>$datareligion
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
            'religioncode'=> 'required',
            'religion'=> 'required',
        ]);
        if($request->status=='on'){
            $status=1;
        }else{
            $status=0;
        }

        //create Religion
        Religion::create([
            'religioncode'     => $request->religioncode,
            'religion'   => $request->religion,
        ]);

        //redirect to index
        return redirect('/religion')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Religion $religion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Religion $religion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'religioncode'=> 'required',
            'religion'=> 'required',
        ]);
        
        if($request->status=='on'){
            $status=1;
        }else{
            $status=0;
        }
        Religion::where('id',$id)->update([            
            'religioncode'     => $request->religioncode,
            'religion'   => $request->religion,
        ]);
        
        return redirect('/religion')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // dd($id);
        
        Religion::destroy($id);
        return redirect('/religion');
    }
}
