@extends('layouts.apps')

@section('judul',' - Edit Tahun Ajaran')
@section('content')
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Tahun Ajaran - {{ $tahun_ajaran->nama }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin-tahun-ajaran-index') }}">Daftar Tahun Ajaran</a></li>
              <li class="breadcrumb-item active">Edit Tahun Ajaran</li>
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
                                 <form method="post" id="form-edit-tahun_ajaran" class="form-horizontal" action="/admin/tahun-ajaran/{{$tahun_ajaran->id}}/update" >
                                    @csrf
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                           <label for="hf-nama" class=" form-control-label">Nama</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                        <input type="text" id="hf-nama" name="nama" placeholder="Nama"required="" value="{{$tahun_ajaran->nama}}" class="form-control">
                                        </div>
                                  </div>
                                  <div class="row form-group">
                                      <div class="col col-md-3">
                                         <label for="hf-dt" class=" form-control-label">Tanggal Mulai</label>
                                      </div>
                                      <div class="col-12 col-md-6">
                                          <div class="input-group date" id="dt" data-target-input="nearest">
                                              <input type="text"  value="{{$tahun_ajaran->tgl_mulai}}" name="tgl_mulai" class="form-control datetimepicker-input" data-target="#dt"/>
                                              <div class="input-group-append" data-target="#dt" data-toggle="datetimepicker">
                                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row form-group">
                                      <div class="col col-md-3">
                                         <label for="hf-dte" class=" form-control-label">Tanggal Selesai</label>
                                      </div>
                                      <div class="col-12 col-md-6">
                                          <div class="input-group date" id="dte" data-target-input="nearest">
                                              <input type="text"  value="{{$tahun_ajaran->tgl_selesai}}" name="tgl_selesai" class="form-control datetimepicker-input" data-target="#dte"/>
                                              <div class="input-group-append" data-target="#dte" data-toggle="datetimepicker">
                                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row form-group">
                                      <div class="col col-md-3">
                                         <label for="hf-status" class=" form-control-label">Status</label>
                                      </div>
                                      <div class="col-12 col-md-6">
                                        <div class="form-check"{{$errors->has('status')?' has-error':''}}>
                                            <input type="checkbox" class="form-check-input" name="is_active" id="status" value="1"{{($tahun_ajaran->is_active==0)?'':'checked'}} id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Aktifkan</label>
                                            <span class="text-danger">{{$errors->first('status')}}</span>
                                          </div>
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