<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsLetter;

class NewsletterController extends Controller
{
    public function index()
    {
        $newsletter = NewsLetter::get();
        $return_data['newsletter'] = $newsletter;
         return view('admin.newsletter.list', array_merge($return_data));
    }

    public function destroy(string $id)
    {
        $newsletter = NewsLetter::where('id', $id)->delete();
        if($newsletter) {
            return redirect('admin/newsletter')->with('success', trans('NewsLetter Deleted Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }
}
