<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\howitworkstep;
use App\Models\howitwork;

class HowitworkController extends Controller
{
    public function index()
    {
        $howitwork=howitwork::first();
        $howitworkstep=howitworkstep::get();
        return view('admin.howitwork.index',compact('howitwork','howitworkstep'));
    }

    public function addhowitwork(Request $request)
    {
        $howitworkstep =  new howitworkstep();
        $howitworkstep->title =$request->input('title');
        $howitworkstep->save();
        return redirect()->route('adminhowitswork');
    }

    public function edithowitsworkstep(Request $request)
    {
        $howitworkstep = howitworkstep::find($request->id);
        $howitworkstep->title =$request->input('title');
        $howitworkstep->save();
        return redirect()->route('adminhowitswork');
    }

    public function updatehowitswork(Request $request)
    {
        $howitwork = howitwork::find($request->id);
        $howitwork->title1 =$request->input('title1');
        $howitwork->title2 =$request->input('title2');
        $howitwork->title3 =$request->input('title3');
        $howitwork->imagetext =$request->input('imagetext');
        $imageFiles = $request->image;

        if ($imageFiles) {

            $extension = $imageFiles->getClientOriginalExtension();
            $dir = public_path() . '/uploads/howitswork/';
            $filename = uniqid() . '_' . time() . '.' . $extension;
            $imageFiles->move($dir, $filename);
            $howitwork->image = $filename;

        }
        $howitwork->save();
        return redirect()->route('adminhowitswork');
    }
}
