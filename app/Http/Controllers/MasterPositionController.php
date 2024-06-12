<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\SettingModel;
use Illuminate\Http\Request;

class MasterPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lastId = Position::latest('id')->value('id');
        // $lastId = MasterCompanies::count();
        $nextId = $lastId ? $lastId + 1 : 1; 
        $positioncode = "DEP".str_pad($nextId, 4, '0', STR_PAD_LEFT);
        $dataposition=Position::all();
        $settingweb = SettingModel::first();
        return view('master.position',[
            'settingwebcom'=>$settingweb,
            'slide'=>'position',
            'title'=>'Position',
            'codeno'=>$positioncode,
            'dataposition'=>$dataposition
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
            'positioncode'=> 'required',
            'position'=> 'required',
        ]);
        if($request->status=='on'){
            $status=1;
        }else{
            $status=0;
        }

        //create Position
        Position::create([
            'positioncode'     => $request->positioncode,
            'position'   => $request->position,
            'status'   => $status
        ]);

        //redirect to index
        return redirect('/position')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'positioncode'=> 'required',
            'position'=> 'required',
        ]);
        
        if($request->status=='on'){
            $status=1;
        }else{
            $status=0;
        }
        Position::where('id',$id)->update([            
            'positioncode'     => $request->positioncode,
            'position'   => $request->position,
            'status'   => $status
        ]);
        
        return redirect('/position')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // dd($id);
        
        Position::destroy($id);
        return redirect('/position');
    }
}
