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
        $yeardata = Score::where('view', 'Standard')
            ->where('currency_id', 'USD')
            ->pluck('year')
            ->unique()
            ->toArray();
        $exportData = [];

        $prevLevel1 = null;
        $prevLevel2 = null;
        $prevLevel3 = null;
        $totalScoreLevel4 = [];
        $totalScoreLevel3 = [];
        $totalScoreLevel2 = [];
        $totalScoreLevel1 = [];

        $combinations = Score::with('maincategoryDetail','subcategory1Detail','subcategory2Detail','level4Detail')
            ->select('level_1', 'level_2', 'level_3', 'level_4')
            ->distinct()
            ->get();
              foreach ($combinations as $index => $combination) {
            

            // If level 3 changes, print it
            if ($prevLevel3 !== $combination->level_3) {
                $prevLevel3 = $combination->level_3;
                $printLevel3 = true;
            } else {
                $printLevel3 = false;
            }

            // If level 3 changes, add total score for level 4 and reset totalScoreLevel4 array
            if ($printLevel3) {
                // Add total score for the previous level 3
                if (!empty($totalScoreLevel4)) {
                    // Add 'Total' in Level-4 cell
                    $totalRow = array_fill(0, 4, '');
                    $totalRow[3] = 'Total';
                    foreach ($totalScoreLevel4 as $total) {
                        $totalRow[] = $total;
                    }
                    $exportData[] = $totalRow;
                }
                // Reset variables for the new level 3
                $totalScoreLevel4 = array_fill(0, count($yeardata), 0);
            }

             // If level 2 changes, print it
            if ($prevLevel2 !== $combination->level_2) {

                // Add total score for the previous level 2
                if (!empty($totalScoreLevel2)) {
                    // Add 'Total' in Level-2 cell
                    $totalRow = array_fill(0, 4, '');
                    $totalRow[3] = 'Total'; // Setting 'Total 2' in Level-2 cell
                    foreach ($totalScoreLevel2 as $total) {
                        $totalRow[] = $total;
                    }
                    $exportData[] = $totalRow;
                }
                
                // Reset variables for the new level 2
                $prevLevel2 = $combination->level_2;
                $printLevel2 = true;
                $totalScoreLevel3 = array_fill(0, count($yeardata), 0);
                $totalScoreLevel2 = array_fill(0, count($yeardata), 0);
            } else {
                $printLevel2 = false;
            }

            // If level 1 changes, print it and add total score for previous Level 1
            if ($prevLevel1 !== $combination->level_1) {
                if (!is_null($prevLevel1)) {
                    // Add total score for the previous level 1
                    $totalRow = array_fill(0, 4, '');
                    $totalRow[3] = 'Total';
                    foreach ($totalScoreLevel1 as $total) {
                        $totalRow[] = $total;
                    }
                    $exportData[] = $totalRow;
                }
                $prevLevel1 = $combination->level_1;
                $printLevel1 = true;
                // Reset variables for the new level 1
                $totalScoreLevel1 = array_fill(0, count($yeardata), 0);
            } else {
                $printLevel1 = false;
            }

            // Initialize row data with level details
            $rowData = [
                ($printLevel1 && $combination->maincategoryDetail) ? $combination->maincategoryDetail->title : '', // Print level 1 only once
                ($printLevel2 && $combination->subcategory1Detail) ? $combination->subcategory1Detail->title : '', // Print level 2 only once
                ($printLevel3 && $combination->subcategory2Detail) ? $combination->subcategory2Detail->title : '', // Print level 3 only once
                $combination->level4Detail ? $combination->level4Detail->title : '',
            ];

            // Fetch scores for the current combination of levels
            $scores = Score::where('view', 'Standard')
                ->where('currency_id', 'USD')
                ->where('level_1', $combination->level_1)
                ->where('level_2', $combination->level_2)
                ->where('level_3', $combination->level_3)
                ->where('level_4', $combination->level_4)
                ->pluck('score', 'year')
                ->toArray();

            // Populate row data with scores for each year
            foreach ($yeardata as $year) {
                $score = isset($scores[$year]) ? $scores[$year] : 0;
                $rowData[] = $score;
                $totalScoreLevel4[array_search($year, $yeardata)] += $score;
                $totalScoreLevel3[array_search($year, $yeardata)] += $score;
                $totalScoreLevel2[array_search($year, $yeardata)] += $score;
                $totalScoreLevel1[array_search($year, $yeardata)] += $score; // Increment Level 1 total
            }

            // Add row data to the export data
            $exportData[] = $rowData;
        }

        // Add total score for the last level 3
        if (!empty($totalScoreLevel4)) {
            // Add 'Total' in Level-4 cell
            $totalRow = array_fill(0, 4, ''); // Filling array with empty strings
            $totalRow[3] = 'Total'; // Setting 'Total' in Level-4 cell
            foreach ($totalScoreLevel4 as $total) {
                $totalRow[] = $total;
            }
            $exportData[] = $totalRow;
        }

         if (!empty($totalScoreLevel3)) {
            // Add 'Total' in Level-3 cell
            $totalRow = array_fill(0, 4, ''); // Filling array with empty strings
            $totalRow[3] = 'Total'; // Setting 'Total 3' in Level-3 cell
            foreach ($totalScoreLevel3 as $total) {
                $totalRow[] = $total;
            }
            $exportData[] = $totalRow;
        }

        // Add total score for the last Level 1
        if (!empty($totalScoreLevel1)) {
            // Add 'Total' in Level-1 cell
            $totalRow = array_fill(0, 4, ''); // Filling array with empty strings
            $totalRow[3] = 'Total'; // Setting 'Total 1' in Level-1 cell
            foreach ($totalScoreLevel1 as $total) {
                $totalRow[] = $total;
            }
            $exportData[] = $totalRow;
        }
        $region=Region::orderBy('name','asc')->get();
        $currencies=Currency::get();
        return view('admin.report.list',compact('region','currencies','yeardata','exportData'));
    }

     public function scoreview(Request $request)
    {
        $viewfilter=$request->view;
        $currencyfilter= $request->currency;
        $yearfrom = $request->has('year_from') ? $request->year_from : null;
        $yearto = $request->has('year_to') ? $request->year_to : null;

        $region=Region::orderBy('name','asc')->get();
        $currencies=Currency::get();

        $yeardata = Score::where('view','LIKE',$viewfilter)
            ->where('currency_id',$currencyfilter)
            ->when($yearfrom && $yearto, function ($query) use ($yearfrom, $yearto) {
                $query->whereBetween('year', [$yearfrom, $yearto]);
            })
            ->pluck('year')
            ->unique()
            ->toArray();
        $exportData = [];

        // Initialize variables to track level changes
        $prevLevel1 = null;
        $prevLevel2 = null;
        $prevLevel3 = null;
        $totalScoreLevel4 = [];
        $totalScoreLevel3 = [];
        $totalScoreLevel2 = [];
        $totalScoreLevel1 = [];

        $combinations = Score::with('maincategoryDetail','subcategory1Detail','subcategory2Detail','level4Detail')
             ->where('view','LIKE',$viewfilter)
             ->where('currency_id',$currencyfilter) 
             ->select('level_1', 'level_2', 'level_3', 'level_4')
             ->distinct()
             ->get();
              foreach ($combinations as $index => $combination) {
            

            // If level 3 changes, print it
            if ($prevLevel3 !== $combination->level_3) {
                $prevLevel3 = $combination->level_3;
                $printLevel3 = true;
            } else {
                $printLevel3 = false;
            }

            // If level 3 changes, add total score for level 4 and reset totalScoreLevel4 array
            if ($printLevel3) {
                // Add total score for the previous level 3
                if (!empty($totalScoreLevel4)) {
                    // Add 'Total' in Level-4 cell
                    $totalRow = array_fill(0, 4, '');
                    $totalRow[3] = 'Total';
                    foreach ($totalScoreLevel4 as $total) {
                        $totalRow[] = $total;
                    }
                    $exportData[] = $totalRow;
                }
                // Reset variables for the new level 3
                $totalScoreLevel4 = array_fill(0, count($yeardata), 0);
            }

             // If level 2 changes, print it
            if ($prevLevel2 !== $combination->level_2) {

                // Add total score for the previous level 2
                if (!empty($totalScoreLevel2)) {
                    // Add 'Total' in Level-2 cell
                    $totalRow = array_fill(0, 4, '');
                    $totalRow[3] = 'Total'; // Setting 'Total 2' in Level-2 cell
                    foreach ($totalScoreLevel2 as $total) {
                        $totalRow[] = $total;
                    }
                    $exportData[] = $totalRow;
                }
                
                // Reset variables for the new level 2
                $prevLevel2 = $combination->level_2;
                $printLevel2 = true;
                $totalScoreLevel3 = array_fill(0, count($yeardata), 0);
                $totalScoreLevel2 = array_fill(0, count($yeardata), 0);
            } else {
                $printLevel2 = false;
            }

            // If level 1 changes, print it and add total score for previous Level 1
            if ($prevLevel1 !== $combination->level_1) {
                if (!is_null($prevLevel1)) {
                    // Add total score for the previous level 1
                    $totalRow = array_fill(0, 4, '');
                    $totalRow[3] = 'Total';
                    foreach ($totalScoreLevel1 as $total) {
                        $totalRow[] = $total;
                    }
                    $exportData[] = $totalRow;
                }
                $prevLevel1 = $combination->level_1;
                $printLevel1 = true;
                // Reset variables for the new level 1
                $totalScoreLevel1 = array_fill(0, count($yeardata), 0);
            } else {
                $printLevel1 = false;
            }

            // Initialize row data with level details
            $rowData = [
                ($printLevel1 && $combination->maincategoryDetail) ? $combination->maincategoryDetail->title : '',
                ($printLevel2 && $combination->subcategory1Detail) ? $combination->subcategory1Detail->title : '',
                ($printLevel3 && $combination->subcategory2Detail) ? $combination->subcategory2Detail->title : '',
                $combination->level4Detail ? $combination->level4Detail->title : '',
            ];

            // Fetch scores for the current combination of levels
            $scores = Score::where('view', 'Standard')
                ->where('currency_id', 'USD')
                ->where('level_1', $combination->level_1)
                ->where('level_2', $combination->level_2)
                ->where('level_3', $combination->level_3)
                ->where('level_4', $combination->level_4)
                ->pluck('score', 'year')
                ->toArray();

            // Populate row data with scores for each year
            foreach ($yeardata as $year) {
                $score = isset($scores[$year]) ? $scores[$year] : 0;
                $rowData[] = $score;
                $totalScoreLevel4[array_search($year, $yeardata)] += $score;
                $totalScoreLevel3[array_search($year, $yeardata)] += $score;
                $totalScoreLevel2[array_search($year, $yeardata)] += $score;
                $totalScoreLevel1[array_search($year, $yeardata)] += $score; // Increment Level 1 total
            }

            // Add row data to the export data
            $exportData[] = $rowData;
        }

        // Add total score for the last level 3
        if (!empty($totalScoreLevel4)) {
            // Add 'Total' in Level-4 cell
            $totalRow = array_fill(0, 4, ''); // Filling array with empty strings
            $totalRow[3] = 'Total'; // Setting 'Total' in Level-4 cell
            foreach ($totalScoreLevel4 as $total) {
                $totalRow[] = $total;
            }
            $exportData[] = $totalRow;
        }

         if (!empty($totalScoreLevel3)) {
            // Add 'Total' in Level-3 cell
            $totalRow = array_fill(0, 4, ''); // Filling array with empty strings
            $totalRow[3] = 'Total'; // Setting 'Total 3' in Level-3 cell
            foreach ($totalScoreLevel3 as $total) {
                $totalRow[] = $total;
            }
            $exportData[] = $totalRow;
        }

        // Add total score for the last Level 1
        if (!empty($totalScoreLevel1)) {
            // Add 'Total' in Level-1 cell
            $totalRow = array_fill(0, 4, ''); // Filling array with empty strings
            $totalRow[3] = 'Total'; // Setting 'Total 1' in Level-1 cell
            foreach ($totalScoreLevel1 as $total) {
                $totalRow[] = $total;
            }
            $exportData[] = $totalRow;
        }
         $view = view('admin.report.filtertable',compact('region','currencies','yeardata','viewfilter','currencyfilter','exportData'))->render();

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
