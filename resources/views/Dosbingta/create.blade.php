@extends('adminlte::page')

@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dosen Pembimbing utama tugas akhir</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Dosen Pembimbing utama tugas akhir</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"> Tambah Data Dosen Pembimbing utama tugas akhir</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>                                                

                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <strong>Whoops!</strong> There were some problems with your input.<br><br>
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif

                    <div class="row">
                      <div class="container-fluid">
                        <div class="col-lg-12">
                             <form action="{{ route('dosbingta.store') }}" method="POST">
                            @csrf
                                  <div class="form-group">
                                    <label for="">Nama Dosen</label>
                                    <input type="text" class="form-control" id="nama-dosen" name="nama_dosen" aria-describedby="emailHelp">
                                    </div>  

                                    <div class="form-group">
                                    <label>Jumlah Mahasiswa yang Dibimbing</label>
                                    </div>

                                    <div class="form-group">
                                    <label>pada PS yang Diakreditasi</label>
                                    </div>
                             
                                   <div class="form-group">
                                    <label for="">TS 2</label>
                                    <input type="text" class="form-control" id="ts2" name="ts2" aria-describedby="emailHelp">
                                    </div>

                                  <div class="form-group">
                                      <label for="">TS 1</label>
                                      <input type="text" class="form-control" id="ts1" name="ts1" name="bidang_keahlian">
                                  </div>

                                  <div class="form-group">
                                      <label for="">TS</label>
                                      <input type="text" class="form-control" id="ts" name="ts" name="kesesuaian_inti_ps">
                                  </div>
                                    <div class="form-group">
                                      <label for="">Rata-rata</label>
                                      <input type="text" class="form-control" id="r1" name="r1" >
                                  </div>


                                    <div class="form-group">
                                    <label>pada PS Lain di PT</label>
                                    </div>

                                    <div class="form-group">
                                      <label for="">TS 2</label>
                                      <input type="text" class="form-control" id="ts_2" name="ts_2">
                                  </div>
                                     <div class="form-group">
                                      <label for="">TS 1</label>
                                      <input type="text" class="form-control" id="ts_1" name="ts_1">
                                  </div>
                                         <div class="form-group">
                                      <label for="">TS</label>
                                      <input type="text" class="form-control" id="ts_" name="ts_">
                                  </div>
                                           <div class="form-group">
                                      <label for="">Rata-rata</label>
                                      <input type="text" class="form-control" id="r2" name="r2">
                                  </div>
                                    <div class="form-group">
                                      <label for="">Rata-rata Jumlah Bimbingan di semua Program/ Semester</label>
                                      <input type="text" class="form-control" id="r3" name="r3">
                                  </div>
                          <button type="submit" class="btn btn-primary">Simpan Data</button>
                          </form>
                          
                        </div>
                      </div>
                    </div>
              </section>

@stop
