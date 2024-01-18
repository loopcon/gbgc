<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomepageBanner;
use File;

class HomepageBannerController extends Controller
{
    public function index()
    {
        $return_data = array();
        $record = HomepageBanner::first();
        $return_data['record'] = $record;
        return view('admin.homepage_banner.form', array_merge($return_data));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
                'title' => ['required'],
                'description' => ['required'],
            ],[
                'required'  => trans('The :attribute field is required.')
            ]
        );
        $banner = HomepageBanner::find($request->id);

        $old_image = isset($banner->image) ? $banner->image : NULL;
        if($old_image){
            $old_image = File::delete('/uploads/homepagebanner/'.$old_image);
        }

        $imageFiles = $request->file('image');  

        $fields = array('title', 'description');
        foreach($fields as $key => $value){
            $banner->$value = isset($request->$value) && $request->$value != '' ? $request->$value : NULL; 
        }

        if ($imageFiles) {

            $extension = $imageFiles->getClientOriginalExtension();
            $dir = public_path() . '/uploads/homepagebanner/';
            $filename = uniqid() . '_' . time() . '.' . $extension;
            $imageFiles->move($dir, $filename);
            $banner->image = $filename;
        }
        // $banner->description = strip_tags($request->description);
        $banner->save();
        if($banner) {
            return redirect('admin/homepagebanner')->with('success', trans('Banner Updated Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }
    
}
