<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Score;
use App\Models\Region;
use App\Exports\ExportScore;
use App\Imports\ImportScore;
use Excel;
class ScoreController extends Controller
{
    public function index()
    {
        $return_data = array();
        $score = Score::with('regionDetail')->get();
        $return_data['score'] = $score;
        return view('admin.score.list', array_merge($return_data));
    }

    public function exportScore(Request $request){
        return Excel::download(new ExportScore, 'Sample Data.xlsx');
    }

    public function importScore(Request $request){
        // $request->validate([
        //     'view' => 'required',
        //     'import' => 'required',
        //     'sub_category_2' => 'required',
        //     'level_4' => 'required',
        // ]);
        $handle = fopen($request->score_import->getPathName(), 'r');
        // print_r($handle);exit;

        while (($row = fgetcsv($handle, 1000, ",")) !== false) {
            
                $view = $request->view;
                $region = array('name'=>$row[0]);
                $region_exists = Region::where([['name', '=', $row[0]]])->first();
                if(!empty($region_exists)) {
                    $region_id = $region_exists->id;
                } 
                // else {
                //     $category_new = ShopCategory::create($category_fields);
                //     $category_id = $category_new->id;
                // }
                $score_fields = array('view'=>$view, 'region_id'=>$region_id, 'main_category'=>$row[0], 'sub_category_1'=>$row[1], 'sub_category_2'=>$row[2], 'level_4'=>$row[3], 'year'=>$row[4], 'score'=>$row[5]);
                $score_detail = Score::select('id','level_4','year')->where([['level_4', '=', $row[3]], ['year', '=', $row[4]]])->first();
                if(!empty($score_detail)) {
                    $score_detail_id = $score_detail_id->id;
                    Score::where([['id', '=', $score_detail_id]])->update($score_fields);
                } else {
                    $score_detail = Score::create($score_fields);
                    $score_detail->region_id = $region_id;
                    $score_id = $score_detail->id;
                }
            // }
        }
        // Excel::import(new ImportScore,$view);
        return redirect('admin/score')->with('success', trans('Score Imported successfully.'));
    }
}
