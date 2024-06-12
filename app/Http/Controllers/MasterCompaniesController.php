<?php

namespace App\Http\Controllers;

use App\Models\MasterCompanies;
use App\Models\SettingModel;
use Illuminate\Http\Request;

class MasterCompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $lastId = MasterCompanies::latest('id')->value('id');
        // $lastId = MasterCompanies::count();
        $nextId = $lastId ? $lastId + 1 : 1; 
        $companycode = str_pad($nextId, 4, '0', STR_PAD_LEFT);
        $datacompanies=MasterCompanies::all();
        $settingweb = SettingModel::first();
        return view('master.companies',[
            'settingwebcom'=>$settingweb,
            'slide'=>'companies',
            'title'=>'Companies',
            'codeno'=>$companycode,
            'datacompanies'=>$datacompanies
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
            'companiescode'=> 'required',
            'companies'=> 'required',
        ]);
        if($request->status=='on'){
            $status=1;
        }else{
            $status=0;
        }

        //create MasterCompanies
        MasterCompanies::create([
            'companiescode'     => $request->companiescode,
            'companies'   => $request->companies,
            'status'   => $status
        ]);

        //redirect to index
        return redirect('/companies')->with(['success' => 'Data Berhasil Disimpan!']);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterCompanies $masterCompanies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasterCompanies $masterCompanies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'companiescode'=> 'required',
            'companies'=> 'required',
        ]);
        
        if($request->status=='on'){
            $status=1;
        }else{
            $status=0;
        }
        MasterCompanies::where('id',$id)->update([            
            'companiescode'     => $request->companiescode,
            'companies'   => $request->companies,
            'status'   => $status
        ]);
        
        return redirect('/companies')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // dd($id);
        
        MasterCompanies::destroy($id);
        return redirect('/companies');
    }
}
