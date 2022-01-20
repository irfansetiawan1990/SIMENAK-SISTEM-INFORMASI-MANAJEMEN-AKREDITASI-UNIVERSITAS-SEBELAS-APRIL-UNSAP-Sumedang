@extends('adminlte::page')
@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Penelitian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Penelitian DTPS yang Melibatkan Mahasiswa</li>
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
          <h3 class="card-title">Penelitian DTPS yang Melibatkan Mahasiswa</h3>
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
         
          <p>Tuliskan data penelitian DTPS yang dalam pelaksanaannya melibatkan mahasiswa 
          Program Studi pada TS-2 sampai dengan TS.</p>
       
            
         <form action="{{ route('Pkmdtpsmhs.store') }}" method="POST">
          @csrf
            <div class="form-row">
              <div class="form-group col-md-8">
                  <label>Nama Dosen</label>
                  <select name="nama_dosen_id" class="form-control">
                    @foreach ($dosen as $dosen)
                    <option value="{{$dosen->id}}">{{$dosen->nama_dosen}}</option>
                    @endforeach
                  </select>          
              </div>
          </div> 

          <div class="form-row">
             <div class="form-group col-md-8">
                    <label>Tema Penelitian Sesuai Roadmap</label>
                    <textarea name="tema_roadmap" class="form-control"></textarea>        
              </div>
          </div>

             <div class="form-row">
                  <div class="form-group col-md-8">
                      <label>Nama Mahasiswa</label>
                      <select name="mhs_id" class="form-control">
                        @foreach ($mahasiswa as $mahasiswa)
                        <option value="{{$mahasiswa->id_mhs}}">{{$mahasiswa->nama_mhs}}</option>
                        @endforeach
                      </select>          
                  </div>
            </div>
            <div class="form-row">
                  <div class="form-group col-md-5">
                      <label>Judul Kegiatan</label>
                      <input type="text" name="judul_kegiatan" class="form-control">            
                  </div>
                  <div class="form-group col-md-3">
                      <label>Tahun</label>
                      <input type="year" name="tahun" class="form-control">
                      <input type="hidden" name="prodi_id" class="form-control" value="{{$id}}">              
                  </div>
            </div>          
 
          <button type="submit" class="btn btn-primary" onclick="return confirm('apakah data yang dimasukan sudah valid')">Simpan</button>
          <button type="reset" class="btn btn-primary">Reset Data</button>
        </form>
        <br>
        <p>Keterangan:<br>
        1) Judul kegiatan yang melibatkan mahasiswa dalam penelitian dosen dapat berupa
        Tugas Akhir, Perancangan, Pengembangan Produk/Jasa, atau kegiatan lain yang 
        relevan.
        </p>

    
   @stop


