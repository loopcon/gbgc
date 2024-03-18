<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Region;
use DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\DataText;
use App\Models\LevelMaster;
class Importdatatext implements ToCollection
{
    private $region;
    private $file;

    public function __construct($region , $file)
    {
        $this->region = $region;
        $this->file = $file;
    }

       public function collection(Collection $rows)
    {
        $skipFirstRow = true;
        foreach ($rows as $row) {

            if ($skipFirstRow) {
                $skipFirstRow = false;
                continue;
            }

            // Check if all required columns have non-empty values
            if (!empty($row[0]) && !empty($row[1]) && !empty($row[2]) && !empty($row[3]) && !empty($row[4])) {
                $level1 = LevelMaster::where('title', $row[0])->where(['level_number'=>1])->pluck('id')->first();
                $level2 = LevelMaster::where('title', $row[1])->where('parent_id',$level1)->where(['level_number'=>2])->pluck('id')->first();
                $level3 = LevelMaster::where('title', $row[2])->where('parent_id',$level2)->where(['level_number'=>3])->pluck('id')->first();
                $level4 = LevelMaster::where('title', $row[3])->where('parent_id',$level3)->where(['level_number'=>4])->pluck('id')->first();
                $details = $row[4];

                  $existingEntry = DataText::where([
                                    'region_id' => $this->region,
                                    'main_category' => $level1,
                                    'sub_category_1' => $level2,
                                    'sub_category_2' => $level3,
                                    'level_4' => $level4,
                                ])->first();
                if (!$existingEntry) {
                    DataText::create([
                        'region_id' => $this->region,
                        'main_category' => $level1,
                        'sub_category_1' => $level2,
                        'sub_category_2' => $level3,
                        'level_4' => $level4,
                        'description' => $details,
                    ]);
                }
            }
        }
        return;
    }

}
