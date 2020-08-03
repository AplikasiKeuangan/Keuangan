<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Nama_Kelas;
use App\Kelas;
use App\Tahun_Ajaran;
use DataTables;

class NamaKelasController extends Controller
{
    public function index($id_tahun_ajaran, $id_kelas)
    {
        try {
            $tahunAjaran = Tahun_Ajaran::find($id_tahun_ajaran);
            $kelas = Kelas::find($id_kelas);
            if($tahunAjaran->is_active == 1 && $kelas->status == 1){
                return view('Admin.Nama Kelas.index', compact('tahunAjaran','kelas'));
            }else{
                alert()->warning('Terjadi kesalahan dalam menampilkan data');
                return redirect()->route('admin-tahun-ajaran-index');
            }
        } catch (\Throwable $th) {
            alert()->warning('Terjadi kesalahan dalam menampilkan data');
            return redirect()->route('admin-tahun-ajaran-index');
        }
    }
    public function data(Request $request, $id_tahun_ajaran, $id_kelas)
    {
        $tahunAjaran = Tahun_Ajaran::find($id_tahun_ajaran);
        $kelas = Kelas::find($id_kelas);
        if ($request->ajax() && $tahunAjaran->is_active == 1 && $kelas->status == 1) {
            $namaKelas  = Nama_Kelas::where('kelas_id',$id_kelas)->orderBy('created_at', 'DESC')->get();
            return DataTables::of($namaKelas)
                ->addColumn('action', function($namaKelas) use ($id_tahun_ajaran,$id_kelas){
                    $cog = '<a href="/admin/tahun-ajaran/'.$id_tahun_ajaran.'/kelas/'.$id_kelas.'/nama-kelas/'.$namaKelas->id.'/siswa" class="btn btn-light"><i class="fa fa-cog"></i></a> ';
                    if($namaKelas->status == 0){
                        $cog = '';
                    }
                    return $cog.'<a href="/admin/tahun-ajaran/'.$id_tahun_ajaran.'/kelas/'.$id_kelas.'/nama-kelas/'.$namaKelas->id.'/edit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a> <a data-admin="/admin/tahun-ajaran/'.$id_tahun_ajaran.'/kelas/'.$id_kelas.'/nama-kelas/'.$namaKelas->id.'/delete" class="btn btn-danger admin-remove" onclick="adminDelete()" href="#"><i class="fa fa-eraser"></i> Delete</a>';
                })
                ->make(true);
        }else{
            return abort(403);
        }
    }
    public function store(Request $request, $id_tahun_ajaran, $id_kelas)
    {
        try {
            $tahunAjaran = Tahun_Ajaran::find($id_tahun_ajaran);
            $kelas = Kelas::find($id_kelas);
            if($tahunAjaran->is_active == 1 && $kelas->status == 1){
                $this->validate($request,[
                    'nama_kelas'=>'required|max:255',
                    'deskripsi'=>'required',
                ]);
                $data=$request->all();
                if ($data) {
                    Nama_Kelas::create($data);
                    alert()->success('Nama Kelas berhasil didaftarkan!');
                }else{
                    alert()->error('Nama Kelas gagal didaftarkan!');
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
    public function edit($id_tahun_ajaran, $id_kelas, $id_nama_kelas)
    {
        try {
            $tahunAjaran = Tahun_Ajaran::find($id_tahun_ajaran);
            $kelas = Kelas::find($id_kelas);
            if($tahunAjaran->is_active == 1 && $kelas->status == 1){
                $namaKelas = Nama_kelas::findOrFail($id_nama_kelas);
                return view('Admin.nama Kelas.edit',compact('tahunAjaran','kelas','namaKelas'));
            }else{
                alert()->warning('Terjadi kesalahan dalam menampilkan data');
                return redirect()->route('admin-tahun-ajaran-index');
            }
        } catch (\Throwable $th) {
            alert()->warning('Terjadi kesalahan dalam menampilkan data');
            return redirect()->route('admin-tahun-ajaran-index');
        }
    }
    public function update(Request $request, $id_tahun_ajaran, $id_kelas, $id_nama_kelas)
    {
        try {
            $tahunAjaran = Tahun_Ajaran::find($id_tahun_ajaran);
            $kelas = Kelas::find($id_kelas);
            if($tahunAjaran->is_active == 1 && $kelas->status == 1){
                $update_nama_kelas=Nama_Kelas::findOrFail($id_nama_kelas);
                $this->validate($request,[
                    'nama_kelas'=>'required|max:255,nama_kelas,'.$update_nama_kelas->id,
                    'deskripsi'=>'required',
                ]);
                //dd($request->all());die();
                $input_data=$request->all();
                if(empty($input_data['status'])){
                    $input_data['status']=0;
                }
                $update_nama_kelas->update($input_data);
            
                alert()->success('Nama Kelas berhasil diupdate!');
                return redirect()->route('admin-tahun-ajaran-kelas-nama-kelas-index',['id_tahun_ajaran' => $id_tahun_ajaran, 'id_kelas' => $id_kelas]);
            }else{
                alert()->warning('Terjadi kesalahan dalam menampilkan data');
                return redirect()->route('admin-tahun-ajaran-index');
            }
        } catch (\Throwable $th) {
            alert()->warning('Terjadi kesalahan dalam menampilkan data');
            return redirect()->route('admin-tahun-ajaran-index');
        }
    }
    public function destroy($id_tahun_ajaran, $id_kelas, $id_nama_kelas)
    {
        try {
            $tahunAjaran = Tahun_Ajaran::find($id_tahun_ajaran);
            $kelas = Kelas::find($id_kelas);
            if($tahunAjaran->is_active == 1 && $kelas->status == 1){
                $Nama_Kelas = Nama_Kelas::find($id_nama_kelas);
                $Nama_Kelas->delete();

                if ($Nama_Kelas) {
                    alert()->success('Nama Kelas Berhasil Dihapus!');
                    return back();
                }else{
                    alert()->error('Nama Kelas Gagal Dihapus!');
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
