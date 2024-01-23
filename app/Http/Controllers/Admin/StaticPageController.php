<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StaticPage;
use File;

class StaticPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $return_data = array();
        $staticpage = StaticPage::get();
        $return_data['staticpage'] = $staticpage;
        return view('admin.static_page.list', array_merge($return_data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.static_page.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'title' => ['required'],
                'slug' => ['required'],
                'description' => ['required'],
                'image' => ['mimes:png,jpg,webp','dimensions:max_width=1920,max_height=1080']
            ],[
                'required'  => trans('The :attribute field is required.'),
                'dimensions' => trans('Image size should not be more than 1920 x 1080 px'),
            ]
        );
        $staticpage = new StaticPage();
        $imageFiles = $request->file('image');

        $fields = array('title', 'slug','description');
        foreach($fields as $key => $value){
            $staticpage->$value = isset($request->$value) && $request->$value != '' ? $request->$value : NULL; 
        }

        if ($imageFiles) {
            
            $extension = $imageFiles->getClientOriginalExtension();
            $dir = public_path() . '/uploads/staticpage/';
            $filename = uniqid() . '_' . time() . '.' . $extension;
            $imageFiles->move($dir, $filename);
            $staticpage->image = $filename;
        }

        $staticpage->description = strip_tags($request->description);
        $staticpage->save();

        if($staticpage){
            return redirect('admin/staticpage')->with('success', trans('Page Added Successfully!'));
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
        $record = StaticPage::find($id);
        $return_data['record'] = $record;
        return view('admin.static_page.form', array_merge($return_data));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
                'title' => ['required'],
                'slug' => ['required'],
                'description' => ['required'],
                'image' => ['mimes:png,jpg,webp','dimensions:max_width=1920,max_height=1080']
            ],[
                'required'  => trans('The :attribute field is required.'),
                'dimensions' => trans('Image size should not be more than 1920 x 1080 px'),
            ]
        );
        $staticpage = StaticPage::find($id);

        $old_image = isset($staticpage->image) ? $staticpage->image : NULL;
        if($old_image){
            $old_image = File::delete('/uploads/staticpage/'.$old_image);
        }

        $imageFiles = $request->file('image');

        $fields = array('title', 'slug','description');
        foreach($fields as $key => $value){
            $staticpage->$value = isset($request->$value) && $request->$value != '' ? $request->$value : NULL; 
        }

        if ($imageFiles) {
            
            $extension = $imageFiles->getClientOriginalExtension();
            $dir = public_path() . '/uploads/staticpage/';
            $filename = uniqid() . '_' . time() . '.' . $extension;
            $imageFiles->move($dir, $filename);
            $staticpage->image = $filename;
        }

        $staticpage->description = strip_tags($request->description);
        $staticpage->save();
        if($staticpage) {
            return redirect('admin/staticpage')->with('success', trans('Page Updated Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $staticpage = StaticPage::where('id', $id)->delete();
        if($staticpage) {
            return redirect('admin/staticpage')->with('success', trans('Page Deleted Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }
}
