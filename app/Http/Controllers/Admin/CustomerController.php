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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $customer = Customer::where('id', $id)->delete();
        if($customer) {
            return redirect('admin/user')->with('success', trans('User Deleted Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }
    
}
