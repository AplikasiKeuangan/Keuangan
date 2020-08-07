<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tagihan;
use App\Pembayaran;
use App\Tahun_Ajaran;
use App\Kelas;
use App\Nama_Kelas;
use App\RelasiNamaKelasSiswa;
use App\Siswa;
use DataTables;

class TransaksiController extends Controller
{
    public function index()
    {
        $tagihan = Tagihan::orderBy('created_at','DESC')->get();
        return view('Admin.Transaksi.index',compact('tagihan'));
    }
    public function siswa(Request $request)
    {
        $value = $request->get('value');
        $data = Tagihan::find($value);
        if($data->id_kelas == NULL){
            $id_kelas = Kelas::where('tahun_ajaran_id',$data->id_tahun_ajaran)->get()->pluck('id');
            $id_nama_kelas = Nama_Kelas::whereIn('kelas_id',$id_kelas)->get()->pluck('id');
            $nis_siswas = RelasiNamaKelasSiswa::whereIn('id_nama_kelas',$id_nama_kelas)->pluck('nis');
            $siswa = Siswa::whereIn('nis',$nis_siswas)->get();
        }else{
            $id_nama_kelas = Nama_Kelas::where('kelas_id',$data->id_kelas)->get()->pluck('id');
            $nis_siswas = RelasiNamaKelasSiswa::whereIn('id_nama_kelas',$id_nama_kelas)->pluck('nis');
            $siswa = Siswa::whereIn('nis',$nis_siswas)->get();
        }
        $output = '<option value=""> Pilih Siswa </option>';
        foreach($siswa as $row)
        {
            $output .= '<option value="'.$row->nis.'">'.$row->nis.' | '.$row->nama_lengkap.'</option>';
        }
        echo $output;
    }
    public function hutang(Request $request)
    {
        $value = $request->get('value');
        $tagihan = $request->get('tagihan');
        $data = Tagihan::find($tagihan);
        $pembayaran = Pembayaran::where([['id_tagihan',$tagihan],['id_siswa',$value]])->get();
        if($data->jenis == "SPP"){
            $sisa = $data->jumlah * 12 - $pembayaran->sum('jumlah_pembayaran');
        }else{
            $sisa = $data->jumlah - $pembayaran->sum('jumlah_pembayaran');
        }
        $output = 'Sisa Rp '.number_format($sisa,2);
        echo $output;
    }
    public function data(Request $request)
    {
        if ($request->ajax()) {
            $pembayaran  = Pembayaran::orderBy('created_at', 'DESC')->get();
            return DataTables::of($pembayaran)
                ->addColumn('judul_tagihan',function($pembayaran){
                    return $pembayaran->tagihan->judul_tagihan;
                })
                ->addColumn('jenis',function($pembayaran){
                    return $pembayaran->tagihan->jenis;
                })
                ->addColumn('nis',function($pembayaran){
                    return $pembayaran->siswa->nis;
                })
                ->addColumn('nama_siswa',function($pembayaran){
                    return $pembayaran->siswa->nama_lengkap;
                })
                ->addColumn('jumlah_pembayaran',function($pembayaran){
                    return "Rp ".number_format($pembayaran->jumlah_pembayaran,2);
                })
                ->addColumn('action', function($pembayaran){
                    return '<a data-admin="/admin/piutang/transaksi/'.$pembayaran->id_pembayaran.'/hapus" class="btn btn-danger admin-remove" onclick="adminDelete()" href="#"><i class="fa fa-eraser"></i> Delete</a>';
                })
                ->make(true);
        }else{
            return abort(403);
        }
    }
    public function store(Request $request)
    {
        // try {
            $pembayaran = new Pembayaran;
            $pembayaran->id_tagihan = $request->id_tagihan;
            $pembayaran->id_siswa = $request->id_siswa;
            $pembayaran->jumlah_pembayaran = $request->jumlah_pembayaran;
            $data = Tagihan::find($request->id_tagihan);
            $data_pembayaran = Pembayaran::where([['id_tagihan',$request->id_tagihan],['id_siswa',$request->id_siswa]])->get();
            if($data->jenis == "SPP"){
                $sisa = $data->jumlah * 12 - $data_pembayaran->sum('jumlah_pembayaran');
            }else{
                $sisa = $data->jumlah - $data_pembayaran->sum('jumlah_pembayaran');
            }
            if($sisa - $request->jumlah_pembayaran < 0){
                alert()->warning('Jumlah pembayaran tidak boleh lebih dari sisa Hutang!');
            }else{
                $pembayaran->save();
                alert()->success('Berhasil memasukkan data!');
            }
            return redirect()->route('admin-piutang-transaksi-index');
        // } catch (\Throwable $th) {
        //     alert()->warning('Gagal memasukkan data!');
        //     return back();
        // }
    }
    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrfail($id);
        if ($pembayaran->delete()) {
            alert()->success('Transaksi Berhasil Dihapus!');
        }else{
            alert()->error('Transaksi Gagal Dihapus!');
        }
        return back();
    
    }
}
