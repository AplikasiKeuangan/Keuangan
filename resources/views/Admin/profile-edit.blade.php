@extends('layouts.apps')

@section('judul',' - Edit Profile')
@section('head')
<!--  -->
@endsection
@section('content')
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Profile - {{ Auth::User()->name }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin-profile') }}">Profile</a></li>
              <li class="breadcrumb-item active">Edit Profile</li>
            </ol>
          </div>
        </div>
      </div>
   </div>
   <!-- /.content-header -->

   <!-- Main content -->
   <section class="content">
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
                                 <form method="post" id="form-edit-profile" class="form-horizontal" action="{{ route('admin-profile-update') }}" >
                                    @csrf
                                    <div class="row form-group">
                                       <div class="col col-md-3">
                                          <label for="hf-username" class=" form-control-label">Username</label>
                                       </div>
                                       <div class="col-12 col-md-9">
                                          <input type="text" id="hf-username" name="name" placeholder="Username" required="" class="form-control" value="{{ Auth::User()->name }}">
                                       </div>
                                    </div>
                                    <div class="row form-group">
                                       <div class="col col-md-3">
                                          <label for="hf-email" class=" form-control-label">Email</label>
                                       </div>
                                       <div class="col-12 col-md-9">
                                          <input type="email" id="hf-email" name="email" placeholder="Email" required="" class="form-control" value="{{ Auth::User()->email }}">
                                       </div>
                                    </div>
                                 </form>
                              </div>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button form="form-edit-profile" type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Update
                     </button>
                     <button form="form-edit-profile" type="reset" class="btn btn-danger btn-sm">
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