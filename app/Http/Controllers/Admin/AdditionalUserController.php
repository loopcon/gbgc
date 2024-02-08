<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdditionalUser;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;


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
        $accepted_user = AdditionalUser::where('parent_id',$additonaluser->id)->get();
        $return_data['accepted_user'] = $accepted_user;
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
        $findcustomer = Customer::where('id',$request->id)->first();
        $additionaluser = Customer::find($id);
        $additionaluser->accept_additional_user = $findcustomer->payment_additional_user + $request->accept_additional_user;
        $additionaluser->remainadditional_user = $request->additional_user_no - $request->accept_additional_user;
        $additionaluser->remain_payment_additional_user=$request->accept_additional_user;
        $additionaluser->save();

        if($additionaluser) {
            return redirect('admin/additional-user')->with('success', trans('Additional User Accepted Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }

    public function createIdPassword(string $id)
    {
        $return_data = array();
        $additionaluser = AdditionalUser::find($id);
        $return_data['additionaluser'] = $additionaluser;
        $customer = Customer::where('id',$additionaluser->customer_id)->first();
        $return_data['customer'] = $customer;
        return view('admin.additional_user.idpassword-form', array_merge($return_data));
    }

    public function updatePassword(Request $request, string $id)
    {
        $this->validate($request, [
                'password' => ['required','min:8'],
            ],[
                'required'  => trans('The :attribute field is required.')
            ]
        );
        $additionaluser = AdditionalUser::find($id);
        $customer = Customer::where('id',$additionaluser->customer_id)->update([
            'password' => Hash::make($request->password),
            'email_verify' => 1,
        ]);
        
        

        // User mail-sent for id-password

        // $data = [
        //     'email'   => $request->input('email'), 
        //     'password'   => $request->input('password'), 
        // ];

        // Mail::send(['text'=>'mail'], $data,function($message)  use ($data){
        //     $message->to($data['email'], 'Customer of GBGC')->subject
        //         ('Hello Dear Customer, your user-Id is' .$data['email']. ' and password is' .$data['password']. 'for GBGC Login');
        //     $message->from('loopcon16@gmail.com','GBGC');
        // });

        // end mail-sent

        if($customer) {
            return redirect('admin/additional-user')->with('success', trans('Additional User ID Password Created Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }
}
