<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportScore implements FromArray, WithHeadings
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        return $this->data;
    }

    public function headings(): array
    {
        // Define headings for your Excel sheet
        return [
            'Level 1',
            'Level 2',
            'Level 3',
            'Level 4',
        ];
    }
}


