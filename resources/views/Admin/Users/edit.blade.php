@extends('layouts.apps')

@section('judul',' - Edit Data Pengguna')
@section('content')
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Data Pengguna - {{ $user->name }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin-Data-users-index') }}">Daftar Pengguna</a></li>
              {{-- <li class="breadcrumb-item"><a href="{{ route('admin-tahun-ajaran-kelas-index', ['id_tahun_ajaran' => $tahunAjaran->id]) }}">Daftar Kelas - {{ $tahunAjaran->nama }}</a></li> --}}
              <li class="breadcrumb-item active">Edit Data Pengguna</li>
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
                  </div>
                  <div class="modal-body">
                     <div class="col-md-12">
                        <div class="card">
                              <div class="card-body card-block">
                                 <form method="post" id="form-edit-kelas" class="form-horizontal" action="/admin/Data/users/{{$user->id}}/update" >
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                           <label for="hf-name" class=" form-control-label">Nama</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                        <input type="text" id="hf-name" value="{{$user->name}}" name="name" placeholder="Nama Pengguna" required="" autocomplete="name" class="form-control @error('name') is-invalid @enderror">
                                           @error('name')
                                              <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                              </span>
                                           @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                            <div class="col col-md-3">
                                            <label for="hf-email" class=" form-control-label">Email</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                            <input type="email" value="{{$user->email}}" id="hf-email" name="email" placeholder="@gmail.com" required="" autocomplete="email" class="form-control  @error('email') is-invalid @enderror">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            </div>
                                    </div>
                                    <div class="row form-group">
                                            <div class="col col-md-3">
                                            <label for="hf-password" class=" form-control-label">Password</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                            <input type="password" id="hf-password"  name="password" placeholder="Buat Password" required="" autocomplete="new-password" class="form-control @error('password') is-invalid @enderror">
                                            </div>
                                    </div>
                                    <div class="row form-group">
                                            <div class="col col-md-3">
                                            <label for="hf-role" class=" form-control-label">Role</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                            <div class="custom-control custom-radio">
                                            <input name="role" value="1" {{ $user->role == '1' ? 'checked' : '' }} class="custom-control-input" type="radio" id="customRadio2" name="customRadio">
                                            <label for="customRadio2" class="custom-control-label">Admin</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                            <input name="role" value="0" {{ $user->role == '0' ? 'checked' : ''}} class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                                            <label for="customRadio1" class="custom-control-label">Siswa</label>
                                            </div>
                                            </div>
                                            
                                    </div>
                                    <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                       <i class="fa fa-dot-circle-o"></i> Update
                                    </button>
                                    <button type="reset" class="btn btn-danger btn-sm">
                                       <i class="fa fa-ban"></i> Reset
                                    </button>
                                 </div>
                                   
                                 </form>
                              </div>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
      </div>
   </section>
@endsection

@section('script')
@endsection