@extends('layouts.apps')

@section('judul',' - Data Keuangan Debit')
@section('head')
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection
@section('content')

   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Keuangan Debit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('admin-Data-keuangan-index1')}}">Data Keuangan</a></li>
              <li class="breadcrumb-item active">Data Keuangan Debit</li>
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
                                <form method="post" id="form1" class="form-horizontal" action="{{ route('admin-Data-keuangan-store') }}" >
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
                                             <textarea id="hf-uraian" name="keterangan" placeholder="Keterangan" required="" class="form-control"></textarea>
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                       <div class="col col-md-3">
                                          <label for="hf-kategori" class=" form-control-label">Kategori</label>
                                       </div>
                                       <div class="col-12 col-md-9">
                                          <select id="hf-kategori" name="kategori" placeholder="kategori" required="" class="ops form-control">
                                             @foreach($kategori as $key=>$value)
                                             
                                             <?php
                                                 if($key!=0){
                                                     $sub_categories=DB::table('kategoris')->select('id','nama_kategori')->where('id',$key)->get();
                                                     if(count($sub_categories)>0){
                                                         foreach ($sub_categories as $sub_category){
                                                             echo '<option value="'.$sub_category->id.'">&nbsp;&nbsp;'.$sub_category->nama_kategori.'</option>';
                                                         }
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
                                             <select id="hf-jenis" name="jenis" placeholder="jenis" required="" class="ops form-control">
                                                <option class="ops @error('ops') is-invalid @enderror" value="0">Pilih...</option>
                                                <option class="ops @error('ops') is-invalid @enderror" value="penerimaan">Penerimaan (Debit)</option>
                                             </select>
                                          </div>
                                    </div>
                                    
                                    <div class="row form-group" style="display: none;" id="Nominal">
                                       <div class="col col-md-3">
                                          <label for="hf-nominal" class=" form-control-label">Nominal</label>
                                       </div>
                                       <div class="col-12 col-md-9">
                                          <input type="number" id="hf-nominal" name="nominal" placeholder="Nominal" class="form-control">
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
              <th>Tanggal Buat</th>
              <th>Tanggal</th>
              <th>Deskripsi</th>
              <th>Kategori</th>
              <th style="text-align:right ">Penerimaan</th>
             
              <th>Tindakan</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($keuangan as $keuangan)
               
                <tr>
                    <td>{{$keuangan->id}}</td>
                    <td>{{$keuangan->created_at->diffForHumans()}}</td>
                    <td>{{$keuangan->tanggal}}</td>
                    <td>{{$keuangan->keterangan}}</td>
                    <td>{{$keuangan->kategori->nama_kategori}}</td>
                     @if ($keuangan->penerimaan == null)
                        <td style="text-align:right ">-</td>
                     @else
                     <td style="text-align:right">{{ number_format($keuangan->penerimaan,2) }}</td>
                  
                    @endif
                   
                    
                    <td align="center"><a href="/admin/Data/keuangan/{{$keuangan->id}}/edit" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                         
                          <a href="/admin/Data/keuangan/{{$keuangan->id}}/hapus"class="button delete-confirm btn btn-danger"><i class="fa fa-eraser"></i></a></td>
                </tr>

              @endforeach
            </tbody>
            <tfoot>
            <tr>
               <th>No</th>
              <th>Tanggal Buat</th>
              <th>Tanggal</th>
              <th>Deskripsi</th>
              <th>Kategori</th>
              <th style="text-align:right ">Penerimaan</th>
             
              <th>Tindakan</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <script>
         $(document).ready(function(){
          $('.ops').on('change', function() {
          if ( this.value == 'penerimaan')
          {
             
              $("#Nominal").show();
          }
          else
          {
              
              $("#Nominal").hide();
          }
          });
      });
     </script>
@endsection