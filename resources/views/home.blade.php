@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

     <h3>SISTEM MANAJEMEN EVALUASI AKREDITASI</h3>


     <h3>Fakultas Teknologi Informasi</h3>




@stop


@section('content')

@if (auth()->user()->level=="admin")

  <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$dosentetap}}</h3>

                <p>Dosen Tetap</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{Route('Dosentetappt.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$dosentdktetap}}<sup style="font-size: 20px"></sup></h3>

                <p>Dosen Tidak Tetap</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{Route('Dosentdktetap.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>0</h3>

                <p>Jumlah Mahasiswa</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
    </div>
</div>



<!---frame untuk layout per prodi !-->
<div class="row">
          <div class="col-12">
            <h4>Matriks Penilaian Program Studi</h4>
          </div>
        </div>
        <!-- ./row -->
        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card card-secondary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Teknik Informatika</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Sistem Informasi</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Manajemen Informatika</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                     <!-- =========================================================== -->
                      <h5 class="mt-4 mb-2">Matriks Penilaian dan Capaian</h5>
                      <div class="row">
                        <div class="col-md-3 col-sm-6 col-12">
                          <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="far fa-copy"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Kerjasama</span>
                              <span class="info-box-number">0</span>

                              <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                              </div>
                              <span class="progress-description">
                                Nilai Capaian
                              </span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                          <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="far fa-copy"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Seleksi Mahasiswa</span>
                              <span class="info-box-number">0</span>

                              <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                              </div>
                              <span class="progress-description">
                                Nilai Capaian
                              </span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                          <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="far fa-copy"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Mahasiswa Asing</span>
                              <span class="info-box-number">0</span>

                              <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                              </div>
                              <span class="progress-description">
                               Nilai Capaian
                              </span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                          <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="fas fa-copy"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Dosen Tetap PT</span>
                              <span class="info-box-number">{{$nilai}}</span>

                              <div class="progress">
                                <div class="progress-bar" style="width: 10%"></div>
                              </div>
                              <span class="progress-description">
                                Nilai Capaian
                              </span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>

                             <div class="col-md-3 col-sm-6 col-12">
                          <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="fas fa-copy"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Dosen Tetap PT</span>
                              <span class="info-box-number">0</span>

                              <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                              </div>
                              <span class="progress-description">
                                Nilai Capaian
                              </span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                             <div class="col-md-3 col-sm-6 col-12">
                          <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="fas fa-copy"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Dosen Tetap PT</span>
                              <span class="info-box-number">0</span>

                              <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                              </div>
                              <span class="progress-description">
                                Nilai Capaian
                              </span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                             <div class="col-md-3 col-sm-6 col-12">
                          <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="fas fa-copy"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Dosen Tetap PT</span>
                              <span class="info-box-number">0</span>

                              <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                              </div>
                              <span class="progress-description">
                                Nilai Capaian
                              </span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                             <div class="col-md-3 col-sm-6 col-12">
                          <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="fas fa-copy"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Dosen Tetap PT</span>
                              <span class="info-box-number">0</span>

                              <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                              </div>
                              <span class="progress-description">
                                Nilai Capaian
                              </span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                             <div class="col-md-3 col-sm-6 col-12">
                          <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="fas fa-copy"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Dosen Tetap PT</span>
                              <span class="info-box-number">0</span>

                              <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                              </div>
                              <span class="progress-description">
                                Nilai Capaian
                              </span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                             <div class="col-md-3 col-sm-6 col-12">
                          <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="fas fa-copy"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Dosen Tetap PT</span>
                              <span class="info-box-number">0</span>

                              <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                              </div>
                              <span class="progress-description">
                                Nilai Capaian
                              </span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>     <div class="col-md-3 col-sm-6 col-12">
                          <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="fas fa-copy"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Dosen Tetap PT</span>
                              <span class="info-box-number">0</span>

                              <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                              </div>
                              <span class="progress-description">
                                Nilai Capaian
                              </span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>     <div class="col-md-3 col-sm-6 col-12">
                          <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="fas fa-copy"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Dosen Tetap PT</span>
                              <span class="info-box-number">0</span>

                              <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                              </div>
                              <span class="progress-description">
                                Nilai Capaian
                              </span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                   Under Maintenance!!!
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                                   Under Maintenance!!!!
                                </div>
                              </div>
                            </div>
                            <!-- /.card -->
                          </div>
                        </div>
                      </div>



              <!---frame untuk layout per prodi !-->
              <div class="row">
                        <div class="col-12">
                          <h4>Evaluasi dan Validasi Capaian</small></h4>
                        </div>
                      </div>
                      <!-- ./row -->
                      <div class="row">
                        <div class="col-12 col-sm-12">
                          <div class="card card-secondary card-tabs">
                            <div class="card-header p-0 pt-1">
                              <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Teknik Informatika</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Sistem Informasi</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">Manajemen Informatika</a>
                                </li>
                              </ul>
                            </div>
                            <div class="card-body">
                              <div class="tab-content" id="custom-tabs-two-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                                   <h5 class="mb-2">Validasi dan Evaluasi</i></small></h5>
                                        <div class="row">
                                          <!-- /.col -->
                                          <div class="col-md-12">
                                            @if($nilai > 12)
                                            <div class="card bg-success">
                                              <div class="card-header">  
                                                <h3 class="card-title">Success</h3>

                                                <div class="card-tools">
                                                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                                  </button>
                                                </div>
                                                <!-- /.card-tools -->
                                              </div>
                                              <!-- /.card-header -->
                                              <div class="card-body">
                                                Standar 1 Tercapai, Jumlah Dosen {{$nilai}}
                                              </div>
                                              <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                  
                                           @elseif($nilai < 3)
                                            <div class="card bg-danger">
                                              <div class="card-header">  
                                                <h3 class="card-title">Success</h3>

                                                <div class="card-tools">
                                                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                                  </button>
                                                </div>
                                                <!-- /.card-tools -->
                                              </div>
                                              <!-- /.card-header -->
                                              <div class="card-body">
                                                Standar 1 Tercapai, Jumlah Dosen {{$nilai}}
                                              </div>
                                              <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                   
                                            @elseif ($nilai < 12)
                                            <div class="card bg-warning">
                                              <div class="card-header">  
                                                <h3 class="card-title">Perhatian</h3>

                                                <div class="card-tools">
                                                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                                  </button>
                                                </div>
                                                <!-- /.card-tools -->
                                              </div>
                                              <!-- /.card-header -->
                                              <div class="card-body">
                                                - Capaian Jumlah anda belum memenuhi syarat<br>
                                                - Skor anda 3  <BR>
                                                - jumlah dosen {{$nilai}}<br>
                                              </div>
                                              <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
   
                                          @elseif ($nilai = 0)
                                            <div class="card bg-info">
                                              <div class="card-header">  
                                                <h3 class="card-title">Success</h3>

                                                <div class="card-tools">
                                                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                                  </button>
                                                </div>
                                                <!-- /.card-tools -->
                                              </div>
                                              <!-- /.card-header -->
                                              <div class="card-body">
                                                Standar 1 Tercapai, Jumlah Dosen {{$nilai}}
                                              </div>
                                              <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                          @endif
                                          </div>
                                          <!-- /.col -->
                                        <!--/div>
                               


                      <!-- =========================================================== DOSEN TETAP PT-->

                                         <div class="col-md-12" >
                                            @if($nilai > 12)
                                            <div class="card bg-success">
                                              <div class="card-header">  
                                                <h3 class="card-title">Success</h3>
                                                <div class="card-tools">
                                                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                                  </button>
                                                </div>
                                                <!-- /.card-tools -->
                                              </div>
                                              <!-- /.card-header -->
                                              <div class="card-body">
                                                Standar 1 Tercapai, Jumlah Dosen {{$nilai}}
                                              </div>
                                              <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                  
                                           @elseif($nilai < 3)
                                            <div class="card bg-danger">
                                              <div class="card-header">  
                                                <h3 class="card-title">Success</h3>
                                                <div class="card-tools">
                                                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                                  </button>
                                                </div>
                                                <!-- /.card-tools -->
                                              </div>
                                              <!-- /.card-header -->
                                              <div class="card-body">
                                                Standar 1 Tercapai, Jumlah Dosen {{$nilai}}
                                              </div>
                                              <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                   
                                            @elseif ($nilai < 12)
                                            <div class="card bg-warning">
                                              <div class="card-header">  
                                                <h3 class="card-title">Perhatian</h3>
                                                <div class="card-tools">
                                                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                                  </button>
                                                </div>
                                                <!-- /.card-tools -->
                                              </div>
                                              <!-- /.card-header -->
                                              <div class="card-body">
                                                - Capaian Jumlah anda belum memenuhi syarat<br>
                                                - Skor anda 3  <BR>
                                                - jumlah dosen {{$nilai}}<br>
                                              </div>
                                              <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
   
                                          @elseif ($nilai = 0)
                                            <div class="card bg-info">
                                              <div class="card-header">  
                                                <h3 class="card-title">Success</h3>
                                                <div class="card-tools">
                                                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                                  </button>
                                                </div>
                                                <!-- /.card-tools -->
                                              </div>
                                              <!-- /.card-header -->
                                              <div class="card-body">
                                                Standar 1 Tercapai, Jumlah Dosen {{$nilai}}
                                              </div>
                                              <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                          @endif
                                          </div>
                                          <!-- /.col -->
                                        </div>
                                        <!-- /.row -->


                      <!-- =========================================================== DOSEN TETAP PT-->



                  </div><!--ROW- NOTIFIKASI->
 
                  <!-- =========================================================== TAB 1-->
                  <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                    <div class="overlay-wrapper">
                      <div class="overlay dark"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Under Construction...</div></div>
                      Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                    </div>
                  </div>
                  <!-- =========================================================== TAB 2-->
                  <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
                     <div class="overlay-wrapper">
                      <div class="overlay dark"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Under Construction...</div></div>
                      Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
          
              <!-- /.card -->
            </div>
          </div>

@else 



@endif




@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<!-- jQuery -->
<script src="../vendor/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../vendor/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="../adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../adminlte/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Digital Goods',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label               : 'Electronics',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }

    var areaChartOptions = {
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
      }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, areaChartOptions)
    var lineChartData = $.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
</script>
@stop