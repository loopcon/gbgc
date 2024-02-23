<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::where([['status','!=',4],['access_type','!=','requestforadditionaluser'],['access_type','!=','additionaluser']])->get();
        $return_data['customer'] = $customer;
        return view('admin.customer.list', array_merge($return_data));
    }
    /**
     * Remove the specified resource from storage.
     */

    public function changeStatus($id, $status)
    {

        $customerfind = Customer::where('id', $id)->first();
        $customer=Customer::find($id);
        if($customerfind->access_type == 'requestforfree'){$customer->access_type='free';}
        elseif($customerfind->access_type == 'requestforpaid'){$customer->access_type='paid';}
        elseif($customerfind->access_type == 'requestforadditionaluser'){$customer->access_type='additionaluser';}
        $customer->status = 1;
        $customer->save();
        return redirect('admin/user')->with('success', trans('User status changed successfully.'));
    }

    public function createIdPassword(string $id)
    {
        
        $return_data = array();
        $detail = Customer::find($id);
        $return_data['detail'] = $detail;

        return view('admin.customer.form', array_merge($return_data));
    }

    public function updatePassword(Request $request, string $id)
    {
        $this->validate($request, [
                'password' => ['required','min:8'],
            ],[
                'required'  => trans('The :attribute field is required.')
            ]
        );

        $otp='123456';
        $customer = Customer::find($id);
        $customer->password = Hash::make($request->password);
        $customer->otp=$otp;
        $customer->save();

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
            return redirect('admin/user')->with('success', trans('User ID Password Created Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }

    public function cancelRequest(string $id)
    {
         $customer = Customer::where('id', $id)->update(array('status' => 3));
        if($customer) {
            return redirect('admin/user')->with('success', trans('User Request Cacnceled Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }

    public function destroy(string $id)
    {
         $customer = Customer::where('id', $id)->update(array('status' => 4));
        if($customer) {
            return redirect('admin/user')->with('success', trans('User Deleted Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }
    
}
