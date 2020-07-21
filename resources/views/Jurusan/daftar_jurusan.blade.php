@extends('layouts.apps')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Jurusan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
            <li class="breadcrumb-item active">Daftar Jurusan</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>
    <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nama Jurusan</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Buat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($jurusan as $jurusan)
                     
                        <tr>
                            <td>{{$jurusan->nama_jurusan}}</td>
                            <td>{{$jurusan->deskripsi}}</td>
                            <td>{{$jurusan->created_at->diffForHumans()}}</td>
                            <td>{{($jurusan->status==0)?' Disabled':'Enable'}}</td>
                            <td><a href="/jurusan/daftar_jurusan/edit/{{$jurusan->id}}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                {{-- <a href="javascript:" rel="{{$jurusan->id}}" rel1="delete-jurusan" class="btn btn-danger deleteRecord"><i class="fa fa-eraser"></i> Delete</a></td> --}}
                                <a href="/jurusan/daftar_jurusan/hapus/{{$jurusan->id}}"class="button delete-confirm"><i class="fa fa-eraser"></i> Delete</a></td>
                        </tr>

                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nama Jurusan</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Buat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

@endsection