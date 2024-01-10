<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use DataTables;

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

        $aboutus->name = $request->input('name');
        $aboutus->title = $request->input('title');
        $aboutus->description = $request->input('description');
        // if($request->hasFile('image')) {
        //     $newName = fileUpload($request, 'image', 'uploads/artical');
        //     $artical->image = $newName;
        // }

        $aboutus->save();

        if($aboutus){
            return redirect()->route('aboutus')->with('success', trans('About Us updated Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }
}
