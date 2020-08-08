@extends('Siswa.app')

@section('judul',' - Profile')
@section('content')
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Keuangan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Keuangan</li>
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
                    <div id="collapseFour" class="collapse show" data-parent="#accordion">
                      <div class="card-body">
                        <dl class="row">
                          @if($tagihan->count() < 1)
                          <dt class="col-sm-12" style="text-align: center">Tidak ditemukannya hutang!</dt>
                          @endif
                           @foreach($tagihan as $data)
                           <dt class="col-sm-12" style="text-align: center">Tahun Ajaran - {{ $data->tahun_ajaran->nama }}</dt>
                           @endforeach
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