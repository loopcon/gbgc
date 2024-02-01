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
        //for old register

        // dd($request->all());
        // $validator = Validator::make($request->all(), [
        //     'name' => ['required'],
        //     'job_title' => ['required'],
        //     'bussiness_name' => ['required'],
        //     'bussiness_size' => ['required'],
        //     'email' => ['required', 'unique:customers,email', 'email'],
        //     'phone' => ['required', 'numeric','digits:10'],
        // ], [
        //     'required' => trans('The :attribute field is required.'),
        // ]);

        // if ($validator->fails()) {
        //     return response()->json(['status' => 0, 'errors' => $validator->errors()]);
        // }
        // if($request->subscribe ==1)
        // {   
        //     $checknewsletter=NewsLetter::where('newsletter_email',$request->email)->first();
        //     if($checknewsletter ==null)
        //     {
        //         $newsletter=new NewsLetter();
        //         $newsletter->newsletter_email=$request->input('email');
        //         $newsletter->save(); 
        //     }else{
        //        return response()->json(['status' => 0, 'errorsubscribe' => 'You are already Subscribe']);
        //     }
        // }

        $this->validate($request, [
                'name' => ['required'],
                'job_title' => ['required'],
                'bussiness_name' => ['required'],
                'bussiness_size' => ['required'],
                'email' => ['required', 'unique:customers,email', 'email'],
                'phone' => ['required', 'numeric','digits:10'],
            ],[
                'required'  => trans('The :attribute field is required.')
            ]
        );

        $customer = new Customer();
        $fields = ['name', 'job_title', 'bussiness_name','bussiness_size','email','phone'];
        foreach ($fields as $value) {
            $customer->$value = isset($request->$value) && $request->$value != '' ? $request->$value : null;
        }
        $customer->access_type = 0;
        $customer->access_type = "free";
        $customer->save();

        // mail-send to admin for accept ruser request.
        // $data = [
        //     'email'   => $request->input('email'), 
        // ];

        // Mail::send(['text'=>'mail'], $data,function($message)  use ($data){
        //     $message->to(gbgc@gmail.com, 'Admin of GBGC')->subject
        //         ('Hello Admin, New user create account check it');
        //     $message->from($data['email'],'Customer of GBGC');
        // });

        // for old register

        // if ($customer) {
        //     return response()->json(['status' => 1]);
        // } 
        if($customer){
            return redirect('/')->with('alert-success', 'Request Sent Successfully!');
        } else {
            return redirect()->with('registration-error', 'Something went wrong please try again...');
        }
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
        
        $customers = Customer::where([['email', '=', $request->email1],['password', '!=', ""]])->first();
        
        if(isset($customers)){
            if (Auth::guard('customers')->attempt(['email' => $request->email1, 'password' => $request->password])) 
            {
                $customer_id = Auth::guard('customers')->id();
                $customer_detail = Customer::where([['id', '=', $customer_id]])->first();
                Cookie::queue(Cookie::forget('email'));
                Cookie::queue(Cookie::forget('password'));

                session()->put('customerInfo', $customer_detail);
                return redirect('myaccount')->with('alert-success', 'You are now logged in.');
            }
            else
            {
                return redirect('/')->with('alert-danger', 'Username and password are Invalid.');
            } 
        }
        else{
            return redirect('/')->with('alert-danger', 'Username and password are Invalid.');
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
        $customer_detail->first_name = $request->input('first_name');
        $customer_detail->last_name = $request->input('last_name');
        $customer_detail->email = $request->input('email');

        // if ($request->password) {
        //     $user->password = Hash::make($request->password);
        // }
        $customer_detail->save();
        if($customer_detail){
            return redirect('myaccount')->with('alert-success', 'Profile updated Successfully!');
        } else {
            return redirect()->with('register-error', 'Something went wrong please try again...');
        }
    }
}
