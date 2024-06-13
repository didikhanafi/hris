<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Models\Mutation;
use App\Models\SettingModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // $oneMonthFromNow = Carbon::now()->addMonth();

        // Ambil 10 data terbaru yang memiliki mutasi dengan tglawal kurang dari satu bulan dari sekarang
        // $employees = Employees::select('employee.employeecode', 'employee.employee', 'companies.companies', 'mutation.tglakhir')
        //                     ->join('companies', 'employee.company_id', '=', 'companies.id')
        //                     ->join('mutation', 'employee.id', '=', 'mutation.employee_id')
        //                     ->where('mutation.tglakhir', '<', $oneMonthFromNow)
        //                     ->orderBy('mutation.tglakhir', 'desc')
        //                     ->take(10)
        //                     ->get();

        

        $query = Employees::with('companies', 'mutations', 'branches', 'positions', 'religions', 'statusnikahs');
        // Filter based on tglakhir within one month from today
        $today = Carbon::today();
        $oneMonthAfter = $today->copy()->addMonth();

        $query->whereHas('mutations', function($q) use ($today, $oneMonthAfter) {
            $q->whereBetween('tglakhir', [$today, $oneMonthAfter]);
        });

        // Order by tglakhir in descending order and take the latest 10 records
        $employees = $query->orderBy('tglakhir', 'desc')
                        ->take(10)
                        ->get();

        $query = Employees::query();

        $count = $query->whereHas('mutations', function($q) use ($today, $oneMonthAfter) {
            $q->whereBetween('tglakhir', [$today, $oneMonthAfter]);
        })->count();                

        // Get the filtered data
        // $employees = $query->get();
        

        // // Define the date one month from now
        // $oneMonthFromNow = now()->addMonth();

        // // Subquery to get the latest mutation record for each employee
        // $latestMutations = DB::table('mutation')
        //     ->select('employee_id', DB::raw('MAX(tglakhir) as tglakhir'))
        //     ->where('tglakhir', '<', $oneMonthFromNow)
        //     ->groupBy('employee_id');

        // // Main query to get the required employee details along with company and latest mutation date
        // $employees = Employees::select('employee.employeecode', 'employee.employee', 'companies.companies', 'latest_mutation.tglakhir','employee.tglmasuk')
        //     ->join('companies', 'employee.company_id', '=', 'companies.id')
        //     ->joinSub($latestMutations, 'latest_mutation', function($join) {
        //         $join->on('employee.id', '=', 'latest_mutation.employee_id');
        //     })
        //     ->orderBy('latest_mutation.tglakhir', 'desc')
        //     ->take(10)
        //     ->get();        
            
        $latestEmployees = Employees::select('employee.employee', 'employee.tglmasuk', 'companies.companies')
                            ->join('companies', 'employee.company_id', '=', 'companies.id')
                            ->orderBy('employee.tglmasuk', 'desc')
                            ->take(10)
                            ->get();
    
        // Menghitung jumlah mutasi yang tglawal kurang dari satu bulan dari sekarang
        // $expiringMutationsCount = Mutation::where('tglawal', '<', $oneMonthFromNow)->count();   
        
        $settingweb = SettingModel::first();
        // 'settingwebcom'=>$settingweb,
        return view('home',[
            'settingwebcom'=>$settingweb,
            'slide'=>'dashboard',
            'title'=>'Dashboard',
            'countkontrak'=>$contractEmployeesCount,
            'counttetap'=>$permanentEmployeesCount,
            'counttotal'=>$totalEmployeesCount,
            'countexpired'=>$count,
            'employees'=>$employees,
            'employeenew'=>$latestEmployees,
        ]);
        // return view('home');
    }
}
