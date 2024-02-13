<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Score;
use App\Models\Region;
use App\Models\Currency;
use App\Models\Customer;
use App\Exports\ExportReport;
use Excel;
use Auth;

class ReportController extends Controller
{
    public function index(Request $request){

        $return_data = array();
        $score = Score::with('regionDetail','currencyDetail','maincategoryDetail','subcategory1Detail','subcategory2Detail','level4Detail')->paginate($request->paginator, ['*'], 'page', $request->page);
        $page = $score->currentPage();
        $user = Auth::guard('customers')->id();
        $customer_detail= Customer::where([['id', '=', $user]])->first();
        $customer = $customer_detail->access_type;
        $return_data['score'] = $score;
        $region=Region::get();
        $currencies=Currency::get();
        return view('frontend.report.index', array_merge($return_data),compact('region','score','currencies','customer','page'));
    }

    public function exportReport(Request $request){
        return Excel::download(new ExportReport, 'Report.xlsx');
    }
        
}
