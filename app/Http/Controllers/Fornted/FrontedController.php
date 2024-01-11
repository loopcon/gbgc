<?php

namespace App\Http\Controllers\Fornted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\websitelogo;

class FrontedController extends Controller
{
    public function index()
    {
        $return_data = array();       
        $return_data['aboutus'] = AboutUs::first();
        return view('fronted.index', array_merge($return_data));
    }

    public function faq()
    {
        return view('fronted.faq');
    }

    public function howitswork()
    {
        return view('fronted.howitswork');
    }
}
