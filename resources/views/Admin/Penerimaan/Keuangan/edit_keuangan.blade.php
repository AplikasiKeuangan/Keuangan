@extends('layouts.apps')

@section('judul',' - Edit Kategori')
@section('head')
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection
@section('content')
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Keuangan Debit  - {{ $keuangan->tanggal }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin-Data-keuangan-index') }}">Daftar Keuangan Debit</a></li>
              <li class="breadcrumb-item active">Edit Keuangan Debit</li>
            </ol>
          </div>
        </div>
      </div>
   </div>
   <!-- /.content-header -->

   <!-- Main content -->
   <section class="content">
   @if ($errors->any())
      <div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <h5><i class="icon fas fa-ban"></i> Peringatan!</h5>
            @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
      </div>
   @endif
      <!-- modal-tambah-data -->
      <div class="row col-md-12">
         <div class="modal-dialog modal-lg col-md-12" role="document">
            <div class="modal-content col-md-12">
                  <div class="modal-header">
                     <div class="card-header col-md-11"><strong>Edit Data</strong> Form</div>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="col-md-12">
                        <div class="card">
                              <div class="card-body card-block">
                                 <form method="post" id="form-edit-kategori" class="form-horizontal" action="/admin/Data/keuangan/{{$keuangan->id}}/update" >
                                    @csrf
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                        <label for="hf-tanggal" class=" form-control-label" value="{{$keuangan->tanggal}}">Tanggal</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                           <input type="date" value="{{$keuangan->tanggal}}" id="hf-tanggal" name="tanggal" required="" class="form-control">
                                        </div>
                                  </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-uraian" class=" form-control-label">Keterangan</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <textarea id="hf-uraian" name="keterangan" placeholder="Keterangan" required="" class="form-control">{{$keuangan->keterangan}}</textarea>
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                       <div class="col col-md-3">
                                          <label for="hf-kategori" class=" form-control-label">Kategori</label>
                                       </div>
                                       <div class="col-12 col-md-9">
                                          <select id="hf-kategori" name="kategori" placeholder="kategori"  class="ops form-control">
                                             @foreach($kategori as $key=>$value)
                                                   
                                                   <?php
                                                   if($key!=0){
                                                      $sub_categories=DB::table('kategoris')->select('id','nama_kategori')->where('id',$key)->get();
                                                      if(count($sub_categories)>0){
                                                         foreach ($sub_categories as $sub_category){?>
                                                               <option value="{{$sub_category->id}}"{{$edit_category->id==$sub_category->id?' selected':''}}>&nbsp;&nbsp;{{$sub_category->nama_kategori}}</option>
                                                         <?php }
                                                      }
                                                   }
                                                   ?>
                                             @endforeach
                                          </select>
                                       </div>
                                 </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-jenis" class=" form-control-label">Jenis</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <select id="hf-jenis" name="jenis" placeholder="jenis" class="ops form-control">
                                                <option value="0">Pilih...</option>
                                                <option value="penerimaan">Penerimaan (Debit)</option>
                                             </select>
                                          </div>
                                    </div>
                                    
                                    <div class="row form-group" id="Nominal">
                                       <div class="col col-md-3">
                                          <label for="hf-nominal" class=" form-control-label">Nominal</label>
                                       </div>
                                       <div class="col-12 col-md-9">
                                          
                                                <input type="number" id="hf-nominal" name="nominal" placeholder="Nominal" value="{{$keuangan->penerimaan}}" class="form-control">
                                       </div>
                                 </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                           <i class="fa fa-dot-circle-o"></i> Update
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                           <i class="fa fa-ban"></i> Reset
                                        </button>
                                     </div>
                                 </form>
                              </div>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
      </div>
      
   </section>
@endsection

@section('script')
@endsection