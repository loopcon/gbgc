<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::get();
        $return_data['customer'] = $customer;
         return view('admin.customer.list', array_merge($return_data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customer.form');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'name' => ['required'],
                'email' => ['required'],
                'username' => ['required'],
                'password' => ['required'],
            ],[
                'required'  => trans('The :attribute field is required.')
            ]
        );
        $customer = new Customer();
        $fields = array('name', 'email','username','password');
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
            return redirect('admin/customer')->with('success', trans('Customer Added Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $customer = Customer::where('id', $id)->delete();
        if($customer) {
            return redirect('admin/customer')->with('success', trans('Customer Deleted Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }
    
}
