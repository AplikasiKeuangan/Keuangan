@extends('layouts.apps')

@section('head')

<!-- Font Awesome -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/adminlte.min.css">

@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">


          <li class="breadcrumb-item active">
            <h4><b>{{$ucapan}},</i></b> {{Auth::user()->name}}</h4>
          </li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-12">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>Rp {{ number_format($saldoAkhirBank,2) }}<sup style="font-size: 20px"></sup></h3>

            <p>Saldo Akhir Kas Bank</p>
          </div>
          <div class="icon">
            <i class="ion ion-card"></i>
          </div>
          <a href="{{ route('admin-kas-bank-index') }}" class="small-box-footer">Info lebih lanjut <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-6 col-12">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>Rp {{ number_format($saldoAkhirTunai,2) }}<sup style="font-size: 20px"></sup></h3>

            <p>Saldo Akhir Kas Tunai</p>
          </div>
          <div class="icon">
            <i class="ion ion-cash"></i>
          </div>
          <a href="{{ route('admin-kas-tunai-index') }}" class="small-box-footer">Info lebih lanjut <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-6 col-12">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>Rp {{ $jumlah_tahun_ajaran }}<sup style="font-size: 20px"></sup></h3>

            <p>Tahun Ajaran</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-paper-outline"></i>
          </div>
          <a href="{{ route('admin-tahun-ajaran-index') }}" class="small-box-footer">Info lebih lanjut <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-6 col-12">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>Rp {{ $jumlah_siswa }}<sup style="font-size: 20px"></sup></h3>

            <p>Siswa yang Telah Didaftarkan</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="{{ route('admin-siswa-index') }}" class="small-box-footer">Info lebih lanjut <i
              class="fas fa-arrow-circle-right"></i></a>
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
              Kas Bank
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
                <canvas id="kasBankPerBulanChart"
                  style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
              </div>
              <div class="chart tab-pane" id="kas-bank-per-hari-chart" style="position: relative; height: 300px;">
                <canvas id="kasBankPerHariChart"
                  style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
              </div>
            </div>
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
      </section>
      <!-- /.Left col -->
    </div>
    <!-- /.row (main row) -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-12 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-chart-pie mr-1"></i>
              Kas Tunai
            </h3>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                  <a class="nav-link active" href="#kas-tunai-per-bulan-chart" data-toggle="tab">1 Tahun Terakhir</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#kas-tunai-per-hari-chart" data-toggle="tab">Bulan Sekarang</a>
                </li>
              </ul>
            </div>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content p-0">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="kas-tunai-per-bulan-chart"
                style="position: relative; height: 300px;">
                <canvas id="kasTunaiPerBulanChart"
                  style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
              </div>
              <div class="chart tab-pane" id="kas-tunai-per-hari-chart" style="position: relative; height: 300px;">
                <canvas id="kasTunaiPerHariChart"
                  style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
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
      labels: {!!collect(array_reverse($nama_bulans))!!},
  datasets: [
    {
      label: 'Penerimaan (Debit)',
      backgroundColor: 'rgba(60,141,188,0.9)',
      borderColor: 'rgba(60,141,188,0.8)',
      pointRadius: false,
      pointColor: '#3b8bba',
      pointStrokeColor: 'rgba(60,141,188,1)',
      pointHighlightFill: '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data: {!!collect(array_reverse($jumlah_debit_per_bulans)) !!}
        },
    {
      label: 'Pengeluaran (Kredit)',
      backgroundColor: 'rgba(210, 214, 222, 1)',
      borderColor: 'rgba(210, 214, 222, 1)',
      pointRadius: false,
      pointColor: 'rgba(210, 214, 222, 1)',
      pointStrokeColor: '#c1c7d1',
      pointHighlightFill: '#fff',
      pointHighlightStroke: 'rgba(220,220,220,1)',
      data: {!!collect(array_reverse($jumlah_kredit_per_bulans)) !!}
        },
  ]
    }

  var kasTunaiPerBulanChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines: {
          display: false,
        }
      }],
      yAxes: [{
        gridLines: {
          display: false,
        }
      }]
    },
    datasetFill: false
  }

  // This will get the first returned node in the jQuery collection.
  var kasTunaiPerBulanChart = new Chart(kasTunaiPerBulanChartCanvas, {
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
    labels: {!!collect(array_reverse($haris))!!},
  datasets: [
    {
      label: 'Penerimaan (Debit)',
      backgroundColor: 'rgba(60,141,188,0.9)',
      borderColor: 'rgba(60,141,188,0.8)',
      pointRadius: false,
      pointColor: '#3b8bba',
      pointStrokeColor: 'rgba(60,141,188,1)',
      pointHighlightFill: '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data: {!!collect(array_reverse($jumlah_debit_per_haris)) !!}
        },
    {
      label: 'Pengeluaran (Kredit)',
      backgroundColor: 'rgba(210, 214, 222, 1)',
      borderColor: 'rgba(210, 214, 222, 1)',
      pointRadius: false,
      pointColor: 'rgba(210, 214, 222, 1)',
      pointStrokeColor: '#c1c7d1',
      pointHighlightFill: '#fff',
      pointHighlightStroke: 'rgba(220,220,220,1)',
      data: {!!collect(array_reverse($jumlah_kredit_per_haris)) !!}
        },
  ]
    }

  var kasTunaiPerHariChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines: {
          display: false,
        }
      }],
      yAxes: [{
        gridLines: {
          display: false,
        }
      }]
    },
    datasetFill: false
  }

  // This will get the first returned node in the jQuery collection.
  var kasTunaiPerHariChart = new Chart(kasTunaiPerHariChartCanvas, {
    type: 'bar',
    data: kasTunaiPerHariChartData,
    options: kasTunaiPerHariChartOptions
  });

  //---------------------------
  //- Kas Bank PerBulan CHART -
  //---------------------------

  // Get context with jQuery - using jQuery's .get() method.
  var kasBankPerBulanChartCanvas = $('#kasBankPerBulanChart').get(0).getContext('2d')

  var kasBankPerBulanChartData = {
    labels: {!!collect(array_reverse($nama_bulans))!!},
  datasets: [
    {
      label: 'Penerimaan (Debit)',
      backgroundColor: 'rgba(60,141,188,0.9)',
      borderColor: 'rgba(60,141,188,0.8)',
      pointRadius: false,
      pointColor: '#3b8bba',
      pointStrokeColor: 'rgba(60,141,188,1)',
      pointHighlightFill: '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data: {!!collect(array_reverse($jumlah_debit_bank_per_bulans)) !!}
        },
    {
      label: 'Pengeluaran (Kredit)',
      backgroundColor: 'rgba(210, 214, 222, 1)',
      borderColor: 'rgba(210, 214, 222, 1)',
      pointRadius: false,
      pointColor: 'rgba(210, 214, 222, 1)',
      pointStrokeColor: '#c1c7d1',
      pointHighlightFill: '#fff',
      pointHighlightStroke: 'rgba(220,220,220,1)',
      data: {!!collect(array_reverse($jumlah_kredit_bank_per_bulans)) !!}
        },
  ]
    }

  var kasBankPerBulanChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines: {
          display: false,
        }
      }],
      yAxes: [{
        gridLines: {
          display: false,
        }
      }]
    },
    datasetFill: false
  }

  // This will get the first returned node in the jQuery collection.
  var kasBankPerBulanChart = new Chart(kasBankPerBulanChartCanvas, {
    type: 'bar',
    data: kasBankPerBulanChartData,
    options: kasBankPerBulanChartOptions
  });

  //--------------------------
  //- Kas Bank PerHari CHART -
  //--------------------------

  // Get context with jQuery - using jQuery's .get() method.
  var kasBankPerHariChartCanvas = $('#kasBankPerHariChart').get(0).getContext('2d')

  var kasBankPerHariChartData = {
    labels: {!!collect(array_reverse($haris))!!},
  datasets: [
    {
      label: 'Penerimaan (Debit)',
      backgroundColor: 'rgba(60,141,188,0.9)',
      borderColor: 'rgba(60,141,188,0.8)',
      pointRadius: false,
      pointColor: '#3b8bba',
      pointStrokeColor: 'rgba(60,141,188,1)',
      pointHighlightFill: '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data: {!!collect(array_reverse($jumlah_debit_bank_per_haris)) !!}
        },
    {
      label: 'Pengeluaran (Kredit)',
      backgroundColor: 'rgba(210, 214, 222, 1)',
      borderColor: 'rgba(210, 214, 222, 1)',
      pointRadius: false,
      pointColor: 'rgba(210, 214, 222, 1)',
      pointStrokeColor: '#c1c7d1',
      pointHighlightFill: '#fff',
      pointHighlightStroke: 'rgba(220,220,220,1)',
      data: {!!collect(array_reverse($jumlah_kredit_bank_per_haris)) !!}
        },
  ]
    }

  var kasBankPerHariChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines: {
          display: false,
        }
      }],
      yAxes: [{
        gridLines: {
          display: false,
        }
      }]
    },
    datasetFill: false
  }

  // This will get the first returned node in the jQuery collection.
  var kasBankPerHariChart = new Chart(kasBankPerHariChartCanvas, {
    type: 'bar',
    data: kasBankPerHariChartData,
    options: kasBankPerHariChartOptions
  });
  });
</script>
@endsection