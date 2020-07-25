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
            <h1>Edit Kategori - {{ $kategori->nama_kategori }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin-Data-kategori-index') }}">Daftar Kategori</a></li>
              <li class="breadcrumb-item active">Edit Kategori</li>
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
                                 <form method="post" id="form-edit-kategori" class="form-horizontal" action="/admin/Data/kategori/{{$kategori->id}}/update" >
                                    @csrf
                                    
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-nama-kategori" class=" form-control-label">Nama Kategori</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="text" id="hf-nama-kategori" name="nama_kategori" placeholder="Nama Lengkap" required="" class="form-control" value="{{ $kategori->nama_kategori }}">
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