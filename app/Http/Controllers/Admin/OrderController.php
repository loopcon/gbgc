<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;

class OrderController extends Controller
{
    public function order()
    {
        $order=Order::with('customer')->get();
        return view('admin.order.list',compact('order'));
    }

    public function updatepaymentstatus(Request $request)
    {
        // dd($request->all());
        $order = Order::find($request->id);
        $order->note =$request->note;
        $order->status =$request->status;
        $order->save();

        if($request->status == 1)
        {
             $customer = Customer::where('id',$order->customer_id)
                            ->update(['access_type'=>'paid',
                                    'payment'=>1]);
        }
       
        return redirect()->route('adminorder')->with('success','Status Update Successfully.');
    }
}
