<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Cookie;
use Illuminate\Support\Facades\Validator;
use App\Models\NewsLetter;

class FrontLoginController extends Controller
{
    
    public function registration(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required', 'unique:customers,email', 'email'],
            'phone' => ['required', 'numeric','digits:10'],
        ], [
            'required' => trans('The :attribute field is required.'),
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'errors' => $validator->errors()]);
        }

        $customer = new Customer();
        $customer->name=$request->input('name');
        $customer->job_title=$request->input('job_title');
        $customer->phone=$request->input('phone');
        $customer->email=$request->input('email');
        $customer->bussiness_name=$request->input('bussiness_name');
        $customer->business_wider_group=$request->input('business_wider_group');
        $customer->access_type= 'free';
        $customer->save();

        if($customer){
            return response()->json(['status' =>1, 'msg' => 'You Account Request Sent Successfully.']);
        }
        else
        {
            return response()->json(['status' =>0, 'errormsg' => 'Something went Wrong Please Try again.']);
        }

        // $customer = new Customer();
        // $fields = ['name', 'job_title', 'bussiness_name','bussiness_size','email','phone'];
        // foreach ($fields as $value) {
        //     $customer->$value = isset($request->$value) && $request->$value != '' ? $request->$value : null;
        // }
        // $customer->email_verify = 0;
        // $customer->access_type = "free";
        // $customer->save();
        // if($customer){
        //     return redirect('/')->with('alert-success', 'Request Sent Successfully!');
        // } else {
        //     return redirect()->with('registration-error', 'Something went wrong please try again...');
        // }
    }

    public function checklogin(Request $request)
    {
            
        $this->validate($request,[
        'email1'   => 'required',
        'password'  => 'required'
        ],$messages = [
            'email1.required' => 'Email is required!',
            'password.required' => 'Password is required!',
        ]);

        
        $user  = $request->get('email1');
        $pass = $request->get('password');
        $customer = Customer::where([['email', '=', $request->email1]])->first();  
        $customers = Customer::where([['email', '=', $request->email1],['password', '!=', ""],['email_verify', '=', 1],['status','=',1]])->first();

        if(empty($customer)){
            return redirect('/')->with('alert-danger', 'Your have not account, please Register First');
        }

        if(isset($customers)){
            if (Auth::guard('customers')->attempt(['email' => $request->email1, 'password' => $request->password])) 
            {
                $customer_id = Auth::guard('customers')->id();
                $customer_detail = Customer::where([['id', '=', $customer_id]])->first();
                Cookie::queue(Cookie::forget('email'));
                Cookie::queue(Cookie::forget('password'));

                session()->put('customerInfo', $customer_detail);
                return redirect('dashboard')->with('success', 'You are now logged in.');
            }
            else
            {
                return redirect('/')->with('alert-danger', 'Username and password are Invalid.');
            } 
        }
        else{
            return redirect('/')->with('alert-danger', 'Your Account not Activeted by Admin');
        }
         
        
    }  

    public function logout()
    {
        session()->forget('customerInfo');
        Auth::guard('customers')->logout();
        return redirect('/')->with('alert-success', 'You are loged out');;
    }
    public function myAccount()
    {
        $return_data = array();       
        $customer_id = Auth::guard('customers')->id();
        $customer_detail = Customer::where([['id', '=', $customer_id]])->first();
        $return_data['customer_detail'] = $customer_detail;
        return view('frontend.myaccount', array_merge($return_data));
    }
    public function updateMyAccount(Request $request)
    {
        $customer_detail = Customer::find($request->id);
        $customer_detail->name = $request->input('name');
        $customer_detail->job_title = $request->input('job_title');
        $customer_detail->bussiness_name = $request->input('bussiness_name');
        $customer_detail->bussiness_size = $request->input('bussiness_size');

        // if ($request->password) {
        //     $user->password = Hash::make($request->password);
        // }
        $customer_detail->save();
        if($customer_detail){
            return redirect('myaccount')->with('success', 'Profile updated Successfully!');
        } else {
            return redirect()->with('register-error', 'Something went wrong please try again...');
        }
    }

    public function dashboard() 
    {
        $return_data = array();
        $customer_id = Auth::guard('customers')->id();
        $customer= Customer::where('id',$customer_id)->first();
        return view('frontend.dashboard.index',compact('customer'));
    }
    public function registrationUpdate(Request $request)
    {
        // $this->validate($request, [
        //         'name' => ['required'],
        //         'job_title' => ['required'],
        //         'bussiness_name' => ['required'],
        //         'bussiness_size' => ['required'],
        //         'additional_user_no' => ['required'],
        //         'billing_address' => ['required'],
        //     ],[
        //         'required'  => trans('The :attribute field is required.')
        //     ]
        // );
        $customer=Customer::find($request->id);
        $customer->name=$request->input('name');
        $customer->job_title=$request->input('job_title');
        $customer->phone=$request->input('phone');
        $customer->email=$request->input('email');
        $customer->bussiness_name=$request->input('bussiness_name');
        $customer->business_wider_group=$request->input('business_wider_group');
        $customer->additional_details=$request->input('additional_details');
        $customer->additional_user_no=$request->input('additional_user_no');
        $customer->access_type = "paid";
        $customer->status = 0;
        $customer->save();

        // mail-send to admin for accept user paid request.
        // $data = [
        //     'email'   => $request->input('email'), 
        // ];

        // Mail::send(['text'=>'mail'], $data,function($message)  use ($data){
        //     $message->to(gbgc@gmail.com, 'Admin of GBGC')->subject
        //         ('Hello Admin, user sent paid request please, check it.');
        //     $message->from($data['email'],'Customer of GBGC');
        // });

        // for old register

        // if ($customer) {
        //     return response()->json(['status' => 1]);
        // }

        if($customer) {
            return response()->json(['status' =>1, 'msg' => 'We will send you an invoice within 2 business days. This wil Provide the information to pay.']);
        } else {
           return response()->json(['status' =>0, 'errormsg' => 'Something went Wrong Please Try again.']);
        }
    }

}
