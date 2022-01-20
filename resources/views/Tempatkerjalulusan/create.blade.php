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
              <li class="breadcrumb-item active">Kinerja Lulusan</li>
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
          <h3 class="card-title">Tempat Kerja lulusan</h3>
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
            Tuliskan tingkat/ukuran tempat kerja/berwirausaha lulusan dalam 3 tahun, mulai TS-4
            sampai dengan TS-2, dengan mengikuti format Tabel 8.e.1) berikut ini. Data diambil 
            dari hasil studi penelusuran lulusan.</p>
                     
         <form action="{{ route('Tempatkerjalulusan.store') }}" method="POST">
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
            <label>Jumlah Lulusan Terlacak yang Bekerja berdasarkan Tingkat/Ukuran Tempat Kerja/Berwirausaha</label>
             <div class="form-row">
                  <div class="form-group col-md-4">
                      <label>Lokal/Wilayah/Berwirausaha tidak Berizin</label>
                      <input type="number" name="lokal" class="form-control">      
                  </div>
                   <div class="form-group col-md-4">
                      <label>Nasional/Berwirausaha Berizin</label>
                      <input type="number" name="nasional" class="form-control">       
                  </div>
                  <div class="form-group col-md-4">
                      <label>Multinasiona/Internasional</label>
                      <input type="number" name="internasional" class="form-control">       
                  </div>
            </div>
 
          <button type="submit" class="btn btn-primary" onclick="return confirm('apakah data yang dimasukan sudah valid')">Simpan</button>
          <button type="reset" class="btn btn-primary">Reset Data</button>
        </form>
    
   @stop


