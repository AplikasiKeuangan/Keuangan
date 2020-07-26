<?php

namespace App\Http\Controllers;
use App\Nama_Kelas;
use Illuminate\Http\Request;

class Nama_KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Nama_Kelas.tambah_nama_kelas');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function daftar_nama_kelas()
    {
        $nama_kelas=Nama_Kelas::all();
        return view('Nama_Kelas.daftar_nama_kelas',compact('nama_kelas'));
    }
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
        $this->validate($request,[
            'nama_kelas'=>'required|max:255|unique:nama__kelas,nama_kelas',
            'deskripsi'=>'required',
        ]);
        $data=$request->all();
        if ($data) {
          
            Nama_Kelas::create($data);
            alert()->success('Nama Kelas Berhasil Didaftarkan!');

        }else{
            alert()->error('Nama Kelas Gagal Didaftarkan!');

        }


        return redirect('/admin/nama_kelas/daftar_nama_kelas');
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
        $nama_kelas = Nama_Kelas::findOrfail($id);
        return view('Nama_Kelas.edit_nama_kelas',compact('nama_kelas'));
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
        $update_nama_kelas=Nama_Kelas::findOrFail($id);
        $this->validate($request,[
            'nama_kelas'=>'required|max:255|unique:nama__kelas,nama_kelas,'.$update_nama_kelas->id,
            'deskripsi'=>'required',
        ]);
        //dd($request->all());die();
        $input_data=$request->all();
        if(empty($input_data['status'])){
            $input_data['status']=0;
        }
        $update_nama_kelas->update($input_data);
       
        alert()->success('Nama Kelas Berhasil Diedit!');
    	return redirect('/admin/nama_kelas/daftar_nama_kelas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Nama_Kelas = Nama_Kelas::find($id);
        $Nama_Kelas->delete();

        if ($Nama_Kelas) {
            alert()->success('Nama Kelas Berhasil Dihapus!');
            return back();
        }else{
            alert()->error('Nama Kelas Gagal Dihapus!');
            return back();
        }
    }
}
