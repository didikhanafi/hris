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
use App\Models\SuratPeringatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchName = $request->input('search_name');
        $searchCompany = $request->input('search_company');

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

        // Get the filtered data
        $employees = $query->get();

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
        return view('employee.employees', [
            'settingwebcom'=>$settingweb,
            'slide' => 'employees',
            'title' => 'Employee',
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
        $request->validate([
            'employeecode'=> 'required',
            'employee'=> 'required',
            'tglmasuk'=> 'required',
            'uploademployee' => 'image|mimes:jpeg,png,jpg|max:2048',
            'uploadktp' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('uploademployee')) {
            $uploademployee = $request->file('uploademployee')->store('uploademployee', 'public');
        }else{
            $uploademployee = '';
        }
        if ($request->hasFile('uploadktp')) {
            $uploadktp = $request->file('uploadktp')->store('uploadktp', 'public');
        }else{
            $uploadktp = '';
        }

        if($request->emoloyeestatus=='on'){
            $status=1;
        }else{
            $status=0;
        }

        $tgllahir=date('Y-m-d',strtotime($request->tgllahir));
        $tglmasuk=date('Y-m-d',strtotime($request->tglmasuk));
        $tglkeluar=date('Y-m-d',strtotime($request->tglkeluar));
        $spousetgllahir=date('Y-m-d',strtotime($request->spousetgllahir));
        // dd($request);
        // dd($tgllahir);
        //create Religion
        $employee= Employees::create([
            'company_id'   => $request->company_id,
            'departements_id'   => $request->departements,
            'branches_id'   => $request->branches,
            'employeecode'     => $request->employeecode,
            'employee'   => $request->employee,
            'uploademployee'   => $uploademployee,
            'email'   => $request->email,
            'alamat'   => $request->alamat,
            'city'   => $request->city,
            'provensi'   => $request->provensi,
            'phone'   => $request->phone,
            'tempatlahir'   => $request->tempatlahir,
            'tgllahir'   => $tgllahir,
            'gender'   => $request->gender,
            'statusnikah'   => $request->statusnikah,
            'religion_id'   => $request->religion_id,
            'pendidikan'   => $request->pendidikan,
            'uploadktp'   => $uploadktp,
            'ktp'   => $request->ktp,
            'ktpalamat'   => $request->ktpalamat,
            'ktpprovensi'   => $request->ktpprovensi,
            'ktpkota'   => $request->ktpkota,
            'spousename'   => $request->spousename,
            'spousecity'   => $request->spousecity,
            'spouseprovensi'   => $request->spouseprovensi,
            'spousetempatlahir'   => $request->spousetempatlahir,
            'spousetgllahir'   => $spousetgllahir,
            'spousejob'   => $request->spousepekerjaan,
            'jmlanak'   => $request->jmlanak,
            'tglmasuk'   => $tglmasuk,
            'tglkeluar'   => $tglkeluar,
            'statuskontrak'   => $request->statuskontrak,
            'employeestatus'   => $status,
            'position'   => $request->position,
            'npwp'   => $request->npwp,
            'jamsostek'   => $request->jamsostek,
            'asuransi'   => $request->asuransi,
            'bank'   => $request->bank,
            'bankname'   => $request->bankname,
            'bankacc'   => $request->bankacc,
        ]);

        // dd($employee);
        Mutation::create([
            'employee_id' => $employee->id,
            'mutation_ke' => 'PKWT01 (Masuk Pertama)', // atau sesuai kebutuhan
            'companies_id' => $employee->company_id,
            'departement_id' => $employee->departements_id,
            'branch_id' => $employee->branches_id,
            'position_id' => $employee->position,
            'tglawal' => $employee->tglmasuk,
            'tglakhir' => $employee->tglkeluar,
        ]);

        //redirect to index
        return redirect('/employees')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employees $employees)
    {
        // dd($employees);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'employeecode'=> 'required',
            'employee'=> 'required',
            'uploademployee' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'uploadktp' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);


        $karyawan = Employees::findOrFail($id);


        // dd($request);
        if ($request->hasFile('uploademployee')) {
            if ($karyawan->uploademployee) {
                Storage::delete($karyawan->uploademployee);
            }
            $uploademployee = $request->file('uploademployee')->store('uploademployee','public');
            $karyawan->uploademployee = $uploademployee;
        }

        if ($request->hasFile('uploadktp')) {
            if ($karyawan->uploadktp) {
                Storage::delete($karyawan->uploadktp);
            }
            $uploadktp = $request->file('uploadktp')->store('uploadktp','public');
            $karyawan->uploadktp = $uploadktp;
        }
        // dd($karyawan);

        if($request->emoloyeestatus=='on'){
            $status=1;
        }else{
            $status=0;
        }

        $tgllahir=date('Y-m-d',strtotime($request->tgllahir));
        $spousetgllahir=date('Y-m-d',strtotime($request->spousetgllahir));
        $tglmasuk=date('Y-m-d',strtotime($request->tglmasuk));
        $tglkeluar=date('Y-m-d',strtotime($request->tglkeluar));
        $karyawan->update([
            'company_id'   => $request->company_id,
            'departements_id'   => $request->departements,
            'branches_id'   => $request->branches,
            'employeecode'     => $request->employeecode,
            'employee'   => $request->employee,
            // 'uploademployee'   => $request->uploademployee,
            'email'   => $request->email,
            'alamat'   => $request->alamat,
            'city'   => $request->city,
            'provensi'   => $request->provensi,
            'phone'   => $request->phone,
            'tempatlahir'   => $request->tempatlahir,
            'tgllahir'   => $tgllahir,
            'gender'   => $request->gender,
            'statusnikah'   => $request->statusnikah,
            'religion_id'   => $request->religion_id,
            'pendidikan'   => $request->pendidikan,
            // 'uploadktp'   => $uploadktp,
            'ktp'   => $request->ktp,
            'ktpalamat'   => $request->ktpalamat,
            'ktpprovensi'   => $request->ktpprovensi,
            'ktpkota'   => $request->ktpkota,
            'spousename'   => $request->spousename,
            'spousecity'   => $request->spousecity,
            'spouseprovensi'   => $request->spouseprovensi,
            'spousetempatlahir'   => $request->spousetempatlahir,
            'spousetgllahir'   => $spousetgllahir,
            'spousejob'   => $request->spousepekerjaan,
            'jmlanak'   => $request->jmlanak,
            'tglmasuk'   => $tglmasuk,
            'tglkeluar'   => $tglkeluar,
            'statuskontrak'   => $request->statuskontrak,
            'employeestatus'   => $status,
            'position'   => $request->position,
            'npwp'   => $request->npwp,
            'jamsostek'   => $request->jamsostek,
            'asuransi'   => $request->asuransi,
            'bank'   => $request->bank,
            'bankname'   => $request->bankname,
            'bankacc'   => $request->bankacc,
        ]);
        // Mutation::where('id',$id)->update([
        //     'employee_id'   => $request->employee_id,
        //     'companies_id'   => $request->company_id,
        //     'departement_id'   => $request->departements,
        //     'branch_id'   => $request->branches,
        //     'position'   => $request->position,
        //     'tglawal'   => $tglmasuk,
        // ]);

        return redirect('/employees')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // dd($id);
        $karyawan = Employees::findOrFail($id);

        if ($karyawan->uploademployee) {
            Storage::delete($karyawan->uploademployee);
        }
        if ($karyawan->ktp) {
            Storage::delete($karyawan->uploadktp);
        }

        $karyawan->delete();
        return redirect('/employees');
    }
}
