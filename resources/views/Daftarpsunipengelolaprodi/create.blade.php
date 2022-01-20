@extends('adminlte::page')
@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Program Studi di UPPS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Daftar Program Studi di UPPS</li>
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
          <h3 class="card-title">Daftar Program Studi di UPPS</h3>
          <div class="card-tools">

            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>                                                
        <div class="card-body">

          @if ($errors->any())
                      <div class="alert alert-danger">
                          <strong>Ups</strong> Ada masalah di inputan anda<br><br>
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
         
         <form action="{{ route('Daftarpsunipengelolaprodi.store') }}" method="POST">
          @csrf
            <div class="form-row">
                  <div class="form-group col-md-3">
                      <label>Jenis Program</label>
                      <input type="text" name="jenis_program" class="form-control">
                      <input type="hidden" name="prodi_id" class="form-control" value="{{$id}}">         
                  </div>
                   <div class="form-group col-md-7">
                      <label>Nama Program Studi</label>
                      <select name="prodi_id" class="form-control">
                        @foreach ($prodi as $data)
                        <option value="{{$data->id}}">{{$data->nama_prodi}}</option>
                        @endforeach
                      </select>
                  </div>
            </div>
            <!--row 1-->

              <br>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <h5>Akreditasi Program Studi</h5>
                </div>
              </div>
 
              <div class="form-row">
                  <div class="form-group col-md-2">
                      <label>Status dan Peringkat</label>
                      <input type="text" name="status" class="form-control">          
                  </div>
                   <div class="form-group col-md-4">
                      <label>No.Dan tanggal SK</label>
                      <input type="text" name="no_tgl_sk" class="form-control">
                  </div>
                  <div class="form-group col-md-4">
                      <label>Tanggal Kadaluarsa</label>
                      <input type="date" name="tgl_kadaluarsa" class="form-control">
                  </div>
                  

                   <div class="form-group col-md-4">
                      <label>Jumlah Mahasiswa Saat TS</label>
                      <input type="text" name="jml_mhs_saat_ts" class="form-control">      
                  </div>
              </div>        
          <button type="submit" class="btn btn-primary" onclick="return confirm('apakah data yang dimasukan sudah valid')">Simpan</button>
          <button type="reset" class="btn btn-primary">Reset Data</button>
        </form>
        <br>
        <p>Keterangan:<br>
        1) Lampirkan salinan Surat Keputusan Pendirian Perguruan Tinggi.<br>
        2) Lampirkan salinan Surat Keputusan Pembukaan Program Studi.<br>
        3) Lampirkan salinan Surat Keputusan Akreditasi Program Studi terbaru.<br>
        4) Diisi dengan jumlah mahasiswa aktif di masing-masing PS saat TS.<br>
        </p> 
   @stop


