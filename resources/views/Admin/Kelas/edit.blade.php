@extends('layouts.apps')

@section('judul',' - Edit Kelas')
@section('content')
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Kelas - {{ $kelas->nama_kelas }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin-tahun-ajaran-index') }}">Daftar Tahun Ajaran</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin-tahun-ajaran-kelas-index', ['id_tahun_ajaran' => $tahunAjaran->id]) }}">Daftar Kelas - {{ $tahunAjaran->nama }}</a></li>
              <li class="breadcrumb-item active">Edit Kelas</li>
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
                  </div>
                  <div class="modal-body">
                     <div class="col-md-12">
                        <div class="card">
                              <div class="card-body card-block">
                                 <form method="post" id="form-edit-kelas" class="form-horizontal" action="/admin/tahun-ajaran/{{$tahunAjaran->id}}/kelas/{{$kelas->id}}/update" >
                                    @csrf
                                    <input type="hidden" id="hf-nama" name="tahun_ajaran_id" placeholder="Nama" required="" value="{{$tahunAjaran->id}}" class="form-control">
                                    
                                 <div class="card-body">
                                    <div class="form-group"{{$errors->has('nama_kelas')?' has-error':''}}>
                                       <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama_kelas" value="{{$kelas->nama_kelas}}" placeholder="Masukkan Nama Kelas">
                                    </div>
                                    <div class="form-check"{{$errors->has('status')?' has-error':''}}>
                                       <input type="checkbox" class="form-check-input" name="status" id="status" value="1"{{($kelas->status==0)?'':'checked'}} id="exampleCheck1">
                                       <label class="form-check-label" for="exampleCheck1">Aktifkan</label>
                                       <span class="text-danger">{{$errors->first('status')}}</span>
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