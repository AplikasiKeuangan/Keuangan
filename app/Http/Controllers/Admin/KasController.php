<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\KasBank;
use App\KasTunai;

class KasController extends Controller
{
    public function index(){
        $kasBank = KasBank::get();
        $totalDebitBank = $kasBank->sum('debit');
        $totalKreditBank = $kasBank->sum('kredit');
        $saldoAkhirBank = $totalDebitBank - $totalKreditBank;

        $kasTunai = KasTunai::get();
        $totalDebitTunai = $kasTunai->sum('debit');
        $totalKreditTunai = $kasTunai->sum('kredit');
        $saldoAkhirTunai = $totalDebitTunai - $totalKreditTunai;
        //code 
        $timeNow    = Carbon::now();
        $chart_date_time = app('App\Http\Controllers\HomeController')->chart_date_time($timeNow);
        $haris = $chart_date_time['haris'];
        $nama_bulans = $chart_date_time['nama_bulans'];
        $bulans = $chart_date_time['bulans'];
        $tahuns = $chart_date_time['tahuns'];

        //code lanjutan
        ////Kas Tunai
        $chart_kas_tunai = app('App\Http\Controllers\Admin\KasTunaiController')->chart($timeNow, $haris, $bulans, $tahuns);
        $jumlah_debit_per_bulans = $chart_kas_tunai['jumlah_debit_per_bulans'];
        $jumlah_kredit_per_bulans = $chart_kas_tunai['jumlah_kredit_per_bulans'];
        $jumlah_debit_per_haris = $chart_kas_tunai['jumlah_debit_per_haris'];
        $jumlah_kredit_per_haris = $chart_kas_tunai['jumlah_kredit_per_haris'];
        ////Kas Bank
        $chart_kas_bank = app('App\Http\Controllers\Admin\KasBankController')->chart($timeNow, $haris, $bulans, $tahuns);
        $jumlah_debit_bank_per_bulans = $chart_kas_bank['jumlah_debit_per_bulans'];
        $jumlah_kredit_bank_per_bulans = $chart_kas_bank['jumlah_kredit_per_bulans'];
        $jumlah_debit_bank_per_haris = $chart_kas_bank['jumlah_debit_per_haris'];
        $jumlah_kredit_bank_per_haris = $chart_kas_bank['jumlah_kredit_per_haris'];
    
        return view('admin.kas.index', compact('haris','nama_bulans','jumlah_debit_per_bulans','jumlah_kredit_per_bulans','jumlah_debit_per_haris','jumlah_kredit_per_haris','jumlah_debit_bank_per_bulans','jumlah_kredit_bank_per_bulans','jumlah_debit_bank_per_haris','jumlah_kredit_bank_per_haris','saldoAkhirBank','saldoAkhirTunai'));
    }
}
