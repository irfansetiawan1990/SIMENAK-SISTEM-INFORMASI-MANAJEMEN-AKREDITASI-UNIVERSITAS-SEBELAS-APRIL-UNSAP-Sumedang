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
              <li class="breadcrumb-item active">Luaran dan Capaian Tridharma</li>
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
          <h3 class="card-title">Capaian Pembelajaran</h3>
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
    
                <p>Tuliskan data Indeks Prestasi Kumulatif (IPK) lulusan dalam 3 tahun terakhir dengan 
          mengikuti format Tabel 8.a berikut ini. Data dilengkapi dengan jumlah lulusan pada 
          setiap tahun kelulusan.</p>
           
         <form action="{{ route('Ipklulusan.store') }}" method="POST">
          @csrf
              <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Tahun Lulusan</label>
                    <input type="year" name="tahun_lulus" class="form-control">         
                </div>
               <div class="form-group col-md-3">
                      <label>Jumlah Lulusan</label>
                      <input type="number" name="jml_lulusan" class="form-control">      
                </div>
            </div>

            <br>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>INDEKS PRESTASI KOMULATIF (IPK)</label>
              </div>
            </div>

             <div class="form-row">
                  <div class="form-group col-md-2">
                      <label>Min</label>
                      <input type="double" lang="en-150" name="minimal" class="form-control">                          
                  </div>
                  <div class="form-group col-md-2">
                      <label>Rata-Rata</label>
                      <input type="double" lang="en-150" name="rata_rata" class="form-control">                          
                  </div>
                  <div class="form-group col-md-2">
                      <label>Max</label>
                      <input type="double" lang="en-150" name="maks" class="form-control">
                      <input type="hidden" name="prodi_id" value="{{$id}}">                              
                  </div>
            </div>
               
 
          <button type="submit" class="btn btn-primary" onclick="return confirm('apakah data yang dimasukan sudah valid')">Simpan</button>
          <button type="reset" class="btn btn-primary">Reset Data</button>
        </form>
        <br>

      </div>
         
          

    
   @stop


