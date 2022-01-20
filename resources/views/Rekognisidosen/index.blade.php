@extends('adminlte::page')

@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pengakuan dan Rekognisi Dosen</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Pengakuan dan Rekognisi Dosen</li>
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
          <h3 class="card-title">Pengakuan dan Rekognisi Dosen</h3>
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
                          <h5 class="modal-title">Tambah Pengakuan dan Rekognisi Dosen</h5>
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
                                    <label for="">Bidang Keahlian</label>
                                    <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" aria-describedby="emailHelp" value="">
                                  </div>
                                  <div class="form-group">
                                    <label for="">NAMA DOSEN</label>
                                    <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" aria-describedby="emailHelp" value="">
                                  </div>
                                  <div class="form-group">
                                    <label for="">NAMA DOSEN</label>
                                    <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" aria-describedby="emailHelp" value="">
                                  </div>
                                  <div class="form-group">
                                    <label for="">NAMA DOSEN</label>
                                    <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" aria-describedby="emailHelp" value="">
                                  </div>
                                  <div class="form-group">
                                    <label for="">NAMA DOSEN</label>
                                    <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" aria-describedby="emailHelp" value="">
                                  </div>
                                  <div class="form-group">
                                    <label for="">NAMA DOSEN</label>
                                    <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" aria-describedby="emailHelp" value="">
                                  </div>
                                  <div class="form-group">
                                    <label for="">NAMA DOSEN</label>
                                    <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" aria-describedby="emailHelp" value="">
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

          

            @if (auth()->user()->level=="user")
            <td width="100px">

              <!--modal edit -->
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit{{ $item->id_dosen_tdk_tetap }}">Edit</button>
                <div class="modal fade" id="modalEdit{{ $item->id_dosen_tdk_tetap }}" tabindex="-1" aria-labelledby="modalEdit1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Edit Data Pengakuan dan Rekognisi Dosen </h5>
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
                                    <label for="">Bidang Keahlian</label>
                                    <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" aria-describedby="emailHelp" value="">
                                  </div>
                                  <div class="form-group">
                                    <label for="">NAMA DOSEN</label>
                                    <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" aria-describedby="emailHelp" value="">
                                  </div>
                                  <div class="form-group">
                                    <label for="">NAMA DOSEN</label>
                                    <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" aria-describedby="emailHelp" value="">
                                  </div>
                                  <div class="form-group">
                                    <label for="">NAMA DOSEN</label>
                                    <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" aria-describedby="emailHelp" value="">
                                  </div>
                                  <div class="form-group">
                                    <label for="">NAMA DOSEN</label>
                                    <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" aria-describedby="emailHelp" value="">
                                  </div>
                                  <div class="form-group">
                                    <label for="">NAMA DOSEN</label>
                                    <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" aria-describedby="emailHelp" value="">
                                  </div>
                                  <div class="form-group">
                                    <label for="">NAMA DOSEN</label>
                                    <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" aria-describedby="emailHelp" value="">
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


