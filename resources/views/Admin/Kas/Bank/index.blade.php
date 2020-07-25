@extends('layouts.apps')

@section('judul',' - Kas Bank')
@section('head')
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection
@section('content')
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kas Bank</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Kas Bank</li>
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
                                 <form method="post" id="form1" class="form-horizontal" action="{{ route('admin-kas-bank-store') }}" >
                                    @csrf
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-no-bukti" class=" form-control-label">No. Bukti</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="number" id="hf-no-bukti" name="no_bukti" placeholder="No. Bukti" required="" class="form-control">
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-no-rekening" class=" form-control-label">No. Rekening</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="number" id="hf-no-rekening" name="no_rekening" placeholder="No. Rekening" required="" class="form-control">
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-uraian" class=" form-control-label">Uraian</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <textarea id="hf-uraian" name="uraian" placeholder="Uraian" required="" class="form-control"></textarea>
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
                                             <input type="number" id="hf-nominal" name="nominal" placeholder="Nominal" required="" class="form-control" min="1">
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
                     <table id="datatables-kas-bank" class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th>Tanggal</th>
                              <th>No. Bukti</th>
                              <th>No. Rekening</th>
                              <th>Uraian</th>
                              <th>Penerimaan (Debit)</th>
                              <th>Pengeluaran (Kredit)</th>
                              <th>Saldo</th>
                              <th style="text-align: right">Tindakan</th>
                           </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                           <tr>
                              <th>Tanggal</th>
                              <th>No. Bukti</th>
                              <th>No. Rekening</th>
                              <th>Uraian</th>
                              <th>Penerimaan (Debit)</th>
                              <th>Pengeluaran (Kredit)</th>
                              <th>Saldo</th>
                              <th style="text-align: right">Tindakan</th>
                           </tr>
                        </tfoot>
                        <tbaru>
                           <tr>
                              <th colspan="4">Saldo Akhir:</th>
                              <th style="text-align: right">{{ number_format($totaldebit,2) }}</th>
                              <th style="text-align: right">{{ number_format($totalkredit,2) }}</th>
                              <th style="text-align: right">{{ number_format($totalsaldo,2) }}</th>
                              <th></th>
                           </tr>
                        </tbaru>
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
      var table = $('#datatables-kas-bank').DataTable({
         responsive: true,
         autoWidth: false,
         processing : true,
         serverSide: true,
         ajax: '{!! route('admin-kas-bank-data') !!}',
         columns: [
                  { data: 'tanggal', name: 'tanggal', orderable: false },
                  { data: 'no_bukti', name: 'no_bukti', orderable: false },
                  { data: 'no_rekening', name: 'no_rekening', orderable: false },
                  { data: 'uraian', name: 'uraian', orderable: false },
                  { data: 'debit', name: 'debit', className: 'dt-right', render: $.fn.dataTable.render.number( ',','.',2 ), orderable: false },
                  { data: 'kredit', name: 'kredit', className: 'dt-right', render: $.fn.dataTable.render.number( ',','.',2 ), orderable: false },
                  { data: 'saldo', name: 'saldo', className: 'dt-right', render: $.fn.dataTable.render.number( ',','.',2 ), orderable: false },
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