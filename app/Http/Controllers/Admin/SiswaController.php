<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Siswa;
use App\Kelas;
use App\Jurusan;
use DB;
use Carbon\carbon;
use DataTables;
use Validator;

class SiswaController extends Controller
{
    public function index()
    {
        $nis = $this->NIS();
        $jurusan=Jurusan::all();
        $kelas=Kelas::all();
        return view('Admin.Siswa.index',compact('nis','jurusan','kelas'));
    }
    public function data(Request $request)
    {
        if ($request->ajax()) {
            $siswa  = Siswa::get();
            return DataTables::of($siswa)
                ->addColumn('action', function($siswa){
                    return '<a href="./siswa/'.$siswa->nis.'/'.$siswa->nama_lengkap.'/detail" class="btn btn-light"><i class="fa fa-pencil-square-o"></i> Detail</a> <a href="./siswa/'.$siswa->nis.'/'.$siswa->nama_lengkap.'/edit" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a> <a data-admin="admin/'.$siswa->nis.'/'.$siswa->nama_lengkap.'/hapus" class="btn btn-danger admin-remove" href="./siswa/'.$siswa->nis.'/'.$siswa->nama_lengkap.'/destroy" onclick="adminDelete()"><i class="fa fa-trash"></i></a>';
                })
                ->make(true);
        }else{
            return abort(403);
        }
    }

    protected function NIS()
    {
        $kd="";
        $query = DB::table('siswas')
        ->select(DB::raw('MAX(RIGHT(kode,4)) as kd_max'))
            ->whereDate('created_at',Carbon::today());
        if ($query->count()>0) {
            foreach ($query->get() as $key ) {
            $tmp = ((int)$key->kd_max)+1;
            $kd = sprintf("%04s", $tmp);
            }
        }else {
        $kd = "0001";
   }

    return  "".date('dmy').$kd;
  }
    public function detail($nis, $nama_lengkap)
    {
        $data_siswa = Siswa::where([['nis',$nis],['nama_lengkap',$nama_lengkap]])->first();
        if($data_siswa){
            return view('admin.siswa.detail', compact('data_siswa'));
        }
        else{
            return abort(404);
        }
    }
    public function store(Request $request){
        try{
            $validatedData = $request->validate([
                'nis' => 'required|unique:siswas|numeric',
                'nama_lengkap' => 'required|max:45',
                'nama_panggilan' => 'required|max:30',
                'jenis_kelamin' => 'required|max:10',
                'tempat_lahir' => 'required|max:255',
                'tanggal_lahir' => 'required',
                'agama' => 'required',
                'kewarganegaraan' => 'required|max:45',
                'anak_ke' => 'required|max:2',
                'jumlah_saudara' => 'required|max:2',
                'kondisi_siswa' => 'required|max:45',
                'status_siswa' => 'required|max:45',
                'bahasa_sehari_hari' => 'required|max:255',
                'alamat' => 'required|max:255',
                'asal_sekolah' => 'required|max:255',
                'kelas'=> 'required|max:255',
                'jurusan'=> 'required|max:255',
            ]);

            if($validatedData == true){
                $siswa = new Siswa();
                $siswa->nis = $request->nis;
                $siswa->nama_lengkap = $request->nama_lengkap;
                $siswa->nama_panggilan = $request->nama_panggilan;
                $siswa->jenis_kelamin = $request->jenis_kelamin;
                $siswa->tempat_lahir = $request->tempat_lahir;
                $siswa->tanggal_lahir = $request->tanggal_lahir;
                $siswa->agama = $request->agama;
                $siswa->kewarganegaraan = $request->kewarganegaraan;
                $siswa->anak_ke = $request->anak_ke;
                $siswa->jumlah_saudara = $request->jumlah_saudara;
                $siswa->kondisi_siswa = $request->kondisi_siswa;
                $siswa->status_siswa = $request->status_siswa;
                $siswa->bahasa_sehari_hari = $request->bahasa_sehari_hari;
                $siswa->alamat = $request->alamat;
                $siswa->telepon = $request->telepon;
                $siswa->handphone = $request->handphone;
                $siswa->email = $request->email;
                $siswa->alamat = $request->alamat;
                $siswa->asal_sekolah = $request->asal_sekolah;
                $siswa->kelas = $request->kelas;
                $siswa->jurusan = $request->jurusan;
                $siswa->save();
            }else{
                return redirect()->route('admin-siswa-index')->with('danger', 'Gagal ditambahkan!');
            }
            return redirect()->route('admin-siswa-index')->with('success', 'Berhasil ditambahkan!');
        }catch(Exception $e){
            return redirect()->route('admin-siswa-index')->with('danger', 'Harap masukkan inputan dengan benar!');
        }
    }
    public function edit($nis, $nama_lengkap){
        $data_siswa = Siswa::where([['nis',$nis],['nama_lengkap',$nama_lengkap]])->first();
        $jurusan=Jurusan::all();
        $kelas=Kelas::all();
        if($data_siswa){
            return view('admin.siswa.edit', compact('data_siswa','jurusan','kelas'));
        }
        else{
            return abort(404);
        }
    }
    public function update(Request $request, $nis, $nama_lengkap){
        try{
            $validatedData = $request->validate([
                'nama_lengkap' => 'required|max:45',
                'nama_panggilan' => 'required|max:30',
                'jenis_kelamin' => 'required|max:10',
                'tempat_lahir' => 'required|max:255',
                'tanggal_lahir' => 'required',
                'agama' => 'required',
                'kewarganegaraan' => 'required|max:45',
                'anak_ke' => 'required|max:2',
                'jumlah_saudara' => 'required|max:2',
                'kondisi_siswa' => 'required|max:45',
                'status_siswa' => 'required|max:45',
                'bahasa_sehari_hari' => 'required|max:255',
                'alamat' => 'required|max:255',
                'asal_sekolah' => 'required|max:255',
                'jurusan' => 'required|max:255',
                'kelas' => 'required|max:255',
            ]);

            if($validatedData == false){
                return redirect()->back()->with('danger', 'Gagal diupdate!');
            }else{
                $siswa = Siswa::where([['nis',$nis]])->first();
                $siswa->nama_lengkap = $request->nama_lengkap;
                $siswa->nama_panggilan = $request->nama_panggilan;
                $siswa->jenis_kelamin = $request->jenis_kelamin;
                $siswa->tempat_lahir = $request->tempat_lahir;
                $siswa->tanggal_lahir = $request->tanggal_lahir;
                $siswa->agama = $request->agama;
                $siswa->kewarganegaraan = $request->kewarganegaraan;
                $siswa->anak_ke = $request->anak_ke;
                $siswa->jumlah_saudara = $request->jumlah_saudara;
                $siswa->kondisi_siswa = $request->kondisi_siswa;
                $siswa->status_siswa = $request->status_siswa;
                $siswa->bahasa_sehari_hari = $request->bahasa_sehari_hari;
                $siswa->alamat = $request->alamat;
                $siswa->telepon = $request->telepon;
                $siswa->handphone = $request->handphone;
                $siswa->email = $request->email;
                $siswa->alamat = $request->alamat;
                $siswa->asal_sekolah = $request->asal_sekolah;
                $siswa->jurusan = $request->jurusan;
                $siswa->kelas = $request->kelas;
                $siswa->update();
                return redirect()->route('admin-siswa-index')->with('success', 'Berhasil diupdate!');
            }
        }catch(Exception $e){
            return redirect()->back()->with('danger', 'Harap masukkan inputan dengan benar!');
        }
    }
    public function destroy($nis, $nama_lengkap){
        try {
            $siswa = Siswa::where([['nis',$nis]])->first();
            if($siswa->delete()){
                return redirect()->route('admin-siswa-index')->with('success', 'Berhasil dihapus!');
            }else{
                return redirect()->route('admin-siswa-index')->with('danger', 'Gagal dihapus!');
            }
        } catch (Exception $th) {
            return abort(404);
        }
    }

}
