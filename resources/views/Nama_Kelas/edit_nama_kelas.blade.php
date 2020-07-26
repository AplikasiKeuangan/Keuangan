@extends('layouts.apps')
@section('content')
@section('judul',' - Daftar Nama Kelas ')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Nama Kelas</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
          <li class="breadcrumb-item active">Edit Nama Kelas</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      
      {{-- middle column --}}
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Nama Kelas</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
        <form method="post" enctype="multipart/form-data" action="/admin/nama_kelas/daftar_nama_kelas/update/{{$nama_kelas->id}}">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          {{ method_field('PUT') }}
            <div class="card-body">
              <div class="form-group"{{$errors->has('nama_kelas')?' has-error':''}}>
                <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama_kelas" value="{{$nama_kelas->nama_kelas}}" placeholder="Masukkan Nama Jurusan">
              </div>
              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
              <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi...">{{$nama_kelas->deskripsi}}</textarea>
              </div>
              
              <div class="form-check"{{$errors->has('status')?' has-error':''}}>
                <input type="checkbox" class="form-check-input" name="status" id="status" value="1"{{($nama_kelas->status==0)?'':'checked'}} id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Aktifkan</label>
                <span class="text-danger">{{$errors->first('status')}}</span>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
     {{-- right column --}}
     
    </div>
  </div>
</section>

@endsection