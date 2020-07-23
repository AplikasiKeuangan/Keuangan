@extends('layouts.apps')

@section('judul',' - Data Keuangan')
@section('head')
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection
@section('content')
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Keuangan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Data Keuangan</li>
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
                                <form method="post" id="form1" class="form-horizontal" action="{{ route('admin-kas-tunai-store') }}" >
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                           <label for="hf-tanggal" class=" form-control-label">Tanggal</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                           <input type="date" id="hf-tanggal" name="tanggal" required="" class="form-control">
                                        </div>
                                  </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-uraian" class=" form-control-label">Keterangan</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <textarea id="hf-uraian" name="keterangan" placeholder="Uraian" required="" class="form-control"></textarea>
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-jenis" class=" form-control-label">Jenis</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <select id="hf-jenis" name="jenis" placeholder="jenis" required="" class="form-control">
                                                <option value="Debit">Penerimaan (Debit)</option>
                                                <option value="Kredit">Pengeluaran (Kredit)</option>
                                             </select>
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-nominal" class=" form-control-label">Nominal</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="number" id="hf-nominal" name="nominal" placeholder="Nominal" required="" class="form-control">
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
        {{-- <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Tanggal Buat</th>
              <th>Nama Jurusan</th>
              <th>Tindakan</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($kategori as $kategori)
               
                <tr>
                    <td>{{$kategori->id}}</td>
                    <td>{{$kategori->created_at->diffForHumans()}}</td>
                    <td>{{$kategori->nama_kategori}}</td>
                    <td align="center"><a href="/admin/Data/kategori/{{$kategori->id}}/edit" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                         
                          <a href="/admin/Data/kategori/{{$kategori->id}}/hapus"class="button delete-confirm btn btn-danger"><i class="fa fa-eraser"></i></a></td>
                </tr>

              @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>No</th>
                <th>Tanggal Buat</th>
                <th>Nama Jurusan</th>
                <th>Tindakan</th>
            </tr>
            </tfoot>
          </table>
        </div> --}}
        <!-- /.card-body -->
      </div>
@endsection