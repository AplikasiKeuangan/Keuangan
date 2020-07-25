<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Keuangan;
use App\Kategori;
use Carbon\Carbon;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keuangan = Keuangan::all();
        $kategori=Kategori::pluck('id')->all();
        return view('admin.Penerimaan.Keuangan.index',compact('keuangan','kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $keuangan = new Keuangan;
            $keuangan->tanggal = $request->tanggal;
            $keuangan->kategori_id = $request->kategori;
            $keuangan->keterangan = $request->keterangan;

            if ($request->jenis == 'penerimaan') {
                $keuangan->pengeluaran = 0;
                $keuangan->penerimaan = $request->nominal;
            }else if($request->jenis == 'pengeluaran'){
                $keuangan->penerimaan = 0;
                $keuangan->pengeluaran = $request->nominal;
            }else{
                return redirect(route('admin-Data-keuangan-index'))->with('error','Data Gagal Ditambah');
            }
           $keuangan->save();
            return redirect('/admin/Data/keuangan/')->with('success','Data Berhasil Ditambahkan');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
