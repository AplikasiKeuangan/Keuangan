<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SMP IT AN NAHL @yield('judul')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="icon" href="{{ asset('template/dist/img/logo1.png')}} " type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('template/dist/img/logo1.png')}}" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('template/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('template/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <!-- Sweet Alert-->
  @yield('head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    @include('layouts/navbar')

    @include('layouts/sidebar')
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      @yield('content')
    </div>
    <!-- /.content-wrapper -->
    
    <footer class="main-footer">
      <strong>Copyright &copy; 2020 <a href="{{ route('welcome') }}">SMP IT An-Nahl</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.7.0
      </div>
    </footer>
</div>
<!-- ./wrapper -->

@yield('script')
<!-- jQuery -->
<!-- <script src="{{ asset ('template/plugins/jquery/jquery.min.js')}}"></script> -->
<!-- jQuery UI 1.11.4 -->
<!-- <script src="{{ asset ('template/plugins/jquery-ui/jquery-ui.min.js')}}"></script> -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!--Select-->
<script src="{{asset('template/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset ('template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<!-- <script src="{{ asset ('template/plugins/chart.js/Chart.min.js')}}"></script> -->
<!-- Sparkline -->
<script src="{{ asset ('template/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset ('template/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset ('template/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<!-- <script src="{{ asset ('template/plugins/jquery-knob/jquery.knob.min.js')}}"></script> -->
<!-- daterangepicker -->
<script src="{{ asset ('template/plugins/moment/moment.min.js')}}"></script>
<!-- <script src="{{ asset ('template/plugins/daterangepicker/daterangepicker.js')}}"></script> -->
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset ('template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<!-- <script src="{{ asset ('template/plugins/summernote/summernote-bs4.min.js')}}"></script> -->
<!-- overlayScrollbars -->
<script src="{{ asset ('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ('template/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{ asset ('template/dist/js/pages/dashboard.js')}}"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{ asset ('template/dist/js/demo.js')}}"></script> -->
<script src="{{ asset ('template/dist/js/demo.js')}}"></script>
<!-- DataTables -->
<script src="{{ asset ('template/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset ('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset ('template/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset ('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!--SweetAlert-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(session('success'))
<script>
  swal({
    title: "{{ session('success') }}",
    icon: "success",
    button: "Ya!",
  });
</script>
@endif
@if(session('danger'))
<script>
  swal({
    title: "{{ session('danger') }}",
    icon: "warning",
    button: "Ya!",
  });
</script>
@endif
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
     
     $('.delete-confirm').on('click', function (event) {
         event.preventDefault();
         const url = $(this).attr('href');
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
     });
</script>
<script>
     
     $('.save-confirm').on('click', function (event) {
         event.preventDefault();
         const url = $(this).attr('href');
         swal({
             title: 'Apa Anda Yakin?',
             text: 'Data yang dihapus tidak bisa dipulihkan!',
             icon: 'success',
             buttons: ["Batal", "Ya!"],
         }).then(function(value) {
             if (value) {
                 window.location.href = url;
             }
         });
     });
</script>
<script>
  //Initialize Select2 Elements
  $('.select2').select2()

//Initialize Select2 Elements
$('.select2bs4').select2({
  theme: 'bootstrap4'
})
</script>
<script>
     
     $('.logout-confirm').on('click', function (event) {
         event.preventDefault();
         const url = $(this).attr('href');
         swal({
             title: 'Anda Yakin Ingin Keluar?',
             icon: 'warning',
             buttons: ["Batal", "Ya!"],
         }).then(function(value) {
             if (value) {
              document.getElementById('logout-form').submit();
             }
         });
     });
</script>

@include('sweetalert::alert')
</body>
</html>
