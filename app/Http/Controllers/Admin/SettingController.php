<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\websitelogo;
use App\Models\GeneralSetting;
use File;

class SettingController extends Controller
{
    public function websitelogo()
    {
        $websitelogo=websitelogo::first();
        return view('admin.settings.websitelogo',compact('websitelogo'));
    }

    public function websitelogoupdate(Request $request)
    {
        $websitelogo=websitelogo::find($request->id);
        $imageFiles = $request->file('logo');
        $imagefavicon = $request->file('favicon');
        if ($imageFiles) {
                $extension = $imageFiles->getClientOriginalExtension();
                $dir = public_path() . '/uploads/settings/';
                $filename = uniqid() . '_' . time() . '.' . $extension;
                $imageFiles->move($dir, $filename);
                $websitelogo->logo = $filename;
            }
        if ($imagefavicon) {
                $extension = $imagefavicon->getClientOriginalExtension();
                $dir = public_path() . '/uploads/settings/';
                $filename = uniqid() . '_' . time() . '.' . $extension;
                $imagefavicon->move($dir, $filename);
                $websitelogo->favicon = $filename;
        }
        $websitelogo->save();
        return redirect()->route('websitelogo');
    }

    public function generalSetting()
    {
        $return_data = array(); 
        $generalsetting = GeneralSetting::first();
        $return_data['generalsetting'] = $generalsetting;
        return view('admin.settings.generalsetting', array_merge($return_data));
    }

    public function generalSettingUpdate(Request $request)
    {
        $this->validate($request, [
                // 'image' => ['required'],
                'site_name' => ['required'],
                'phone' => ['required','numeric'],
            ],[
                'required'  => trans('The :attribute field is required.')
            ]
        );
        $generalsetting = GeneralSetting::find($request->id);
        
        $old_logo = isset($generalsetting->logo) ? $generalsetting->logo : NULL;
        if($old_logo){
            $old_logo = File::delete('/uploads/generalsetting/'.$old_logo);
        }
        $old_fevicon = isset($generalsetting->fevicon) ? $generalsetting->fevicon : NULL;
        if($old_fevicon){
            $old_fevicon = File::delete('/uploads/generalsetting/'.$old_fevicon);
        }

        $logoFiles = $request->file('logo');
        $feviconFiles = $request->file('fevicon');

        $generalsetting->site_name = $request->input('site_name');
        $generalsetting->phone = $request->input('phone');
        $generalsetting->address = $request->input('address');
        $generalsetting->aboutus = strip_tags($request->input('aboutus'));
        $generalsetting->contact_email = $request->input('contact_email');
        $generalsetting->linkedin = $request->input('linkedin');
        $generalsetting->copyrignt_year = $request->input('copyrignt_year');
        $generalsetting->admin_email = $request->input('admin_email');
        $generalsetting->admin_password = $request->input('admin_password');
        $generalsetting->seo_title = $request->input('seo_title');
        $generalsetting->meta_keyword = $request->input('meta_keyword');
        $generalsetting->meta_description = strip_tags($request->input('meta_description'));
        $generalsetting->canonical_tag = strip_tags($request->input('canonical_tag'));
        $generalsetting->google_tag_manager = strip_tags($request->input('google_tag_manager'));

        if ($logoFiles) {
            
            $extension = $logoFiles->getClientOriginalExtension();
            $dir = public_path() . '/uploads/generalsetting/';
            $filename = uniqid() . '_' . time() . '.' . $extension;
            $logoFiles->move($dir, $filename);
            $generalsetting->logo = $filename;
        }

         if ($feviconFiles) {
            
            $extension = $feviconFiles->getClientOriginalExtension();
            $dir = public_path() . '/uploads/generalsetting/';
            $filename = uniqid() . '_' . time() . '.' . $extension;
            $feviconFiles->move($dir, $filename);
            $generalsetting->fevicon = $filename;
        }
        
        $generalsetting->save();

        if($generalsetting){
            return redirect()->route('generalsetting')->with('success', trans('Setting updated Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }
}
