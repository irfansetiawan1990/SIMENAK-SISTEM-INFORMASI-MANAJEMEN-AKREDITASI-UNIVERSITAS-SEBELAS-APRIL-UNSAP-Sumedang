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
         
          <p>Tuliskan judul penelitian/PkM DTPS yang terintegrasi ke dalam pembelajaran/
            pengembangan matakuliah dalam 3 tahun terakhir</p>
       
            
         <form action="{{ route('Pkmpembelajaran.store') }}" method="POST">
          @csrf
          <div class="form-row">
              <div class="form-group col-md-6">
                <label>Judul Penelitian/ PKM (1)</label>
                <textarea class="form-control" name="judul_pkm"></textarea> 
              </div>
          </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="nama_dosen">Nama Dosen</label>
                 <select name="nama_dosen_id" class="form-control">
                  @foreach ($dosen as $dosen)
                  <option value="{{$dosen->id}}">{{$dosen->nama_dosen}}</option>
                   @endforeach
                 </select>
              </div>       
            <div class="form-group col-md-6">
                <label for="mata_kuliah">Mata Kuliah</label>
                <select name="mata_kuliah_id" class="form-control" id="mata_kuliah"> 
                  @foreach ($matkul as $mk)
                  <option value="{{$mk->id}}" id="mata_kuliah">{{$mk->nama_matkul}}</option>
                  @endforeach
                </select>
            </div>
          </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Bentuk Integrasi (2)</label>
                      <textarea class="form-control" name="bentuk_integrasi"></textarea>
                      <input type="hidden"  name="prodi_id" value="{{$id}}">
                   </div>
              </div>
           

          <button type="submit" class="btn btn-primary" onclick="return confirm('apakah data yang dimasukan sudah valid')">Simpan</button>
          <button type="reset" class="btn btn-primary">Reset Data</button>
        </form>


        <br>
           <p>Keterangan:<br>
            1) Judul penelitian dan PkM tercatat di unit/lembaga yang mengelola kegiatan 
            penelitian/PkM di tingkat Perguruan Tinggi/UPPS.<br>
            2) Bentuk integrasi dapat berupa tambahan materi perkuliahan, studi kasus, Bab/
            Subbab dalam buku ajar, atau bentuk lain yang relevan.<br>

    
   @stop


