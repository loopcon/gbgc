<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdditionalUser;
use App\Models\Customer;

class AdditionalUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $return_data = array();  
        $additional_user = Customer::where('access_type','paid')->get();
        $return_data['additional_user'] = $additional_user;
        return view('admin.additional_user.list', array_merge($return_data));
    }

    public function additionalUserCreate(string $id)
    {
        $return_data = array();
        $additonaluser = Customer::find($id);
        $return_data['additonaluser'] = $additonaluser;
        return view('admin.additional_user.form', array_merge($return_data));
    }

    public function additionalUserStore(Request $request, string $id)
    {
        $this->validate($request, [
                'accept_additional_user' => ['required','lte:additional_user_no'],
            ],[
                'required'  => trans('The :attribute field is required.')
            ]
        );

        $additionaluser = Customer::find($id);
        $additionaluser->accept_additional_user = $request->accept_additional_user;
        $additionaluser->save();

        if($additionaluser) {
            return redirect('admin/additional-user')->with('success', trans('Additional User Accepted Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
