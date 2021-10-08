@extends('adminlte::page')

@section('content')
 <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Data PS</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Test data mahasiswa </li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">


@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Wadooo</strong> Ada masalah dalam inputan.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data ps </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             <form action="{{ route('Daftarpsunipengelolaps.store') }}" method="POST">
                            @csrf
                                  <div class="form-group">
                                    <label for="">Jenis Program</label>
                                    <input type="text" class="form-control" id="jenis_program" name="jenis_program" aria-describedby="emailHelp">
                                    </div>
                                  <div class="form-group">
                                      <label for="">Nama Program Studi</label>
                                      <input type="text" class="form-control" id="nama_ps" name="nama_ps">
                                  </div>
                                  <div class="form-group">
                                      <label for="">Status</label>
                                      <input type="text" class="form-control" id="status" name="status">
                                  </div>
                                     <div class="form-group">
                                      <label for="">No. Tanggal SK</label>
                                      <input type="text" class="form-control" id="no_tgl_sk" name="no_tgl_sk">
                                  </div>
                                     <div class="form-group">
                                      <label for="">Tanggal Kadaluarsa</label>
                                      <input type="text" class="form-control" id="tgl_kadaluarsa" name="tgl_kadaluarsa">
                                  </div>   
                                  <div class="form-group">
                                      <label for="">Jumlah Mahasiswa Saat TS</label>
                                      <input type="text" class="form-control" id="jml_mhs_saat_ts" name="jml_mhs_saat_ts">
                                  </div>
                                  
                          <button type="submit" class="btn btn-primary">Simpan Data</button>
                          </form>
            </div>
              
      
@endsection
