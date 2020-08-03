@extends('layouts.apps')

@section('judul',' - Tagihan Siswa')
@section('head')
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection
@section('content')

   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tagihan Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('admin-Data-tagihan-index')}}">Tagihan Siswa</a></li>
              <li class="breadcrumb-item active">Tagihan Siswa</li>
            </ol>
          </div>
          <div class="col-sm-12">
            <button type="button" class="btn bg-gradient-primary float-right" data-toggle="modal" data-target="#mediumModal">Tambah data</button>
          </div>
        </div>
      </div>
   </div>
   <!-- /.content-header -->

   <!-- Main content -->
   <section class="content">
      <!-- modal-tambah-data -->
      <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                  <div class="modal-header">
                     <div class="card-header col-md-11"><strong>Data</strong> Form</div>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="col-md-12">
                        <div class="card">
                              <div class="card-body card-block">
                                <form method="post" id="form1" class="form-horizontal" action="{{ route('admin-Data-tagihan-store') }}" >
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                           <label for="hf-nama" class=" form-control-label">Nama</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select class="form-control" name="nama" id="hanya-siswa" >
                                                @foreach($nama_kelas as $item)
                                                   @foreach ($siswa as $data)
                                                   <option value="{{ $item->id }}"> </option>
                                                   @endforeach
                                                
                                                {{-- <option value="{{ $item->id }}">{{ $item->kelas->nama_kelas.'-'.$item->nama_kelas.'-'.$item->kelas->tahun_ajaran->nama}} </option> --}}
                                                @endforeach
                                            </select>
                                        </div>
                                  </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-jumlah" class=" form-control-label">Jumlah</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                            <input type="number" class="form-control" name="jumlah" required>
                                          </div>
                                    </div>
                                    
                                   
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                           <label for="hf-jenis" class=" form-control-label">Jenis</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                           <select id="hf-jenis" name="jenis" placeholder="jenis" required="" class="form-control">
                                              <option value="SPP">SPP</option>
                                              
                                           </select>
                                        </div>
                                  </div>
                                 </form>
                              </div>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button form="form1" type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit
                     </button>
                     <button form="form1" type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Reset
                     </button>
                  </div>
            </div>
         </div>
      </div>
      <!-- ./modal-tambah-data -->
      <div class="card">
              
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Id Peserta Didik</th>
              <th>Jumlah</th>
              <th>Tindakan</th>
            </tr>
            </thead>
            <tbody>
               @php
                   $i = 0;
               @endphp
              @foreach ($tagihan as $tagihan)
             @php
                 $i++;
             @endphp
              <tr>
               <td>{{$i}}</td>
               <td>{{$tagihan->id}}</td>
               <td>{{$tagihan->jumlah}}</td>
               
               <td align="center"><a href="/admin/Data/tagihan/{{$tagihan->id}}/edit" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                  
               <a href="/admin/Data/tagihan/{{$tagihan->id}}/hapus"class="button delete-confirm btn btn-danger"><i class="fa fa-eraser"></i></a></td>
            </tr>
             

              @endforeach
            </tbody>
            <tfoot>
            <tr>
               <th>No</th>
               <th>Id Peserta Didik</th>
               <th>Jumlah</th>
               <th>Tindakan</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
     
@endsection
@section('js')
    
@endsection