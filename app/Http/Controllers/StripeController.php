<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\TempCustomer;
use App\Models\Customer;
use Session;

class StripeController extends Controller
{
    public function stripe(Request $request)
    {
       // dd($request->all());
       $checkpayment =Order::where('customer_id',$request->customerid)->where(['active_status'=>1])->first();

        if($checkpayment == null)
        {

            if($request->paymentmethod == "offline")
            {    
                if($request->usertype =='freetopro')
                {
                    $customer = Customer::find($request->customerid);
                    $customer->access_type= 'requestforpaid';
                    $customer->save();

                    $order = new Order();
                    $order->customer_id=$customer->id;
                    $order->membershipplans_id=$request->membershipid;
                    $order->amount=$request->membershipprice;
                    $order->currency='USD';
                    $order->payment_method=$request->paymentmethod;
                    $order->save();
                    return redirect()->route('offlinepaymentsuccess');
                }else{

                    $tempcustomer = TempCustomer::where('id',$request->customerid)->first();
                    $customer = new Customer();
                    $customer->fname=$tempcustomer->fname;
                    $customer->lname=$tempcustomer->lname;
                    $customer->job_title=$tempcustomer->job_title;
                    $customer->phone=$tempcustomer->phone;
                    $customer->email=$tempcustomer->email;
                    $customer->bussiness_name=$tempcustomer->bussiness_name;
                    $customer->business_wider_group=$tempcustomer->business_wider_group;
                    $customer->additional_details=$tempcustomer->additional_details;
                    $customer->additional_user_no =$tempcustomer->additional_user_no;
                    $customer->remainadditional_user=$tempcustomer->additional_user_no;
                    $customer->gst=$tempcustomer->gst;
                    $customer->access_type= 'requestforpaid';
                    $customer->save();

                    $order = new Order();
                    $order->customer_id=$customer->id;
                    $order->membershipplans_id=$request->membershipid;
                    $order->amount=$request->membershipprice;
                    $order->currency='USD';
                    $order->payment_method=$request->paymentmethod;
                    $order->save();

                    $tempcustomer = TempCustomer::where('id',$request->customerid)->delete();
                    session()->forget('customer'); //forgotp old session
                    $session= Session::put('customer', $customer->id); //genrate new session
                    return redirect()->route('offlinepaymentsuccess');
                }
                
            }
            else
            {
                $amount = $request->membershipamount * 100 ;
                $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
                $response = $stripe->charges->create([
                  'amount' => $amount,
                  'currency' => 'usd',
                  'source' => $request->stripeToken,
                  'description' => "payment from GBGC - Consultancy & market reports for the global gambling industry." 
                ]);

                if($response->status == 'succeeded')
                {      
                    if($request->usertype =='freetopro')
                    {
                        $customer = Customer::find($request->customerid);
                        $customer->access_type= 'requestforpaid';
                        $customer->save();

                        $order = new Order();
                        $order->customer_id = $customer->id;
                        $order->membershipplans_id = $request->membershipid;
                        $order->amount = $request->membershipamount;
                        $order->currency = 'USD';
                        $order->payment_method = $request->paymentmethod;
                        $order->payment_id = $response->id;
                        $order->receipt_url = $response->receipt_url;
                        $order->status = 1;
                        $order->save();
                        return redirect()->route('offlinepaymentsuccess');
                    }else{
                    $tempcustomer = TempCustomer::where('id',$request->customerid)->first();

                    $customer = new Customer();
                    $customer->fname=$tempcustomer->fname;
                    $customer->lname=$tempcustomer->lname;
                    $customer->job_title=$tempcustomer->job_title;
                    $customer->phone=$tempcustomer->phone;
                    $customer->email=$tempcustomer->email;
                    $customer->bussiness_name=$tempcustomer->bussiness_name;
                    $customer->business_wider_group=$tempcustomer->business_wider_group;
                    $customer->additional_details=$tempcustomer->additional_details;
                    $customer->additional_user_no =$tempcustomer->additional_user_no;
                    $customer->remainadditional_user=$tempcustomer->additional_user_no;
                    $customer->gst=$tempcustomer->gst;
                    $customer->access_type= 'requestforpaid';
                    $customer->payment ='1';
                    $customer->save();

                    $order = new Order();
                    $order->customer_id = $customer->id;
                    $order->membershipplans_id = $request->membershipid;
                    $order->amount = $request->membershipamount;
                    $order->currency = 'USD';
                    $order->payment_method = $request->paymentmethod;
                    $order->payment_id = $response->id;
                    $order->receipt_url = $response->receipt_url;
                    $order->status = 1;
                    $order->save();

                    $tempcustomer = TempCustomer::where('id',$request->customerid)->delete();
                    session()->forget('customer'); //forgotp old session
                    $session= Session::put('customer', $customer->id); //genrate new session
                    return redirect()->route('offlinepaymentsuccess');  
                    }  
                }else{

                      $tempcustomer = TempCustomer::where('id',$request->customerid)->delete();
                      session()->forget('customer');

                      $order = new Order();
                      $order->customer_id = $request->customerid;
                      $order->membershipplans_id = $request->membershipid;
                      $order->amount = $request->membershipprice;
                      $order->currency = 'USD';
                      $order->payment_method = $request->paymentmethod;
                      $order->status = 2;
                      $order->save();
                      return redirect()->route('offlinepaymentsuccess'); 
                }
            }          
        }else{
            return redirect()->back()->with('error', trans('Payment Request Already Sent!'));
        }
    }

    public function success(Request $request)
    {
        if(isset($request->session_id)) {

            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
            $response = $stripe->checkout->sessions->retrieve($request->session_id);
            // dd($response);

            $payment = new Payment();
            $payment->payment_id = $response->id;
            $payment->quantity = session()->get('membershipprice');
            $payment->currency = $response->currency;
            $payment->customer_name = $response->customer_details->name;
            $payment->customer_email = $response->customer_details->email;
            $payment->payment_status = $response->status;
            $payment->payment_method = "Stripe";
            $payment->save();

            return "Payment is successful";
            session()->forget('membershipprice');

        } else {
            return redirect()->route('cancel');
        }
    }

    public function cancel()
    {
        return "Payment is canceled.";
    }

    public function offlinepaymentsuccess()
    {
        return view('frontend.thankyou');
    }
}
