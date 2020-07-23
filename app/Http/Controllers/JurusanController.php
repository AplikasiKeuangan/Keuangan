<?php

namespace App\Http\Controllers;

Use Alert;
use App\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_active=0;
        return view('Jurusan.tambah_jurusan',compact('menu_active'));
    }

    

    public function daftar_jurusan()
    {
        $menu_active=0;
        $jurusan=Jurusan::all();
        return view('Jurusan.daftar_jurusan',compact('menu_active','jurusan'));
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
        $this->validate($request,[
            'nama_jurusan'=>'required|max:255|unique:jurusans,nama_jurusan',
            'deskripsi'=>'required',
        ]);
        $data=$request->all();
        Jurusan::create($data);
        // toast('Data tersimpan!','success');
        alert()->success('Jurusan Berhasil Ditambahkan!');


        return redirect('/jurusan/daftar_jurusan');
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
        $jurusan = Jurusan::findOrfail($id);
        return view('Jurusan.edit_jurusan',compact('jurusan'));
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
        $update_jurusan=Jurusan::findOrFail($id);
        $this->validate($request,[
            'nama_jurusan'=>'required|max:255|unique:jurusans,nama_jurusan,'.$update_jurusan->id,
            'deskripsi'=>'required',
        ]);
        //dd($request->all());die();
        $input_data=$request->all();
        if(empty($input_data['status'])){
            $input_data['status']=0;
        }
        $update_jurusan->update($input_data);
        alert()->success('Jurusan Berhasil Diedit!');
    	return redirect('/jurusan/daftar_jurusan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jurusan = Jurusan::find($id);
        $jurusan->delete();

        if ($jurusan) {
            alert()->success('Jurusan Berhasil Dihapus!');
            return back();
        }
    }
}
