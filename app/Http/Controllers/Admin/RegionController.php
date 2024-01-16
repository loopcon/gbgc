<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $return_data = array();
        $region = Region::get();
        $return_data['region'] = $region;
        return view('admin.region.list', array_merge($return_data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.region.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'countryCode' => ['required','max:2','regex:/^[A-Z]+$/u'],
                'name' => ['required'],
            ],[
                'required'  => trans('The :attribute field is required.'),
                'regex'  => trans('The :attribute field format is only upper-case'),
            ]
        );
        $region = new Region();
        $fields = array('countryCode', 'name');
        foreach($fields as $key => $value){
            $region->$value = isset($request->$value) && $request->$value != '' ? $request->$value : NULL; 
        }
        $region->save();

        if($region){
            return redirect('admin/region')->with('success', trans('Region Added Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $return_data = array();
        $record = Region::find($id);
        $return_data['record'] = $record;
        return view('admin.region.form', array_merge($return_data));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
                'countryCode' => ['required','max:2','regex:/^[A-Z]+$/u'],
                'name' => ['required'],
            ],[
                'required'  => trans('The :attribute field is required.'),
                'regex'  => trans('The :attribute field format is only upper-case'),
            ]
        );
        $region = Region::find($id);
        $fields = array('countryCode', 'name');
        foreach($fields as $key => $value){
            $region->$value = isset($request->$value) && $request->$value != '' ? $request->$value : NULL; 
        }
        $region->save();
        if($region) {
            return redirect('admin/region')->with('success', trans('Region Updated Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $region = Region::where('id', $id)->delete();
        if($region) {
            return redirect('admin/region')->with('success', trans('Region Deleted Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }
}
