<?php

namespace App\Exports;

use App\Models\DataPendaki;
use Maatwebsite\Excel\Concerns\FromCollection;

class DatapendakiforexportExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DataPendaki::all();
    }
}
