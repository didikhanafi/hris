<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeDetailBankController;
use App\Http\Controllers\EmployeeDetailOtherController;
use App\Http\Controllers\EmployeeDetailPersonalController;
use App\Http\Controllers\EmployeeDetailSpouseController;
use App\Http\Controllers\EmployeeHistoryController;
use App\Http\Controllers\EmployeeKontrakBerakhirController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\EmployeesDetailController;
use App\Http\Controllers\EmployeesStatusController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MasterBranchesController;
use App\Http\Controllers\MasterCompaniesController;
use App\Http\Controllers\MasterDepartementsController;
use App\Http\Controllers\MasterPendidikanController;
use App\Http\Controllers\MasterPositionController;
use App\Http\Controllers\MasterReligionController;
use App\Http\Controllers\MasterSubDepartementsController;
use App\Http\Controllers\MutationController;
use App\Http\Controllers\MutationImportController;
use App\Http\Controllers\ReportEmployeeController;
use App\Http\Controllers\SalaryContorller;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StatusKaryawanController;
use App\Http\Controllers\SuratPeringatanController;
use App\Http\Controllers\SuratPKController;
use App\Models\MasterPendidikan;
use App\Models\StatusKaryawan;
use App\Models\SuratPeringatan;
use App\Models\SuratPK;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Master
Route::resource('/companies', MasterCompaniesController::class)->middleware('auth');
Route::resource('/departements', MasterDepartementsController::class)->middleware('auth');
Route::resource('/position', MasterPositionController::class)->middleware('auth');
Route::resource('/religion', MasterReligionController::class)->middleware('auth');
Route::resource('/statusnikah', StatusKaryawanController::class)->middleware('auth');
Route::resource('/branches', MasterBranchesController::class)->middleware('auth');
Route::resource('/pendidikan', MasterPendidikanController::class)->middleware('auth');
Route::resource('/subdepartements', MasterSubDepartementsController::class)->middleware('auth');

//Employee
Route::resource('/employees', EmployeesController::class)->middleware('auth');
Route::resource('/employeesdetail', EmployeesDetailController::class)->middleware('auth');
Route::resource('/employeespersonal', EmployeeDetailPersonalController::class)->middleware('auth');
Route::resource('/employeesbank', EmployeeDetailBankController::class)->middleware('auth');
Route::resource('/employeesspouse', EmployeeDetailSpouseController::class)->middleware('auth');
Route::resource('/employeesother', EmployeeDetailOtherController::class)->middleware('auth');
Route::resource('/employeesstatus', EmployeesStatusController::class)->middleware('auth');
Route::resource('/salary', SalaryContorller::class)->middleware('auth');
Route::resource('/loan', LoanController::class)->middleware('auth');
Route::resource('/suratperingatan', SuratPeringatanController::class)->middleware('auth');
Route::resource('/spk', SuratPKController::class)->middleware('auth');
Route::resource('/employeeshistroy', EmployeeHistoryController::class)->middleware('auth');
Route::resource('/employeescontexpired', EmployeeKontrakBerakhirController::class)->middleware('auth');

//Employee Mutation
Route::resource('/mutation', MutationController::class)->middleware('auth');
Route::resource('/setting', SettingController::class)->middleware('auth');

//Report Employee
Route::resource('/reportemployee', ReportEmployeeController::class)->middleware('auth');


// Clear application cache:
Route::get('/clear-cache', function(){
    Artisan::call('cache:clear');
    return 'Application cache has been cleared';
});

//Clear route cache:
Route::get('/route-cache', function() {
	Artisan::call('route:cache');
    return 'Routes cache has been cleared';
});

//Clear config cache:
Route::get('/config-cache', function() {
 	Artisan::call('config:cache');
 	return 'Config cache has been cleared';
}); 

// Clear view cache:
Route::get('/view-clear', function() {
    Artisan::call('view:clear');
    return 'View cache has been cleared';
});   