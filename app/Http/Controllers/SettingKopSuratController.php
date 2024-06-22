<?php

namespace App\Http\Controllers;

use App\Models\MasterCompanies;
use App\Models\SettingModel;
use Illuminate\Http\Request;

class SettingKopSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settingwebcom=SettingModel::where('id',1)->first();
        $companies=MasterCompanies::all();
        return view('setting.settingkopsurat',[
            'slide'=>'settingkop',
            'title'=>'Setting Kop Surat',
            'settingwebcom'=>$settingwebcom,
            'companies'=>$companies,
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
