<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Models\Mutation;
use App\Models\SettingModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Menghitung jumlah seluruh karyawan
        $totalEmployeesCount = Employees::count();    
        $contractEmployeesCount = Employees::where('statuskontrak', 'kontrak')->count();    
        $permanentEmployeesCount = Employees::where('statuskontrak', 'tetap')->count(); // Tentukan batas waktu satu bulan dari sekarang
        $oneMonthFromNow = Carbon::now()->addMonth();

        // Tentukan batas waktu satu bulan dari sekarang
        $oneMonthFromNow = Carbon::now()->addMonth();

        // Ambil 10 data terbaru yang memiliki mutasi dengan tglawal kurang dari satu bulan dari sekarang
        $employees = Employees::select('employee.employeecode', 'employee.employee', 'companies.companies', 'mutation.tglawal')
                            ->join('companies', 'employee.company_id', '=', 'companies.id')
                            ->join('mutation', 'employee.id', '=', 'mutation.employee_id')
                            ->where('mutation.tglawal', '<', $oneMonthFromNow)
                            ->orderBy('mutation.tglawal', 'desc')
                            ->take(10)
                            ->get();
        $latestEmployees = Employees::select('employee.employee', 'employee.tglmasuk', 'companies.companies')
                            ->join('companies', 'employee.company_id', '=', 'companies.id')
                            ->orderBy('employee.tglmasuk', 'desc')
                            ->take(10)
                            ->get();
    
        // Menghitung jumlah mutasi yang tglawal kurang dari satu bulan dari sekarang
        $expiringMutationsCount = Mutation::where('tglawal', '<', $oneMonthFromNow)->count();   
        
        $settingweb = SettingModel::first();
        // 'settingwebcom'=>$settingweb,
        return view('home',[
            'settingwebcom'=>$settingweb,
            'slide'=>'dashboard',
            'title'=>'Dashboard',
            'countkontrak'=>$contractEmployeesCount,
            'counttetap'=>$permanentEmployeesCount,
            'counttotal'=>$totalEmployeesCount,
            'countexpired'=>$expiringMutationsCount,
            'employeeexpired'=>$employees,
            'employeenew'=>$latestEmployees,
        ]);
        // return view('home');
    }
}
