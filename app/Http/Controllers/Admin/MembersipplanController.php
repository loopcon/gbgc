<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Membershipplan;

class MembersipplanController extends Controller
{
    public function index()
    {
        $membershipplan=Membershipplan::where(['status'=>1])->get();
        return view('admin.membershipplan.index',compact('membershipplan'));
    }

    public function add()
    {
        return view('admin.membershipplan.add');
    }

    public function store(Request $request)
    {
        $membershipplan= new Membershipplan();
        $membershipplan->name=$request->input('name');
        $membershipplan->short_description=$request->input('short_description');
        $membershipplan->long_description=$request->input('long_description');
        $membershipplan->price=$request->input('price');
        $membershipplan->save();
        if($membershipplan) {
            return redirect('admin/membership')->with('success', trans('Membership Added Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }

    public function edit($id)
    {
       $membershipplan=Membershipplan::where('id',$id)->first();
        return view('admin.membershipplan.edit',compact('membershipplan'));
    }

    public function update(Request $request)
    {
        $membershipplan= Membershipplan::find($request->id);
        $membershipplan->name=$request->input('name');
        $membershipplan->short_description=$request->input('short_description');
        $membershipplan->long_description=$request->input('long_description');
        $membershipplan->price=$request->input('price');
        $membershipplan->save();
        if($membershipplan) {
            return redirect('admin/membership')->with('success', trans('Membership Updated Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }
    public function delete($id)
    {
       $membershipplan = Membershipplan::where('id',$id)->update(['status'=>0]);
        if($membershipplan) {
            return redirect('admin/membership')->with('success', trans('Membership deleted Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }
}
