<?php

namespace App\Exports;

use App\Models\Score;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportReport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Score::all();
    }
    public function map($row): array
    {
        return [
            $row->id,
            $row->view,
            isset($row->regionDetail->name) && $row->regionDetail->name ? $row->regionDetail->name : NULL,
            isset($row->currencyDetail->name) && $row->currencyDetail->name ? $row->currencyDetail->name : NULL,
            isset($row->maincategoryDetail->title) && $row->maincategoryDetail->title ? $row->maincategoryDetail->title : NULL,
            isset($row->subcategory1Detail->title) && $row->subcategory1Detail->title ? $row->subcategory1Detail->title : NULL,
            isset($row->subcategory2Detail->title) && $row->subcategory2Detail->title ? $row->subcategory2Detail->title : NULL,
            isset($row->level4Detail->title) && $row->level4Detail->title ? $row->level4Detail->title : NULL,
            $row->year,
            $row->score,
        ];
    }

    public function headings(): array
    {
        return ["Sr.No", "View", "Jurisdiction", "Currency", "Level 1", "	level 2", "Level 3", "Level-4", "Year", "Score"];
    }
}
