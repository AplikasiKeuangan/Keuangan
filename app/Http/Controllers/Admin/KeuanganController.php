<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Keuangan;
use App\Kategori;
use App\KasTunai;
use App\KasBank;
use Carbon\Carbon;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $keuangan = Keuangan::all();
        $kategori=Kategori::pluck('id')->all();
        return view('admin.Penerimaan.Keuangan.index',compact('keuangan','kategori'));
    }

    public function index1()
    {
        //code awal
        $timeNow    = Carbon::now();
        $haris = [];
        $nama_bulans = [];
        $bulans = [];
        $tahuns = [];
        date_default_timezone_set("Asia/Jakarta");

        $greeting = time();
        $hour = date("G",$greeting);

        if ($hour>=0 && $hour<=11)
        {
        $ucapan = ("Selamat Pagi");
        }
        elseif ($hour >=12 && $hour<=14)
        {
         $ucapan = ("Selamat Siang ");
        }
        elseif ($hour >=15 && $hour<=17)
        {
         $ucapan = ("Selamat Sore ");
        }
        elseif ($hour >=17 && $hour<=18)
        {
         $ucapan = ("Selamat Petang ");
        }
        elseif ($hour >=19 && $hour<=23)
        {
         $ucapan = ("Selamat Malam ");
        };
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
        $penerimaan = Keuangan::all();
        $totalpenerimaan = $penerimaan->sum('penerimaan');
        return view('admin.Penerimaan.index',compact('totalpenerimaan','haris','nama_bulans','jumlah_debit_per_bulans','jumlah_kredit_per_bulans','jumlah_debit_per_haris','jumlah_kredit_per_haris','jumlah_debit_bank_per_bulans','jumlah_kredit_bank_per_bulans','jumlah_debit_bank_per_haris','jumlah_kredit_bank_per_haris','ucapan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request,[
                'kategori'=>'required|max:255|unique:keuangans,kategori_id'
            ]);

            
            $keuangan = new Keuangan;
            $keuangan->tanggal = $request->tanggal;
            $keuangan->kategori_id = $request->kategori;
            $keuangan->keterangan = $request->keterangan;
           

            if ($request->jenis == 'penerimaan') {
                $keuangan->pengeluaran = 0;
                $keuangan->penerimaan = $request->nominal;
            
            }else{
                return redirect(route('admin-Data-keuangan-index'))->with('error','Data Gagal Ditambah');
            }
           $keuangan->save();
            return redirect('/admin/Data/keuangan/')->with('success','Data Berhasil Ditambahkan');
        
        } catch (\Throwable $th) {
            return back()->with('warning','Terjadi Kesalahan');

        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $kategori=Kategori::pluck('id')->all();
        $keuangan = Keuangan::findOrfail($id);
        $edit_category=Kategori::findOrFail($keuangan->kategori_id);
        return view('admin.Penerimaan.Keuangan.edit_keuangan',compact('keuangan','kategori','edit_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

           $this->validate($request,[
                'kategori'=>'required|max:255|unique:keuangans,kategori_id'
            ]);

            $keuangan = Keuangan::findOrfail($id);
            $keuangan->tanggal = $request->tanggal;
            $keuangan->kategori_id = $request->kategori;
            $keuangan->keterangan = $request->keterangan;

            if ($request->jenis == 'penerimaan') {
                $keuangan->pengeluaran = 0;
                $keuangan->penerimaan = $request->nominal;
            
            }else{
                return redirect(route('admin-Data-keuangan-index'))->with('error','Data Gagal Diupdate');
            }
           $keuangan->update();
            return redirect('/admin/Data/keuangan/')->with('success','Data Berhasil Diupdate');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keuangan = Keuangan::findOrfail($id);
        $keuangan->delete();

        if ($keuangan) {
            alert()->success('Data Berhasil Dihapus!');
        }else{
            alert()->error('Data Gagal Dihapus!');
        }
        return back();
    }
}
