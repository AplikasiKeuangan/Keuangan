<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\KasTunai;
use App\KasBank;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //code awal
        $timeNow    = Carbon::now();
        $haris = [];
        $nama_bulans = [];
        $bulans = [];
        $tahuns = [];
        for ($i=0; $i < $timeNow->format('d') ; $i++) {
            $haris[] = $timeNow->format('d') - $i;
        }
        for ($i=0; $i < 12 ; $i++) {
            if($timeNow->format('m') < ($i+1)){
                $bulans[] = (12 + ($timeNow->format('m') - $i));
                $tahuns[] = $timeNow->format('Y') - 1;
            }else{
                $bulans[] = $timeNow->format('m') - $i;
                $tahuns[] = $timeNow->format('Y') + 0;
            }
        }
        for ($i=0; $i < count($bulans) ; $i++) { 
            if($bulans[$i] == 1){
                $nama_bulans[] = "Januari ".$tahuns[$i];
            }else if($bulans[$i] == 2){
                $nama_bulans[] = "Februari ".$tahuns[$i];
            }else if($bulans[$i] == 3){
                $nama_bulans[] = "Maret ".$tahuns[$i];
            }else if($bulans[$i] == 4){
                $nama_bulans[] = "April ".$tahuns[$i];
            }else if($bulans[$i] == 5){
                $nama_bulans[] = "Mei ".$tahuns[$i];
            }else if($bulans[$i] == 6){
                $nama_bulans[] = "Juni ".$tahuns[$i];
            }else if($bulans[$i] == 7){
                $nama_bulans[] = "Juli ".$tahuns[$i];
            }else if($bulans[$i] == 8){
                $nama_bulans[] = "Agustus ".$tahuns[$i];
            }else if($bulans[$i] == 9){
                $nama_bulans[] = "September ".$tahuns[$i];
            }else if($bulans[$i] == 10){
                $nama_bulans[] = "Oktober ".$tahuns[$i];
            }else if($bulans[$i] == 11){
                $nama_bulans[] = "November ".$tahuns[$i];
            }else if($bulans[$i] == 12){
                $nama_bulans[] = "Desember ".$tahuns[$i];
            }
        }

        //code lanjutan
            //Kas Tunai
        $jumlah_debit_per_bulans = [];
        for ($i=0; $i < count($bulans) ; $i++) { 
            $jumlah_debit_per_bulans[] = KasTunai::whereMonth('tanggal',$bulans[$i])->whereYear('tanggal',$tahuns[$i])->get()->sum('debit');
        }
        $jumlah_kredit_per_bulans = [];
        for ($i=0; $i < count($bulans) ; $i++) { 
            $jumlah_kredit_per_bulans[] = KasTunai::whereMonth('tanggal',$bulans[$i])->whereYear('tanggal',$tahuns[$i])->get()->sum('kredit');
        }
        $jumlah_debit_per_haris = [];
        for ($i=0; $i < count($haris) ; $i++) { 
            $jumlah_debit_per_haris[] = KasTunai::whereDay('tanggal',$haris[$i])->whereMonth('tanggal',$timeNow->format('m'))->whereYear('tanggal',$timeNow->format('Y'))->get()->sum('debit');
        }
        $jumlah_kredit_per_haris = [];
        for ($i=0; $i < count($haris) ; $i++) { 
            $jumlah_kredit_per_haris[] = KasTunai::whereDay('tanggal',$haris[$i])->whereMonth('tanggal',$timeNow->format('m'))->whereYear('tanggal',$timeNow->format('Y'))->get()->sum('kredit');
        }
            //Kas Bank
        $jumlah_debit_bank_per_bulans = [];
        for ($i=0; $i < count($bulans) ; $i++) { 
            $jumlah_debit_bank_per_bulans[] = KasBank::whereMonth('tanggal',$bulans[$i])->whereYear('tanggal',$tahuns[$i])->get()->sum('debit');
        }
        $jumlah_kredit_bank_per_bulans = [];
        for ($i=0; $i < count($bulans) ; $i++) { 
            $jumlah_kredit_bank_per_bulans[] = KasBank::whereMonth('tanggal',$bulans[$i])->whereYear('tanggal',$tahuns[$i])->get()->sum('kredit');
        }
        $jumlah_debit_bank_per_haris = [];
        for ($i=0; $i < count($haris) ; $i++) { 
            $jumlah_debit_bank_per_haris[] = KasBank::whereDay('tanggal',$haris[$i])->whereMonth('tanggal',$timeNow->format('m'))->whereYear('tanggal',$timeNow->format('Y'))->get()->sum('debit');
        }
        $jumlah_kredit_bank_per_haris = [];
        for ($i=0; $i < count($haris) ; $i++) { 
            $jumlah_kredit_bank_per_haris[] = KasBank::whereDay('tanggal',$haris[$i])->whereMonth('tanggal',$timeNow->format('m'))->whereYear('tanggal',$timeNow->format('Y'))->get()->sum('kredit');
        }
        return view('home', compact('haris','nama_bulans','jumlah_debit_per_bulans','jumlah_kredit_per_bulans','jumlah_debit_per_haris','jumlah_kredit_per_haris','jumlah_debit_bank_per_bulans','jumlah_kredit_bank_per_bulans','jumlah_debit_bank_per_haris','jumlah_kredit_bank_per_haris'));
    }
    public function test()
    {
        return view('layouts.apps');
    }
}
