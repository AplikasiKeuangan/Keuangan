@extends('layouts.apps')
@section('judul',' - Daftar Nama Kelas ')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Nama Kelas</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
            <li class="breadcrumb-item active">Daftar Nama Kelas</li>
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
                    <th>Kelas</th>
                    <th>Nama Kelas</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Buat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($nama_kelas as $nama_kelas)
                     
                        <tr>
                            <td>{{$nama_kelas->nama_kelas}}</td>
                            <td>{{$nama_kelas->kelas->nama_kelas}}-{{$nama_kelas->kelas->tahun_ajaran->nama}}</td>
                            <td>{{$nama_kelas->deskripsi}}</td>
                            <td>{{$nama_kelas->created_at->diffForHumans()}}</td>
                            {{-- <td>{{($nama_kelas->status==0)?' Disabled':'Enable'}}</td> --}}
                            <td>
                              @if ($nama_kelas->status==1)
                                  <span class="badge badge-info">Enabled</span>
                              @else
                              <span class="badge badge-dark">Disabled</span>
                              @endif
                            </td>
                            <td><a href="/admin/nama_kelas/daftar_nama_kelas/edit/{{$nama_kelas->id}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                
                                <a href="/admin/nama_kelas/daftar_nama_kelas/hapus/{{$nama_kelas->id}}"class="button delete-confirm btn btn-danger"><i class="fa fa-eraser"></i></a></td>
                        </tr>

                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Kelas</th>
                    <th>Nama Kelas</th>
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