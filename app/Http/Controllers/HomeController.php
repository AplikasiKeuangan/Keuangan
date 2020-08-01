<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\KasTunai;
use App\KasBank;
use App\User;
use Auth;

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
        $kasBank = KasBank::whereNotNull('created_at')->get();
        $totalDebitBank = $kasBank->sum('debit');
        $totalKreditBank = $kasBank->sum('kredit');
        $saldoAkhirBank = $totalDebitBank - $totalKreditBank;

        $kasTunai = KasTunai::whereNotNull('created_at')->get();
        $totalDebitTunai = $kasTunai->sum('debit');
        $totalKreditTunai = $kasTunai->sum('kredit');
        $saldoAkhirTunai = $totalDebitTunai - $totalKreditTunai;
        //code 
        $timeNow    = Carbon::now();
        $chart_date_time = $this->chart_date_time($timeNow);
        $haris = $chart_date_time['haris'];
        $nama_bulans = $chart_date_time['nama_bulans'];
        $bulans = $chart_date_time['bulans'];
        $tahuns = $chart_date_time['tahuns'];

        $greeting = time();
        $hour = date("G",$greeting);
        
        if ($hour>=0 && $hour<=11)
        {
        $ucapan = ("Selamat Pagi");
        }
        elseif ($hour >=12 && $hour<=14)
        {
         $ucapan = ("Selamat Siang");
        }
        elseif ($hour >=15 && $hour<=17)
        {
         $ucapan = ("Selamat Sore");
        }
        elseif ($hour >=17 && $hour<=18)
        {
         $ucapan = ("Selamat Petang");
        }
        elseif ($hour >=19 && $hour<=23)
        {
         $ucapan = ("Selamat Malam");
        };

        //code lanjutan
            //Kas Tunai
        $chart_kas_tunai = app('App\Http\Controllers\Admin\KasTunaiController')->chart($timeNow, $haris, $bulans, $tahuns);
        $jumlah_debit_per_bulans = $chart_kas_tunai['jumlah_debit_per_bulans'];
        $jumlah_kredit_per_bulans = $chart_kas_tunai['jumlah_kredit_per_bulans'];
        $jumlah_debit_per_haris = $chart_kas_tunai['jumlah_debit_per_haris'];
        $jumlah_kredit_per_haris = $chart_kas_tunai['jumlah_kredit_per_haris'];
            //Kas Bank
        $chart_kas_bank = app('App\Http\Controllers\Admin\KasBankController')->chart($timeNow, $haris, $bulans, $tahuns);
        $jumlah_debit_bank_per_bulans = $chart_kas_bank['jumlah_debit_per_bulans'];
        $jumlah_kredit_bank_per_bulans = $chart_kas_bank['jumlah_kredit_per_bulans'];
        $jumlah_debit_bank_per_haris = $chart_kas_bank['jumlah_debit_per_haris'];
        $jumlah_kredit_bank_per_haris = $chart_kas_bank['jumlah_kredit_per_haris'];

        return view('home', compact('haris','nama_bulans','jumlah_debit_per_bulans','jumlah_kredit_per_bulans','jumlah_debit_per_haris','jumlah_kredit_per_haris','jumlah_debit_bank_per_bulans','jumlah_kredit_bank_per_bulans','jumlah_debit_bank_per_haris','jumlah_kredit_bank_per_haris','ucapan','saldoAkhirBank','saldoAkhirTunai'));
    }
    public function profile()
    {
        return view('admin.profile');
    }
    public function profile_edit()
    {
        return view('admin.profile-edit');
    }
    public function profile_update(Request $request)
    {
        Try{
            $user = User::find(Auth::User()->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->update();
            return redirect()->route('admin-profile')->with('success', 'Data berhasil diupdate!');
        }catch(Exception $e){
            return redirect()->route('admin-profile')->with('danger', 'Data gagal diupdate!');
        }
    }
    public function test()
    {
        return view('layouts.apps');
    }
    public function greeting()
    {
        

    }
    public function chart_date_time($timeNow){
        $haris = [];
        $nama_bulans = [];
        $bulans = [];
        $tahuns = [];

        //tanggal sekarang - tanggal 1
        for ($i=0; $i < $timeNow->format('d') ; $i++) {
            $haris[] = $timeNow->format('d') - $i;
        }
        //bulan dan tahun
        for ($i=0; $i < 12 ; $i++) {
            if($timeNow->format('m') < ($i+1)){
                $bulans[] = (12 + ($timeNow->format('m') - $i));
                $tahuns[] = $timeNow->format('Y') - 1;
            }else{
                $bulans[] = $timeNow->format('m') - $i;
                $tahuns[] = $timeNow->format('Y') + 0;
            }
        }
        //nama bulan
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
        
        return [
            'haris' => $haris,
            'nama_bulans' => $nama_bulans,
            'bulans' => $bulans,
            'tahuns' => $tahuns
        ];
    }
}
