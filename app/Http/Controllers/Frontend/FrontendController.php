<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StaticPage;
use App\Models\FAQ;
use App\Models\websitelogo;
use App\Models\Customer;
use App\Models\NewsLetter;
use App\Models\Contactus;
use App\Models\HomepageBanner;
use App\Models\HomepageReport;
use App\Models\Membershipplan;
use App\Models\Region;
use Mail;
use Auth;
use App\Models\Orderdetail;
use App\Models\Order;
use Session;
use App\Models\AdditionalUser;
use App\Exports\ExportScore;
use Illuminate\Support\Collection ;
use Excel;
use App\Models\Score;
use Stripe\StripeClient;
use App\Models\TempCustomer;
use App\Models\howitworkstep;
use App\Models\howitwork;

class FrontendController extends Controller
{
    public function index()
    {
        $return_data = array();       
        $return_data['staticpage'] = StaticPage::get();
        $return_data['homepagebanner'] = HomepageBanner::first();
        $return_data['howitworkstep'] = howitworkstep::get();
        $return_data['howitwork'] = howitwork::first();
        $return_data['homepagereport'] = HomepageReport::get();
        $return_data['free_membership'] = Membershipplan::where('access_status','=','free')->first();
        $return_data['paid_membership'] = Membershipplan::where('access_status','=','paid')->first();
        return view('frontend.index', array_merge($return_data));
    }

    public function faq()
    {
        $return_data = array();       
        $return_data['faq'] = FAQ::get();
        return view('frontend.faq', array_merge($return_data));
    }

    public function howitswork()
    {
        return view('frontend.howitswork');
    }

    public function membership()
    {
        $return_data = array();
        $return_data['free_membership'] = Membershipplan::where('access_status','=','free')->first();
        $return_data['paid_membership'] = Membershipplan::where('access_status','=','paid')->first();
        return view('frontend.membership', array_merge($return_data));
    }
    
    public function checkout()
    {
        $sessioncustomer=Session::get('customer');
        $user = Auth::guard('customers')->id();
    
        if($user != null){
            $membership = Membershipplan::where('access_status','=','freetopro')->first();
            $membershipamount=$membership->price;
            $customer=Customer::where('id',$user)->first();
            $usertype='freetopro';
        }elseif($sessioncustomer != null){
            $membership = Membershipplan::where('access_status','=','paid')->first();
            $membershipamount=$membership->price;
            $customer=TempCustomer::where('id',$sessioncustomer)->first();
            $usertype='paid';
        }else{
          return redirect('/')->with('error', trans('Something went wrong, please try again later!'));
        }
        
        $return_data = array();
        $return_data['region'] = Region::get();
        $return_data['staticpage'] = StaticPage::where('slug', 'privacy_policy')->first();
        
        return view('frontend.checkout', array_merge($return_data),compact('customer','membership','membershipamount','usertype'));
    }

    public function payment()
    {
       $sessioncustomer=Session::get('customer');

        $user = Auth::guard('customers')->id();

        // dd($user);
        if($user != null){
            $membership = Membershipplan::where('access_status','=','freetopro')->first();
            $membershipamount=$membership->price;
            $customer=Customer::where('id',$user)->first();
            $usertype='freetopro';
        }elseif($sessioncustomer != null){
            $membership = Membershipplan::where('access_status','=','paid')->first();
            $membershipamount=$membership->price;
            $customer=TempCustomer::where('id',$sessioncustomer)->first();
             $usertype='paid';
        }else{
          return redirect('/')->with('error', trans('Something went wrong, please try again later!'));
        }
        
        $return_data = array();
        $return_data['region'] = Region::get();
        $return_data['staticpage'] = StaticPage::where('slug', 'privacy_policy')->first();
        // dd($membershipamount);
        return view('frontend.payment', array_merge($return_data),compact('customer','membership','membershipamount','membership','usertype')); 
    }

    public function additionalcheckout()
    {
        $sessioncustomer=Session::get('customer');
        $user = Auth::guard('customers')->id();

        $membership = Membershipplan::where('access_status','=','additionaluser')->first();
        
        $customer=Customer::where('id',$user)->first();
        
        $membershipamount=$customer->remain_payment_additional_user * $membership->price;
        $return_data = array();
        $return_data['region'] = Region::get();
        $return_data['staticpage'] = StaticPage::where('slug', 'privacy_policy')->first();
        
        return view('frontend.checkout', array_merge($return_data),compact('customer','membership','membershipamount'));
    }


    public function thankyou()
    {
        return view('frontend.thankyou');
    }

    public function lostpassword()
    {
        return view('frontend.lostpassword');
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

    public function contactus()
    {
        return view('frontend.contactus');
    }

    public function storeContactus(Request $request)
    {
        $this->validate($request, [
                'email' => ['required','email'],
                'phone' => ['required','digits:10','numeric'],
                'message' => ['required'],
            ],[
                'required'  => trans('The :attribute field is required.')
            ]
        );
        $contactus = new Contactus();

        $fields = array('email','phone','message');
        foreach($fields as $key => $value){
            $contactus->$value = isset($request->$value) && $request->$value != '' ? $request->$value : NULL; 
        }

        $contactus->save();

        // $data = [
        //     'email'   => $request->input('email'), 
        // ];

        // Mail::send(['text'=>'mail'], $data,function($message)  use ($data){
        //     $message->to($data['email'], 'Customer of GBGC')->subject
        //         ('Hello Dear Customer, your email sent successfully!');
        //     $message->from('loopcon16@gmail.com','Loopcon Technology');
        // });

        if($contactus){
            return redirect('/contactus')->with('success', trans('Your Message Sent Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }  
    }

    public function staticpage()
    {
        $segment = request()->segment(1);
        $staticpage = StaticPage::where('slug', $segment)->first();
        return view('frontend.staticpage',compact('staticpage'));
    }

    public function placeorder(Request $request)
    {
       $stripe = new StripeClient(env('STRIPE_SECRET'));

       // dd($stripe);
        $response = $stripe->checkout->sessions->create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'testproduct',
                        ],
                        'unit_amount' => 100*100,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('cancel'),
        ]);

    }

     public function success(Request $request)
    {
        if(isset($request->session_id)) {

           $stripe = new StripeClient(env('STRIPE_SECRET'));
            $response = $stripe->checkout->sessions->retrieve($request->session_id);

            dd($response);
        }
    }

    public function cancel()
    {
        return "Payment is canceled.";
    }
    public function additionaluserlist(Request $request)
    {
        $sessioncustomer=Session::get('customer');
        $user = Auth::guard('customers')->id();
        $additionaluser=AdditionalUser::where('parent_id',$user)->get();
        $customer= Customer::where('id',$user)->first();
        return view('frontend.additionaluserlist',compact('additionaluser','customer'));
    }

   public function reportdownload()
   {
     
    return Excel::download(new ExportScore, 'Sample Data.xlsx');
   }

}

