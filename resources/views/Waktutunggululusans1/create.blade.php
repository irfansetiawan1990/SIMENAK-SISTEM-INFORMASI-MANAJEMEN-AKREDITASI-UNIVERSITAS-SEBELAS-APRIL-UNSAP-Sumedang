@extends('adminlte::page')
@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Standar 9</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Daya Saing Lulusan</li>
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
          <h3 class="card-title">Waktu Tunggu Lulusan</h3>
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
         
           <p>
            Tuliskan data masa tunggu lulusan untuk mendapatkan pekerjaan pertama dalam 3 
            tahun, mulai TS-4 sampai dengan TS-2, dengan mengikuti format Tabel 8.d.1) berikut 
            ini. Data diambil dari hasil studi penelusuran lulusan.
            </p>
                     
         <form action="{{ route('Waktutunggululusans1.store') }}" method="POST">
          @csrf
            <div class="form-row">
                  <div class="form-group col-md-4">
                      <label>Tahun Lulus</label>
                      <input type="text" name="tahun_lulus" class="form-control">
                      <input type="hidden" name="prodi_id" class="form-control" value="{{$id}}">         
                  </div>
                   <div class="form-group col-md-4">
                      <label>Jumlah Lulusan</label>
                      <input type="number" name="jml_lulusan" class="form-control">       
                  </div>
                  <div class="form-group col-md-4">
                      <label>Jumlah Lulusan terlacak</label>
                      <input type="number" name="jml_terlacak" class="form-control">       
                  </div>
            </div>
            <br>
            <label>Jumlah Lulusan Terlacak dengan Waktu Tunggu Mendapatkan Pekerjaan </label>
             <div class="form-row">
                  <div class="form-group col-md-4">
                      <label>WT < 6bulan</label>
                      <input type="number" name="wt1" class="form-control">      
                  </div>
                   <div class="form-group col-md-4">
                      <label>6 ≤ WT ≤ 18 bulan</label>
                      <input type="number" name="wt2" class="form-control">       
                  </div>
                  <div class="form-group col-md-4">
                      <label>WT > 18 bulan</label>
                      <input type="number" name="wt3" class="form-control">       
                  </div>
            </div>
 
          <button type="submit" class="btn btn-primary" onclick="return confirm('apakah data yang dimasukan sudah valid')">Simpan</button>
          <button type="reset" class="btn btn-primary">Reset Data</button>
        </form>
        <br>
    
   @stop


