<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KasTunai;
use DataTables;

class KasTunaiController extends Controller
{
    public function index(){
        return view('admin.kas.tunai.index');
    }
    public function data(Request $request)
    {
        if ($request->ajax()) {
            $kastunai  = KasTunai::get();
            return DataTables::of($kastunai)
                ->addColumn('action', function($kastunai){
                    return '<a data-admin="admin/kas/tunai/'.$kastunai->id_kas_tunai.'/hapus" class="btn btn-danger admin-remove" href="admin/kas/tunai/'.$kastunai->id_kas_tunai.'/hapus" onclick="adminDelete()"><i class="fa fa-trash"></i></a>';
                })
                ->make(true);
        }else{
            return abort(403);
        }
    }
}
