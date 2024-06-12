<?php

namespace App\Http\Controllers;

use App\Models\SettingModel;
use App\Models\StatusKaryawan;
use Illuminate\Http\Request;

class StatusKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lastId = StatusKaryawan::latest('id')->value('id');
        // $lastId = MasterCompanies::count();
        $nextId = $lastId ? $lastId + 1 : 1; 
        $statusnikahcode = "SNK".str_pad($nextId, 4, '0', STR_PAD_LEFT);
        $datastatusnikah=StatusKaryawan::all();
        $settingweb = SettingModel::first();
        return view('master.statusnikah',[
            'settingwebcom'=>$settingweb,
            'slide'=>'statusnikah',
            'title'=>'Status Pernikahan',
            'codeno'=>$statusnikahcode,
            'datastatusnikah'=>$datastatusnikah
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
            'statusnikahcode'=> 'required',
            'statusnikah'=> 'required',
        ]);
        if($request->status=='on'){
            $status=1;
        }else{
            $status=0;
        }

        //create StatusKaryawan
        StatusKaryawan::create([
            'statusnikahcode'     => $request->statusnikahcode,
            'statusnikah'   => $request->statusnikah,
        ]);

        //redirect to index
        return redirect('/statusnikah')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(StatusKaryawan $statusKaryawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StatusKaryawan $statusKaryawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'statusnikahcode'=> 'required',
            'statusnikah'=> 'required',
        ]);
        
        if($request->status=='on'){
            $status=1;
        }else{
            $status=0;
        }
        StatusKaryawan::where('id',$id)->update([            
            'statusnikahcode'     => $request->statusnikahcode,
            'statusnikah'   => $request->statusnikah,
        ]);
        
        return redirect('/statusnikah')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // dd($id);
        
        StatusKaryawan::destroy($id);
        return redirect('/statusnikah');
    }
}
