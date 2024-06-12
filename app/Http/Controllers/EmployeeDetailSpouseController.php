<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeeDetailSpouseController extends Controller
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

        $spousetgllahir=date('Y-m-d',strtotime($request->spousetgllahir));
        $spousetglnikah=date('Y-m-d',strtotime($request->spousetglnikah));
        $karyawan->update([   
            'spousename'   => $request->spousename,
            'spousecity'   => $request->spousecity,
            'spouseprovensi'   => $request->spouseprovensi,
            'spousetempatlahir'   => $request->spousetempatlahir,
            'spousetgllahir'   => $spousetgllahir,
            'spousetglnikah'   => $spousetglnikah,
            'spousejob'   => $request->spousejob,
            'jmlanak'   => $request->jmlanak,
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
