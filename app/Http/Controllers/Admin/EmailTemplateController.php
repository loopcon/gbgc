<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use Auth;

class EmailTemplateController extends Controller
{
    public function index(){
        
        $return_data = array();
        $return_data['email_templates'] = EmailTemplate::get();
        return view('admin.email_template.form', array_merge($return_data));
    }

    public function update(Request $request){
        $id = $request->id;
        if($id){
            $email = EmailTemplate::find($id);
            $label = $email->label;
            $template = $email->value;
            $email->template = $request->$label;
            if($request->$label) {
                $email->save();
            }
        }
        return redirect('admin/emailtemplates')->with('success', trans($template.' Email Template Updated Successfully!'));
       
    }
}
