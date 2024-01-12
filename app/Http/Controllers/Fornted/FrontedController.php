<?php

namespace App\Http\Controllers\Fornted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\websitelogo;
use App\Models\Customer;

class FrontedController extends Controller
{
    public function index()
    {
        $return_data = array();       
        $return_data['aboutus'] = AboutUs::first();
        return view('fronted.index', array_merge($return_data));
    }

    public function faq()
    {
        return view('fronted.faq');
    }

    public function howitswork()
    {
        return view('fronted.howitswork');
    }
    public function customerLogin()
    {
        return view('fronted.customer_login');
    }
    function checklogin(Request $request)
    {
        
     $this->validate($request,[
      'username'   => 'required',
      'password'  => 'required'
     ],$messages = [
        'username.required' => 'Email is required!',
        'password.required' => 'Password is required!',
     ]);

     
      $user  = $request->get('username');
      $pass = $request->get('password');
     

     $customers = Customer::get();
    
     foreach ($customers as $customer) {
        $username = $customer->username;
        $password = $customer->password;
     }
     
    // print_r($olddata);print_r($user_data);exit;
     if($user == $username && $pass == $password)
     {
      return redirect('/')->with('alert-success', 'You are now logged in.');
     }
     else
     {
        return redirect('/')->with('alert-danger', 'Login Failed');
     }

    }
}
