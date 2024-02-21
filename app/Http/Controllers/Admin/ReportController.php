<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Score;
use App\Models\Region;
use App\Models\Currency;
use App\Exports\ExportScore;
use App\Imports\ImportScore;
use Excel;
use App\Models\LevelMaster;

class ReportController extends Controller
{
    public function index()
    {
        $yeardata = Score::where(['view' => 'Standard'])
             ->where(['currency_id' => 'USD'])
             ->pluck('year')    
             ->unique();
        $region=Region::orderBy('name','asc')->get();
        $currencies=Currency::get();
        $scores = Score::with('maincategoryDetail','subcategory1Detail','subcategory2Detail','level4Detail')
                ->where(['currency_id' => 'USD'])
                ->selectRaw('level_1, level_2, level_3, level_4, MAX(score) as max_score')
                ->groupBy('level_1', 'level_2', 'level_3', 'level_4')
                ->paginate(10);
        return view('admin.report.list',compact('region','currencies','yeardata','scores'));
    }

     public function scoreview(Request $request)
    {
        $viewfilter=$request->view;
        $currencyfilter=$request->currency;
        $yearfrom=$request->year_from;
        $yearto=$request->year_to;
        $return_data = array();

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
                            
        $scores = Score::with('maincategoryDetail','subcategory1Detail','subcategory2Detail','level4Detail')->where('view',$viewfilter)
                ->where('currency_id',$currencyfilter)
                ->selectRaw('level_1, level_2, level_3, level_4, MAX(score) as max_score')
                ->groupBy('level_1', 'level_2', 'level_3', 'level_4')
                ->paginate(10);
         $view = view('admin.report.filtertable',compact('region','currencies','yeardata','scores','viewfilter','currencyfilter'))->render();

         return response()->json(['view' => $view]);
    }
    
    public function exportScore(Request $request){
    $newquery = LevelMaster::select('lm1.title AS Level1', 'lm2.title AS Level2', 'lm3.title AS Level3', 'lm4.title AS Level4')
        ->from('level_masters AS lm1')
        ->leftJoin('level_masters AS lm2', 'lm1.id', '=', 'lm2.parent_id')
        ->leftJoin('level_masters AS lm3', 'lm2.id', '=', 'lm3.parent_id')
        ->leftJoin('level_masters AS lm4', 'lm3.id', '=', 'lm4.parent_id')
        ->where('lm1.parent_id', 0)
        ->get();
    
    $data = [];
    $data[] = ['Level1', 'Level2', 'Level3', 'Level4','2022','2023'];

    $prevLevel2 = null;
    $prevLevel1 = null;
    $prevLevel3 = null;
    $total = 0;

    foreach ($newquery as $line) {
        if ($prevLevel3 !== null && $prevLevel3 !== $line->Level3) {
            $data[] = ['', '', '', 'Total'];
            $total = 0;
        }
       if ($prevLevel2 !== null && $prevLevel2 !== $line->Level2) {
            $data[] = ['', '',  'Total ' . $prevLevel1 . ' ' . $prevLevel2,  ''];
        }
   
        $data[] = [$line->Level1, $line->Level2, $line->Level3, $line->Level4 ,'20','50'];   
        
        $prevLevel3 = $line->Level3;
        $prevLevel2 = $line->Level2;
        $prevLevel1 = $line->Level1;
        
        
    }
    if ($prevLevel3 !== null) {
        $data[] = ['', '', '', 'Total'];
    }
    if ($prevLevel2 !== null) {
        $data[] = ['', '', 'Total ' . $prevLevel1 . ' ' . $prevLevel2,  ''];
    }
    return Excel::download(new ExportScore($data), 'Sample Data.xlsx');
    }

    public function importScore(Request $request)
    {
        $region=$request->input('region');
        $file = $request->file('file');
        Excel::import(new ImportScore($region,$file), $file);
        return redirect('admin/score')->with('success', trans('Score Imported successfully.'));
    }

    public function reportList(Request $request,$page)
    {
        $query = Score::with('regionDetail','maincategoryDetail','subcategory1Detail','subcategory2Detail','level4Detail');
        $per_page = 10;
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
        $yeardata = Score::pluck('year')    
            ->unique();
        
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
                            <td>'.(isset($data->level4Detail->title) ? $data->level4Detail->title : null).'</td>';
                            foreach($yeardata as $year){
                                $yearlyScore = Score::where('year', $year)
                                                       ->where('view',$data->view) 
                                                       ->where('currency_id',$data->currency_id) 
                                                       ->where('level_1',$data->level_1) 
                                                       ->where('level_2',$data->level_2) 
                                                       ->where('level_3',$data->level_3) 
                                                       ->where('level_4',$data->level_4) 
                                                        ->max('score');
                                $html .= '<td>'.$yearlyScore.'</td>';
                                // print_r($year);exit;
                            } 
                          $html .= '  
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
}
