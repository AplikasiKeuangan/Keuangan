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
        $kasBank = KasBank::get();
        $totaldebit = $kasBank->sum('debit');
        $totalkredit = $kasBank->sum('kredit');
        
        $totalsaldo = $kasBank->sum('debit') - $kasBank->sum('kredit');
        return view('admin.kas.bank.index', compact('totaldebit','totalkredit','totalsaldo'));
    }
    public function data(Request $request)
    {
        if ($request->ajax()) {
            $kasBank  = KasBank::get();
            return DataTables::of($kasBank)
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
                    return KasBank::where('id_kas_bank', "<=", $kasBank->id_kas_bank)->sum('debit') - KasBank::where('id_kas_bank', "<=", $kasBank->id_kas_bank)->sum('kredit');
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
            $kasBank->save();
            return redirect()->route('admin-kas-bank-index')->with('success', 'Berhasil ditambahkan!');
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
}
