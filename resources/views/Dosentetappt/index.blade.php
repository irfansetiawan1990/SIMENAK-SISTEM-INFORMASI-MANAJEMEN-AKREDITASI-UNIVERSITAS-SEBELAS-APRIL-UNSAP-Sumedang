@extends('adminlte::page')

@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dosen Tetap PT</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Dosen Tetap PT</li>
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
          <h3 class="card-title">Dosen Tetap PT</h3>
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
                          <strong>Whoops!</strong> There were some problems with your input.<br><br>
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif

          <!-- Tombol untuk menampilkan modal-->
            @if (auth()->user()->level=="user")
        
             <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit">Tambah</button>
           
            <!-- Modal -->
            
            <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEdit" aria-hidden="true">
                 <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Tambah Dosen Tetap PT</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH PS-->
                          <form action="{{ route('Dosentetappt.store') }}" method="POST">
                            @csrf
                                  <div class="form-group">
                                    <label for="">Nama Dosen</label>
                                    <input type="text" class="form-control" id="lembaga_mitra" name="nama_dosen" aria-describedby="emailHelp">
                                    </div>

   
                                  <div class="form-group">
                                      <label for="">Pendidikan Pasca Sarjana</label>
                                      <select name="pendidikan_pasca_sarjana" id="pendidikan_pasca_sarjana" class="form-control">
                                      <option value="{Magister/ Magister Terapan/ Spesialis">Magister/ Magister Terapan/ Spesialis</option>
                                       <option value="{Doktor/ Doktor Terapan/ Spesialis">Doktor/ Doktor Terapan/ Spesialis</optio}n>
                                      </select>
                                  </div>
                             
                                    <div class="form-group">
                                      <label for="">NIDN</label>
                                      <input type="text" class="form-control" id="lembaga_mitra" name="nidn" aria-describedby="emailHelp">
                                    </div>

                                   <div class="form-group">
                                    <label for="">Bidang Keahlian </label>
                                    <input type="text" class="form-control" id="bidang_keahlian" name="bidang_keahlian" aria-describedby="emailHelp">
                                    </div>

                                  <div class="form-group">
                                    <label for="">Kesesuaian inti PS</label>
                                    <input type="text" class="form-control" id="kesesuaian_inti_ps" name="kesesuaian_inti_ps" aria-describedby="emailHelp">
                                    </div>

                                  <div class="form-group">
                                      <label for="">Jabatan Akademik</label>
                                      <select name="jabatan_akademik" id="jabatan_akademik" class="form-control">
                                      <option value="Asisten Ahli/Instruktur">Asisten Ahli/Instruktur</option>
                                      <option value="Lektor/Assistant Professor">Lektor/Assistant Professor</option>
                                      <option value="Lektor Kepala/Associate Professor">Lektor Kepala/Associate Professor</option>
                                      <option value="Guru Besar/Professor">Guru Besar/Professor</option>
                                      </select>
                                  </div>
                          



                                  <div class="form-group">
                                      <label for="">Sertifikat Pendidik Profesional</label>
                                      <input type="text" class="form-control" id="sertifikat_pendik_prof" name="sertifikat_pendik_prof">
                                  </div>
                                    <div class="form-group">
                                      <label for="">Sertifikat Kompetensi Profesional</label>
                                      <input type="text" class="form-control" id="matkul_ps_akre" name="matkul_ps_akre">
                                  </div>


                                   <div class="form-group">
                                      <label for="">Mata Kuliah yang Diampu pada PS yang Diakreditasi</label>
                                     <input type="text" class="form-control" id="sertifikat_kompetensi_prof" name="sertifikat_kompetensi_prof">
                            
                                  </div>
                                   <div class="form-group">
                                      <label for="">Kesesuaian Bidang Keahlian</label>
                                      <input type="text" class="form-control" id="kesesuaian_bid_keahlian" name="kesesuaian_bid_keahlian">
                                  </div>
                                   <div class="form-group">
                                      <label for="">Mata Kuliah yang Diampu pada PS Lain</label>
                                        <input type="text" class="form-control" id="matkul_diampu_pslain" name="matkul_diampu_pslain">
                                  </div>

                                  
                             
                                  <div class="form-group">
                                        <input type="hidden" class="form-control" id="prodi_id" name="prodi_id" value="{{$id}}">
                                    
                                  </div>

                              
                                  
                                  



                          <button type="submit" class="btn btn-primary">Simpan Data</button>
                          </form>
                    <!--END FORM TAMBAH BARANG-->
                    </div>
                    </div>
                  </div>
              
                </div> 
            
        </div>
        @endif
<div class="card-body">

  <div style="overflow-x:auto;">
    <table class="table table-bordered">
        <tr>
            <th width="400px"  class="text-center">Nama Dosen</th>
            <th width="280px" class="text-center">Pendidikan Pasca Sarjana</th>
            <th width="280px"  class="text-center">NIDN </th>
            <th width="280px"  class="text-center">Bidang Keahlian</th>
            <th width="280px"  class="text-center">Kesesuaian Inti PS</th>
            <th width="280px"  class="text-center">Jabatan Akademik</th>
            <th width="280px"  class="text-center">Sertifikat Pendidikan Profesional</th>
            <th width="280px"  class="text-center">Sertifikat Pendidikan Kompetensi</th>
            <th width="280px"  class="text-center">Mata kuliah PS Akreditasi</th>
            <th width="280px"  class="text-center">Kesesuaian bidang Keahlian</th>
            <th width="280px"  class="text-center">Mata Kuliah Yang Diampu Ps Lain</th>
         
            @if (auth()->user()->level=="user")
            <th width="200px" class="text-center">Action</th>
            @endif
        </tr>

        @foreach ($Dosentetappt as $item)
        <tr>
            <td width="280x">{{ $item->nama_dosen }}</td>
            <td width="280px">{{ $item->pendidikan_pasca_sarjana }}</td>
            <td width="280px">{{ $item->nidn }}</td>
            <td width="280px">{{ $item->bidang_keahlian }}</td>
            <td width="280px">{{ $item->kesesuaian_inti_ps }}</td>
            <td width="280px">{{ $item->jabatan_akademik }}</td>
            <td width="280px">{{ $item->sertifikat_pendik_prof }}</td>
            <td width="280px">{{ $item->sertifikat_kompetensi_prof }}</td>
            <td width="280px"></td>
            <td width="280px">{{ $item->kesesuaian_bid_keahlian }}</td>
                     
            <td width="280px"></td>
      
          @if (auth()->user()->level=="user")
            <td width="100px">

              <!--modal edit -->
              
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit{{ $item->id}}">Edit</button>
                <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-labelledby="modalEdit1" aria-hidden="true">
                           <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Edit Data Kerjasama </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH PS-->
            
                                <form action="{{ route('Dosentetappt.update',$item->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                                  <div class="form-group">
                                    <label for="">Nama Dosen</label>
                                    <input type="text" class="form-control" id="lembaga_mitra" name="nama_dosen" aria-describedby="emailHelp" value="{{$item->nama_dosen}}">
                                    </div>

   
                                  <div class="form-group">
                                      <label for="">Pendidikan Pasca Sarjana</label>
                                      <select name="pendidikan_pasca_sarjana" id="pendidikan_pasca_sarjana" class="form-control">
                                      <option value="Magister/ Magister Terapan/ Spesialis">Magister/ Magister Terapan/ Spesialis}</option>
                                       <option value="Doktor/ Doktor Terapan/ Spesialis">Doktor/ Doktor Terapan/ Spesialis</optio}n>
                                      </select>
                                  </div>
                             
                                    <div class="form-group">
                                      <label for="">NIDN</label>
                                      <input type="text" class="form-control" id="lembaga_mitra" name="nidn" aria-describedby="emailHelp" value="{{$item->nidn}}">
                                    </div>

                                   <div class="form-group">
                                    <label for="">Bidang Keahlian </label>
                                    <input type="text" class="form-control" id="bidang_keahlian" name="bidang_keahlian" aria-describedby="emailHelp" value="{{$item->bidang_keahlian}}">
                                    </div>

                                     <div class="form-group">
                                    <label for="">Kesesuaian inti PS</label>
                                    <input type="text" class="form-control" id="kesesuaian_inti_ps" name="kesesuaian_inti_ps" aria-describedby="emailHelp" value="{{$item->kesesuaian_inti_ps}}">
                                    </div>

                                  <div class="form-group">
                                      <label for="">Jabatan Akademik</label>
                                      <input type="text" class="form-control" id="jabatan_akademik" name="jabatan_akademik" value="{{$item->jabatan_akademik}}">
                                  </div>
                                  <div class="form-group">
                                      <label for="">Sertifikat Pendidik Profesional</label>
                                      <input type="text" class="form-control" id="sertifikat_pendik_prof" name="sertifikat_pendik_prof" value="{{$item->sertifikat_pendik_prof}}">
                                  </div>
                                    <div class="form-group">
                                      <label for="">Sertifikat Kompetensi Profesional</label>
                                      <input type="text" class="form-control" id="sertifikat_kompetensi_prof" name="sertifikat_kompetensi_prof" value="{{$item->sertifikat_kompetensi_prof}}">
                                  </div>
                                   <div class="form-group">
                                      <label for="">Mata Kuliah yang Diampu pada PS yang Diakreditasi</label>
                                        <input type="text" class="form-control" id="matkul_ps_akre" name="matkul_ps_akre" value="{{$item->matkul_ps_akre}}">
                                  </div>
                                   <div class="form-group">
                                      <label for="">Kesesuaian Bidang Keahlian</label>
                                      <input type="text" class="form-control" id="kesesuaian_bid_keahlian" name="kesesuaian_bid_keahlian" value="{{$item->kesesuaian_bid_keahlian}}">
                                  </div>
                                   <div class="form-group">
                                      <label for="">Mata Kuliah yang Diampu pada PS Lain</label>
                                      <input type="text" class="form-control" id="matkul_diampu_pslain" name="matkul_diampu_pslain" value="{{$item->matkul_diampu_pslain}}">
                                  </div>
                          <button type="submit" class="btn btn-primary">Simpan Data</button>
                          </form>
                    <!--END FORM TAMBAH BARANG-->
                    </div>

                    </div>
                  </div>
                </div>

                    

                    <form action="{{ route('Dosentetappt.destroy',$item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>

            @endif
            </td>
       
        </tr>
        @endforeach
    </table>
</div>

   
     </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
</div>
    </section>
   @stop


