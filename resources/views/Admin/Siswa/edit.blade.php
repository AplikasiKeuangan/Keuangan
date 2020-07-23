@extends('layouts.apps')

@section('judul',' - Edit Data Siswa')
@section('head')
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection
@section('content')
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Data Siswa - {{ $data_siswa->nis }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin-siswa-index') }}">Daftar Siswa</a></li>
              <li class="breadcrumb-item active">Edit Data Siswa</li>
            </ol>
          </div>
        </div>
      </div>
   </div>
   <!-- /.content-header -->

   <!-- Main content -->
   <section class="content">
   @if ($errors->any())
      <div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <h5><i class="icon fas fa-ban"></i> Peringatan!</h5>
            @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
      </div>
   @endif
      <!-- modal-tambah-data -->
      <div class="row col-md-12">
         <div class="modal-dialog modal-lg col-md-12" role="document">
            <div class="modal-content col-md-12">
                  <div class="modal-header">
                     <div class="card-header col-md-11"><strong>Edit Data</strong> Form</div>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="col-md-12">
                        <div class="card">
                              <div class="card-body card-block">
                                 <form method="post" id="form-edit-data-siswa" class="form-horizontal" action="{{ route('admin-siswa-update',['nis' => $data_siswa->nis,'nama_lengkap' => $data_siswa->nama_lengkap]) }}" >
                                    @csrf
                                    <div class="row form-group">
                                       <div class="col-12 col-md-12">
                                          <label class="form-control ">Data Pribadi Siswa</label>
                                       </div>
                                    </div>
                                    <!-- <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-nis" class=" form-control-label">NIS</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="text" id="hf-nis" name="nis" placeholder="NIS" required="" class="form-control" value="{{ $data_siswa->nis }}">
                                          </div>
                                    </div> -->
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-nama-lengkap" class=" form-control-label">Nama Lengkap</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="text" id="hf-nama-lengkap" name="nama_lengkap" placeholder="Nama Lengkap" required="" class="form-control" value="{{ $data_siswa->nama_lengkap }}">
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-nama-panggilan" class=" form-control-label">Nama Panggilan</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="text" id="hf-nama-panggilan" name="nama_panggilan" placeholder="Nama panggilan" required="" class="form-control" value="{{ $data_siswa->nama_panggilan }}">
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-jenis-kelamin" class=" form-control-label">Jenis Kelamin</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <select type="text" id="hf-jenis-kelamin" name="jenis_kelamin" required="" class="form-control">
                                                <option value="Laki-laki" {{ $data_siswa->jenis_kelamin == 'Laki-laki' ? 'selected':''}}>Laki-laki</option>
                                                <option value="Perempuan" {{ $data_siswa->jenis_kelamin == 'Perempuan' ? 'selected':''}}>Perempuan</option>
                                             </select>
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-tempat-lahir" class=" form-control-label">Tempat Lahir</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="text" id="hf-tempat-lahir" name="tempat_lahir" placeholder="Tempat Lahir" required="" class="form-control" value="{{ $data_siswa->tempat_lahir }}">
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-tanggal-lahir" class=" form-control-label">Tanggal Lahir</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="date" id="hf-tanggal-lahir" name="tanggal_lahir" required="" class="form-control"value="{{ $data_siswa->tanggal_lahir }}">
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-agama" class=" form-control-label">Agama</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <select id="hf-agama" name="agama" required="" class="form-control">
                                                <option value="Islam" {{ $data_siswa->agama == 'Islam' ? 'selected':''}}>Islam</option>
                                                <option value="Protestan" {{ $data_siswa->agama == 'Protestan' ? 'selected':''}}>Protestan</option>
                                                <option value="Khatolik" {{ $data_siswa->agama == 'Khatolik' ? 'selected':''}}>Khatolik</option>
                                                <option value="Buddha" {{ $data_siswa->agama == 'Buddha' ? 'selected':''}}>Budha</option>
                                                <option value="Hindu" {{ $data_siswa->agama == 'Hindu' ? 'selected':''}}>Hindu</option>
                                                <option value="Kong Hu Cu" {{ $data_siswa->agama == 'Kong Hu Cu' ? 'selected':''}}>Kong Hu Cu</option>
                                             </select>
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-kewarganegaraan" class=" form-control-label">Kewarganegaraan</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <select id="hf-kewarganegaraan" name="kewarganegaraan"  required="" class="form-control">
                                                <option value="WNI" {{ $data_siswa->kewarganegaraan == 'WNI' ? 'selected':''}}>WNI</option>
                                                <option value="WNA" {{ $data_siswa->kewarganegaraan == 'WNA' ? 'selected':''}}>WNA</option>
                                             </select>
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-anak-ke" class=" form-control-label">Anak Ke</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="number" id="hf-anak-ke" name="anak_ke" placeholder="Anak Ke" required="" class="form-control" min="0" max="99" value="{{ $data_siswa->anak_ke }}">
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-jumlah-saudara" class=" form-control-label">Jumlah Saudara</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="number" id="hf-jumlah-saudara" name="jumlah_saudara" placeholder="Jumlah Saudara" required="" class="form-control" min="0" max="99" value="{{ $data_siswa->jumlah_saudara }}">
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-kondisi-siswa" class=" form-control-label">Kondisi Siswa</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="text" id="hf-kondisi-siswa" name="kondisi_siswa" placeholder="Kondisi Siswa" required="" class="form-control" value="{{ $data_siswa->kondisi_siswa }}">
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-status-siswa" class=" form-control-label">Status Siswa</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="text" id="hf-status-siswa" name="status_siswa" placeholder="Status Siswa" required="" class="form-control" value="{{ $data_siswa->status_siswa }}">
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-bahasa-sehari-hari" class=" form-control-label">Bahasa Sehari-hari</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="text" id="hf-bahasa-sehari-hari" name="bahasa_sehari_hari" placeholder="Bahasa Sehari-hari" required="" class="form-control" value="{{ $data_siswa->bahasa_sehari_hari }}">
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
                                             <textarea id="hf-alamat" name="alamat" placeholder="Alamat" required="" class="form-control">{{ $data_siswa->alamat }}</textarea>
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-telepon" class=" form-control-label">Telepon</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="text" id="hf-telepon" name="telepon" placeholder="Telepon" class="form-control" value="{{ $data_siswa->telepon }}">
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-handphone" class=" form-control-label">Handphone</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="text" id="hf-handphone" name="handphone" placeholder="Handphone" class="form-control" value="{{ $data_siswa->handphone }}">
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-email" class=" form-control-label">Email</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="email" id="hf-email" name="email" placeholder="Email"  class="form-control" value="{{ $data_siswa->email }}">
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
                                             <input type="text" id="hf-asal-sekolah" name="asal_sekolah" placeholder="Asal Sekolah" required="" class="form-control" value="{{ $data_siswa->asal_sekolah }}">
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                       <div class="col col-md-3">
                                          <label for="hf-kelas" class=" form-control-label">Kelas</label>
                                       </div>
                                       <div class="col-12 col-md-9">
                                          <select id="hf-kelas" name="kelas"  required="" class="form-control">
                                             @foreach ($kelas as $kelas)
                                                <option value="{{$kelas->nama_kelas}}" {{$kelas->nama_kelas ? 'selected':''}}>{{$kelas->nama_kelas}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="row form-group">
                                       <div class="col col-md-3">
                                          <label for="hf-jurusan" class=" form-control-label">Jurusan</label>
                                       </div>
                                       <div class="col-12 col-md-9">
                                          <select id="hf-jurusan" name="jurusan"  required="" class="form-control">
                                             @foreach ($jurusan as $jurusan)
                                                <option value="{{$jurusan->nama_jurusan}}" {{$jurusan->nama_jurusan ? 'selected':''}}>{{$jurusan->nama_jurusan}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button form="form-edit-data-siswa" type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Update
                     </button>
                     <button form="form-edit-data-siswa" type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Reset
                     </button>
                  </div>
            </div>
         </div>
      </div>
   </section>
@endsection

@section('script')
@endsection