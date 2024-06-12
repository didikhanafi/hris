<?php

namespace App\Http\Controllers;

use App\Models\Branches;
use App\Models\Departements;
use App\Models\Employees;
use App\Models\EmployeesStatus;
use App\Models\MasterCompanies;
use App\Models\MasterPendidikan;
use App\Models\Mutation;
use App\Models\Position;
use App\Models\Religion;
use App\Models\SettingModel;
use App\Models\StatusKaryawan;
use Illuminate\Http\Request;

class EmployeesStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $searchName = $request->input('search_name');
        $searchCompany = $request->input('search_company');
        $searchName1 = $request->input('search_name1');
        $searchCompany1 = $request->input('search_company1');
        $searchName2 = $request->input('search_name2');
        $searchCompany2 = $request->input('search_company2');
        $searchName3 = $request->input('search_name3');
        $searchCompany3 = $request->input('search_company3');
    
        //employee aktif
        // Query with relationships
        $query = Employees::with('companies', 'mutations', 'branches', 'positions', 'religions', 'statusnikahs')
                          ->where('employeestatus', 1); // Filter only active employees
    
        // Apply filters based on provided input
        if ($searchName) {
            $query->where('employee', 'like', '%' . $searchName . '%');
        }
    
        if ($searchCompany) {
            $query->whereHas('companies', function($q) use ($searchCompany) {
                $q->where('companiescode', 'like', '%' . $searchCompany . '%');
            });
        }
    
        // Get the filtered data
        $employees = $query->get();

        //employee tidak aktif
        // Query with relationships
        $query1 = Employees::with('companies', 'mutations', 'branches', 'positions', 'religions', 'statusnikahs')
        ->where('employeestatus', 0); // Filter only active employees

        // Apply filters based on provided input
        if ($searchName1) {
            $query1->where('employee', 'like', '%' . $searchName1 . '%');
        }

        if ($searchCompany1) {
            $query1->whereHas('companies', function($q1) use ($searchCompany1) {
                $q1->where('companiescode', 'like', '%' . $searchCompany1 . '%');
            });
        }

        // Get the filtered data
        $employees1 = $query1->get();

        //employee kontrak
        // Query with relationships
        $query2 = Employees::with('companies', 'mutations', 'branches', 'positions', 'religions', 'statusnikahs')
        ->where('statuskontrak', 'kontrak'); // Filter only active employees

        // Apply filters based on provided input
        if ($searchName2) {
            $query2->where('employee', 'like', '%' . $searchName2 . '%');
        }

        if ($searchCompany2) {
            $query2->whereHas('companies', function($q2) use ($searchCompany2) {
                $q2->where('companiescode', 'like', '%' . $searchCompany2 . '%');
            });
        }

        // Get the filtered data
        $employees2 = $query2->get();

 
        //employee Tetap
        // Query with relationships
        $query3 = Employees::with('companies', 'mutations', 'branches', 'positions', 'religions', 'statusnikahs')
        ->where('statuskontrak', 'tetap'); // Filter only active employees

        // Apply filters based on provided input
        if ($searchName3) {
            $query3->where('employee', 'like', '%' . $searchName3 . '%');
        }

        if ($searchCompany3) {
            $query3->whereHas('companies', function($q3) use ($searchCompany3) {
                $q3->where('companiescode', 'like', '%' . $searchCompany3 . '%');
            });
        }

        // Get the filtered data
        $employees3 = $query3->get();       
        // dd($employees);
        // Additional data for the view
        $lastId = Employees::latest('id')->value('id');
        $nextId = $lastId ? $lastId + 1 : 1;
        $employeecode = "EMP" . str_pad($nextId, 4, '0', STR_PAD_LEFT);
        $dataemployees = Employees::all();
        $datacompany = MasterCompanies::all();
        $datadepartement = Departements::all();
        $datareligion = Religion::all();
        $datapendidikan = MasterPendidikan::all();
        $datastatusnikah = StatusKaryawan::all();
        $dataposition = Position::all();
        $databranches = Branches::all();
        $datamutation = Mutation::all();
    
        
        $settingweb = SettingModel::first();
        return view('employee.employeesstatus', [
            'settingwebcom'=>$settingweb,
            'slide' => 'employeesstatus',
            'title' => 'Status Karyawan',
            'codeno' => $employeecode,
            'dataemployees' => $dataemployees,
            'datacompany' => $datacompany,
            'datadepartement' => $datadepartement,
            'datareligion' => $datareligion,
            'datapendidikan' => $datapendidikan,
            'datastatusnikah' => $datastatusnikah,
            'dataposition' => $dataposition,
            'databranches' => $databranches,
            'datamutation' => $datamutation,
            'employees' => $employees,
            'employees1' => $employees1,
            'employees2' => $employees2,
            'employees3' => $employees3,
            'search_name' => $searchName,
            'search_company' => $searchCompany
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
    public function show(EmployeesStatus $employeesStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmployeesStatus $employeesStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmployeesStatus $employeesStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmployeesStatus $employeesStatus)
    {
        //
    }
}
