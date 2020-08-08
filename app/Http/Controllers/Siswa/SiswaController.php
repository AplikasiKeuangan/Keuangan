<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tahun_Ajaran;
use App\Kelas;
use App\Nama_Kelas;
use App\RelasiNamaKelasSiswa;
use App\Siswa;
use App\Pembayaran;
use App\Tagihan;
use Auth;

class SiswaController extends Controller
{
    public function index()
    {
        $data_siswa = Siswa::findOrFail(Auth::guard('siswa')->id());
        return view('Siswa.index', compact('data_siswa'));
    }
    public function keuangan()
    {
        $data_siswa = Siswa::findOrFail(Auth::guard('siswa')->id());

        $id_relasi = RelasiNamaKelasSiswa::where('nis',Auth::guard('siswa')->id())->pluck('id_nama_kelas');
        $id_nama_kelas = Nama_Kelas::whereIn('id',$id_relasi)->pluck('kelas_id');
        $id_tahun_ajaran = Kelas::whereIn('id',$id_nama_kelas)->pluck('tahun_ajaran_id');
        $tagihan = Tagihan::whereIn('id_tahun_ajaran',$id_tahun_ajaran)->orderBy('created_at','DESC')->get();
        // dd($tagihan->count());
        return view('Siswa.keuangan', compact('data_siswa','tagihan'));
    }
}
