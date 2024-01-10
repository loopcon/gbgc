<?php

namespace App\Http\Controllers\Fornted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontedController extends Controller
{
    public function index()
    {
        return view('fronted.index');
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
