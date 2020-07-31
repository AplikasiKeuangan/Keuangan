<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Tahun_Ajaran;
use DB;
class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ta =Tahun_Ajaran::where('is_active','1')->get();
        $menu_active=0;
        return view('Kelas.tambah_kelas',compact('ta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daftar_kelas()
    {
        $menu_active=0;
        $kelas=Kelas::all();
        return view('Kelas.daftar_kelas',compact('menu_active','kelas'));
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
            'nama_kelas'=>'required|max:255|unique:kelas,nama_kelas',
        ]);
        $data=$request->all();
        Kelas::create($data);
        alert()->success('Kelas Berhasil Ditambahkan!');


        return redirect('/admin/kelas/daftar_kelas');
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
        $ta =Tahun_Ajaran::where('is_active','1')->get();
        $kelas = Kelas::findOrfail($id);
        return view('Kelas.edit_kelas',compact('kelas','ta'));
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
        $update_kelas=Kelas::findOrFail($id);
        $this->validate($request,[
            'nama_kelas'=>'required|max:255|unique:kelas,nama_kelas,'.$update_kelas->id,
            
        ]);
        //dd($request->all());die();
        $input_data=$request->all();
        if(empty($input_data['status'])){
            $input_data['status']=0;
        }
        $update_kelas->update($input_data);
        alert()->success('Jurusan Berhasil Diedit!');
    	return redirect('/admin/kelas/daftar_kelas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();

        if ($kelas) {
            alert()->success('Jurusan Berhasil Dihapus!');
            return back();
        }
    }
}
