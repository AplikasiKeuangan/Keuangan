<?php

namespace App\Exports;

use App\Pembayaran;
use Maatwebsite\Excel\Concerns\FromCollection;

class PembayaransExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pembayaran::all();
    }
}
