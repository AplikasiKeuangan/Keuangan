<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Kelas;
use App\Siswa;
use App\Nama_Kelas;
use App\Tagihan;
use App\Http\Controllers\Controller;


class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::all();
        $siswa = Siswa::all();
        $tagihan = Tagihan::all();
        $nama_kelas=Nama_Kelas::where('status',1)->get();
        return view('Admin.Tagihan.index',compact('kelas','siswa','nama_kelas','tagihan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request,[
                'nama'=>'max:255'
            ]);

            
            $tagihan = new Tagihan;
            $tagihan->nama = $request->nama;
            
           

            if ($request->jenis == 'SPP') {
                $tagihan->jumlah = $request->jumlah;
                
            
            }else{
                return redirect(route('admin-Data-tagihan-index'))->with('error','Tagihan Gagal Ditambah');
            }
           $tagihan->save();
            return redirect('/admin/Data/tagihan/')->with('success','Tagihan Berhasil Ditambahkan');
        
        } catch (\Throwable $th) {
            return back()->with('warning','Terjadi Kesalahan');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tagihan = Tagihan::findOrfail($id);
        $kelas = Kelas::all();
        $siswa = Siswa::get();
        $nama_kelas=Nama_Kelas::where('status',1)->get();
        return view('Admin.Tagihan.edit',compact('kelas','siswa','nama_kelas','tagihan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        try {
            $this->validate($request,[
                'nama'=>'max:255'
            ]);

            
            $tagihan =Tagihan::findOrfail($id);
            $tagihan->nama = $request->nama;
            
           

            if ($request->jenis == 'SPP') {
                $tagihan->jumlah = $request->jumlah;
                
            
            }else{
                return redirect(route('admin-Data-tagihan-index'))->with('error','Data Gagal Ditambah');
            }
           $tagihan->save();
            return redirect('/admin/Data/tagihan/')->with('success','Data Berhasil Ditambahkan');
        
        } catch (\Throwable $th) {
            return back()->with('warning','Terjadi Kesalahan');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tagihan = Tagihan::findOrfail($id);
        $tagihan->delete();

        if ($tagihan) {
            alert()->success('Tagihan Berhasil Dihapus!');
        }else{
            alert()->error('Tagihan Gagal Dihapus!');
        }
        return back();
    
    }
}
