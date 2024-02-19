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
        $return_data = array();
        $score = Score::with('regionDetail','currencyDetail','maincategoryDetail','subcategory1Detail','subcategory2Detail','level4Detail')->orderby('year')->get();
        $return_data['score'] = $score;
        $region=Region::get();
        $currencies=Currency::get();
        return view('admin.report.list', array_merge($return_data),compact('region','score','currencies'));
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
                            <td>'.$data->comment.'</td>
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
