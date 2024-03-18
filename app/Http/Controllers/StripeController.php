<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

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
                  $order = new Order();
                  $order->customer_id=$request->customerid;
                  $order->membershipplans_id=$request->membershipid;
                  $order->amount=$request->membershipprice;
                  $order->currency='USD';
                  $order->payment_method=$request->paymentmethod;
                  $order->save();
                  return redirect()->route('offlinepaymentsuccess');
            }
            else
            {
                $amount = $request->membershipamount * 100 ;
                // dd($amount);
                $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
                $response = $stripe->charges->create([
                  'amount' => $amount,
                  'currency' => 'usd',
                  'source' => $request->stripeToken,
                  'description' => "payment from GBGC - Consultancy & market reports for the global gambling industry." 
                ]);

                if($response->status == 'succeeded')
                {
                      $order = new Order();
                      $order->customer_id = $request->customerid;
                      $order->membershipplans_id = $request->membershipid;
                      $order->amount = $request->membershipprice;
                      $order->currency = 'USD';
                      $order->payment_method = $request->paymentmethod;
                      $order->payment_id = $response->id;
                      $order->receipt_url = $response->receipt_url;
                      $order->status = 1;
                      $order->save();
                      return redirect()->route('offlinepaymentsuccess');    
                }else{

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
