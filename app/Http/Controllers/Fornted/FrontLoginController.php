<?php

namespace App\Http\Controllers\Fornted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class FrontLoginController extends Controller
{
    public function registration(Request $request)
    {
        $this->validate($request, [
                'first_name' => ['required'],
                'last_name' => ['required'],
                'email' => ['required','unique:customers,email','email'],
                'password' => ['required','required_with:confirm_password','same:confirm_password','min:8'],
                'confirm_password' => ['required','min:8'],
            ],[
                'required'  => trans('The :attribute field is required.'),
                'same'  => trans('Password and Confirm Password must be same.'),
            ]
        );
        $customer = new Customer();
        $fields = array('first_name','last_name', 'email','password','confirm_password');
        foreach($fields as $key => $value){
            $customer->$value = isset($request->$value) && $request->$value != '' ? $request->$value : NULL; 
        }

        /* Email sending */

        // $data = [
        //     'name'   => $request->input('name'), 
        //     'email'   => $request->input('email'), 
        //     'username' => $request->input('username'),
        //     'password'    => $request->input('password')
        // ];
   
        // Mail::send(['text'=>'mail'], $data, function($message)  use ($data) {
        //     $message->to($data['email'], 'Customer of GBGC')->subject
        //         ('Hello Dear Customer, your Username is'. $data['username'] .'and Password is '.$data['password']);
        //     $message->from('loopcon16@gmail.com','Loopcon Technology');
        // });

        /* End Email sending */

        $customer->save();

        if($customer){
            return redirect('/')->with('alert-success', 'Registration Successfull!');
        } else {
            return redirect()->back()>with('alert-danger', 'Something went wrong please try again...');
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
     
     $customers = Customer::get();
    
     foreach ($customers as $customer) {
        $email = $customer->email;
        $password = $customer->password;
     }
     
    // print_r($olddata);print_r($user_data);exit;
     if($user == $email && $pass == $password)
     {
      return redirect('/')->with('alert-success', 'You are now logged in.');
     }
     else
     {
        return redirect('/')->with('alert-danger', 'Username and pasword are Invalid.');
     }

    }
}
