@extends('layouts.apps')

@section('judul',' - Daftar Siswa')
@section('head')
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection
@section('content')
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Daftar Siswa</li>
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
                                 <form method="post" id="form1" class="form-horizontal" action="{{ route('admin-siswa-store') }}" >
                                    @csrf
                                    <div class="row form-group">
                                       <div class="col-12 col-md-12">
                                          <label class="form-control ">Data Pribadi Siswa</label>
                                       </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-nis" class=" form-control-label">NIS</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                          <input type="text" id="hf-nis" name="nis" placeholder="NIS" required="" value="{{$nis}}" class="form-control">
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-nama-lengkap" class=" form-control-label">Nama Lengkap</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="text" id="hf-nama-lengkap" name="nama_lengkap" placeholder="Nama Lengkap" required="" class="form-control">
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-nama-panggilan" class=" form-control-label">Nama Panggilan</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="text" id="hf-nama-panggilan" name="nama_panggilan" placeholder="Nama panggilan" required="" class="form-control">
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-jenis-kelamin" class=" form-control-label">Jenis Kelamin</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <select type="text" id="hf-jenis-kelamin" name="jenis_kelamin" required="" class="form-control">
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                             </select>
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-tempat-lahir" class=" form-control-label">Tempat Lahir</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="text" id="hf-tempat-lahir" name="tempat_lahir" placeholder="Tempat Lahir" required="" class="form-control">
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-tanggal-lahir" class=" form-control-label">Tanggal Lahir</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="date" id="hf-tanggal-lahir" name="tanggal_lahir" required="" class="form-control">
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-agama" class=" form-control-label">Agama</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <select id="hf-agama" name="agama" required="" class="form-control">
                                                <option value="Islam">Islam</option>
                                                <option value="Protestan">Protestan</option>
                                                <option value="Khatolik">Khatolik</option>
                                                <option value="Buddha">Budha</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Kong Hu Cu">Kong Hu Cu</option>
                                             </select>
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-kewarganegaraan" class=" form-control-label">Kewarganegaraan</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <select id="hf-kewarganegaraan" name="kewarganegaraan"  required="" class="form-control">
                                                <option value="WNI">WNI</option>
                                                <option value="WNA">WNA</option>
                                             </select>
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-anak-ke" class=" form-control-label">Anak Ke</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="number" id="hf-anak-ke" name="anak_ke" placeholder="Anak Ke" required="" class="form-control" min="0" max="99">
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-jumlah-saudara" class=" form-control-label">Jumlah Saudara</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="number" id="hf-jumlah-saudara" name="jumlah_saudara" placeholder="Jumlah Saudara" required="" class="form-control" min="0" max="99">
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-kondisi-siswa" class=" form-control-label">Kondisi Siswa</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="text" id="hf-kondisi-siswa" name="kondisi_siswa" placeholder="Kondisi Siswa" required="" class="form-control">
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-status-siswa" class=" form-control-label">Status Siswa</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="text" id="hf-status-siswa" name="status_siswa" placeholder="Status Siswa" required="" class="form-control">
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-bahasa-sehari-hari" class=" form-control-label">Bahasa Sehari-hari</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="text" id="hf-bahasa-sehari-hari" name="bahasa_sehari_hari" placeholder="Bahasa Sehari-hari" required="" class="form-control">
                                          </div>
                                    </div>

                                    <!-- Keterangan Tempat Tinggal -->
                                    <div class="row form-group">
                                       <div class="col-12 col-md-12">
                                          <label class="form-control ">Keterangan Tempat Tinggal</label>
                                       </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-alamat" class=" form-control-label">Alamat</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <textarea id="hf-alamat" name="alamat" placeholder="Alamat" required="" class="form-control"></textarea>
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-telepon" class=" form-control-label">Telepon</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="text" id="hf-telepon" name="telepon" placeholder="Telepon" class="form-control">
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-handphone" class=" form-control-label">Handphone</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="text" id="hf-handphone" name="handphone" placeholder="Handphone" class="form-control">
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-email" class=" form-control-label">Email</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="email" id="hf-email" name="email" placeholder="Email"  class="form-control">
                                          </div>
                                    </div>

                                    <!-- Keterangan Pendidikan Sebelumnya -->
                                    <div class="row form-group">
                                       <div class="col-12 col-md-12">
                                          <label class="form-control ">Keterangan Pendidikan Sebelumnya</label>
                                       </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-asal-sekolah" class=" form-control-label">Asal Sekolah</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="text" id="hf-asal-sekolah" name="asal_sekolah" placeholder="Asal Sekolah" required="" class="form-control">
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
                     <table id="datatables-siswa" class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th>NIS</th>
                              <th>Nama Lengkap</th>
                              <th>Nama Panggilan</th>
                              <th>Jenis Kelamin</th>
                              <th>Tempat Lahir</th>
                              <th>Tanggal Lahir</th>
                              <th>Agama</th>
                              <th>Kewarganegaraan</th>
                              <th>Anak Ke</th>
                              <th>Jumlah Saudara</th>
                              <th>Kondisi Siswa</th>
                              <th>Status Siswa</th>
                              <th>Bahasa Sehari-hari</th>
                              <th>Alamat</th>
                              <th>Telepon</th>
                              <th>Handphone</th>
                              <th>Email</th>
                              <th>Asal Sekolah</th>
                              
                              <th style="text-align: right">Tindakan</th>
                           </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                           <tr>
                              <th>NIS</th>
                              <th>Nama Lengkap</th>
                              <th>Nama Panggilan</th>
                              <th>Jenis Kelamin</th>
                              <th>Tempat Lahir</th>
                              <th>Tanggal Lahir</th>
                              <th>Agama</th>
                              <th>Kewarganegaraan</th>
                              <th>Anak Ke</th>
                              <th>Jumlah Saudara</th>
                              <th>Kondisi Siswa</th>
                              <th>Status Siswa</th>
                              <th>Bahasa Sehari-hari</th>
                              <th>Alamat</th>
                              <th>Telepon</th>
                              <th>Handphone</th>
                              <th>Email</th>
                              <th>Asal Sekolah</th>
                              
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
      var table = $('#datatables-siswa').DataTable({
         responsive: true,
         autoWidth: false,
         processing : true,
         serverSide: true,
         ajax: '{!! route('admin-siswa-data') !!}',
         columns: [
                  { data: 'nis', name: 'nis', render:function(data, type, row){
                     return "<a href='./siswa/"+ row.nis +"/"+ row.nama_lengkap +"/detail'>" + row.nis + "</a>"
                  }},
                  { data: 'nama_lengkap', name: 'nama_lengkap' },
                  { data: 'nama_panggilan', name: 'nama_panggilan' },
                  { data: 'jenis_kelamin', name: 'jenis_kelamin' },
                  { data: 'tempat_lahir', name: 'tempat_lahir' },
                  { data: 'tanggal_lahir', name: 'tanggal_lahir' },
                  { data: 'agama', name: 'agama' },
                  { data: 'kewarganegaraan', name: 'kewarganegaraan' },
                  { data: 'anak_ke', name: 'anak_ke' },
                  { data: 'jumlah_saudara', name: 'jumlah_saudara' },
                  { data: 'kondisi_siswa', name: 'kondisi_siswa' },
                  { data: 'status_siswa', name: 'status_siswa' },
                  { data: 'bahasa_sehari_hari', name: 'bahasa_sehari_hari' },
                  { data: 'alamat', name: 'alamat' },
                  { data: 'telepon', name: 'telepon' },
                  { data: 'handphone', name: 'handphone' },
                  { data: 'email', name: 'email' },
                  { data: 'asal_sekolah', name: 'asal_sekolah' },
                 
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
   })
@endsection