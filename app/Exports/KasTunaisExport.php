<?php

namespace App\Exports;

use App\KasTunai;
use Maatwebsite\Excel\Concerns\FromCollection;

class KasTunaisExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return KasTunai::all();
    }
}
