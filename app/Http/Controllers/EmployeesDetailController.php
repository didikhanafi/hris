<?php

namespace App\Http\Controllers;

use App\Models\Branches;
use App\Models\Departements;
use App\Models\Employees;
use App\Models\EmployeesDetail;
use App\Models\Loan;
use App\Models\MasterCompanies;
use App\Models\MasterPendidikan;
use App\Models\Mutation;
use App\Models\Position;
use App\Models\Religion;
use App\Models\Sallary;
use App\Models\SettingModel;
use App\Models\StatusKaryawan;
use App\Models\SuratPeringatan;
use App\Models\SuratPK;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class EmployeesDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Query with relationships
        $query = Employees::with('companies', 'mutations', 'branches', 'positions', 'religions', 'statusnikahs');
        // Get the filtered data
        $employees = $query->get();
        $dataposition = Position::all();
        $datacompanies = MasterCompanies::all();
        return view('employee.employeedetail',[
            'slide'=>'employees',
            'title'=>'Employee',
            'dataposition'=>$dataposition,
            'datacompanies'=>$datacompanies,
            'employees'=>$employees,
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
    public function show($id)
    {
        // echo $id;
        $employees = Employees::with('companies', 'mutations','branches','positions','religions','statusnikahs')->get();
        $mutation = Mutation::with('companies', 'branches','positions', 'departements')->get();
        // dd($mutation);
        // dd($employees);
        $lastId = Employees::latest('id')->value('id');
        // $lastId = MasterCompanies::count();
        $nextId = $lastId ? $lastId + 1 : 1;
        $employeecode = "EMP".str_pad($nextId, 4, '0', STR_PAD_LEFT);
        $dataemployees=Employees::find($id);
        $datacompany=MasterCompanies::all();
        $datadepartement=Departements::all();
        $datareligion=Religion::all();
        $datapendidikan=MasterPendidikan::all();
        $datastatusnikah=StatusKaryawan::all();
        $dataposition=Position::all();
        $databranches=Branches::all();
        $datamutation=Mutation::all();


        // If the above debugging doesn't help, let's check if any field is causing the issue
        $datasuratperingatan = SuratPeringatan::where('employee_id', $id)->get();
        $dataspk = SuratPK::where('employee_id', $id)->get();
        $dataloan = Loan::where('employee_id', $id)->get();
        //Menangani history


        $employeerelasi = Employees::with(['mutations', 'spk', 'suratperingatan', 'loan'])
            ->where('id', $id)
            ->first();

        // Convert date strings to Carbon instances and add 'sort_date' field
        // Tambahkan field 'sort_date' dan 'keterangan' yang akan digunakan untuk mengurutkan data dan menampilkan deskripsi
        $mutations = $employeerelasi->mutations->map(function($item) {
            $item->sort_date = $item->tglawal;
            $item->keterangan = ' ' . $item->mutation_ke;
            return $item;
        });

        $spk = $employeerelasi->spk->map(function($item) {
            $item->sort_date = $item->tglspk;
            $item->keterangan = ' ' . $item->spk;
            return $item;
        });

        $suratperingatan = $employeerelasi->suratperingatan->map(function($item) {
            $item->sort_date = $item->tglsp;
            $item->keterangan = ' ' . $item->suratperingatan;
            return $item;
        });

        $loan = $employeerelasi->loan->map(function($item) {
            $item->sort_date = $item->tglloan;
            $item->keterangan = 'Rp ' . $item->jmlloan;
            return $item;
        });

        // Combine all data and sort by 'sort_date'
        $history = collect()
            ->merge($mutations)
            ->merge($spk)
            ->merge($suratperingatan)
            ->merge($loan)
            ->sortBy('sort_date');

        // Gabungkan semua data dan urutkan berdasarkan 'sort_date'
        // $history = collect()
        //     ->merge($mutations)
        //     ->merge($spk)
        //     ->merge($suratperingatan)
        //     ->merge($loan)
        //     ->sortByDesc('sort_date');
        // Debugging to find the issue
        // $history->each(function($item) {
        //     // Check the type of sort_date
        //     if (!($item->sort_date instanceof Carbon)) {
        //         dd($item, gettype($item->sort_date));
        //     }
        // });

        // dd($datasuratperingatan, $dataspk, $dataloan); // Check these objects for potential issues

        // try {
        //     $salary = Employees::findOrFail($id);


        $sallary = Sallary::where('employee_id', $id)->first();
        if($sallary){

            $datasallary = [
                'salary'   => $sallary->salary,
                'salarystd'   =>$sallary->salarystd,
                'uangmakan'   =>$sallary->uangmakan,
                'transport'   =>$sallary->transport,
                'tunjanganjabatan'   =>$sallary->tunjanganjabatan,
                'tunjanganrumah'   =>$sallary->tunjanganrumah,
                'tunjanganphone'   =>$sallary->tunjanganphone,
                'tunjanganperjalanan'   =>$sallary->tunjanganperjalanan,
                'insentif1'   =>$sallary->insentif1,
                'insentif2'   =>$sallary->insentif2,
                'komisi'   =>$sallary->komisi,
                'lembur'   =>$sallary->lembur,
                'sewamotor'   =>$sallary->sewamotor,
                'claimparkir'   =>$sallary->claimparkir,
                'biayalain'   =>$sallary->biayalain,
                'pensiun'   =>$sallary->pensiun,
                'bpjs_tk'   =>$sallary->bpjs_tk,
                'bpjs_kesehatan'   =>$sallary->bpjs_kesehatan,
                'pph21'   =>$sallary->pph21,
                'lainlain'   =>$sallary->lainlain,
                'harikerja'   => $sallary->harikerja,
                'limitloan'   => $sallary->limitloan,
                // Tambahkan semua kolom lainnya dengan nilai 0
            ];
            $salarytemp='1';

        }else{

            $datasallary = [
                'salary'   => 0,
                'salarystd'   => 0,
                'uangmakan'   => 0,
                'transport'   => 0,
                'tunjanganjabatan'   => 0,
                'tunjanganrumah'   => 0,
                'tunjanganphone'   => 0,
                'tunjanganperjalanan'   => 0,
                'insentif1'   => 0,
                'insentif2'   => 0,
                'komisi'   => 0,
                'lembur'   => 0,
                'sewamotor'   => 0,
                'claimparkir'   => 0,
                'biayalain'   => 0,
                'pensiun'   => 0,
                'bpjs_tk'   => 0,
                'bpjs_kesehatan'   => 0,
                'pph21'   => 0,
                'lainlain'   => 0,
                'harikerja'   => 30,
                'limitloan'   => 0,
                // Tambahkan semua kolom lainnya dengan nilai 0
            ];
            $salarytemp='0';
        }

        $settingweb = SettingModel::first();
        return view('employee.employeedetail',[
            'settingwebcom'=>$settingweb,
            'slide'=>'employees',
            'title'=>'Employee',
            'codeno'=>$employeecode,
            'dataemployees'=>$dataemployees,
            'datacompany'=>$datacompany,
            'datadepartement'=>$datadepartement,
            'datareligion'=>$datareligion,
            'datapendidikan'=>$datapendidikan,
            'datastatusnikah'=>$datastatusnikah,
            'dataposition'=>$dataposition,
            'databranches'=>$databranches,
            'datasallary'=>$datasallary,
            'datasuratperingatan'=>$datasuratperingatan,
            'salarytemp'=>$salarytemp,
            'dataloan'=>$dataloan,
            'datamutation'=>$mutation,
            // 'loantemp'=>$loantemp,
            'employees'=>$employees,
            'dataspk'=>$dataspk,
            'history'=>$history
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmployeesDetail $employeesDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        if($request->tabakses=="mainprofile"){
            $request->validate([
                'employeecode'=> 'required',
                'employee'=> 'required',
                'uploademployee' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'uploadktp' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);


            $karyawan = EmployeesDetail::findOrFail($id);


            // dd($karyawan);
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

            if($request->employeestatus=='on'){
                $status='1';
            }else{
                $status='0';
            }


            $tgllahir=date('Y-m-d',strtotime($request->tgllahir));
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
                'tglmasuk'   => $tglmasuk,
                'tglkeluar'   => $tglkeluar,
                'statuskontrak'   => $request->statuskontrak,
                'employeestatus'   => $status,
                'position'   => $request->position,
            ]);

            return redirect('/employeesdetail/'.$id)->with(['success' => 'Data Berhasil Disimpan!']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmployeesDetail $employeesDetail)
    {
        //
    }
}
