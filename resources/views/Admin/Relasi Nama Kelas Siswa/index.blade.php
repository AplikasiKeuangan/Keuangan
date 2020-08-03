@extends('layouts.apps')

@section('judul',' - Daftar Nama Siswa')
@section('head')
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Nama Siswa - {{ $namaKelas->nama_kelas }} - {{ $kelas->nama_kelas }} - {{ $tahunAjaran->nama }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin-tahun-ajaran-index') }}">Tahun Ajaran</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin-tahun-ajaran-kelas-index', ['id_tahun_ajaran' => $tahunAjaran]) }}">Daftar Kelas - {{ $kelas->nama_kelas }}</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin-tahun-ajaran-kelas-nama-kelas-index', ['id_tahun_ajaran' => $tahunAjaran->id,'id_kelas'=>$kelas->id]) }}">Daftar Nama Kelas - {{ $namaKelas->nama_kelas }}</a></li>
              <li class="breadcrumb-item active">Daftar Nama Siswa</li>
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
                                 <form method="post" id="form1" class="form-horizontal" action="{{ route('admin-tahun-ajaran-kelas-nama-kelas-siswa-store', ['id_tahun_ajaran' => $tahunAjaran->id,'id_kelas' => $kelas->id,'id_nama_kelas'=>$namaKelas->id]) }}" >
                                    @csrf
                                       <input type="hidden" name="id_nama_kelas" value="{{ $namaKelas->id }}">
                                    <div class="form-group"{{$errors->has('nis')?' has-error':''}}>
                                       <label for="nis">Siswa</label>
                                       <span></span>
                                       <select class="form-control select2" name="nis[]" id="nis" multiple="multiple" data-placeholder="Pilih Siswa" style="width: 100%;">
                                       @foreach($siswa as $data)
                                          <option value="{{ $data->nis }}">{{ $data->nis }} | {{ $data->nama_lengkap }}</option>
                                       @endforeach
                                       </select>
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
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-body">
                     <table id="datatables-kelas" class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th>NIS</th>
                              <th>Nama Lengkap</th>
                              <th>Jenis Kelamin</th>
                              <th style="text-align: right">Tindakan</th>
                           </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                           <tr>
                              <th>NIS</th>
                              <th>Nama Lengkap</th>
                              <th>Jenis Kelamin</th>
                              <th style="text-align: right">Tindakan</th>
                           </tr>
                        </tfoot>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
@endsection

@section('script')

<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>


<script>
   $(function () {
      //$('#example1').DataTable()
      var table = $('#datatables-kelas').DataTable({
         responsive: true,
         autoWidth: false,
         processing : true,
         serverSide: true,
         ajax: '{!! route('admin-tahun-ajaran-kelas-nama-kelas-siswa-data', ['id_tahun_ajaran' => $tahunAjaran->id,'id_kelas' => $kelas->id,'id_nama_kelas'=>$namaKelas->id]) !!}',
         columns: [
                  { data: 'nis', name: 'nis'},
                  { data: 'nama_lengkap', name: 'nama_lengkap'},
                  { data: 'jenis_kelamin', name: 'jenis_kelamin'},
                  { data: 'action', className: 'dt-right', orderable: false, searchable: false }
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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
   <script type="text/javascript">
      $(function () {
         $(".select2").select2();
      });
   </script>
@endsection