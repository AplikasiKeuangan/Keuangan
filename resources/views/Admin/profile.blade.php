@extends('layouts.apps')

@section('judul', '- Profile')
@section('head')
<!--  -->
@endsection

@section('content')
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Profile - {{ Auth::User()->name }}</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <!-- /.card-header -->
              <div class="card-body">
                <div id="accordion">
                  <div class="card">
                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                      <div class="card-body">
                        <dl class="row">
                           <dt class="col-sm-4">Username</dt>
                           <dd class="col-sm-8">{{ Auth::User()->name }}</dd>
                           <dt class="col-sm-4">Email</dt>
                           <dd class="col-sm-8">{{ Auth::User()->email }}</dd>
                        </dl>
                      </div>
                      <div class="card-footer" style="text-align: center">
                        <a href="{{ route('admin-profile-edit') }}"><button class="btn btn-primary">Edit</button></a>
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
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection

@section('script')

@endsection