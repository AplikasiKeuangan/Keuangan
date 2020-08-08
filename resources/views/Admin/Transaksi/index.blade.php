@extends('layouts.apps')

@section('judul',' - Transaksi')
@section('head')
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" /> -->

<link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
@endsection
@section('content')

<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Transaksi</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('admin-piutang-transaksi-index')}}">Transaksi</a></li>
               <li class="breadcrumb-item active">Transaksi</li>
            </ol>
         </div>
         <div class="col-sm-12">
            <button type="button" class="btn bg-gradient-primary float-right" data-toggle="modal"
               data-target="#mediumModal">Tambah data</button>
         </div>
      </div>
   </div>
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
   <!-- modal-tambah-data -->
   <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
      aria-hidden="true">
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
                        <form method="post" id="form1" class="form-horizontal"
                           action="{{ route('admin-piutang-transaksi-store') }}">
                           @csrf
                           <div class="row form-group">
                              <div class="col col-md-3">
                                 <label class=" form-control-label">Tagihan</label>
                              </div>
                              <div class="col-12 col-md-9">
                                 <select class="form-control" id="tagihan" name="id_tagihan"
                                    {{$tagihan->count() < 1 ? 'disabled':''}}>
                                    @if($tagihan->count() < 1) <option value="">Masukkan Tagihan terlebih dahulu!</option>
                                       @endif
                                       <option value="">Pilih Tagihan</option>
                                       @foreach($tagihan as $item)
                                       <option value="{{ $item->id_tagihan }}">{{ $item->judul_tagihan }}</option>
                                       @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="row form-group">
                              <div class="col col-md-3">
                                 <label class=" form-control-label">Siswa</label>
                              </div>
                              <div class="col-12 col-md-9">
                                 <select class="form-control select2" id="siswa" name="id_siswa" style="width: 100%;" required>
                                 </select>
                              </div>
                           </div>
                           <div class="row form-group">
                              <div class="col col-md-3">
                                 <label class="form-control-label" id="label-jumlah" min="1">Jumlah</label>
                              </div>
                              <div class="col-12 col-md-9">
                                 <input type="number" class="form-control" name="jumlah_pembayaran" required>
                              </div>
                           </div>
                           <div class="row form-group">
                              <div class="col col-md-12">
                                 <label class="form-control-label" id="label-hutang"></label>
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
         <table id="datatables-pembayaran" class="table table-bordered table-hover">
            <thead>
               <tr>
                  <th>No. Pembayaran</th>
                  <th>Judul Tagihan</th>
                  <th>Jenis Tagihan</th>
                  <th>NIS Siswa</th>
                  <th>Nama Siswa</th>
                  <th>Jumlah Pembayaran</th>
                  
                  <th>Tindakan</th>
               </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
               <tr>
                  <th>No. Pembayaran</th>
                  <th>Judul Tagihan</th>
                  <th>Jenis Tagihan</th>
                  <th>NIS Siswa</th>
                  <th>Nama Siswa</th>
                  <th>Jumlah Pembayaran</th>
                  
                  <th>Tindakan</th>
               </tr>
            </tfoot>
         </table>
      </div>
      <!-- /.card-body -->
   </div>

   @endsection
   @section('script')
   <!-- DataTables -->
   <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
   <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
   <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
   <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
   <!--  -->
   <!-- <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script> -->
   <!-- Bootstrap 4 -->
   <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
   <!-- Select2 -->
   <script src="{{ asset('plugins/select2/js/select2.full.min.js')}}"></script>
   <!-- Bootstrap4 Duallistbox -->
   <script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
   <script>
        require(['jquery'], function ($) {
            $(document).ready(function () {

            $('#cetak').hide()
            $('.page-title').hide()
            $('#tambah').hide()
            $('.hapus').hide()
            $('#histori').toggle()
            
            window.print()

            window.onafterprint = function(){
                    window.close()
            }
        });
        });
    </script>
   <script>
      $(document).ready(function () {
         $(".select2").select2();
         $('#siswa').prop('disabled', true);
         $('#tagihan').change(function () {
            if ($(this).val() != '') {
               var value = $(this).val();
               var _token = $('input[name="_token"]').val();
               $.ajax({
                  url: "{{ route('admin-piutang-transaksi-siswa') }}",
                  method: "POST",
                  data: { value: value, _token: _token },
                  success: function (result) {
                     $('#siswa').prop('disabled', false);
                     $('#siswa').html(result);
                  }
               })
            }else{
               $('#label-hutang').html('');
               $('#siswa').html('');
               $('#siswa').prop('disabled', true);
            }
         });
         $('#siswa').change(function () {
            if ($(this).val() != '') {
               var value = $(this).val();
               var tagihan = $('#tagihan').val();
               var _token = $('input[name="_token"]').val();
               $.ajax({
                  url: "{{ route('admin-piutang-transaksi-hutang') }}",
                  method: "POST",
                  data: { value: value, tagihan: tagihan, _token: _token },
                  success: function (result) {
                     $('#label-hutang').html(result);
                  }
               })
            }else{
               $('#label-hutang').html('');
            }
         });
         $('#tagihan').change(function () {
            $('#siswa').val('');
         });
      });
      //$('#example1').DataTable()
      var table = $('#datatables-pembayaran').DataTable({
         responsive: true,
         autoWidth: false,
         processing : true,
         serverSide: true,
         ajax: '{!! route('admin-piutang-transaksi-data') !!}',
         columns: [
                  { data: 'id_pembayaran', name: 'id_pembayaran' },
                  { data: 'judul_tagihan', name: 'judul_tagihan' },
                  { data: 'jenis', name: 'jenis' },
                  { data: 'nis', name: 'nis' },
                  { data: 'nama_siswa', name: 'nama_siswa' },
                  { data: 'jumlah_pembayaran', className: 'dt-right', name: 'jumlah_pembayaran' },
                  { data: 'action', className: 'dt-right', orderable: false, searchable: true }
               ],
         // "rowCallback": function( row, data ) {}
         "language": {
            "lengthMenu": "Menampilkan _MENU_ records per halaman",
            "zeroRecords": "Tidak metemukan record",
            "info": "Menampilkan _PAGE_ dari _PAGES_ halaman",
            "infoEmpty": "Tidak ada record",
            "infoFiltered": "(difilter dari _MAX_ total records)",
            "infoPostFix":    "",
            "thousands":      ",",
            "loadingRecords": "Memuat...",
            "processing":     "Proses...",
            "search":         "Cari:",
            "paginate": {
                  "first":      "Pertama",
                  "last":       "Terakhir",
                  "next":       "Selanjutnya",
                  "previous":   "Sebelumnya"
            },
            "aria": {
                  "sortAscending":  ": aktifkan untuk mengurutkan kolom naik",
                  "sortDescending": ": aktifkan untuk mengurutkan kolom turun"
            }
         }
      })
      function adminDelete() {
         event.preventDefault();
         const url = $(event.currentTarget).data('admin');
         swal({
            title: 'Apa Anda Yakin?',
            text: 'Data yang dihapus tidak bisa dipulihkan!',
            icon: 'warning',
            buttons: ["Batal", "Ya!"],
         }).then(function(value) {
            if (value) {
               window.location.href = url;
            }
         });
      }
   </script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> -->
   <script type="text/javascript">
      $(function () {
         $(".select2").select2();
      });
   </script>
   @endsection