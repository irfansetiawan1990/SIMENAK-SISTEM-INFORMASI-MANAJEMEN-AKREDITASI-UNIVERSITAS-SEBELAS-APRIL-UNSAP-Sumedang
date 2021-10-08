@extends('adminlte::page')

@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dosen Tetap Perguruan Tinggi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Dosen Tetap Perguruan Tinggi</li>
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
          <h3 class="card-title"> Edit Data Dosen Tetap Perguruan Tinggi</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>                                                

                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <strong>Whoops!</strong> There were some problems with your input.<br><br>
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif

                    <div class="row">
                      <div class="container-fluid">
                        <div class="col-lg-12">
                             <form action="{{ route('Dosentetappt.update') }}" method="POST">
                            @csrf
                            method('put')
                                  <div class="form-group">
                                    <label for="">Nama Dosen</label>
                                    <input type="text" class="form-control" id="nama-dosen" name="nama_dosen" aria-describedby="emailHelp" value="{{Dosentetappt->$nama_dosen }}">
                                    </div> 
                             
                                   <div class="form-group">
                                    <label for="">NIDN </label>
                                    <input type="text" class="form-control" id="nidn" name="nidn" aria-describedby="emailHelp" value="{{Dosentetappt->nidn}}">
                                    </div>

                                  <div class="form-group">
                                       <p>Pendidikan Pasca Sarjana</p>
                                          <input type="radio" id="Magister
                                          " name="magister_terapan_spesialis" value="magister">
                                          <label for="age1">Magister Terapan Spesialis</label><br>
                                          <input type="radio" id="Magisterterapan
                                          " name="magister_terapan_spesialis" value="magister terapan">
                                          <label for="age1">Magister Terapan</label><br>
                                          <input type="radio" id="Spesialis
                                          " name="magister_terapan_spesialis" value="Spesialis">
                                          <label for="age1">Spesialis</label><br>
                                          <input type="radio" id="Magister
                                          " name="magister_terapan_spesialis" value="magister">
                                          <label for="age1">Doktor Terapan Spesialis</label><br>
                                          <input type="radio" id="Dokterterapan
                                          " name="doktor_terapan_spesialis" value="magister terapan">
                                          <label for="age1">Doktor Terapan</label><br>
                                          <input type="radio" id="Spesialis
                                          " name="doktor_terapan_spesialis" value="Spesialis">
                                          <label for="age1">Spesialis</label><br>
                                    </div>
                                  <div class="form-group">
                                      <label for="">Bidang Keahlian</label>
                                      <input type="text" class="form-control" id="bidang_keahlian" name="bidang_keahlian" value="{{Dosentetappt->bidang_keahlian}}" >
                                  </div>

                                  <div class="form-group">
                                      <label for="">Kesesuaian dengan Kompetensi inti PS</label>
                                      <input type="text" class="form-control" id="kesesuaian_inti_ps" name="kesesuaian_inti_ps" value="{{Dosentetappt->bidang_keahlian}}">
                                  </div>
                                    <div class="form-group">
                                      <label for="">Jabatan Akademik</label>
                                      <input type="text" class="form-control" id="jabatan_akademik" name="jabatan_akademik" value="{{Dosentetappt->jabatan_akademik}}">
                                  </div>

                                    <div class="form-group">
                                      <label for="">Sertifikat Pendidikan Profesional</label>
                                      <input type="text" class="form-control" id="sertifikat_pendik_prof" name="sertifikat_pendik_prof" value="{{Dosentetappt->sertifikat_pendik_prof}}">
                                  </div>
                                     <div class="form-group">
                                      <label for="">Sertifikat Kompetensi/profesi industri</label>
                                      <input type="text" class="form-control" id="sertifikat_kompetensi_prof" name="sertifikat_kompetensi_prof"  value="{{Dosentetappt->sertifikat_kompetensi_prof}}">
                                  </div>
                                      <div class="form-group">
                                      <label for="">Mata Kuliah yang Diampu pada PS yang Diakreditasi</label>
                                      <input type="text" class="form-control" id="matkul_ps_akre" name="matkul_ps_akre"  value="{{Dosentetappt->matkul_ps_akre}}">
                                  </div>
                                  <div class="form-group">
                                      <label for="">Kesesuaian Bidang Keahlian dengan Mata Kuliah yang Diampu</label>
                                      <input type="text" class="form-control" id="kesesuaian_bid_keahlian" name="kesesuaian_bid_keahlian" value=" {{Dosentetappt->kesesuaian_bid_keahlian}}">
                                  </div>
                                    <div class="form-group">
                                      <label for="">Mata Kuliah yang Diampu pada PS Lain</label>
                                      <input type="text" class="form-control" id="matkul_diampu_pslain" name="matkul_diampu_pslain"  value="{{Dosentetappt->matkul_diampu_pslain}}">
                                  </div>
                          <button type="submit" class="btn btn-primary">Simpan Data</button>
                          </form>
                          
                        </div>
                      </div>
                    </div>
              </section>

@stop
