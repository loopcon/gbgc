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
        $membershipplan->details=$request->input('details');
        $membershipplan->price=$request->input('price');
        $membershipplan->save();
        return redirect()->route('adminmembership');
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
        $membershipplan->details=$request->input('details');
        $membershipplan->price=$request->input('price');
        $membershipplan->save();
        return redirect()->route('adminmembership');
    }
    public function delete($id)
    {
        Membershipplan::where('id',$id)->update(['status'=>0]);
        return redirect()->route('adminmembership');
    }
}
