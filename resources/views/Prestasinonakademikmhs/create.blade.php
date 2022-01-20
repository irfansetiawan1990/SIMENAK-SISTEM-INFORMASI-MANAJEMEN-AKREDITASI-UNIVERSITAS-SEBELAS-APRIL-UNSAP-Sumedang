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
              <li class="breadcrumb-item active">Prestasi Mahasiswa</li>
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
          <h3 class="card-title">Prestasi Non Akademik</h3>
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
         
          <p>Tuliskan prestasi akademik yang dicapai mahasiswa Program Studi dalam 5 tahun 
          terakhir dengan mengikuti format Tabel 8.b.1) berikut ini. Data dilengkapi dengan 
          keterangan kegiatan yang diikuti (nama kegiatan, tahun, tingkat, dan prestasi yang 
          dicapai)..</p>
       
            
         <form action="{{ route('Prestasinonakademikmhs.store') }}" method="POST">
          @csrf
            <div class="form-row">
                  <div class="form-group col-md-6">
                      <label>Nama Kegiatan</label>
                      <input type="text" name="nama_kegiatan" class="form-control">
                      <input type="hidden" name="prodi_id" class="form-control" value="{{$id}}">         
                  </div>
                   <div class="form-group col-md-2">
                      <label>Tahun</label>
                      <input type="number" name="tahun_perolehan" class="form-control">        
                  </div>
            </div>

              <br>
              <label>Tingkat (1)</label>
              <div class="form-row">
                  <div class="form-group col-md-2">
                      <label>Lokal/ Wilayah</label>
                      <input type="checkbox" name="lokal" class="checkbox col-md-1" value="V">        
                  </div>
                   <div class="form-group col-md-2">
                      <label>Nasional</label>
                      <input type="checkbox" name="nasional" class="checkbox col-md-1" value="V">        
                  </div>
                   <div class="form-group col-md-2">
                      <label>Internasional</label>
                      <input type="checkbox" name="internasional" class="checkbox col-md-1" value="V">        
                  </div>
              </div> 
              <div class="form-row">
                  <div class="form-group col-md-8">
                      <label>Prestasi yang dicapai</label>
                      <textarea class="form-control" name="prestasi_yg_dicapai"></textarea>       
                  </div>
              </div>          
 
          <button type="submit" class="btn btn-primary" onclick="return confirm('apakah data yang dimasukan sudah valid')">Simpan</button>
          <button type="reset" class="btn btn-primary">Reset Data</button>
        </form>
        <br>
        <p>Keterangan:<br>
        1) Beri tanda centang V pada kolom yang sesuai.
        </p>

    
   @stop


