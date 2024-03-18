<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use App\Models\Score;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

        // Initialize variables to track level changes
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

        // Loop through each combination of levels
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
                    $totalRow[3] = 'Total 3';
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
                    $totalRow[2] = 'Total 2'; // Setting 'Total 2' in Level-2 cell
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
                    $totalRow = array_fill(0, 3, '');
                    $totalRow[1] = 'Total 1';
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
                ($printLevel1) ? $combination->maincategoryDetail->title : '', // Print level 1 only once
                ($printLevel2) ? $combination->subcategory1Detail->title : '', // Print level 2 only once
                ($printLevel3) ? $combination->subcategory2Detail->title : '', // Print level 3 only once
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
            $totalRow[3] = 'Total3'; // Setting 'Total' in Level-4 cell
            foreach ($totalScoreLevel4 as $total) {
                $totalRow[] = $total;
            }
            $exportData[] = $totalRow;
        }

         if (!empty($totalScoreLevel3)) {
            // Add 'Total' in Level-3 cell
            $totalRow = array_fill(0, 4, ''); // Filling array with empty strings
            $totalRow[2] = 'Total 2'; // Setting 'Total 3' in Level-3 cell
            foreach ($totalScoreLevel3 as $total) {
                $totalRow[] = $total;
            }
            $exportData[] = $totalRow;
        }

        // Add total score for the last Level 1
        if (!empty($totalScoreLevel1)) {
            // Add 'Total' in Level-1 cell
            $totalRow = array_fill(0, 4, ''); // Filling array with empty strings
            $totalRow[1] = 'Total 1'; // Setting 'Total 1' in Level-1 cell
            foreach ($totalScoreLevel1 as $total) {
                $totalRow[] = $total;
            }
            $exportData[] = $totalRow;
        }

        return $exportData;
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

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $highestRow = $event->sheet->getDelegate()->getHighestRow();
                $prevLevel1 = null;
                $mergeStartRow = 2;
                
                for ($i = 2; $i <= $highestRow; $i++) {
                    $currentLevel1 = $event->sheet->getDelegate()->getCell('A'.$i)->getValue();
                    if ($prevLevel1 !== null && $currentLevel1 !== $prevLevel1) {
                        $mergeEndRow = $i - 1;
                        $event->sheet->getDelegate()->mergeCells("A{$mergeStartRow}:A{$mergeEndRow}");
                        $prevLevel1 = $currentLevel1;
                        $mergeStartRow = $i;
                    }
                    $prevLevel1 = $currentLevel1;
                }
            },
        ];
    }
}
