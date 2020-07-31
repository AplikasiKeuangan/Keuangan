<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tahun_Ajaran;

class Tahun_AjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahun_ajaran = Tahun_Ajaran::orderBy('created_at','desc')->paginate(5);
        // $tahun_ajaran = Tahun_Ajaran::all();
        return view('Admin.Tahun_Ajaran.index',compact('tahun_ajaran'));
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
        $request->validate([
            'nama' => 'required|max:255|unique:tahun__ajarans,nama',
            'tgl_mulai' => 'required|date|before:'.$request->tgl_selesai,
            'tgl_selesai' => 'required|date',
            'is_active' => 'nullable|boolean',
        ]);

        $periode = Tahun_Ajaran::make($request->input());

        if($request->is_active == null){
            $periode->is_active = 0;
        }

        if($periode->save()){
            alert()->success('Tahun Ajaran Berhasil Ditambahkan!');
            return back();
        }else{
            alert()->error('Tahun Ajaran Gagal Ditambahkan!');
            return back();
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
        $tahun_ajaran =Tahun_Ajaran::findOrfail($id);
        return view('admin.Tahun_Ajaran.edit',compact('tahun_ajaran'));
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
        $update_ajaran=Tahun_Ajaran::findOrFail($id);
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
        alert()->success('Tahun Ajaran Berhasil Diedit!');
    	return redirect('/admin/Data/tahun_ajaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tahun_ajaran = Tahun_Ajaran::findOrfail($id);
        $tahun_ajaran->delete();
        if ($tahun_ajaran) {
            alert()->success('Tahun Ajaran Berhasil Dihapus!');
            return back();
           
        }

    }
}
