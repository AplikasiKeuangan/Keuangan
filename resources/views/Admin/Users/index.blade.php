@extends('layouts.apps')

@section('judul',' - Tambah Pengguna')
@section('head')
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection
@section('content')
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Pengguna</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Tambah Pengguna</li>
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
                                 <form method="post" id="form1" class="form-horizontal" action="{{ route('admin-Data-users-store') }}" >
                                    @csrf
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-name" class=" form-control-label">Nama</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <input type="text" id="hf-name" name="name" placeholder="Nama Pengguna" required="" autocomplete="name" class="form-control @error('name') is-invalid @enderror">
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
                                             <input type="email" id="hf-email" name="email" placeholder="@gmail.com" required="" autocomplete="email" class="form-control  @error('email') is-invalid @enderror">
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
                                             <input type="password" id="hf-password" name="password" placeholder="Buat Password" required="" autocomplete="new-password" class="form-control @error('password') is-invalid @enderror">
                                          </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-role" class=" form-control-label">Role</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                          <div class="custom-control custom-radio">
                                             <input name="role" value="1" class="custom-control-input" type="radio" id="customRadio2" name="customRadio">
                                             <label for="customRadio2" class="custom-control-label">Admin</label>
                                          </div>
                                          <div class="custom-control custom-radio">
                                             <input name="role" value="0" class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                                             <label for="customRadio1" class="custom-control-label">Siswa</label>
                                          </div>
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
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Tanggal Buat</th>
              <th>Nama Pengguna</th>
              <th>Role</th>
              <th>Tindakan</th>
            </tr>
            </thead>
            <tbody>
               @php
                   $i = 0;
               @endphp
              @foreach ($user as $user)
               @php
                   $i++;
               @endphp
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->name}}</td>
                    <td>
                        @if($user->role == 1)

                           <span>Admin</span>

                        @else
                        
                           <span>Siswa</span>
                        @endif
                    </td>
                   
                    <td align="center"><a href="/admin/Data/users/{{$user->id}}/edit" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                          {{-- <a href="javascript:" rel="{{$user->id}}" rel1="delete-kategori" class="btn btn-danger deleteRecord"><i class="fa fa-eraser"></i> Delete</a></td> --}}
                          <a href="/admin/Data/users/{{$user->id}}/hapus"class="button delete-confirm btn btn-danger"><i class="fa fa-eraser"></i></a></td>
                </tr>

              @endforeach
            </tbody>
            <tfoot>
            <tr>
            <th>No</th>
              <th>Tanggal Buat</th>
              <th>Nama Pengguna</th>
              <th>Role</th>
              <th>Tindakan</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      
@endsection