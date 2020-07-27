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
        $plucked=Kategori::where('parent_id',0)->pluck('nama_kategori','id');
        $cate_levels= $plucked->all();
        return view('admin.kategori.index',compact('kategori','cate_levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

   

    
    public function checkCateName(Request $request){
        $data=$request->all();
        $category_name=$data['nama_kategori'];
        $ch_cate_name_atDB=Kategori::select('nama_kategori')->where('nama_kategori',$category_nama_kategori)->first();
        if($category_name==$ch_cate_name_atDB['nama_kategori']){
            echo "true"; die();
        }else {
            echo "false"; die();
        }
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
                
                'nama_kategori'=> 'required|max:255|unique:kategoris,nama_kategori',
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
            'nama_kategori'=> 'required|max:255|unique:kategoris,nama_kategori',
            
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
            $keuangan = Keuangan::where('kategori_id');
            $keuangan->delete();
        }else{
            alert()->error('Jurusan Gagal Dihapus!');
        }
    }
}
