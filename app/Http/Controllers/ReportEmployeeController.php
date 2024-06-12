<?php

namespace App\Http\Controllers;

use App\Models\ReportEmployee;
use App\Models\SettingModel;
use Illuminate\Http\Request;

class ReportEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settingweb = SettingModel::first();
        return view('report.reportemployee',[
            'settingwebcom'=>$settingweb,
            'slide'=>'reportemployee',
            'title'=>'Employee Report',
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
    public function show(ReportEmployee $reportEmployee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReportEmployee $reportEmployee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReportEmployee $reportEmployee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReportEmployee $reportEmployee)
    {
        //
    }
}
