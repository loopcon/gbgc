<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;

class ReportController extends Controller
{
    public function index()
    {
        $return_data = array();
        $regions = Region::get();
        $return_data['regions'] = $regions;
        return view('admin.report.list', array_merge($return_data));
    }
}
