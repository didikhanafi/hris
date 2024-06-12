<?php

namespace App\Http\Controllers;

use App\Models\SettingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        $settingwebcom=SettingModel::where('id',1)->first();
        return view('setting.setting',[
            'slide'=>'setting',
            'title'=>'Setting',
            'settingwebcom'=>$settingwebcom,
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
    public function show(SettingModel $settingModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SettingModel $settingModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'webname'=> 'required',
            'uploadlogo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'uploadfavicon' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        
        $settingweb = SettingModel::findOrFail($id);

        
        // dd($request);
        if ($request->hasFile('uploadlogo')) {
            if ($settingweb->lightlogo) {
                Storage::delete($settingweb->lightlogo);
            }
            $uploadlogo = $request->file('uploadlogo')->store('uploadlogo','public');
            $settingweb->lightlogo = $uploadlogo;
        }

        if ($request->hasFile('uploadfavicon')) {
            if ($settingweb->favicon) {
                Storage::delete($settingweb->favicon);
            }
            $uploadfavicon = $request->file('uploadfavicon')->store('uploadfavicon','public');
            $settingweb->favicon = $uploadfavicon;
        }
        // dd($settingweb);
        $settingweb->update([   
            'webname'   => $request->webname,
            'lightlogo'   => $uploadlogo,
            'favicon'   => $uploadfavicon,
        ]);
        
        return redirect('/setting')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SettingModel $settingModel)
    {
        //
    }
}
