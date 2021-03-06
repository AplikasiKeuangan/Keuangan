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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  
  <!-- Sweet Alert-->

  <!-- <link href="{{ asset('plugins/select2/select2.full.min.js') }}" rel="stylesheet" />-->

  <!--toggle-->
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            color: black;
        }
        .select2{
            width: 100% !important;
        }
    </style>
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
      <strong>Copyright &copy; 2020 <a href="{{ route('welcome') }}">SMP IT AN NAHL</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 0.8.1
      </div>
    </footer>
</div>
@yield('script')
<!-- ./wrapper -->
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
<script src="{{ asset ('template/plugins/daterangepicker/daterangepicker.js')}}"></script>
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
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var user_id = $(this).data('id'); 
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/changeStatus',
            data: {'status': status, 'user_id': user_id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })
</script>
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
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      
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
<script type="text/javascript">
  $(function () {
      $('#dt').datetimepicker({
        autoclose: true,
            format: 'YYYY/MM/DD'
      });
  });
</script>
<script type="text/javascript">
  $(function () {
      $('#dte').datetimepicker({
        autoclose: true,
            format: 'YYYY/MM/DD'
      });
  });
</script>
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+6282268916913", // WhatsApp number
            text:"Assalau'alaikum..",
            call_to_action: "Hubungi Kami", // Call to action
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
@include('sweetalert::alert')
</body>
</html>
