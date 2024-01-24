<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LevelMaster;

class LevelMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $return_data = array();       
        $level = LevelMaster::get();
        $return_data['level'] = $level;
        return view('admin.level_master.list', array_merge($return_data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $return_data = array();
        $level = LevelMaster::get();
        $return_data['level'] = $level;
        return view('admin.level_master.form', array_merge($return_data));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'title' => ['required'],
                'level_number' => ['required','numeric'],
            ],[
                'required'  => trans('The :attribute field is required.')
            ]
        );
        $level = new LevelMaster();
        $fields = array('title','level_number','level');
        foreach($fields as $key => $value){
            $level->$value = isset($request->$value) && $request->$value != '' ? $request->$value : NULL; 
        }
        $level->parent_id = 0;
        $level->save();

        if($level){
            return redirect('admin/level')->with('success', trans('Level Added Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
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
