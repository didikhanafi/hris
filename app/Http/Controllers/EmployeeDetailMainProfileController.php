<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeDetailMainProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        
        if($request->employeestatus=='on'){
            $status=1;
        }else{
            $status=0;
        }

        
        $tgllahir=date('Y-m-d',strtotime($request->tgllahir));
        $tglmasuk=date('Y-m-d',strtotime($request->tglmasuk));
        $tglkeluar=date('Y-m-d',strtotime($request->tglkeluar));

        $karyawan->update([   
            'company_id'   => $request->company_id,
            'departements_id'   => $request->departments,
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
            'tglmasuk'   => $tglmasuk,
            'tglkeluar'   => $tglkeluar,
            'statuskontrak'   => $request->statuskontrak,
            'employeestatus'   => $status,
            'position'   => $request->position,
        ]);
        
        return redirect('/employeesdetail')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
