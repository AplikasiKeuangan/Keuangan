<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Tahun_Ajaran;
use App\Kelas;
use App\Siswa;
use App\Nama_Kelas;
use App\Tagihan;
use App\Http\Controllers\Controller;
use App\Pembayaran;
use DataTables;


class TagihanController extends Controller
{
    public function index()
    {
        $tahunAjaran = Tahun_Ajaran::where('is_active',1)->orderBy('created_at','DESC')->get();
        return view('Admin.Tagihan.index',compact('tahunAjaran'));
    }
    public function kelas(Request $request)
    {
        $value = $request->get('value');
        $data = Kelas::where('tahun_ajaran_id',$value)->get();
        $output = '<option value="">Semua Tingkatan</option>';
        foreach($data as $row)
        {
         $output .= '<option value="'.$row->id.'">'.$row->nama_kelas.'</option>';
        }
        echo $output;
    }
    public function data(Request $request)
    {
        if ($request->ajax()) {
            $tagihan  = Tagihan::orderBy('created_at', 'DESC')->get();
            return DataTables::of($tagihan)
                ->addColumn('tahun_ajaran',function($tagihan){
                    return $tagihan->tahun_ajaran->nama;
                })
                ->addColumn('jumlah',function($tagihan){
                    return "Rp ".number_format($tagihan->jumlah,2);
                })
                ->addColumn('kelas',function($tagihan){
                    if($tagihan->jenis == 'SPP'){
                        return '';
                    }else if($tagihan->id_kelas == NULL){
                        return 'Semua';
                    }else{
                        return Kelas::find($tagihan->id_kelas)->nama_kelas;
                    }
                    return '';
                })
                ->addColumn('action', function($tagihan){
                    return '<a class="btn btn-light" href="/admin/piutang/tagihan/'.$tagihan->id_tagihan.'/transaksi"><i class="fa fa-cog"></i></a> <a data-admin="/admin/piutang/tagihan/'.$tagihan->id_tagihan.'/hapus" class="btn btn-danger admin-remove" onclick="adminDelete()" href="#"><i class="fa fa-eraser"></i> Delete</a>';
                })
                ->make(true);
        }else{
            return abort(403);
        }
    }
    public function store(Request $request)
    {
        try {
            $tagihan = new Tagihan;
            $tagihan->judul_tagihan = $request->judul_tagihan;
            $tagihan->jenis = $request->jenis;
            $tagihan->id_tahun_ajaran = $request->id_tahun_ajaran;
            if($request->jenis != 'SPP' && $request->id_kelas != NULL){
                $tagihan->id_kelas = $request->id_kelas;
            }
            $tagihan->jumlah = $request->jumlah;
            $tagihan->save();
            alert()->success('Berhasil dalam memasukkan data!');
            return redirect()->route('admin-piutang-tagihan-index');
        } catch (\Throwable $th) {
            alert()->warning('Gagal dalam memasukkan data!');
            return back();
        }
    }
    
    public function destroy($id)
    {
        $tagihan = Tagihan::findOrfail($id);
        $pembayaran = Pembayaran::where('id_tagihan',$id)->get();
        if ($pembayaran->count() == 0) {
            $tagihan->delete();
            alert()->success('Tagihan Berhasil Dihapus!');
        }else{
            alert()->warning('Harap hapus data Transaksi terlebih dahulu!');
        }
        return back();
    
    }
}
