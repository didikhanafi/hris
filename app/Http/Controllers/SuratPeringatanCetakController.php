<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Models\MasterCompanies;
use App\Models\SettingModel;
use App\Models\SuratPeringatan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SuratPeringatanCetakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Request $request,string $id)
    {

        // dd($request);

        $suratperingatan = SuratPeringatan::find($id);
        $datacompany = MasterCompanies::find($id);
        $settingweb = SettingModel::first();
        return view('cetak.suratperingatancetak', [
            'settingwebcom'=>$settingweb,
            'slide' => 'employees',
            'title' => 'Employee',
            'datacompany' => $datacompany,
            'suratperingatan' => $suratperingatan,
        ]);
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
        // dd($id);
        // dd($request);

        $suratperingatan = SuratPeringatan::find($id);
        $dataemployee = Employees::find($request->employee_id);
        $datacompany = MasterCompanies::find($request->companies);
        // dd($datacompany);
        $dataposition= Employees::with('positions')->first();
        $datapositionsp= SuratPeringatan::join('position', 'suratperingatan.atasanlgsposition', '=', 'position.id')->first();
        $datapositionsp1= SuratPeringatan::join('position', 'suratperingatan.mengetahuiposition', '=', 'position.id')->first();

        // dd($dataposition);
        $settingweb = SettingModel::first();
        return view('cetak.suratperingatancetak', [
            'settingwebcom'=>$settingweb,
            'slide' => 'employees',
            'title' => 'Employee',
            'companyselect'=>$request->company,
            'datacompany' => $datacompany,
            'dataemployee' => $dataemployee,
            'dataposition' => $dataposition,
            'datapositionsp' => $datapositionsp,
            'datapositionsp1' => $datapositionsp1,
            'suratperingatan' => $suratperingatan,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
