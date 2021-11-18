<?php

namespace App\Exports;

use App\Absensi;
use Maatwebsite\Excel\Concerns\FromCollection;

class AbsensiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Absensi::all();
    }
}
