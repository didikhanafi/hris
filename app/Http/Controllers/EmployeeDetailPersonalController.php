<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Models\EmployeesDetail;
use Illuminate\Http\Request;

class EmployeeDetailPersonalController extends Controller
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
    public function update(Request $request,$id)
    {
        $karyawan = Employees::findOrFail($id);
        // dd($karyawan);

        $karyawan->update([   
            'ktp'   => $request->ktp,
            'ktpalamat'   => $request->ktpalamat,
            'ktpprovensi'   => $request->ktpprovensi,
            'ktpkota'   => $request->ktpkota,
            'religion_id'   => $request->religion_id,
            'statusnikah'   => $request->statusnikah,
            'pendidikan'   => $request->pendidikan,
        ]);
        
        return redirect('/employeesdetail/'.$id)->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
