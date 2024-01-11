<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use DataTables;
use File;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $return_data = array();       
        $return_data['aboutus'] = AboutUs::first();
        return view('admin.aboutus.form', array_merge($return_data));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
                // 'image' => ['required'],
                'name' => ['required'],
                'title' => ['required'],
                'description' => ['required'],
            ],[
                'required'  => trans('The :attribute field is required.')
            ]
        );
        $aboutus = AboutUs::find($request->id);
        
        $old_image = isset($aboutus->image) ? $aboutus->image : NULL;
        if($old_image){
            $old_image = File::delete('/uploads/aboutus/'.$old_image);
            // print_r($old_image);exit;
        }

        $imageFiles = $request->file('image');

        $aboutus->name = $request->input('name');
        $aboutus->title = $request->input('title');
        $aboutus->description = $request->input('description');

        if ($imageFiles) {
            
            $extension = $imageFiles->getClientOriginalExtension();
            $dir = public_path() . '/uploads/aboutus/';
            $filename = uniqid() . '_' . time() . '.' . $extension;
            $imageFiles->move($dir, $filename);
            $aboutus->image = $filename;
        }

        $aboutus->save();

        if($aboutus){
            return redirect()->route('aboutus')->with('success', trans('About Us updated Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }

}
