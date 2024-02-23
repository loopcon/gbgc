<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Score;

class ExportScore implements FromArray, WithHeadings
{
    public function array(): array
    {
        $scores = Score::with('maincategoryDetail', 'subcategory1Detail', 'subcategory2Detail', 'level4Detail')
            ->where(['currency_id' => 'USD'])
            ->selectRaw('level_1, level_2, level_3, level_4')
            ->groupBy('level_1', 'level_2', 'level_3', 'level_4')
            ->get()
            ->toArray(); // Convert collection to array

        return $scores;
    }

    public function headings(): array
    {
        // Fetch year data
        $yeardata = Score::where('view', 'Standard')
            ->where('currency_id', 'USD')
            ->pluck('year')
            ->unique()
            ->toArray();

        // Define headings for your Excel sheet
        $headings = [
            'Level 1',
            'Level 2',
            'Level 3',
            'Level 4',
        ];

        // Add year data as headings
        foreach ($yeardata as $year) {
            $headings[] = $year;
        }

        return $headings;
    }
}
