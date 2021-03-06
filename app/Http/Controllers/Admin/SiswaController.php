<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Siswa;
use App\Kelas;
use App\Nama_Kelas;
use App\RelasiNamaKelasSiswa;
use App\Pembayaran;
use DB;
use Carbon\carbon;
use DataTables;
use Validator;

class SiswaController extends Controller
{
    public function index()
    {
        $t=Nama_Kelas::where('status',1)->get();
        return view('Admin.Siswa.index',compact('t'));
    }
    public function data(Request $request)
    {
        if ($request->ajax()) {
            $siswa  = Siswa::orderBy('nis', 'desc')->get();
            return DataTables::of($siswa)
                ->addColumn('action', function($siswa){
                    return '<a href="./siswa/'.$siswa->nis.'/'.$siswa->nama_lengkap.'/detail" class="btn btn-light"><i class="fa fa-pencil-square-o"></i> Detail</a> <a href="./siswa/'.$siswa->nis.'/'.$siswa->nama_lengkap.'/edit" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a> <a data-admin="admin/'.$siswa->nis.'/'.$siswa->nama_lengkap.'/hapus" class="btn btn-danger admin-remove" href="./siswa/'.$siswa->nis.'/'.$siswa->nama_lengkap.'/destroy" onclick="adminDelete()"><i class="fa fa-trash"></i></a>';
                })
                ->make(true);
        }else{
            return abort(403);
        }
    }
    public function detail($nis, $nama_lengkap)
    {
        $data_siswa = Siswa::where([['nis',$nis],['nama_lengkap',$nama_lengkap]])->first();
        $nama_kelas=Nama_Kelas::where('status',1)->get();
        if($data_siswa){
            return view('admin.siswa.detail', compact('data_siswa','nama_kelas'));
        }
        else{
            return abort(404);
        }
    }
    public function store(Request $request){
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
               
            ]);
            $last_nis = Siswa::where('nis','LIKE', Carbon::now()->year.'%')->max('nis');
            if(!$last_nis){
                $last_nis = Carbon::now()->year*10000;
            }
            if($validatedData == true){
                $siswa = new Siswa();
                $siswa->nis = $last_nis+1;
                $password = Str::random(8);
                $siswa->password = bcrypt($password);
                $siswa->password2 = $password;
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
        
        $nama_kelas=Nama_Kelas::where('status',1)->get();
        $kelas=Kelas::all();
        if($data_siswa){
            return view('admin.siswa.edit', compact('data_siswa','nama_kelas','kelas'));
        }
        else{
            return abort(404);
        }
    }
    public function update(Request $request, $nis, $nama_lengkap){
        try{
            $validatedData = $request->validate([
                'password' => 'required|max:45',
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
            ]);

            if($validatedData == false){
                return redirect()->back()->with('danger', 'Gagal diupdate!');
            }else{
                $siswa = Siswa::where([['nis',$nis]])->first();
                $siswa->password = bcrypt($request->password);
                $siswa->password2 = $request->password;
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
            $relasi = RelasiNamaKelasSiswa::where('nis',$nis)->get();
            $transaksiCount = Pembayaran::where('id_siswa',$nis)->count();
            if($transaksiCount > 0){
                alert()->warning('Harap hapus data Transaksi yang berhubungan dengan Siswa ini terlebih dahulu!');
                return back();
            }else if($siswa->delete()){
                foreach ($relasi as $data) {
                    $data->delete();
                }
                return redirect()->route('admin-siswa-index')->with('success', 'Berhasil dihapus!');
            }else{
                return redirect()->route('admin-siswa-index')->with('danger', 'Gagal dihapus!');
            }
        } catch (Exception $th) {
            return abort(404);
        }
    }

}
