<?php

namespace App\Imports;

use App\Models\JadwalPendakian;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\ToModel;

class JadwalPendakianImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new JadwalPendakian([
            'destinasi_detail_id' => $row[1],
            'tanggal_pendakian' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[2]),
            'kuota_pendakian' => $row[3],
            'terdaftar' => $row[4],
            'biaya' => $row[5],
        ]);
    }
}
