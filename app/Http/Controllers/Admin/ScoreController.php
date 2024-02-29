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
use Illuminate\Support\Collection ;

class ScoreController extends Controller
{
    public function index()
    {
        $return_data = array();
        $score = Score::with('regionDetail','currencyDetail','maincategoryDetail','subcategory1Detail','subcategory2Detail','level4Detail')->orderby('year')->get();
        $return_data['score'] = $score;
        $region=Region::get();
        $currencies=Currency::get();
        return view('admin.score.list', array_merge($return_data),compact('region','score','currencies'));
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
        return redirect()->route('adminreport')->with('success', trans('Score Imported successfully.'));
    }
}
