<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KasBank;
use Carbon\Carbon;
use DataTables;

class KasBankController extends Controller
{
    public function index(){
        $kasBank = KasBank::whereNotNull('created_at')->get();
        $totaldebit = $kasBank->sum('debit');
        $totalkredit = $kasBank->sum('kredit');
        
        $totalsaldo = $kasBank->sum('debit') - $kasBank->sum('kredit');
        return view('Admin.Kas.Bank.index', compact('totaldebit','totalkredit','totalsaldo'));
    }
    public function data(Request $request)
    {
        if ($request->ajax()) {
            $kasBank  = KasBank::orderBy('created_at', 'DESC')->whereNotNull('created_at')->get();
            return DataTables::of($kasBank)
                ->addColumn('ditambahkan_pada', function($kasBank){
                    return $kasBank->created_at->diffForHumans();
                })
                ->addColumn('debit', function($kasBank){
                    if($kasBank->debit == 0){
                        return "-";
                    }
                    return $kasBank->debit;
                })
                ->addColumn('kredit', function($kasBank){
                    if($kasBank->kredit == 0){
                        return "-";
                    }
                    return $kasBank->kredit;
                })
                ->addColumn('saldo', function($kasBank){
                    return KasBank::where('created_at', "<=", $kasBank->created_at)->sum('debit') - KasBank::where('created_at', "<=", $kasBank->created_at)->sum('kredit');
                })
                ->addColumn('action', function($kasBank){
                    if($kasBank->id_kas_bank == KasBank::orderBy('id_kas_bank','DESC')->first()->id_kas_bank){
                        return '<a data-admin="/admin/kas/bank/'.$kasBank->id_kas_bank.'/hapus" class="btn btn-danger admin-remove" onclick="adminDelete()" href="#"><i class="fa fa-eraser"></i> Delete</a>';
                    }
                    return '';
                })
                ->make(true);
        }else{
            return abort(403);
        }
    }
    public function store(Request $request){
        try{
            $kasBank = new KasBank();
            $kasBank->tanggal = Carbon::now();
            $kasBank->no_bukti = $request->no_bukti;
            $kasBank->no_rekening = $request->no_rekening;
            $kasBank->uraian = $request->uraian;
            if($request->jenis == "Kredit"){
                if((KasBank::get()->sum('kredit') <= KasBank::get()->sum('debit')) && ((KasBank::get()->sum('debit') - KasBank::get()->sum('kredit')) >= $request->nominal)){
                    $kasBank->debit = 0;
                    $kasBank->kredit = $request->nominal;
                }else{
                    return redirect()->route('admin-kas-bank-index')->with('danger', 'Tampaknya pengeluaran (Kredit) lebih banyak dari penerimaan (Debit)!');
                }
            }else{
                $kasBank->debit = $request->nominal;
                $kasBank->kredit = 0;
            }
            if(!KasBank::where('created_at', Carbon::now())->first()){
                $kasBank->save();
                return redirect()->route('admin-kas-bank-index')->with('success', 'Berhasil ditambahkan!');
            }
            return redirect()->route('admin-kas-bank-index')->with('danger', 'Data gagal ditambahkan, harap masukkan data beberapa saat lagi');
        }catch(Exception $e){
            return redirect()->route('admin-kas-bank-index')->with('danger', 'Harap masukkan inputan dengan benar!');
        }
    }
    public function destroy($id_kas_bank)
    {
        try {
            $lastKasBank = KasBank::orderBy('id_kas_bank','DESC')->first();
            if($id_kas_bank == $lastKasBank->id_kas_bank){
                $lastKasBank->delete();
            }else{
                return redirect()->route('admin-kas-bank-index')->with('danger', 'Gagal ini tidak bisa dihapus!');
            }
            return redirect()->route('admin-kas-bank-index')->with('success', 'Berhasil dihapus!');
        } catch (\Exception $th) {
            return redirect()->route('admin-kas-bank-index')->with('danger', 'Gagal dihapus!');
        }
    }
    public function chart($timeNow, $haris, $bulans, $tahuns)
    {
        $jumlah_debit_per_bulans = [];
        for ($i=0; $i < count($bulans) ; $i++) { 
            $jumlah_debit_per_bulans[] = KasBank::whereNotNull('created_at')->whereMonth('tanggal',$bulans[$i])->whereYear('tanggal',$tahuns[$i])->get()->sum('debit');
        }
        $jumlah_kredit_per_bulans = [];
        for ($i=0; $i < count($bulans) ; $i++) { 
            $jumlah_kredit_per_bulans[] = KasBank::whereNotNull('created_at')->whereMonth('tanggal',$bulans[$i])->whereYear('tanggal',$tahuns[$i])->get()->sum('kredit');
        }
        $jumlah_debit_per_haris = [];
        for ($i=0; $i < count($haris) ; $i++) { 
            $jumlah_debit_per_haris[] = KasBank::whereNotNull('created_at')->whereDay('tanggal',$haris[$i])->whereMonth('tanggal',$timeNow->format('m'))->whereYear('tanggal',$timeNow->format('Y'))->get()->sum('debit');
        }
        $jumlah_kredit_per_haris = [];
        for ($i=0; $i < count($haris) ; $i++) { 
            $jumlah_kredit_per_haris[] = KasBank::whereNotNull('created_at')->whereDay('tanggal',$haris[$i])->whereMonth('tanggal',$timeNow->format('m'))->whereYear('tanggal',$timeNow->format('Y'))->get()->sum('kredit');
        }
        return [
            'jumlah_debit_per_bulans' => $jumlah_debit_per_bulans,
            'jumlah_kredit_per_bulans' => $jumlah_kredit_per_bulans,
            'jumlah_debit_per_haris' => $jumlah_debit_per_haris,
            'jumlah_kredit_per_haris' => $jumlah_kredit_per_haris
            ];
    }
}
