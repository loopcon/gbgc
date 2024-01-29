<?php

namespace App\Imports;

use App\Models\Score;
use App\Models\Region;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportScore implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        print_r($row);exit;
        $region_id = Region::select('id')->where('name','=',$row[3])->first();

        $score = Score::where([['level_4','=',$row[3]],['year','=',$row[4]]])->first();
        if(!empty($score))
        {
            $score->update([
                'view' => $row->view,
                'region_id' => $region_id->id,
                'main_category' => $row[0],
                'sub_category_1' => $row[1],
                'sub_category_2' => $row[2],
                'level_4' => $row[3],
                'year' => $row[4],
                'score' => $row[6],
            ]);
        }
        else 
        {
            return new Score([
                'view' => $row->view,
                'region_id' => $row[3],
                'main_category' => $row[0],
                'sub_category_1' => $row[1],
                'sub_category_2' => $row[2],
                'level_4' => $row[3],
                'year' => $row[4],
                'score' => $row[6],
            ]);
        }
    }
}
