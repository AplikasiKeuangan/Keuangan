<?php

namespace App\Exports;

use App\KasBank;
use Maatwebsite\Excel\Concerns\FromCollection;

class KasBanksExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return KasBank::all();
    }
}
