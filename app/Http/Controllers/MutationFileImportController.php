<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Models\Mutation;
use App\Models\SettingModel;
use Illuminate\Http\Request;

class MutationFileImportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mutation = Mutation::with('companies','branches','departements','positions')->get();

        // $lastId = Mutation::count();
        $lastId = Mutation::latest('id')->value('id');
        $nextId = $lastId ? $lastId + 1 : 1;
        $mutationcode = "MT" . str_pad($nextId, 4, '0', STR_PAD_LEFT);
        $datamutation=Mutation::all();
        $settingweb = SettingModel::first();
        // $dataemployees=Employees::with('mutation')->get();
        return view('mutation.mutationfileimport',[
            'settingwebcom'=>$settingweb,
            'slide'=>'mutation',
            'title'=>'Mutation',
            'mutation'=>$mutation,
            'codeno'=>$mutationcode,
            'datamutation'=>$datamutation,
            // 'dataemployees'=>$dataemployees
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
