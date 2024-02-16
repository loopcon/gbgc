<?php

namespace App\Imports;

use App\Models\Score;
use App\Models\Region;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\LevelMaster;
use DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ImportScore implements WithMultipleSheets
{

    private $region;
    private $file;

    public function __construct($region , $file)
    {
        $this->region = $region;
        $this->file = $file;
    }

public function sheets(): array
{
    static $columnHeaders = null;
    static $rowIndex = 0;

    $sheets = [];

    $spreadsheet = IOFactory::load($this->file->getRealPath());
    $sheetCount = $spreadsheet->getSheetCount();

    for ($sheetIndex = 0; $sheetIndex < $sheetCount; $sheetIndex++) {
        $sheet = $spreadsheet->getSheet($sheetIndex);
        $sheetName = $sheet->getTitle();
        $parts = explode('-', $sheetName);
        $view = trim($parts[0]);
        $currency = trim($parts[1]); 

        $sheetData = $sheet->toArray();
        foreach ($sheetData as $row) {
           
           if ($row[0] === 'Level-1') {
                $columnHeaders = $row;
            } //endif
            elseif ($columnHeaders !== null){
            if($row[0] !== null && count($row) >= 4)
            {
                $years = array_slice($columnHeaders, 4);
                $numScores = count($row) - 4;
                $scores = [];

            for ($i = 0; $i < $numScores; $i++) {
                $cellAddress = $this->getCellAddress(4 + $i, $rowIndex);
                // $comment = $this->getExcelComment($cellAddress);
                $comment = $this->getExcelComment(4 + $i, $rowIndex);

                $year = $years[$i];
                $score = $row[4 + $i];
                $level1 = LevelMaster::where('title', $row[0])->where(['level_number'=>1])->pluck('id')->first();
                $level2 = LevelMaster::where('title', $row[1])->where('parent_id',$level1)->where(['level_number'=>2])->pluck('id')->first();
                $level3 = LevelMaster::where('title', $row[2])->where('parent_id',$level2)->where(['level_number'=>3])->pluck('id')->first();
                $level4 = LevelMaster::where('title', $row[3])->where('parent_id',$level3)->where(['level_number'=>4])->pluck('id')->first();

                $data = [
                    'view' => $view,
                    'region_id' => $this->region,
                    'currency_id'=>$currency,
                    'level_1' => $level1,
                    'level_2' => $level2,
                    'level_3' => $level3,
                    'level_4' => $level4,
                    'year' => $year,
                    'score' => $score,
                    'comment'=>$comment,
                ];
                $existingData = DB::table('scores')
                    ->where('view', $view)
                    ->where('region_id', $this->region)
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
                $rowIndex++; // Increment rowIndex for the next row
            }
        } else {
            return []; // Return an empty array to indicate an empty sheet
        }
    } // end sheetData

    }
    return $sheets;
}

    private function getExcelComment($columnIndex, $rowIndex)
    {
        $rowIndex++;

        $spreadsheet = IOFactory::load($this->file->getRealPath());
        $sheet = $spreadsheet->getActiveSheet();
        $cellCoordinate = $this->getCellAddress($columnIndex, $rowIndex);
        $comment = $sheet->getComment($cellCoordinate);
        return $comment ? $comment->getText()->getPlainText() : null;
    }



    private function getCellAddress($columnIndex, $rowIndex)
    {
    $column = chr($columnIndex + 65); // Convert column index to corresponding letter (A-Z)
    $cellAddress = $column . ($rowIndex + 1); // Add 1 to row index since it is zero-based
    return $cellAddress;
    }

}
