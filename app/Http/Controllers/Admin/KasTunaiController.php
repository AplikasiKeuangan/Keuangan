<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KasTunai;
use DataTables;
use Carbon\Carbon;

class KasTunaiController extends Controller
{
    public function index(){
        return view('admin.kas.tunai.index');
    }
    public function data(Request $request)
    {
        if ($request->ajax()) {
            $kastunai  = KasTunai::get();
            return DataTables::of($kastunai)
                ->addColumn('saldo', function($kastunai){
                    return KasTunai::where('id_kas_tunai', "<=", $kastunai->id_kas_tunai)->sum('debit') - KasTunai::where('id_kas_tunai', "<=", $kastunai->id_kas_tunai)->sum('kredit');
                })
                ->addColumn('action', function($kastunai){
                    if($kastunai->id_kas_tunai == KasTunai::orderBy('id_kas_tunai','DESC')->first()->id_kas_tunai){
                        return '<a data-admin="/admin/kas/tunai/'.$kastunai->id_kas_tunai.'/hapus" class="btn btn-danger admin-remove" href="/admin/kas/tunai/'.$kastunai->id_kas_tunai.'/hapus" onclick="adminDelete()"><i class="fa fa-eraser"></i> Delete</a>';
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
            $kasTunai->save();
            return redirect()->route('admin-kas-tunai-index')->with('success', 'Berhasil ditambahkan!');
        }catch(Exception $e){
            return redirect()->route('admin-kas-tunai-index')->with('danger', 'Harap masukkan inputan dengan benar!');
        }
    }
    public function destroy($id_kas_tunai)
    {
        try {
            $lastKasTunai = KasTunai::orderBy('id_kas_tunai','DESC')->first();
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
}
