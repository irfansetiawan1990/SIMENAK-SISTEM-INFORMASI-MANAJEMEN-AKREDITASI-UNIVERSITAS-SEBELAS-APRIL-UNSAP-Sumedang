@extends('adminlte::page')

@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dosen Tidak Tetap</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Dosen Tidak Tetap</li>
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
          <h3 class="card-title">Dosen Tidak Tetap</h3>
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
                          <strong>Periksa Kembali Inputan Anda</strong>
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif

          @if (auth()->user()->level=="user")
          <!-- Tombol untuk menampilkan modal-->
            <button type="button" class="btn btn-primary btn" data-toggle="modal" data-target="#modalEdit">Tambah</button>
           
            <!-- Modal -->

            <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEdit" aria-hidden="true">
                 <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Tambah Dosen Tidak Tetap</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH PS-->
                          <form action="{{ route('Dosentdktetap.store') }}" method="POST">
                            @csrf
                                  <div class="form-group">
                                    <label for="">NAMA DOSEN</label>
                                    <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" aria-describedby="emailHelp" value="">
                                  </div>
                                  <div class="form-group">
                                    <label for="">NIDN/NIDK</label>
                                    <input type="number" class="form-control" id="nidnk" name="nidnk" aria-describedby="emailHelp">
                                  </div>                             
                                 <div class="form-group">
                                    <label for="">Pendidikan Pasca Sarjana</label>
                                    <input type="text" class="form-control" id="pen_pas_sarjana" name="pen_pas_sarjana" aria-describedby="emailHelp">
                                  </div>
                                 
                                 <div class="form-group">
                                    <label for="">Bidang Keahlian</label>
                                    <input type="text" class="form-control" id="bid_keahlian" name="bid_keahlian" aria-describedby="emailHelp">
                                  </div>
                                 <div class="form-group">
                                    <label for="">Jabatan Akademik</label>
                                    <input type="text" class="form-control" id="jabatan_akademik" name="jabatan_akademik" aria-describedby="emailHelp">
                                  </div>
                                 <div class="form-group">
                                    <label for="">Sertifikat Pendidik Profesional</label>
                                    <input type="text" class="form-control" id="serdikprof" name="serdikprof" aria-describedby="emailHelp">
                                  </div>
                                 <div class="form-group">
                                    <label for="">Sertifikat  Kompetensi/ Profesi/  Industri</label>
                                    <input type="text" class="form-control" id="serkomprof" name="serkomprof" aria-describedby="emailHelp">
                                  </div>
                                 <div class="form-group">
                                    <label for="">Mata Kuliah yang Diampu pada PS yang Diakreditasi</label>
                                    <input type="text" class="form-control" id="matkul_ps_akre" name="matkul_ps_akre" aria-describedby="emailHelp">
                                  </div>
                                 <div class="form-group">
                                    <label for="">Kesesuaian Bidang Keahlian dengan Mata Kuliah yang Diampu</label>
                                    <input type="text" class="form-control" id="kesbid_matkul" name="kesbid_matkul" aria-describedby="emailHelp">
                                  </div>
                                     <div class="form-group">
                                    <input type="hidden" class="form-control" id="prodi_id" name="prodi_id" aria-describedby="emailHelp" value=" {{$id}}">
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

            <th width="20px" class="text-center">No</th>
            <th width="280px" class="text-center">NAMA DOSEN</th>
            <th width="280px" class="text-center">NIDN/NIDK</th>
            <th width="100px" class="text-center">Pendidikan Pasca Sarjana</th>
            <th width="280px" class="text-center">Bidang Keahlian</th>
            <th width="280px" class="text-center">Jabatan Akademik</th>
            <th width="280px" class="text-center">Sertifikat Pendidik Profesional</th>
             <th width="280px" class="text-center">Sertifikat  Kompetensi/ Profesi/  Industri</th>
            <th width="280px" class="text-center">Mata Kuliah yang Diampu pada PS yang Diakreditasi</th>
            <th width="280px" class="text-center">Kesesuaian Bidang Keahlian dengan Mata Kuliah yang Diampu</th>
            @if (auth()->user()->level=="user")
            <th width="200px"class="text-center">Action</th>
            @endif
        </tr>
        @foreach ($Dosentdktetap as $item)
        <tr>
 
            <td width="20px">{{ ++$i }}</div></td>
            <td width="280x">{{ $item->nama_dosen }}</div></td>
            <td width="280px">{{ $item->nidnk }}</div></td>
            <td width="100px">{{ $item->pen_pas_sarjana }}</div></td>
            <td width="280px">{{ $item->bid_keahlian }}</div></td>
            <td width="280px">{{ $item->jabatan_akademik }}</div></td>
            <td width="280px">{{ $item->serdikprof }}</div></td>
            <td width="280px">{{ $item->serkomprof }}</div></td>
            <td width="280px">{{ $item->matkul_ps_akre }}</div></td>
            <td width="280px">{{ $item->kesbid_matkul }}</div></td>

            @if (auth()->user()->level=="user")
            <td width="100px">

              <!--modal edit -->
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit{{ $item->id_dosen_tdk_tetap }}">Edit</button>
                <div class="modal fade" id="modalEdit{{ $item->id_dosen_tdk_tetap }}" tabindex="-1" aria-labelledby="modalEdit1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Edit Data Dosen tidak tetap </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH PS-->
            
                                <form action="{{ route('Dosentdktetap.update', $item->id_dosen_tdk_tetap) }}" method="POST">
            
                                @csrf
                                @method('PUT')

                                 @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                                @endif

                                    <div class="form-group">
                                    <label for="">NAMA DOSEN</label>
                                    <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" aria-describedby="emailHelp" value="{{$item->nama_dosen}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="">NIDN/NIDK</label>
                                    <input type="number" class="form-control" id="nidnk" name="nidnk" aria-describedby="emailHelp" value="{{$item->nidnk}}">
                                  </div>                             
                                 <div class="form-group">
                                    <label for="">Pendidikan Pasca Sarjana</label>
                                    <input type="text" class="form-control" id="pen_pas_sarjana" name="pen_pas_sarjana" aria-describedby="emailHelp" value="{{$item->pen_pas_sarjana}}">
                                  </div>
                                 
                                 <div class="form-group">
                                    <label for="">Bidang Keahlian</label>
                                    <input type="text" class="form-control" id="bid_keahlian" name="bid_keahlian" aria-describedby="emailHelp" value="{{$item->bid_keahlian}}">
                                  </div>
                                 <div class="form-group">
                                    <label for="">Jabatan Akademik</label>
                                    <input type="text" class="form-control" id="jabatan_akademik" name="jabatan_akademik" aria-describedby="emailHelp" value="{{$item->jabatan_akademik}}">
                                  </div>
                                 <div class="form-group">
                                    <label for="">Sertifikat Pendidik Profesional</label>
                                    <input type="text" class="form-control" id="serdikprof" name="serdikprof" aria-describedby="emailHelp" value="{{$item->serdikprof}}">
                                  </div>
                                 <div class="form-group">
                                    <label for="">Sertifikat  Kompetensi/ Profesi/  Industri</label>
                                    <input type="text" class="form-control" id="serkomprof" name="serkomprof" aria-describedby="emailHelp" value="{{$item->serkomprof}}">
                                  </div>
                                 <div class="form-group">
                                    <label for="">Mata Kuliah yang Diampu pada PS yang Diakreditasi</label>
                                    <input type="text" class="form-control" id="matkul_ps_akre" name="matkul_ps_akre" aria-describedby="emailHelp" value="{{$item->matkul_ps_akre}}">
                                  </div>
                                 <div class="form-group">
                                    <label for="">Kesesuaian Bidang Keahlian dengan Mata Kuliah yang Diampu</label>
                                    <input type="text" class="form-control" id="kesbid_matkul" name="kesbid_matkul" aria-describedby="emailHelp" value="{{$item->kesbid_matkul}}">
                                  </div>
                              
                          <button type="submit" class="btn btn-primary">Simpan Data</button>
                          </form>
                    <!--END FORM TAMBAH BARANG-->
                    </div>
                    </div>
                  </div>
                </div>

                    

                    <form action="{{ route('Dosentdktetap.destroy',$item->id_dosen_tdk_tetap) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>

          
            </td>
        </tr>
        @endif
        @endforeach
    </table>
     </div>
   </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
   @stop


