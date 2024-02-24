<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Score;

class ExportScore implements FromArray, WithHeadings
{
    public function array(): array
    {
        // Fetch year data
        $yeardata = Score::where('view', 'Standard')
            ->where('currency_id', 'USD')
            ->pluck('year')
            ->unique()
            ->toArray();

        // Define an empty array to store the exported data
        $exportData = [];

        // Initialize variables to track level 3 changes
        $prevLevel3 = null;
        $totalScoreLevel4 = [];

        // Fetch distinct combinations of levels
        $combinations = Score::with('maincategoryDetail','subcategory1Detail','subcategory2Detail','level4Detail')->select('level_1', 'level_2', 'level_3', 'level_4')
            ->distinct()
            ->get();

        // Loop through each combination of levels
        foreach ($combinations as $combination) {
            // If level 3 changes, add total score for level 4 and reset totalScoreLevel4 array
            if ($prevLevel3 !== $combination->level_3) {
                $this->addTotalScoreLevel4($exportData, $prevLevel3, $totalScoreLevel4, $yeardata);
                $prevLevel3 = $combination->level_3;
                $totalScoreLevel4 = array_fill(0, count($yeardata), 0);
            }

            // Initialize row data with level details
            $rowData = [
                $combination->maincategoryDetail ? $combination->maincategoryDetail->title : '',
                $combination->subcategory1Detail ? $combination->subcategory1Detail->title : '',
                $combination->subcategory2Detail ? $combination->subcategory2Detail->title : '',
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
            foreach ($yeardata as $index => $year) {
                $score = isset($scores[$year]) ? $scores[$year] : 0;
                $rowData[] = $score;
                $totalScoreLevel4[$index] += $score;
            }

            // Add row data to the export data
            $exportData[] = $rowData;
        }

        // Add total score for the last level 3
        $this->addTotalScoreLevel4($exportData, $prevLevel3, $totalScoreLevel4, $yeardata);

        return $exportData;
    }

    // Function to add total score for level 4
    private function addTotalScoreLevel4(&$exportData, $level3, $totalScoreLevel4, $yeardata)
    {
        if ($level3 !== null) {
            $rowData = [
                
                '', // Blank for Level 2
                '', // Blank for Level 3
                '', // Blank for Level 4
                'Total'
            ];

            // Add total scores for each year
            foreach ($totalScoreLevel4 as $total) {
                $rowData[] = $total;
            }

            // Add row data to the export data
            $exportData[] = $rowData;
        }
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
            'Level-1',
            'Level-2',
            'Level-3',
            'Level-4',
        ];

        // Add year data as headings
        foreach ($yeardata as $year) {
            $headings[] = $year;
        }

        return $headings;
    }
}
