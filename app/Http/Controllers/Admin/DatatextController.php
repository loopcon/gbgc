<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataText;
use App\Models\Region;

class DatatextController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $return_data = array();
        $datatext = DataText::with('regionDetail')->get();
        $return_data['datatext'] = $datatext;
        return view('admin.datatext.list', array_merge($return_data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $region = Region::get();
        $return_data['region'] = $region;
        return view('admin.datatext.form', array_merge($return_data));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'region_id' => ['required'],
                'title' => ['required'],
                'type' => ['required'],
                'category' => ['required'],
                'sub_category' => ['required'],
                'description' => ['required'],
            ],[
                'required'  => trans('The :attribute field is required.')
            ]
        );
        $datatext = new DataText();
        $fields = array('region_id', 'title','type','category','sub_category','description');
        foreach($fields as $key => $value){
            $datatext->$value = isset($request->$value) && $request->$value != '' ? $request->$value : NULL; 
        }
        $datatext->save();

        if($datatext){
            return redirect('admin/datatext')->with('success', trans('Data Added Successfully!'));
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
        $return_data = array();
        $record = DataText::find($id);
        $return_data['record'] = $record;
        $region = Region::get();
        $return_data['region'] = $region;
        return view('admin.datatext.form', array_merge($return_data));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
                'region_id' => ['required'],
                'title' => ['required'],
                'type' => ['required'],
                'category' => ['required'],
                'sub_category' => ['required'],
                'description' => ['required'],
            ],[
                'required'  => trans('The :attribute field is required.')
            ]
        );
        $datatext = DataText::find($id);
        $fields = array('region_id', 'title','type','category','sub_category','description');
        foreach($fields as $key => $value){
            $datatext->$value = isset($request->$value) && $request->$value != '' ? $request->$value : NULL; 
        }

        $datatext->save();
        if($datatext) {
            return redirect('admin/datatext')->with('success', trans('Data Updated Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));   
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $datatext = DataText::where('id', $id)->delete();
        if($datatext) {
            return redirect('admin/datatext')->with('success', trans('Data Deleted Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }
}