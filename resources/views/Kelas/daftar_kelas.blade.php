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
                    <th>Nama Kelas</th>
                    <th>Tahun Ajaran</th>
                    <th>Tanggal Buat</th>
                    <th>Status</th>
                    <th>Tindakan</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($kelas as $kelas)
                     
                        <tr>
                            <td>{{$kelas->nama_kelas}}</td>
                            <td>{{$kelas->tahun_ajaran->nama}}</td>
                            <td>{{$kelas->created_at->diffForHumans()}}</td>
                            <td>{{($kelas->status==0)?' Disabled':'Enable'}}</td>
                            <td><a href="/admin/kelas/daftar_kelas/edit/{{$kelas->id}}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                {{-- <a href="javascript:" rel="{{$kelas->id}}" rel1="delete-kelas" class="btn btn-danger deleteRecord"><i class="fa fa-eraser"></i> Delete</a></td> --}}
                                <a href="/admin/kelas/daftar_kelas/hapus/{{$kelas->id}}"class="button delete-confirm btn btn-danger"><i class="fa fa-eraser"></i> Delete</a></td>
                        </tr>

                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nama Kelas</th>
                    <th>Tahun Ajaran</th>
                    <th>Tanggal Buat</th>
                    <th>Status</th>
                    <th>Tindakan</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

@endsection