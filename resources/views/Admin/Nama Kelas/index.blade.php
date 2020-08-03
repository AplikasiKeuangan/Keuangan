@extends('layouts.apps')

@section('judul',' - Daftar Nama Kelas')
@section('head')
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection
@section('content')
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Nama Kelas - {{ $kelas->nama_kelas }} - {{ $tahunAjaran->nama }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin-tahun-ajaran-index') }}">Tahun Ajaran</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin-tahun-ajaran-kelas-index', ['id_tahun_ajaran' => $tahunAjaran]) }}">Daftar Kelas - {{ $kelas->nama_kelas }}</a></li>
              <li class="breadcrumb-item active">Daftar Nama Kelas</li>
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
                                 <form method="post" id="form1" class="form-horizontal" action="{{ route('admin-tahun-ajaran-kelas-nama-kelas-store', ['id_tahun_ajaran' => $tahunAjaran->id,'id_kelas' => $kelas->id]) }}" >
                                    @csrf
                                    <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">
                                    <div class="form-group"{{$errors->has('nama_kelas')?' has-error':''}}>
                                       <label for="nama">Nama Kelas</label>
                                       <input type="text" class="form-control" id="nama" name="nama_kelas" placeholder="Masukkan Nama Kelas">
                                    </div>
                                    <div class="form-group">
                                       <label for="deskripsi">Deskripsi</label>
                                       <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi..."></textarea>
                                    </div>
                                    
                                    <div class="form-check"{{$errors->has('status')?' has-error':''}}>
                                       <input type="checkbox" class="form-check-input" name="status" id="status" value="1" id="exampleCheck1">
                                       <label class="form-check-label" for="exampleCheck1">Aktifkan</label>
                                       <span class="text-danger">{{$errors->first('status')}}</span>
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
                              <th>Nama Kelas</th>
                              <th>Deskripsi</th>
                              <th>Status</th>
                              <th style="text-align: right">Tindakan</th>
                           </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                           <tr>
                              <th>Nama Kelas</th>
                              <th>Deskripsi</th>
                              <th>Status</th>
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
         ajax: '{!! route('admin-tahun-ajaran-kelas-nama-kelas-data', ['id_tahun_ajaran' => $tahunAjaran->id,'id_kelas' => $kelas->id]) !!}',
         columns: [
                  { data: 'nama_kelas', name: 'nama_kelas'},
                  { data: 'deskripsi', name: 'deskripsi'},
                  { data: 'status', name: 'status', searchable: false, render : function(data, type, row) 
                     {
                        if(data == 1){
                           return '<span class="badge badge-info">Aktif</span>';
                        }
                        return '<span class="badge badge-dark">Tidak Aktif</span>';
                     }
                  },
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
@endsection