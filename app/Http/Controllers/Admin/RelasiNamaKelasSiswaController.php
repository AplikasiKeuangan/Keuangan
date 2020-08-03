<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tahun_Ajaran;
use App\Kelas;
use App\Nama_Kelas;
use App\RelasiNamaKelasSiswa;
use App\Siswa;
use DataTables;

class RelasiNamaKelasSiswaController extends Controller
{
    public function index($id_tahun_ajaran, $id_kelas, $id_nama_kelas)
    {
        try {
            $tahunAjaran = Tahun_Ajaran::find($id_tahun_ajaran);
            $kelas = Kelas::find($id_kelas);
            $namaKelas = Nama_Kelas::find($id_nama_kelas);
            if($tahunAjaran->is_active == 1 && $kelas->status == 1 && $namaKelas->status == 1){
                $id_kelas = $tahunAjaran->kelas()->pluck('id');
                $id_nama_kelas = Nama_Kelas::whereIn('id',$id_kelas)->pluck('id');
                $nis_siswas = RelasiNamaKelasSiswa::whereIn('id_nama_kelas',$id_nama_kelas)->pluck('nis');
                $siswa  = Siswa::whereNotIn('nis',$nis_siswas)->get();
                return view('Admin.Relasi Nama Kelas Siswa.index', compact('tahunAjaran','kelas','namaKelas','siswa'));
            }else{
                alert()->warning('Terjadi kesalahan dalam menampilkan data');
                return redirect()->route('admin-tahun-ajaran-index');
            }
        } catch (\Throwable $th) {
            alert()->warning('Terjadi kesalahan dalam menampilkan data');
            return redirect()->route('admin-tahun-ajaran-index');
        }
    }
    public function data(Request $request, $id_tahun_ajaran, $id_kelas, $id_nama_kelas)
    {
        $tahunAjaran = Tahun_Ajaran::find($id_tahun_ajaran);
        $kelas = Kelas::find($id_kelas);
        $namaKelas = Nama_Kelas::find($id_nama_kelas);
        if ($request->ajax() && $tahunAjaran->is_active == 1 && $kelas->status == 1 && $namaKelas->status == 1) {
            $RelasiNamaKelasSiswa  = RelasiNamaKelasSiswa::where('id_nama_kelas',$id_nama_kelas)->orderBy('created_at', 'DESC')->get();
            return DataTables::of($RelasiNamaKelasSiswa)
                ->addColumn('nama_lengkap',function($RelasiNamaKelasSiswa){
                    return $RelasiNamaKelasSiswa->siswa->nama_lengkap;
                })
                ->addColumn('jenis_kelamin',function($RelasiNamaKelasSiswa){
                    return $RelasiNamaKelasSiswa->siswa->jenis_kelamin;
                })
                ->addColumn('action', function($RelasiNamaKelasSiswa) use ($id_tahun_ajaran,$id_kelas,$id_nama_kelas){
                    return '<a data-admin="/admin/tahun-ajaran/'.$id_tahun_ajaran.'/kelas/'.$id_kelas.'/nama-kelas/'.$id_nama_kelas.'/siswa/'.$RelasiNamaKelasSiswa->id.'/delete" class="btn btn-danger admin-remove" onclick="adminDelete()" href="#"><i class="fa fa-eraser"></i> Delete</a>';
                })
                ->make(true);
        }else{
            return abort(403);
        }
    }
    public function store(Request $request, $id_tahun_ajaran, $id_kelas, $id_nama_kelas)
    {
        try {
            $tahunAjaran = Tahun_Ajaran::find($id_tahun_ajaran);
            $kelas = Kelas::find($id_kelas);
            $namaKelas = Nama_Kelas::find($id_nama_kelas);
            if($tahunAjaran->is_active == 1 && $kelas->status == 1 && $namaKelas->status == 1){
                // $this->validate($request,[
                //     'nis'=>'required|max:255',
                //     'id_nama_kelas'=>'required',
                // ]);
                foreach($request->nis as $data){
                    $relasiNamaKelasSiswa = new RelasiNamaKelasSiswa();
                    $relasiNamaKelasSiswa->id_nama_kelas = $request->id_nama_kelas;
                    $relasiNamaKelasSiswa->nis = $data;
                    $relasiNamaKelasSiswa->save();
                }
                $data=$request->all();
                if ($data) {
                    alert()->success('Berhasil ditambahkan!');
                }else{
                    alert()->error('Gagal ditambahkan!');
                }
                return back();
            }else{
                alert()->warning('Terjadi kesalahan dalam menampilkan data');
                return redirect()->route('admin-tahun-ajaran-index');
            }
        } catch (\Throwable $th) {
            alert()->warning('Terjadi kesalahan dalam menampilkan data');
            return redirect()->route('admin-tahun-ajaran-index');
        }
    }
    public function destroy($id_tahun_ajaran, $id_kelas, $id_nama_kelas, $id_relasi)
    {
        try {
            $tahunAjaran = Tahun_Ajaran::find($id_tahun_ajaran);
            $kelas = Kelas::find($id_kelas);
            $namaKelas = Nama_Kelas::find($id_nama_kelas);
            if($tahunAjaran->is_active == 1 && $kelas->status == 1 && $namaKelas->status == 1){
                $relasiNamaKelasSiswa = RelasiNamaKelasSiswa::find($id_relasi);
                $relasiNamaKelasSiswa->delete();
                if ($relasiNamaKelasSiswa) {
                    alert()->success('Berhasil Dihapus!');
                    return back();
                }else{
                    alert()->error('Gagal Dihapus!');
                    return back();
                }
            }else{
                alert()->warning('Terjadi kesalahan dalam menampilkan data');
                return redirect()->route('admin-tahun-ajaran-index');
            }
        } catch (\Throwable $th) {
            alert()->warning('Terjadi kesalahan dalam menampilkan data');
            return redirect()->route('admin-tahun-ajaran-index');
        }
    }
}
