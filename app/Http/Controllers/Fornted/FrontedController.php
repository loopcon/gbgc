<?php

namespace App\Http\Controllers\Fornted;

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
use Mail;
use Auth;

class FrontedController extends Controller
{
    public function index()
    {
        $return_data = array();       
        $return_data['staticpage'] = StaticPage::get();
        $return_data['homepagebanner'] = HomepageBanner::first();
        $return_data['homepagereport'] = HomepageReport::get();
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

    public function membership()
    {
        return view('fronted.membership');
    }

    public function thankyou()
    {
        return view('fronted.thankyou');
    }

    public function lostpassword()
    {
        return view('fronted.lostpassword');
    }

    public function checkout()
    {
        return view('fronted.checkout');
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
        return view('fronted.contactus');
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
}
