@extends('adminlte::page')

@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Program Studi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Data Program Studi</li>
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
          <h3 class="card-title">Data Program Studi</h3>
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
          <!-- Tombol untuk menampilkan modal-->
            <button type="button" class="btn btn-primary btn" data-toggle="modal" data-target="#modalEdit">Tambah</button>
           
            <!-- Modal -->

            <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEdit" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Tambah Data Program Studi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH PS-->
                          <form action="{{ route('pengelolaprodi.store') }}" method="POST">
                            @csrf
                                  <div class="form-group">
                                    <label for="">Jenis Program</label>
                                    <input type="text" class="form-control" id="jenis_program" name="jenis_program" aria-describedby="emailHelp">
                                    </div>
                                  <div class="form-group">
                                      <label for="">Nama Program Studi</label>
                                      <input type="text" class="form-control" id="nama_ps" name="nama_ps">
                                  </div>
                                  <div class="form-group">
                                      <label for="">Status</label>
                                      <input type="text" class="form-control" id="status" name="status">
                                  </div>
                                   <div class="form-group">
                                    <label for="">Nomor Tanggal SK </label>
                                    <input type="text" class="form-control" id="no_tgl_sk" name="no_tgl_sk" aria-describedby="emailHelp">
                                    </div>
                                  <div class="form-group">
                                      <label for="">Tanggal Kadaluarsa</label>
                                      <input type="text" class="form-control" id="tgl_kadaluarsa" name="tgl_kadaluarsa">
                                  </div>
                                  <div class="form-group">
                                      <label for="">Jumlah Mahasiswa Saat TS</label>
                                      <input type="text" class="form-control" id="jml_mhs_saat_ts" name="jml_mhs_saat_ts">
                                  </div>
                          <button type="submit" class="btn btn-primary">Simpan Data</button>
                          </form>
                    <!--END FORM TAMBAH BARANG-->
                    </div>
                    </div>
                  </div>
                </div>

            
        </div>


    <div class="card-body">

    <table class="table table-bordered">
        <tr>

            <th width="20px" class="text-center">Jenis Program</th>
            <th width="280px" class="text-center">Nama Program Studi</th>
            <th width="280px" class="text-center">Status</th>
            <th width="280px" class="text-center">No Tanggal SK</th>
            <th width="280px" class="text-center">Tanggal Kadaluarsa</th>
            <th width="280px" class="text-center">Jumlah Mahasiswa Saat TS</th>
            <th width="200px"class="text-center">Action</th>
        </tr>
        @foreach ($d as $v)
        <tr>
 
            <td width="280x">{{ $v->jenis_program }}</div></td>
            <td width="280px">{{ $v->nama_ps }}</div></td>
            <td width="280px">{{ $v->status }}</div></td>
            <td width="280x">{{ $v->no_tgl_sk }}</div></td>
            <td width="280px">{{ $v->tgl_kadaluarsa }}</div></td>
            <td width="280px">{{ $v->jml_mhs_saat_ts }}</div></td>
            <td width="100px">

              <!--modal edit -->
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit{{ $v->id }}">Edit</button>
                <div class="modal fade" id="modalEdit{{ $v->id }}" tabindex="-1" aria-labelledby="modalEdit1" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Edit Data Program Studi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH PS-->
                                <form action="{{ route('pengelolaprodi.update', $v->id) }}" method="POST">
            
                                @csrf
                                @method('PUT')

                                 <div class="form-group">
                                    <label for="">Jenis Program</label>
                                    <input type="text" class="form-control" id="jenis_program" name="jenis_program" value="{{$v->jenis_program}}">
                                    </div>
                                  <div class="form-group">
                                      <label for="">Nama Program Studi</label>
                                      <input type="text" class="form-control" id="nama_ps" name="nama_ps" value="{{ $v->nama_ps }}">
                                  </div>
                                  <div class="form-group">
                                      <label for="">Status</label>
                                      <input type="text" class="form-control" id="status" name="status" value="{{$v->status}}">
                                  </div>
                                     <div class="form-group">
                                      <label for="">No. Tanggal SK</label>
                                      <input type="text" class="form-control" id="no_tgl_sk" name="no_tgl_sk" value="{{$v->no_tgl_sk }}">
                                  </div>
                                     <div class="form-group">
                                      <label for="">Tanggal Kadaluarsa</label>
                                      <input type="text" class="form-control" id="tgl_kadaluarsa" name="tgl_kadaluarsa" value="{{ $v->tgl_kadaluarsa }}">
                                  </div>   
                                  <div class="form-group">
                                      <label for="">Jumlah Mahasiswa Saat TS</label>
                                      <input type="text" class="form-control" id="jml_mhs_saat_ts" name="jml_mhs_saat_ts" value="{{ $v->jml_mhs_saat_ts }}">
                                  </div>
                                  
                          <button type="submit" class="btn btn-primary">Simpan Data</button>
                          </form>
                    <!--END FORM TAMBAH BARANG-->
                    </div>
                    </div>
                  </div>
                </div>

                    

                    <form action="{{ route('pengelolaprodi.destroy',$v->id) }}" method="POST">
        

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>

          
            </td>
        </tr>
        @endforeach
    </table>

     </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
   @stop


