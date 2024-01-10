<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\websitelogo;

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
}
