<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\SettingModel;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $lastId = Mutation::count();
        $lastId = Loan::latest('id')->value('id');
        $nextId = $lastId ? $lastId + 1 : 1; 
        $loancode = "LN" . str_pad($nextId, 4, '0', STR_PAD_LEFT);
        $dataloan=Loan::all();
        $settingweb = SettingModel::first();
        return view('loan.employeeloan',[
            'settingwebcom'=>$settingweb,
            'slide'=>'loan',
            'title'=>'Employee Loan',
            'codeno'=>$loancode,
            'dataloan'=>$dataloan,
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
            'tglloan'=> 'required',
            'jmlloan'=> 'required',
        ]);
        // dd($request);
            $tglloan=date('Y-m-d',strtotime($request->tglloan));
        Loan::create([   
            'employee_id'   => $request->employee_id,
            'jmlloan'   => $request->jmlloan,
            'pluslimitloan'   => '0',
            'minlimitloan'   => '0',
            'saldolimitloan'   => '0',
            'tglloan'   => $tglloan,
        ]);
        
        return redirect('/employeesdetail/'.$request->employee_id)->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tglloan'=> 'required',
            'jmlloan'=> 'required',
        ]);
        
        $loan = Loan::findOrFail($id);
        // dd($id);
        $tglloan=date('Y-m-d',strtotime($request->tglloan));
        $loan->update([   
            'employee_id'   => $request->employee_id,
            'jmlloan'   => $request->jmlloan,
            'pluslimitloan'   => '0',
            'minlimitloan'   => '0',
            'saldolimitloan'   => '0',
            'tglloan'   => $tglloan,
        ]);
        // dd($request);
        
        return redirect('/employeesdetail/'.$id)->with(['success' => 'Data Berhasil Dihapus!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $loan = Loan::findOrFail($id);

        $loan->delete();
        return redirect('/employeesdetail/'.$id)->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
