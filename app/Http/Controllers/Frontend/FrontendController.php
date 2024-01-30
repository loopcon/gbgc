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

class FrontendController extends Controller
{
    public function index()
    {
        $return_data = array();       
        $return_data['staticpage'] = StaticPage::get();
        $return_data['homepagebanner'] = HomepageBanner::first();
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
        $return_data = array();
        $return_data['region'] = Region::get();
        $return_data['staticpage'] = StaticPage::where('slug', 'privacy_policy')->first();
        $return_data['membership'] = Membershipplan::where('access_status','=','paid')->first();
        return view('frontend.checkout', array_merge($return_data));
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
}
