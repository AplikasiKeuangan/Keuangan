@extends('layouts.apps')

@section('judul',' - Detail Siswa')
@section('content')
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin-siswa-index')}}">Daftar Siswa</a></li>
              <li class="breadcrumb-item active">Detail Siswa</li>
            </ol>
          </div>
        </div>
      </div>
   </div>
   <!-- /.content-header -->

   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ $data_siswa->nis }} - {{ $data_siswa->nama_lengkap }}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="accordion">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                          Data Pribadi Siswa
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                      <div class="card-body">
                        <dl class="row">
                           <dt class="col-sm-4">Nama Lengkap</dt>
                           <dd class="col-sm-8">{{ $data_siswa->nama_lengkap }}</dd>
                           <dt class="col-sm-4">Nama Panggilan</dt>
                           <dd class="col-sm-8">{{ $data_siswa->nama_panggilan }}</dd>
                           <dt class="col-sm-4">Jenis Kelamin</dt>
                           <dd class="col-sm-8">{{ $data_siswa->jenis_kelamin }}</dd>
                           <dt class="col-sm-4">Tempat, Tanggal Lahir</dt>
                           <dd class="col-sm-8">{{ $data_siswa->tempat_lahir.', '.date('d M Y', strtotime($data_siswa->tanggal_lahir))}}</dd>
                           <dt class="col-sm-4">Agama</dt>
                           <dd class="col-sm-8">{{ $data_siswa->agama }}</dd>
                           <dt class="col-sm-4">Kewarganegaraan</dt>
                           <dd class="col-sm-8">{{ $data_siswa->kewarganegaraan }}</dd>
                           <dt class="col-sm-4">Anak Ke</dt>
                           <dd class="col-sm-8">{{ $data_siswa->anak_ke }}</dd>
                           <dt class="col-sm-4">Jumlah Saudara</dt>
                           <dd class="col-sm-8">{{ $data_siswa->jumlah_saudara }}</dd>
                           <dt class="col-sm-4">Kondisi Siswa</dt>
                           <dd class="col-sm-8">{{ $data_siswa->kondisi_siswa }}</dd>
                           <dt class="col-sm-4">Status Siswa</dt>
                           <dd class="col-sm-8">{{ $data_siswa->status_siswa }}</dd>
                           <dt class="col-sm-4">Bahasa Sehari-hari</dt>
                           <dd class="col-sm-8">{{ $data_siswa->bahasa_sehari_hari }}</dd>
                        </dl>
                      </div>
                    </div>
                  </div>
                  <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                          Keterangan Tempat Tinggal
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                        <dl class="row">
                           <dt class="col-sm-4">Alamat</dt>
                           <dd class="col-sm-8">{{ $data_siswa->alamat }}</dd>
                           <dt class="col-sm-4">Telepon</dt>
                           <dd class="col-sm-8">{{ $data_siswa->telepon }}</dd>
                           <dt class="col-sm-4">Handphone</dt>
                           <dd class="col-sm-8">{{ $data_siswa->handphone }}</dd>
                           <dt class="col-sm-4">Email</dt>
                           <dd class="col-sm-8">{{ $data_siswa->email }}</dd>
                        </dl>
                      </div>
                    </div>
                  </div>
                  <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                          Keteranagan Pendidikan Sebelumnya
                        </a>
                      </h4>
                    </div>
                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                        <dl class="row">
                           <dt class="col-sm-4">Asal Sekolah</dt>
                           <dd class="col-sm-8">{{ $data_siswa->asal_sekolah }}</dd>
                        </dl>
                      </div>
                    </div>
                  </div>
                  <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                          Keteranagan Pendidikan Saat ini
                        </a>
                      </h4>
                    </div>
                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                        <dl class="row">
                           <dt class="col-sm-4">Kelas</dt>
                           <dd class="col-sm-8">{{ $data_siswa->kelas }}</dd>
                        </dl>
                      </div>
                      <div class="card-body">
                        <dl class="row">
                           <dt class="col-sm-4">Nama Kelas</dt>
                           <dd class="col-sm-8">{{ $data_siswa->nama_kelas }}</dd>
                        </dl>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
   </section>
@endsection