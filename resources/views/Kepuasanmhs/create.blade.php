@extends('adminlte::page')
@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Integrasi Kegiatan Penelitian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Pkm Pembelajaran</li>
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
          <h3 class="card-title">Pkm Pembelajaran</h3>
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
         
          <p>Tuliskan hasil pengukuran kepuasan mahasiswa terhadap proses pendidikan, Data diambil dari hasil studi penelusuran yang 
          dilakukan pada saat TS.</p>
       
            
         <form action="{{ route('Kepuasanmhs.store') }}" method="POST">
          @csrf
          <div class="form-row">
              <div class="form-group col-md-6">
                <label>Aspek yang diukur</label>
                <textarea class="form-control" name="aspek_yg_diukur"></textarea> 
              </div>
          </div>

            <label>Tingkat Kepuasan Mahasiswa</label>
            <div class="form-row">
              <div class="form-group col-md-2">
                  <label>Sangat Baik</label>
                  <input type="number" name="sangat_baik" class="form-control">            
              </div>  
              <div class="form-group col-md-2">
                  <label>Baik</label>
                  <input type="number" name="baik" class="form-control">            
              </div>
              <div class="form-group col-md-2">
                  <label>Cukup</label>
                  <input type="number" name="cukup" class="form-control">            
              </div>
              <div class="form-group col-md-2">
                  <label>Kurang</label>
                  <input type="number" name="kurang" class="form-control">            
              </div>
            </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Rencana Tindak Lanjut oleh UPPS/PS</label>
                      <textarea class="form-control" name="rencana_tindak_lanjut"></textarea>
                      <input type="hidden"  name="prodi_id" value="{{$id}}">
                   </div>
              </div>
           

          <button type="submit" class="btn btn-primary" onclick="return confirm('apakah data yang dimasukan sudah valid')">Simpan</button>
          <button type="reset" class="btn btn-primary">Reset Data</button>
        </form>

    
   @stop


