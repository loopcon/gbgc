<?php

namespace App\Imports;

use App\Models\Score;
use App\Models\Region;
use App\Models\Currency;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\LevelMaster;
use DB;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ImportScore implements ToModel
{
    private $view;
    private $region;
    private $file;
    private $currency;

    public function __construct($view, $region, $file,$currency)
    {
        $this->view = $view;
        $this->region = $region;
        $this->file = $file;
        $this->currency = $currency;
    }
   
    public function model(array $row)
    {
        static $columnHeaders = null;
        static $rowIndex = 0;

        if ($row[0] === 'Level1') {
            $columnHeaders = $row;
        } elseif ($columnHeaders !== null) {
            if($row[0] !== null)
            {
            $years = array_slice($columnHeaders, 4, 2);
            $numScores = count($row) - 4;
            $scores = [];

        for ($i = 0; $i < $numScores; $i++) {
            $year = $years[$i];
            $score = $row[4 + $i];
            $level1 = LevelMaster::where('title', $row[0])->where(['level_number'=>1])->pluck('id')->first();
            $level2 = LevelMaster::where('title', $row[1])->where('parent_id',$level1)->where(['level_number'=>2])->pluck('id')->first();
            $level3 = LevelMaster::where('title', $row[2])->where('parent_id',$level2)->where(['level_number'=>3])->pluck('id')->first();
            $level4 = LevelMaster::where('title', $row[3])->where('parent_id',$level3)->where(['level_number'=>4])->pluck('id')->first();
            $cellAddress = $this->getCellAddress(4 + $i, $rowIndex);
            $comment = $this->getExcelComment($cellAddress)
            $data = [
                'view' => $this->view,
                'region_id' => $this->region,
                'currency_id' => $this->currency,
                'level_1' => $level1,
                'level_2' => $level2,
                'level_3' => $level3,
                'level_4' => $level4,
                'year' => $year,
                'score' => $score,
                'comment'=>$comment,
                ];
                
                $existingData = DB::table('scores')
                ->where('view', $this->view)
                ->where('region_id', $this->region)
                ->where('currency_id', $this->currency)
                ->where('level_1', $level1)
                ->where('level_2', $level2)
                ->where('level_3', $level3)
                ->where('level_4', $level4)
                ->where('year', $year)
                ->first();

                if ($existingData) {
                        DB::table('scores')
                        ->where('id', $existingData->id)
                        ->update(['score' => $score]);
                } else {
                    $scores[] = $data;
                }
            }
            if (!empty($scores)) {
                DB::table('scores')->insert($scores);
            }
            }
            return;
        } else {
            dd("Column headers are not set.");
        }
    }

    private function getExcelComment($cellCoordinate)
    {
        $spreadsheet = IOFactory::load($this->file->getRealPath());
        $sheet = $spreadsheet->getActiveSheet();
        $comment = $sheet->getComment($cellCoordinate);
        return $comment ? $comment->getText()->getPlainText() : null;
    }
    private function getCellAddress($columnIndex, $rowIndex)
    {
        $column = chr($columnIndex + 65);
        $cellAddress = $column . ($rowIndex + 1); 
        return $cellAddress;
    }
}

