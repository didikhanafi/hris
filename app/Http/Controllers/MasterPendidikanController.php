<?php

namespace App\Http\Controllers;

use App\Models\MasterPendidikan;
use App\Models\SettingModel;
use Illuminate\Http\Request;

class MasterPendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lastId = MasterPendidikan::latest('id')->value('id');
        // $lastId = MasterCompanies::count();
        $nextId = $lastId ? $lastId + 1 : 1; 
        $pendidikancode = "PD".str_pad($nextId, 4, '0', STR_PAD_LEFT);
        $datapendidikan=MasterPendidikan::all();
        $settingweb = SettingModel::first();
        return view('master.pendidikan',[
            'settingwebcom'=>$settingweb,
            'slide'=>'pendidikan',
            'title'=>'Master Pendidikan',
            'codeno'=>$pendidikancode,
            'datapendidikan'=>$datapendidikan
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
            'pendidikancode'=> 'required',
            'pendidikan'=> 'required',
        ]);
        if($request->status=='on'){
            $status=1;
        }else{
            $status=0;
        }

        //create MasterPendidikan
        MasterPendidikan::create([
            'pendidikancode'     => $request->pendidikancode,
            'pendidikan'   => $request->pendidikan,
        ]);

        //redirect to index
        return redirect('/pendidikan')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterPendidikan $masterPendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasterPendidikan $masterPendidikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'pendidikancode'=> 'required',
            'pendidikan'=> 'required',
        ]);
        
        if($request->status=='on'){
            $status=1;
        }else{
            $status=0;
        }
        MasterPendidikan::where('id',$id)->update([            
            'pendidikancode'     => $request->pendidikancode,
            'pendidikan'   => $request->pendidikan,
        ]);
        
        return redirect('/pendidikan')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // dd($id);
        
        MasterPendidikan::destroy($id);
        return redirect('/pendidikan');
    }
}
