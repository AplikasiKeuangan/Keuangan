@extends('layouts.apps')
@section('judul',' - Data Keuangan')
@section('content')
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Data Keuangan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Keuangan</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-6 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  @if ($totalpenerimaan == null)
                      <h3>Rp.-</h3>
                  @else
                      <h3>Rp.{{ number_format($totalpenerimaan,2) }}</h3>
                  @endif
  
                  <p>Penerimaan (Debit)</p>
                </div>
                <div class="icon">
                  <i class="ion ion-arrow-down-c"></i>
                </div>
                <a href="{{route('admin-Data-keuangan-index')}}" class="small-box-footer">Info Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
           
            <div class="col-lg-6 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>Rp.-</h3>
  
                  <p>Pengeluaran (Kredit)</p>
                </div>
                <div class="icon">
                  <i class="ion ion-arrow-up-c"></i>
                </div>
                <a href="#" class="small-box-footer">Info Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          
          </div>
          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>
                    Data Keuangan An-Nahl
                  </h3>
                  <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                      <li class="nav-item">
                        <a class="nav-link active" href="#kas-bank-per-bulan-chart" data-toggle="tab">1 Tahun Terakhir</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#kas-bank-per-hari-chart" data-toggle="tab">Bulan Sekarang</a>
                      </li>
                    </ul>
                  </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content p-0">
                    <!-- Morris chart - Sales -->
                    <div class="chart tab-pane active" id="kas-bank-per-bulan-chart"
                         style="position: relative; height: 300px;">
                        <canvas id="kasBankPerBulanChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                     </div>
                    <div class="chart tab-pane" id="kas-bank-per-hari-chart" style="position: relative; height: 300px;">
                        <canvas id="kasBankPerHariChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                    </div>
                  </div>
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
  
              
  
             
            </section>
            <!-- /.Left col -->
           
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection
@section('script')
<!-- jQuery -->
<script src="{{ asset ('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset ('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset ('plugins/chart.js/Chart.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset ('dist/js/demo.js')}}"></script>
<!-- page script -->
<script>
  $(function () {
    //----------------------------
    //- Kas Tunai PerBulan CHART -
    //----------------------------

    // Get context with jQuery - using jQuery's .get() method.
    var kasTunaiPerBulanChartCanvas = $('#kasTunaiPerBulanChart').get(0).getContext('2d')

    var kasTunaiPerBulanChartData = {
      labels  : {!!collect(array_reverse($nama_bulans))!!},
      datasets: [
        {
          label               : 'Penerimaan (Debit)',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : {!!collect(array_reverse($jumlah_debit_per_bulans))!!}
        },
        {
          label               : 'Pengeluaran (Kredit)',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : {!!collect(array_reverse($jumlah_kredit_per_bulans))!!}
        },
      ]
    }

    var kasTunaiPerBulanChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      },
      datasetFill             : false
    }

    // This will get the first returned node in the jQuery collection.
    var kasTunaiPerBulanChart       = new Chart(kasTunaiPerBulanChartCanvas, {
      type: 'bar',
      data: kasTunaiPerBulanChartData,
      options: kasTunaiPerBulanChartOptions
    });
    
    //---------------------------
    //- Kas Tunai PerHari CHART -
    //---------------------------

    // Get context with jQuery - using jQuery's .get() method.
    var kasTunaiPerHariChartCanvas = $('#kasTunaiPerHariChart').get(0).getContext('2d')

    var kasTunaiPerHariChartData = {
      labels  : {!!collect(array_reverse($haris))!!},
      datasets: [
        {
          label               : 'Penerimaan (Debit)',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : {!!collect(array_reverse($jumlah_debit_per_haris))!!}
        },
        {
          label               : 'Pengeluaran (Kredit)',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : {!!collect(array_reverse($jumlah_kredit_per_haris))!!}
        },
      ]
    }

    var kasTunaiPerHariChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      },
      datasetFill             : false
    }

    // This will get the first returned node in the jQuery collection.
    var kasTunaiPerHariChart       = new Chart(kasTunaiPerHariChartCanvas, {
      type: 'bar',
      data: kasTunaiPerHariChartData,
      options: kasTunaiPerHariChartOptions
    });
  
   
@endsection
