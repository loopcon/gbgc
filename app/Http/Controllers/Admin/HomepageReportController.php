<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomepageReport;
use File;

class HomepageReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $return_data = array();
        $homepagereports = HomepageReport::get();
        $return_data['homepagereports'] = $homepagereports;
        return view('admin.homepage_report.list', array_merge($return_data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.homepage_report.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'title' => ['required'],
                'description' => ['required'],
                'image' => ['required','mimes:png,jpg,webp','dimensions:max_width=1920,max_height=1080'],
                
            ],[
                'required'  => trans('The :attribute field is required.'),
                'dimensions' => trans('Image size should not be more than 1920 x 1080 px'),
            ]
        );
        $homepagereports = new HomepageReport();

        $imageFiles = $request->file('image');  

        $fields = array('title', 'description');
        foreach($fields as $key => $value){
            $homepagereports->$value = isset($request->$value) && $request->$value != '' ? $request->$value : NULL; 
        }

        if ($imageFiles) {

            $extension = $imageFiles->getClientOriginalExtension();
            $dir = public_path() . '/uploads/homepagereport/';
            $filename = uniqid() . '_' . time() . '.' . $extension;
            $imageFiles->move($dir, $filename);
            $homepagereports->image = $filename;
        }
        // $banner->description = strip_tags($request->description);
        $homepagereports->save();
        if($homepagereports) {
            return redirect('admin/homepagereport')->with('success', trans('Reort Added Successfully!'));
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
        $record = HomepageReport::find($id);
        $return_data['record'] = $record;
        return view('admin.homepage_report.form', array_merge($return_data));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
                'title' => ['required'],
                'description' => ['required'],
                'image' => ['mimes:png,jpg,webp','dimensions:max_width=1920,max_height=1080']
            ],[
                'required'  => trans('The :attribute field is required.'),
                'dimensions' => trans('Image size should not be more than 1920 x 1080 px'),
            ]
        );
        $homepagereports = HomepageReport::find($id);

        $old_image = isset($homepagereports->image) ? $homepagereports->image : NULL;
        if($old_image){
            $old_image = File::delete('/uploads/homepagereport/'.$old_image);
        }

        $imageFiles = $request->file('image');  

        $fields = array('title', 'description');
        foreach($fields as $key => $value){
            $homepagereports->$value = isset($request->$value) && $request->$value != '' ? $request->$value : NULL; 
        }

        if ($imageFiles) {

            $extension = $imageFiles->getClientOriginalExtension();
            $dir = public_path() . '/uploads/homepagereport/';
            $filename = uniqid() . '_' . time() . '.' . $extension;
            $imageFiles->move($dir, $filename);
            $homepagereports->image = $filename;
        }
        // $banner->description = strip_tags($request->description);
        $homepagereports->save();
        if($homepagereports) {
            return redirect('admin/homepagereport')->with('success', trans('Report Updated Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $homepagereports = HomepageReport::where('id', $id)->delete();
        if($homepagereports) {
            return redirect('admin/homepagereport')->with('success', trans('Report Deleted Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }
}
