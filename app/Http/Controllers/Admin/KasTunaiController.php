<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KasTunai;
use DataTables;
use Carbon\Carbon;
use DateTime;

class KasTunaiController extends Controller
{
    public function index(){
        $kasTunai = KasTunai::whereNotNull('created_at')->get();
        $totaldebit = $kasTunai->sum('debit');
        $totalkredit = $kasTunai->sum('kredit');
        
        $totalsaldo = $kasTunai->sum('debit') - $kasTunai->sum('kredit');
        return view('Admin.Kas.Tunai.index', compact('totaldebit','totalkredit','totalsaldo'));
    }
    public function data(Request $request)
    {
        if ($request->ajax()) {
            $kastunai  = KasTunai::whereNotNull('created_at')->orderBy('created_at', 'DESC')->get();
            return DataTables::of($kastunai)
                ->addColumn('ditambahkan_pada', function($kastunai){
                    return $kastunai->created_at->diffForHumans();
                })
                ->addColumn('debit', function($kastunai){
                    if($kastunai->debit == 0){
                        return "-";
                    }
                    return $kastunai->debit;
                })
                ->addColumn('kredit', function($kastunai){
                    if($kastunai->kredit == 0){
                        return "-";
                    }
                    return $kastunai->kredit;
                })
                ->addColumn('saldo', function($kastunai){
                    return (KasTunai::where('created_at', '<=', $kastunai->created_at)->sum('debit') - (KasTunai::where('created_at', '<=', $kastunai->created_at))->sum('kredit'));
                })
                ->addColumn('action', function($kastunai){
                    if($kastunai->id_kas_tunai == KasTunai::orderBy('created_at','DESC')->first()->id_kas_tunai){
                        return '<a data-admin="/admin/kas/tunai/'.$kastunai->id_kas_tunai.'/hapus" class="btn btn-danger admin-remove" onclick="adminDelete()" href="#"><i class="fa fa-eraser"></i> Delete</a>';
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
            $kasTunai = new KasTunai();
            $kasTunai->tanggal = Carbon::now();
            $kasTunai->no_bukti = $request->no_bukti;
            $kasTunai->uraian = $request->uraian;
            if($request->jenis == "Kredit"){
                if((KasTunai::get()->sum('kredit') <= KasTunai::get()->sum('debit')) && ((KasTunai::get()->sum('debit') - KasTunai::get()->sum('kredit')) >= $request->nominal)){
                    $kasTunai->debit = 0;
                    $kasTunai->kredit = $request->nominal;
                }else{
                    return redirect()->route('admin-kas-tunai-index')->with('danger', 'Tampaknya pengeluaran (Kredit) lebih banyak dari penerimaan (Debit)!');
                }
            }else{
                $kasTunai->debit = $request->nominal;
                $kasTunai->kredit = 0;
            }
            if(!KasTunai::where('created_at', Carbon::now())->first()){
                $kasTunai->save();
                return redirect()->route('admin-kas-tunai-index')->with('success', 'Berhasil ditambahkan!');
            }else{
                return redirect()->route('admin-kas-tunai-index')->with('danger', 'Data gagal ditambahkan, harap masukkan data beberapa saat lagi!');
            }
        }catch(Exception $e){
            return redirect()->route('admin-kas-tunai-index')->with('danger', 'Harap masukkan inputan dengan benar!');
        }
    }
    public function destroy($id_kas_tunai)
    {
        try {
            $lastKasTunai = KasTunai::orderBy('create_at','DESC')->first();
            if($id_kas_tunai == $lastKasTunai->id_kas_tunai){
                $lastKasTunai->delete();
            }else{
                return redirect()->route('admin-kas-tunai-index')->with('danger', 'Gagal ini tidak bisa dihapus!');
            }
            return redirect()->route('admin-kas-tunai-index')->with('success', 'Berhasil dihapus!');
        } catch (\Exception $th) {
            return redirect()->route('admin-kas-tunai-index')->with('danger', 'Gagal dihapus!');
        }
    }
    public function chart($timeNow, $haris, $bulans, $tahuns){
        $jumlah_debit_per_bulans = [];
        for ($i=0; $i < count($bulans) ; $i++) { 
            $jumlah_debit_per_bulans[] = KasTunai::whereNotNull('created_at')->whereMonth('tanggal',$bulans[$i])->whereYear('tanggal',$tahuns[$i])->get()->sum('debit');
        }
        $jumlah_kredit_per_bulans = [];
        for ($i=0; $i < count($bulans) ; $i++) { 
            $jumlah_kredit_per_bulans[] = KasTunai::whereNotNull('created_at')->whereMonth('tanggal',$bulans[$i])->whereYear('tanggal',$tahuns[$i])->get()->sum('kredit');
        }
        $jumlah_debit_per_haris = [];
        for ($i=0; $i < count($haris) ; $i++) { 
            $jumlah_debit_per_haris[] = KasTunai::whereNotNull('created_at')->whereDay('tanggal',$haris[$i])->whereMonth('tanggal',$timeNow->format('m'))->whereYear('tanggal',$timeNow->format('Y'))->get()->sum('debit');
        }
        $jumlah_kredit_per_haris = [];
        for ($i=0; $i < count($haris) ; $i++) { 
            $jumlah_kredit_per_haris[] = KasTunai::whereNotNull('created_at')->whereDay('tanggal',$haris[$i])->whereMonth('tanggal',$timeNow->format('m'))->whereYear('tanggal',$timeNow->format('Y'))->get()->sum('kredit');
        }
        return [
            'jumlah_debit_per_bulans' => $jumlah_debit_per_bulans,
            'jumlah_kredit_per_bulans' => $jumlah_kredit_per_bulans,
            'jumlah_debit_per_haris' => $jumlah_debit_per_haris,
            'jumlah_kredit_per_haris' => $jumlah_kredit_per_haris
            ];
    }
}
