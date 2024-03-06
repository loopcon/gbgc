<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Cookie;
use Illuminate\Support\Facades\Validator;
use App\Models\NewsLetter;
use Session;
use App\Models\AdditionalUser;
use App\Models\EmailTemplate;
use Mail;

class FrontLoginController extends Controller
{

    public function registration(Request $request)
    {   

       $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required', 'unique:customers,email', 'email'],
            'phone' => ['required', 'numeric','digits:10'],
        ], [
            'required' => trans('The :attribute field is required.'),
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'errors' => $validator->errors()]);
        }

        $customer = new Customer();
        $customer->name=$request->input('name');
        $customer->job_title=$request->input('job_title');
        $customer->phone=$request->input('phone');
        $customer->email=$request->input('email');
        $customer->bussiness_name=$request->input('bussiness_name');
        $customer->business_wider_group=$request->input('business_wider_group');
        $customer->access_type= 'requestforfree';
        $customer->save();

        // $ndata = EmailTemplate::select('template')->where('label', 'sign_up_for_free_access')->first();
        // $email=$request->input('email');
        // $name= $request->input('name');
        // $templateStr = array('[NAME]','[EMAIL]');
        // $data = array($name, $email);
        // $html = isset($ndata->template) ? $ndata->template : NULL;
        // $mailHtml = str_replace($templateStr, $data, $html);
        // Mail::to("loopcon1018@gmail.com")->send(new \App\Mail\CommonMail($mailHtml, 'Request An Free Register - ' . 'GBGC'));

        if($customer){
            return response()->json(['status' =>1, 'msg' => 'You Account Request Sent Successfully.']);
        }
        else
        {
            return response()->json(['status' =>0, 'errormsg' => 'Something went Wrong Please Try again.']);
        }
    }

    public function proregistration(Request $request)
    {
        
       $validator = Validator::make($request->all(), [
            'profname' => ['required'],
            'email' => ['required', 'unique:customers,email', 'email'],
            'phone' => ['required', 'numeric','digits:10'],
        ], [
            'required' => trans('The :attribute field is required.'),
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'errors' => $validator->errors()]);
        }

        $customer = new Customer();
        $customer->fname=$request->input('profname');
        $customer->lname=$request->input('prolname');
        $customer->job_title=$request->input('job_title');
        $customer->phone=$request->input('phone');
        $customer->email=$request->input('email');
        $customer->bussiness_name=$request->input('bussiness_name');
        $customer->business_wider_group=$request->input('business_wider_group');
        $customer->additional_details=$request->input('additional_details');
        $customer->additional_user_no = isset($request->additional_user_no) ? $request->additional_user_no : 0;
        $customer->remainadditional_user=isset($request->additional_user_no) ? $request->additional_user_no : 0;
        $customer->gst=$request->input('gst');
        $customer->access_type= 'requestforpaid';
        $customer->save();
        $session= Session::put('customer', $customer->id);
        if($customer){
            return response()->json(['status' =>1, 'msg' => 'You Account Request Sent Successfully.']);
        }
        else
        {
            return response()->json(['status' =>0, 'errormsg' => 'Something went Wrong Please Try again.']);
        }
    }


    public function storeadditionaluser(Request $request)
    {

        $validator = Validator::make($request->all(), [
        'name.*' => ['required'],
        'job_title.*' => ['required'],
        'email.*' => ['required', 'unique:customers,email', 'email'],
        'phone.*' => ['required', 'numeric','digits:10'],
        ],[
            'required' => 'This Field is required.',
        ]);

         if ($validator->fails()) {
            return response()->json(['status' => 0, 'errors' => $validator->errors()]);
        }


        $numEntries = count($request->name);
        for ($i = 0; $i < $numEntries; $i++) {
            $customer = new Customer();
            $customer->name = $request->name[$i];
            $customer->job_title = $request->job_title[$i];
            $customer->phone = $request->phone[$i];
            $customer->email = $request->email[$i];
            $customer->access_type= 'additionaluser';
            $customer->save();

            $additionaluser = new AdditionalUser();
            $additionaluser->parent_id =$request->id;
            $additionaluser->customer_id =$customer->id;
            $additionaluser->name =$request->name[$i];
            $additionaluser->job_title =$request->job_title[$i];
            $additionaluser->phone =$request->phone[$i];
            $additionaluser->email =$request->email[$i];
            $additionaluser->save();
        }

         if($customer){
            return response()->json(['status' =>1, 'msg' => 'You Account Request Sent Successfully.']);
            }
            else
            {
            return response()->json(['status' =>0, 'errormsg' => 'Something went Wrong Please Try again.']);
            }
    }
    public function checklogin(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
        'password' => ['required'],
        'email1' => ['required', 'email', 'email'],
        ], $messages = [
            'email1.required' => 'Email is required!',
            'password.required' => 'Password is required!',
            'email1.email' => 'Enter valid Email format!',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'errors' => $validator->errors()]);
        }

        $user  = $request->get('email1');
        $pass = $request->get('password');
        $customer = Customer::where([['email', '=', $request->email1]])->first();  
        $customers = Customer::where([['email', '=', $request->email1],['password', '!=', ""]])->first();

        if(empty($customer)){
            return response()->json(['status' =>0, 'errormsg' => 'Your have not account, please Register First']);
        }else{
            if(isset($customers))
            {
                if (Auth::guard('customers')->attempt(['email' => $request->email1, 'password' => $request->password])){
                    $customer_id = Auth::guard('customers')->id();
                    $customer_detail = Customer::where([['id', '=', $customer_id]])->first();
                    if($customer_detail->email_verify == 1)
                    {
                        Cookie::queue(Cookie::forget('email'));
                        Cookie::queue(Cookie::forget('password'));
                        session()->put('customerInfo', $customer_detail);
                        return response()->json(['status' =>1, 'successmsg' => 'You are now logged in.']);  
                    }else{
                        session()->forget('customerInfo');
                        Auth::guard('customers')->logout();
                        $data=[
                            $email=$request->email1,
                            $password=$request->password,
                        ];
                        session()->put('verifyInfo', $data);
                        return response()->json(['status' =>2, 'msg' => 'Email Verify' , 'email'=>$request->email1]);
                    }
   
                }else {
                    return response()->json(['status' => 0, 'errormsg' => 'Username and Password are not valid.']);
                }
            }
            return response()->json(['status' =>0, 'errormsg' => 'Your Account is not Actived by Admin Try Later.']);
        }
         
        
    }  


    public function verifytotp(Request $request)
    {
        $verifytotp=Customer::where('email',$request->verifyemail)
                              ->where('otp',$request->otp)
                              ->first();
        if(!empty($verifytotp)){
            Customer::where('email',$request->verifyemail)
                              ->where('otp',$request->otp)
                              ->update(['email_verify'=>1,
                                     'otp'=>'']);
           $sessiondata=Session::get('verifyInfo');
           if (Auth::guard('customers')->attempt(['email' => $sessiondata[0], 'password' => $sessiondata[1]])){
                session()->put('customerInfo', $verifytotp);
              return response()->json(['status' =>1, 'successmsg' => 'You are now logged in.']);
           }
        }
        else
        {
            return response()->json(['status' =>0, 'otperrormsg' => 'Invalid Verification Code. Enter Valid Verfication Code']); 
        } 
    }
    public function logout()
    {
        session()->forget('customerInfo');
        Auth::guard('customers')->logout();
        return redirect('/')->with('alert-success', 'You are loged out');
    }
    public function myAccount()
    {
        $return_data = array();       
        $customer_id = Auth::guard('customers')->id();
        $customer_detail = Customer::where([['id', '=', $customer_id]])->first();
        $return_data['customer_detail'] = $customer_detail;
        return view('frontend.myaccount', array_merge($return_data));
    }
    public function updateMyAccount(Request $request)
    {
        $customer=Customer::where('id',$request->id)->first();
        $totaladditional=$customer->remainadditional_user + $customer->accept_additional_user;
        $remainadditional=$customer->remainadditional_user;
        $customer_detail = Customer::find($request->id);
        $customer_detail->name = $request->input('name');
        $customer_detail->job_title = $request->input('job_title');
        $customer_detail->bussiness_name = $request->input('bussiness_name');
        $customer_detail->business_wider_group = $request->input('business_wider_group');
        $customer_detail->billing_address = $request->input('billing_address');
        $customer_detail->additional_user_no = $request->input('additional_user_no') + $totaladditional;
        $customer_detail->remainadditional_user =$request->input('additional_user_no') + $remainadditional;
        $customer_detail->additional_details = $request->input('additional_details');

        // if ($request->password) {
        //     $user->password = Hash::make($request->password);
        // }
        $customer_detail->save();
        if($customer_detail){
            return redirect('myaccount')->with('success', 'Profile updated Successfully!');
        } else {
            return redirect()->with('register-error', 'Something went wrong please try again...');
        }
    }

    public function dashboard() 
    {
        $return_data = array();
        $customer_id = Auth::guard('customers')->id();
        $customer= Customer::where('id',$customer_id)->first();
        return view('frontend.dashboard.index',compact('customer'));
    }
    public function registrationUpdate(Request $request)
    {
        // $this->validate($request, [
        //         'name' => ['required'],
        //         'job_title' => ['required'],
        //         'bussiness_name' => ['required'],
        //         'bussiness_size' => ['required'],
        //         'additional_user_no' => ['required'],
        //         'billing_address' => ['required'],
        //     ],[
        //         'required'  => trans('The :attribute field is required.')
        //     ]
        // );
        $customer=Customer::find($request->id);
        $customer->name=$request->input('name');
        $customer->job_title=$request->input('job_title');
        $customer->phone=$request->input('phone');
        $customer->email=$request->input('email');
        $customer->bussiness_name=$request->input('bussiness_name');
        $customer->business_wider_group=$request->input('business_wider_group');
        $customer->additional_details=$request->input('additional_details');
        $customer->additional_user_no=isset($request->additional_user_no) ? $request->additional_user_no : 0;
        $customer->remainadditional_user=isset($request->additional_user_no) ? $request->additional_user_no : 0;
        $customer->access_type = "requestforpaid";
        $customer->save();

        // mail-send to admin for accept user paid request.
        // $data = [
        //     'email'   => $request->input('email'), 
        // ];

        // Mail::send(['text'=>'mail'], $data,function($message)  use ($data){
        //     $message->to(gbgc@gmail.com, 'Admin of GBGC')->subject
        //         ('Hello Admin, user sent paid request please, check it.');
        //     $message->from($data['email'],'Customer of GBGC');
        // });

        // for old register

        // if ($customer) {
        //     return response()->json(['status' => 1]);
        // }

        if($customer) {
            return response()->json(['status' =>1, 'msg' => 'We will send you an invoice within 2 business days. This wil Provide the information to pay.']);
        } else {
           return response()->json(['status' =>0, 'errormsg' => 'Something went Wrong Please Try again.']);
        }
    }

}
