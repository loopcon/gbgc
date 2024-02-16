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
        // $score = Score::with('regionDetail','currencyDetail','maincategoryDetail','subcategory1Detail','subcategory2Detail','level4Detail')->paginate($request->paginator, ['*'], 'page', $request->page);
        // $page = $score->currentPage();
        $user = Auth::guard('customers')->id();
        $customer_detail= Customer::where([['id', '=', $user]])->first();
        $customer = $customer_detail->access_type;
        // $return_data['score'] = $score;
        $region=Region::orderBy('name','asc')->get();
        $currencies=Currency::get();
        return view('frontend.report.index', array_merge($return_data),compact('region','currencies','customer'));
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
