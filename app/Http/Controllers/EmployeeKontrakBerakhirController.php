<?php

namespace App\Http\Controllers;

use App\Models\Branches;
use App\Models\Departements;
use App\Models\Employees;
use App\Models\MasterCompanies;
use App\Models\MasterPendidikan;
use App\Models\Mutation;
use App\Models\Position;
use App\Models\Religion;
use App\Models\SettingModel;
use App\Models\StatusKaryawan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EmployeeKontrakBerakhirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchName = $request->input('searchName');
        $searchCompany = $request->input('searchCompany');

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

        // Filter based on tglakhir within one month from today
        $today = Carbon::today();
        $oneMonthAfter = $today->copy()->addMonth();

        $query->whereHas('mutations', function($q) use ($today, $oneMonthAfter) {
            $q->whereBetween('tglakhir', [$today, $oneMonthAfter]);
        });


        // Get the filtered data
        $employees = $query->get();
        // dd($today);
        // dd($oneMonthAfter);
    
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
        return view('employee.employeescontexpired', [
            'settingwebcom'=>$settingweb,
            'slide' => 'employeescontexpired',
            'title' => 'Kontrak Akan Berakhir',
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
