<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Models\MasterCompanies;
use App\Models\ReportEmployee;
use App\Models\SettingModel;
use Illuminate\Http\Request;

class ReportEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchName = $request->input('search_name');
        $searchCompany = $request->input('search_company');
        $startDate = $request->input('start_date');
        $startDate =date('Y-m-d',strtotime($startDate));
        $endDate = $request->input('end_date') ?: now()->toDateString(); // Default to today if not provided
        $endDate =date('Y-m-d',strtotime($endDate));

        // dd($startDate);
        // Query with relationships
        $query = Employees::with('companies', 'mutations', 'branches', 'positions', 'religions', 'statusnikahs');

        // Apply filters based on provided input
        if ($searchName) {
            $query->where('employee', 'like', '%' . $searchName . '%');
        }

        if ($searchCompany) {
            $query->whereHas('companies', function($q) use ($searchCompany) {
                $q->where('companiescode', 'like', '%' . $searchCompany . '%');
            });
        }

        if ($startDate && $endDate) {
            $query->whereBetween('tglmasuk', [$startDate, $endDate]);
        }

        // Get the filtered data
        $employees = $query->get();
        $datacompany = MasterCompanies::all();
        $settingweb = SettingModel::first();
        return view('report.reportemployee',[
            'settingwebcom'=>$settingweb,
            'slide'=>'reportemployee',
            'title'=>'Employee Report',
            'employees' => $employees,
            'datacompany' => $datacompany,
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
