<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tahun_Ajaran;
use App\Kelas;
use DataTables;

class TahunAjaranController extends Controller
{
    public function index()
    {
        return view('Admin.Tahun Ajaran.index');
    }
    public function data(Request $request){
        if ($request->ajax()) {
            $tahunAjaran  = Tahun_Ajaran::orderBy('created_at', 'DESC')->get();
            return DataTables::of($tahunAjaran)
                ->addColumn('action', function($tahunAjaran){
                    $cog = '<a href="/admin/tahun-ajaran/'.$tahunAjaran->id.'/kelas" class="btn btn-light"><i class="fa fa-cog"></i></a> ';
                    if($tahunAjaran->is_active == 0){
                        $cog = '';
                    }
                    return $cog.'<a href="/admin/tahun-ajaran/'.$tahunAjaran->id.'/edit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a> <a data-admin="/admin/tahun-ajaran/'.$tahunAjaran->id.'/delete" class="btn btn-danger admin-remove" onclick="adminDelete()" href="#"><i class="fa fa-eraser"></i> Delete</a>';
                })
                ->make(true);
        }else{
            return abort(403);
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255,nama',
            'tgl_mulai' => 'required|date|before:'.$request->tgl_selesai,
            'tgl_selesai' => 'required|date',
            'is_active' => 'nullable|boolean',
        ]);

        $periode = Tahun_Ajaran::make($request->input());

        if($request->is_active == null){
            $periode->is_active = 0;
        }

        if($periode->save()){
            alert()->success('Data berhasil ditambahkan!');
            return back();
        }else{
            alert()->error('Data gagal ditambahkan!');
            return back();
        }
    }
    public function edit($id_tahun_ajaran)
    {
        $tahun_ajaran =Tahun_Ajaran::findOrfail($id_tahun_ajaran);
        return view('admin.Tahun Ajaran.edit',compact('tahun_ajaran'));
    }
    public function update(Request $request, $id_tahun_ajaran)
    {
        $update_ajaran=Tahun_Ajaran::findOrFail($id_tahun_ajaran);
        $this->validate($request,[
            'nama'=>'required|max:255'.$update_ajaran->id,
            'tgl_mulai'=>'date',
            'tgl_selesai'=>'date',
            
        ]);
        //dd($request->all());die();
        $input_data=$request->all();
        if(empty($input_data['is_active'])){
            $input_data['is_active']=0;
        }
        $update_ajaran->update($input_data);
        alert()->success('Tahun Ajaran berhasil diedit!');
    	return redirect()->route('admin-tahun-ajaran-index');
    }
    public function destroy($id_tahun_ajaran)
    {
        $tahun_ajaran = Tahun_Ajaran::findOrfail($id_tahun_ajaran);
        $kelasCount = Kelas::where('tahun_ajaran_id',$tahun_ajaran->id)->count();
        if ($kelasCount == 0) {
            $tahun_ajaran->delete();
            alert()->success('Tahun Ajaran berhasil dihapus!');
            return back();
        }else{
            alert()->warning('Harap hapus Kelas-Kelas di Tahun Ajaran ini terlebih dahulu!');
            return back();
        }
    }
}
