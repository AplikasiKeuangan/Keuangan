@extends('layouts.apps')

@section('judul',' - Tagihan')
@section('head')
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
@endsection
@section('content')

<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Tagihan</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('admin-piutang-tagihan-index')}}">Tagihan</a></li>
               <li class="breadcrumb-item active">Tagihan</li>
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
                           action="{{ route('admin-piutang-tagihan-store') }}">
                           @csrf
                           <div class="row form-group">
                              <div class="col col-md-3">
                                 <label for="hf-jumlah" class=" form-control-label">Judul Tagihan</label>
                              </div>
                              <div class="col-12 col-md-9">
                                 <input type="text" class="form-control" name="judul_tagihan" required>
                              </div>
                           </div>
                           <div class="row form-group">
                              <div class="col col-md-3">
                                 <label class=" form-control-label">Jenis</label>
                              </div>
                              <div class="col-12 col-md-9">
                                 <select class="form-control" name="jenis" id="jenis">
                                    <option value="SPP">SPP</option>
                                    <option value="Sekali Bayar">Sekali Bayar</option>
                                 </select>
                              </div>
                           </div>
                           <div class="row form-group">
                              <div class="col col-md-3">
                                 <label class=" form-control-label">Tahun Ajaran</label>
                              </div>
                              <div class="col-12 col-md-9">
                                 <select class="form-control" id="tahun-ajaran" name="id_tahun_ajaran"
                                    {{$tahunAjaran->count() < 1 ? 'disabled':''}}>
                                    @if($tahunAjaran->count() < 1) <option value="">Masukkan Tahun Ajar terlebih dahulu!</option>
                                       @endif
                                       <option value=""> Pilih Tahun Ajaran </option>
                                       @foreach($tahunAjaran as $item)
                                       <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                       @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="row form-group" id="kelas-group">
                              <div class="col col-md-3">
                                 <label class=" form-control-label">Tingkat Kelas</label>
                              </div>
                              <div class="col-12 col-md-9">
                                 <select class="form-control" id="kelas" name="id_kelas">
                                 </select>
                              </div>
                           </div>
                           <div class="row form-group">
                              <div class="col col-md-3">
                                 <label class="form-control-label" id="label-jumlah">Jumlah</label>
                              </div>
                              <div class="col-12 col-md-9">
                                 <input type="number" class="form-control" name="jumlah" required>
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
         <table id="datatables-tagihan" class="table table-bordered table-hover">
            <thead>
               <tr>
                  <th>Judul Tagihan</th>
                  <th>Jenis</th>
                  <th>Tahun Ajaran</th>
                  <th>Tingkat Kelas</th>
                  <th>Jumlah</th>
                  
                  <th>Tindakan</th>
               </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
               <tr>
                  <th>Judul Tagihan</th>
                  <th>Jenis</th>
                  <th>Tahun Ajaran</th>
                  <th>Tingkat Kelas</th>
                  <th>Jumlah</th>
                  
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

   <script>
      $(document).ready(function () {
         $('#kelas-group').hide();
         $('#kelas').prop('disabled', 'disabled');
         $('#label-jumlah').text('Jumlah/bulan');
         $('#jenis').change(function () {
            if ($(this).val() == 'SPP') {
               $('#kelas-group').hide();
               $('#label-jumlah').text('Jumlah/bulan');
            }else{
               $('#kelas-group').show();
               $('#label-jumlah').text('Jumlah');
            }
         });
         $('#tahun-ajaran').change(function () {
            if ($(this).val() != '') {
               var value = $(this).val();
               var _token = $('input[name="_token"]').val();
               $.ajax({
                  url: "{{ route('admin-piutang-tagihan-kelas') }}",
                  method: "POST",
                  data: { value: value, _token: _token },
                  success: function (result) {
                     $('#kelas').prop('disabled', false);
                     $('#kelas').html(result);
                  }
               })
            }else{
               $('#kelas').prop('disabled', 'disabled');
            }
         });
         $('#tahun-ajaran').change(function () {
            $('#kelas').val('');
         });
      });
      //$('#example1').DataTable()
      var table = $('#datatables-tagihan').DataTable({
         responsive: true,
         autoWidth: false,
         processing : true,
         serverSide: true,
         ajax: '{!! route('admin-piutang-tagihan-data') !!}',
         columns: [
                  { data: 'judul_tagihan', name: 'judul_tagihan' },
                  { data: 'jenis', name: 'jenis' },
                  { data: 'tahun_ajaran', name: 'tahun_ajaran', 
                  render : function(data, type, row) 
                     {
                        return "<a href='/admin/tahun-ajaran/"+row.id_tahun_ajaran+"/kelas'>"+row.tahun_ajaran+"</a>";
                     }
                  },
                  { data: 'kelas', name: 'kelas', 
                  render : function(data, type, row) 
                     {
                        if(data == "Semua"){
                           return "<a href='/admin/tahun-ajaran/"+row.id_tahun_ajaran+"/kelas'>"+row.kelas+"</a>";
                        }else{
                           return "<a href='/admin/tahun-ajaran/"+row.id_tahun_ajaran+"/kelas/"+row.id_kelas+"/nama-kelas'>"+row.kelas+"</a>";
                        }
                     }
                  },
                  { data: 'jumlah', className: 'dt-right', name: 'jumlah' },
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
   @endsection