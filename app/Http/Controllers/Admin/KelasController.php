<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kelas;
use App\Tahun_Ajaran;
use App\Nama_Kelas;
use App\Tagihan;
use DataTables;

class KelasController extends Controller
{
    public function index($id_tahun_ajaran)
    {
        try {
            $tahunAjaran = Tahun_Ajaran::find($id_tahun_ajaran);
            if($tahunAjaran->is_active == 1){
                return view('Admin.Kelas.index', compact('tahunAjaran'));
            }else{
                alert()->warning('Terjadi kesalahan dalam menampilkan data');
                return redirect()->route('admin-tahun-ajaran-index');
            }
        } catch (\Throwable $th) {
            alert()->warning('Terjadi kesalahan dalam menampilkan data');
            return redirect()->route('admin-tahun-ajaran-index');
        }
    }
    public function data(Request $request, $id_tahun_ajaran){
        if ($request->ajax() && Tahun_Ajaran::find($id_tahun_ajaran)->is_active == 1) {
            $kelas  = Kelas::where('tahun_ajaran_id',$id_tahun_ajaran)->orderBy('created_at', 'DESC')->get();
            return DataTables::of($kelas)
                ->addColumn('action', function($kelas) use ($id_tahun_ajaran){
                    $cog = '<a href="/admin/tahun-ajaran/'.$id_tahun_ajaran.'/kelas/'.$kelas->id.'/nama-kelas" class="btn btn-light"><i class="fa fa-cog"></i></a> ';
                    if($kelas->status == 0){
                        $cog = '';
                    }
                    return $cog.'<a href="/admin/tahun-ajaran/'.$id_tahun_ajaran.'/kelas/'.$kelas->id.'/edit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a> <a data-admin="/admin/tahun-ajaran/'.$id_tahun_ajaran.'/kelas/'.$kelas->id.'/delete" class="btn btn-danger admin-remove" onclick="adminDelete()" href="#"><i class="fa fa-eraser"></i> Delete</a>';
                })
                ->make(true);
        }else{
            return abort(403);
        }
    }
    public function store(Request $request, $id_tahun_ajaran)
    {
        try {
            $tahunAjaran = Tahun_Ajaran::find($id_tahun_ajaran);
            if($tahunAjaran->is_active == 1){
                $this->validate($request,[
                    'nama_kelas'=>'required|max:255',
                ]);
                $data=$request->all();
                Kelas::create($data);
                alert()->success('Kelas Berhasil Ditambahkan!');
    
    
                return redirect()->route('admin-tahun-ajaran-kelas-index', ['id_tahun_ajaran' => $id_tahun_ajaran]);
            }else{
                alert()->warning('Terjadi kesalahan dalam menampilkan data');
                return redirect()->route('admin-tahun-ajaran-index');
            }
        } catch (\Throwable $th) {
            alert()->warning('Terjadi kesalahan dalam menampilkan data');
            return redirect()->route('admin-tahun-ajaran-index');
        }
    }
    public function edit($id_tahun_ajaran, $id_kelas)
    {
        try {
            $tahunAjaran = Tahun_Ajaran::find($id_tahun_ajaran);
            if($tahunAjaran->is_active == 1){
                $kelas = Kelas::findOrfail($id_kelas);
                return view('Admin.Kelas.edit',compact('kelas','tahunAjaran'));
            }else{
                alert()->warning('Terjadi kesalahan dalam menampilkan data');
                return redirect()->route('admin-tahun-ajaran-index');
            }
        } catch (\Throwable $th) {
            alert()->warning('Terjadi kesalahan dalam menampilkan data');
            return redirect()->route('admin-tahun-ajaran-index');
        }
    }
    public function update(Request $request, $id_tahun_ajaran, $id_kelas)
    {
        try {
            $tahunAjaran = Tahun_Ajaran::find($id_tahun_ajaran);
            if($tahunAjaran->is_active == 1){
                $update_kelas=Kelas::findOrFail($id_kelas);
                $this->validate($request,[
                    'nama_kelas'=>'required|max:255,'.$update_kelas->id,
                    
                ]);
                //dd($request->all());die();
                $input_data=$request->all();
                if(empty($input_data['status'])){
                    $input_data['status']=0;
                }
                $update_kelas->update($input_data);
                alert()->success('Kelas berhasil diupdate!');
                return redirect()->route('admin-tahun-ajaran-kelas-index', ['id_tahun_ajaran' => $tahunAjaran->id]);
            }else{
                alert()->warning('Terjadi kesalahan dalam menampilkan data');
                return redirect()->route('admin-tahun-ajaran-index');
            }
        } catch (\Throwable $th) {
            alert()->warning('Terjadi kesalahan dalam menampilkan data');
            return redirect()->route('admin-tahun-ajaran-index');
        }
    }
    public function destroy($id_tahun_ajaran, $id_kelas)
    {
        try {
            $tahunAjaran = Tahun_Ajaran::find($id_tahun_ajaran);
            if($tahunAjaran->is_active == 1){
                $kelas = Kelas::findOrFail($id_kelas);
                $namaKelasCount = Nama_Kelas::where('kelas_id',$id_kelas)->count();
                $tagihanCount = Tagihan::where('id_kelas',$id_kelas)->count();
                if ($namaKelasCount > 0) {
                    alert()->warning('Harap hapus Nama-Nama Kelas di Daftar Kelas ini terlebih dahulu!');
                    return back();
                }else if($tagihanCount > 0){
                    alert()->warning('Harap hapus data Tagihan yang berhubungan dengan Kelas ini terlebih dahulu!');
                    return back();
                }else{
                    $kelas->delete();
                    alert()->success('Kelas berhasil dihapus!');
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
