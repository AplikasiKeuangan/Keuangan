@extends('layouts.apps')

@section('judul',' - Tahun Ajaran')
@section('head')
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection
@section('content')
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tahun Ajaran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Tahun Ajaran</li>
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
                                 <form method="post" id="form1" class="form-horizontal" action="{{ route('admin-tahun-ajaran-store') }}" >
                                    @csrf
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-kategori" class=" form-control-label">Nama</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="text" id="hf-kategori" name="nama" placeholder="Nama"required="" class="form-control">
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                           <label for="hf-dt" class=" form-control-label">Tanggal Mulai</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="input-group date" id="dt" data-target-input="nearest">
                                                <input type="text" name="tgl_mulai" class="form-control datetimepicker-input" data-target="#dt"/>
                                                <div class="input-group-append" data-target="#dt" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                           <label for="hf-dte" class=" form-control-label">Tanggal Selesai</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="input-group date" id="dte" data-target-input="nearest">
                                                <input type="text" name="tgl_selesai" class="form-control datetimepicker-input" data-target="#dte"/>
                                                <div class="input-group-append" data-target="#dte" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                           <label for="hf-status" class=" form-control-label">Status</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="custom-switch">
                                                <input type="checkbox" name="is_active" value="1" class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">Aktif</span>
                                                </label>
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
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-body">
                     <table id="datatables-tahun-ajaran" class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th>Nama Tahun Ajaran</th>
                              <th>Tanggal Mulai</th>
                              <th>Tanggal Selesai</th>
                              <th>Status</th>
                              <th style="text-align: right">Tindakan</th>
                           </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                           <tr>
                              <th>Nama Tahun Ajaran</th>
                              <th>Tanggal Mulai</th>
                              <th>Tanggal Selesai</th>
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
      var table = $('#datatables-tahun-ajaran').DataTable({
         responsive: true,
         autoWidth: false,
         processing : true,
         serverSide: true,
         ajax: '{!! route('admin-tahun-ajaran-data') !!}',
         columns: [
                  { data: 'nama', name: 'nama'},
                  { data: 'tgl_mulai', name: 'tgl_mulai'},
                  { data: 'tgl_selesai', name: 'tgl_selesai'},
                  { data: 'is_active', name: 'status', searchable: false, render : function(data, type, row) 
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