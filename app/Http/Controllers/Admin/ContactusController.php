<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contactus;

class ContactusController extends Controller
{
    public function index()
    {
        $contactus = Contactus::get();
        $return_data['contactus'] = $contactus;
        return view('admin.contactus.list', array_merge($return_data));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $contactus = Contactus::where('id', $id)->delete();
        if($contactus) {
            return redirect('admin/contactus')->with('success', trans('contact Deleted Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }
}
