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
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'accept' => ['required'],
            'email' => ['required', 'unique:customers,email', 'email'],
            'password' => ['required', 'required_with:confirm_password', 'same:confirm_password', 'min:8'],
            'confirm_password' => ['required', 'min:8'],
        ], [
            'required' => trans('The :attribute field is required.'),
            'same' => trans('Password and Confirm Password must be the same.'),
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'errors' => $validator->errors()]);
        }
        if($request->subscribe ==1)
        {   
            $checknewsletter=NewsLetter::where('newsletter_email',$request->email)->first();
            if($checknewsletter ==null)
            {
                $newsletter=new NewsLetter();
                $newsletter->newsletter_email=$request->input('email');
                $newsletter->save(); 
            }else{
               return response()->json(['status' => 0, 'errorsubscribe' => 'You are already Subscribe']);
            }
        }
        $password = Hash::make($request->password);
        $customer = new Customer();
        $fields = ['first_name', 'last_name', 'email'];
        foreach ($fields as $value) {
            $customer->$value = isset($request->$value) && $request->$value != '' ? $request->$value : null;
        }
        $customer->password = $password;
        $customer->save();
        if ($customer) {
            return response()->json(['status' => 1]);
        } 
    }

    public function checklogin(Request $request)
    {
        
     $this->validate($request,[
      'email'   => 'required',
      'password'  => 'required'
     ],$messages = [
        'email.required' => 'Email is required!',
        'password.required' => 'Password is required!',
     ]);

     
      $user  = $request->get('email');
      $pass = $request->get('password');
      
    $customers = Customer::where([['email', '=', $request->email]])->first();
    
    //  foreach ($customers as $customer) {
    //     $email = $customer->email;
    //     $password = $customer->password;
    //  }
     
    // print_r($olddata);print_r($user_data);exit;
    //  if(isset($customers) && $user == $customers->email && $pass == $customers->password)
    if (Auth::guard('customers')->attempt(['email' => $request->email, 'password' => $request->password])) 
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
        return redirect('/')->with('alert-danger', 'Username and pasword are Invalid.');
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
