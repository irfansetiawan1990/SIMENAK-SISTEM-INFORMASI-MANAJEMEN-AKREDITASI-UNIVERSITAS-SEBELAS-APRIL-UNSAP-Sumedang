@extends('adminlte::page')
@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kurikulum</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Kurikulum</li>
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
          <h3 class="card-title">Data Kurikulum</h3>
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
         
          <p>Tuliskan struktur program dan kelengkapan data mata kuliah sesuai dengan dokumen kurikulum program studi yang berlaku pada saat TS</p>
       
            
         <form action="{{ route('Kurikulumcapaianrpp.store') }}" method="POST">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="matakuliah">Mata Kuliah</label>
                <select name="matkul_id"  class="form-control">
                  @foreach ($Matkul as $data)
                  <option value="{{$data->id}}">{{$data->nama_matkul}}</option>
                    @endforeach
                 </select>
            </div>
            <div class="form-group col-md-6">
              <label for="Matkuul komp">Mata Kuliah Kompetensi (1)</label>
                <select name="matkul_komp" id="inputState" class="form-control">
                <option selected>--</option>
                <option value="V">Ya, termasuk dalam mata kuliah kompetensi program studi.</option>
                <option value="">Tidak termasuk dalam mata kuliah kompetensi program studi.</option>
              </select>
            </div>
          </div>

          <br>
          <label>Bobot Kredit (SKS)</label>
          <div class="form-row">
              <div class="form-group col-md-4">
                <label>Kuliah/Responsi/Tutor</label>
                <input type="number" class="form-control" name="kuliah_responsi_tutor">
              </div>
              <div class="form-group col-md-4">
                <label>Seminar</label>
                <input type="number" class="form-control" name="seminar">
              </div>
              <div class="form-group col-md-4">
                <label>Praktikum/Praktik/Praktik Lapangan</label>
                <input type="number" class="form-control" name="praktik">
              </div>
               <div class="form-group col-md-4">
                <label>Konversi Kredit ke Jam (2)</label>
                <input type="number" class="form-control" name="konversi">
              </div>
          </div>

          <br>
          <label>Capaian Pembelajaran (3)</label>
           <div class="form-row">
              <div class="form-group col-md-2">
                <label>Sikap</label>
                <input type="checkbox" class="checkbox col-md-2" name="cpl_sikap" value="V">
              </div>
              <div class="form-group col-md-2">
                <label>Pengetahuan</label>
                <input type="checkbox" class="checkbox col-md-2" name="cpl_pengetahuan" value="V">
              </div>
              <div class="form-group col-md-3">
                <label>Keterampilan Umum</label>
                <input type="checkbox" class="checkbox col-md-2" name="cpl_keterampilan_umum" value="V">
              </div><div class="form-group col-md-3">
                <label>Keterampilan Khusus</label>
                <input type="checkbox" class="checkbox col-md-2" name="cpl_keterampilan_khusus" value="V">
              </div>             
          </div>
          <br>

          <div class="form-row">
              <div class="form-group col-md-6">
                <label>Dokumen Rencana Pembelajaran (4)</label>
                <input type="text" class="form-control" name="dokumen_rencana_pembelajaran">
              </div>
              <div class="form-group col-md-6">
                <label>Unit Penyelenggara</label>
                <input type="text" class="form-control" name="unit_penyelenggara">
                <input type="hidden"  name="prodi_id" value="{{$id}}">
              </div>
          </div>




          <button type="submit" class="btn btn-primary" onclick="return confirm('apakah data yang dimasukan sudah valid')">Simpan</button>
          <button type="reset" class="btn btn-primary">Reset Data</button>
        </form>
        <br>


           <p>Keterangan:<br>
            1) Diisi dengan Ya jika mata kuliah termasuk dalam mata kuliah kompetensi program studi.<br>
            2) Diisi dengan konversi bobot kredit ke jam pelaksanaan pembelajaran. Data ini diisi oleh pengusul dari program studi pada program Diploma Tiga/Sarjana/Sarjana Terapan.<br>
            3) Beri tanda V pada kolom unsur pembentuk Capaian Pembelajaran Lulusan (CPL) sesuai dengan rencana pembelajaran.<br>
            4) Diisi dengan nama dokumen rencana pembelajaran yang digunakan</p>

    
   @stop


