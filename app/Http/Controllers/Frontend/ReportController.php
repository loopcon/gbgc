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
    public function index(Request $request)
    {
        $return_data = array();
        $user = Auth::guard('customers')->id();
        $customer_detail= Customer::where([['id', '=', $user]])->first();
        $customer = $customer_detail->access_type;
        $region=Region::orderBy('name','asc')->get();
        $currencies=Currency::get();
        $yeardata = Score::where(['view' => 'Standard'])
             ->where(['currency_id' => 'USD'])
             ->pluck('year')    
             ->unique();
        $scores = Score::with('level1','level2','level3','level4')
                ->where(['currency_id' => 'USD'])
                ->selectRaw('level_1, level_2, level_3, level_4, MAX(score) as max_score')
                ->groupBy('level_1', 'level_2', 'level_3', 'level_4')
                ->get();
        return view('frontend.report.index',compact('region','currencies','customer','yeardata','scores'));
    }

    public function scoreview(Request $request)
    {
        $viewfilter=$request->view;
        $currencyfilter=$request->currency;
        $yearfrom=$request->year_from;
        $yearto=$request->year_to;
        $return_data = array();
        $user = Auth::guard('customers')->id();
        $customer_detail= Customer::where([['id', '=', $user]])->first();
        $customer = $customer_detail->access_type;
        $region=Region::orderBy('name','asc')->get();
        $currencies=Currency::get();
        $yeardata = Score::where('view', $viewfilter)
                            ->where('currency_id', $currencyfilter)
                            ->when($yearfrom, function ($query) use ($yearfrom) {
                                return $query->where('year', '>=', $yearfrom);
                            })
                            ->when($yearto, function ($query) use ($yearto) {
                                return $query->where('year', '<=', $yearto);
                            })
                            ->pluck('year')
                            ->unique();

        $scores = Score::where('view',$viewfilter)
                ->where('currency_id',$currencyfilter)
                ->selectRaw('level_1, level_2, level_3, level_4, MAX(score) as max_score')
                ->groupBy('level_1', 'level_2', 'level_3', 'level_4')
                ->get();
         $view = view('frontend.report.filtertable',compact('region','currencies','customer','yeardata','scores','viewfilter','currencyfilter'))->render();

         return response()->json(['view' => $view]);
    }


    public function reportList(Request $request,$page)
    {
        $query = Score::with('regionDetail','maincategoryDetail','subcategory1Detail','subcategory2Detail','level4Detail');
        $per_page = 15;
        if($request->jurisdiction) {
            $query->where([['region_id', '=', $request->jurisdiction]]);
            // where('name', 'LIKE', "%$name%")
        }
        if($request->yearfrom && $request->yearto) {
            $query->whereBetween('year', [$request->yearfrom, $request->yearto]);
        }
        if($request->view) {
            $query->where([['view', '=', $request->view]]);
            // where('name', 'LIKE', "%$name%")
        }
        if($request->currency) {
            $query->where([['currency_id', '=', $request->currency]]);
            // where('name', 'LIKE', "%$name%")
        }
        
        $total_data = $query->get();
        $total_records = $total_data->count();
        $total_pages = ceil($total_records / $per_page);
        $offset = ($page - 1) * $per_page;
        $score = $query->offset($offset)->limit($per_page)->get(); // get page records
        $html = '';
        if(count($score) > 0) {
                $i=1;
            foreach($score as $data) {
                $html .= '<tr>   
                            <td>'.$data->id.'</td>
                            <td>'.$data->view.'</td>
                            <td>'.$data->regionDetail->name.'</td>
                            <td>'.$data->currency_id.'</td>
                            <td>'.$data->maincategoryDetail->title.'</td>
                            <td>'.$data->subcategory1Detail->title.'</td>
                            <td>'.$data->subcategory2Detail->title.'</td>
                            <td>'.(isset($data->level4Detail->title) ? $data->level4Detail->title : null).'</td>
                            <td>'.$data->year.'</td>
                            <td>'.$data->score.'</td>
                        </tr>';
            }
            $status = true;
            $message = "";
            
            $pagination_link = "";
            if($per_page < $total_records) {
                $pagination_link = pagination($total_pages, $page, url('report'));
            }
            $data = array("report_list"=>$html,"pagination"=>$pagination_link,"page"=>$page);
        } else {
            $html .= '
                        <p>Data not found</p>
                     ';
            $status = false;
            $message = "Data not found";
            $data = array("report_list"=>$html,"pagination"=>"","page"=>$page);
        }
         $return_data = array(
            "status"=>$status,
            "message"=>$message,
            "data"=>$data,
        );
        echo json_encode($return_data);
        exit;
    }

    public function exportReport(Request $request){
        return Excel::download(new ExportReport, 'Report.xlsx');
    }
        
}
