<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kategori;
class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori=Kategori::all();
        return view('admin.kategori.index',compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function data(Request $request)
    {
       
        return view('Admin.kategori.index');
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
        try{
            $validatedData = $request->validate([
                
                'nama_kategori'=> 'required|max:255',
            ]);

            if($validatedData == true){
                $kategori = new Kategori();
                
                $kategori->nama_kategori = $request->nama_kategori;
                $kategori->save();
            }else{
                return redirect()->route('admin-Data-kategori-index')->with('danger', 'Gagal ditambahkan!');
            }
            return redirect()->route('admin-Data-kategori-index')->with('success', 'Berhasil ditambahkan!');
        }catch(Exception $e){
            return redirect()->route('admin-Data-kategori-index')->with('danger', 'Harap masukkan inputan dengan benar!');
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
        $kategori = Kategori::findOrfail($id);
        return view('admin.kategori.edit_kategori',compact('kategori'));
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
        $update_kategori=Kategori::findOrFail($id);
        $this->validate($request,[
            'nama_kategori'=>'required|max:255',
            
        ]);

        if ($update_kategori == false) {
            alert()->error('Kategori Gagal Diedit!');
        }else{
        $input_data=$request->all();
        $update_kategori->update($input_data);
        alert()->success('Kategori Berhasil Diedit!');
        return redirect('admin/Data/kategori/');
        dd($update_kategori);
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
        $Kategori = Kategori::find($id);
        $Kategori->delete();

        if ($Kategori) {
            alert()->success('Jurusan Berhasil Dihapus!');
            return back();
        }else{
            alert()->error('Jurusan Gagal Dihapus!');
        }
    }
}
