<?php

namespace App\Http\Controllers\Fornted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StaticPage;
use App\Models\FAQ;
use App\Models\websitelogo;
use App\Models\Customer;
use App\Models\NewsLetter;
use Auth;

class FrontedController extends Controller
{
    public function index()
    {
        $return_data = array();       
        $return_data['staticpage'] = StaticPage::get();
        return view('fronted.index', array_merge($return_data));
    }

    public function faq()
    {
        $return_data = array();       
        $return_data['faq'] = FAQ::get();
        return view('fronted.faq', array_merge($return_data));
    }

    public function howitswork()
    {
        return view('fronted.howitswork');
    }
    public function customerLogin()
    {
        return view('fronted.customer_login');
    }
    public function checklogin(Request $request)
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

    public function logout()
    {
     $customers = Customer::get();
     $customers::logout();
     return redirect('/')->with('alert-success', 'You are now logged out.');
    }

    public function storeNewsletter(Request $request)
    {
        $this->validate($request, [
                'newsletter_email' => ['required'],
            ],[
                'required'  => trans('The :attribute field is required.')
            ]
        );
        $newsletter = new NewsLetter();

        $fields = array('newsletter_email');
        foreach($fields as $key => $value){
            $newsletter->$value = isset($request->$value) && $request->$value != '' ? $request->$value : NULL; 
        }

        $newsletter->save();

        if($newsletter){
            return redirect('/')->with('success', trans('Your Mail Sent Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }  
    }
}
