 @extends('adminlte::page')

@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mahasiswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Mahasiswa</li>
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
          <h3 class="card-title">Data Mahasiswa</h3>
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
            <button type="button" class="btn btn-primary btn" data-toggle="modal" data-target="#modalTambahmhs">Tambah</button>
           
            <!-- Modal -->

            <div class="modal fade" id="modalTambahmhs" tabindex="-1" aria-labelledby="modalTambahmhs" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Tambah Data Mahasiswa</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH BARANG-->
                          <form action="{{ route('Cek.store') }}" method="POST">
                            @csrf
                                  <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" aria-describedby="emailHelp">
                                    </div>
                                  <div class="form-group">
                                      <label for="">Barang</label>
                                      <input type="text" class="form-control" id="nim" name="barang">
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
            <th width="20px" class="text-center">No</th>
            <th width="280px" class="text-center">Nama</th>
            <th width="280px" class="text-center">Barang</th>
            <th width="200px"class="text-center">Action</th>
        </tr>
        @foreach ($data as $item)
        <tr>
            <td width="20px" class="text-center">{{ ++$i }}</td>
            <td width="280x">{{ $item->nama }}</div></td>
            <td width="280px">{{ $item->barang }}</div></td>
            <td width="100px">


                  <!--modal Show-->
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalshowmhs1{{ $item->id }}">Detail</button>
                  <div class="modal fade" id="modalshowmhs1{{ $item->id }}" tabindex="-1" aria-labelledby="modalTambahmhs1" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                                <h5 class="modal-title">Detail Data Mahasiswa</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                      </button>
                          </div>
                          <div class="modal-body">
                              <table class="table">
                                <tbody>
                                  <tr>
                                      <td>Nama</td>
                                      <td width="5px">:</td>
                                      <td>{{ $item->nama }}</td>
                                    </tr>
                                    <tr>
                                      <td>Nomor Induk Mahasiswa</td>
                                      <td width="5px">:</td>
                                      <td>{{ $item->barang }}</td>
                                    </tr>
                                </tbody>
                              </table>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
                              <!--button type="button" class="btn btn-primary">Save changes</button-->
                            </div>
                          </div>
                        </div>
                      </div>

                      </div>


                  <!--modal hapus-->
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambahmhs{{ $item->id }}">Edit</button>
                  <div class="modal fade" id="modalTambahmhs{{ $item->id }}" tabindex="-1" aria-labelledby="modalTambahmhs1" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                                <h5 class="modal-title">Edit Data Mahasiswa</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                      </button>
                          </div>
                          <div class="modal-body">
                                <form action="{{ route('Cek.update',$item->id) }}" method="POST">
                                  @csrf
                                  @method('put')
                                        <div class="form-group">
                                          <label for="">Nama</label>
                                          <input type="text" class="form-control" id="nama" name="nama" aria-describedby="emailHelp" value="{{ $item->nama }}">
                                          </div>
                                        <div class="form-group">
                                            <label for="">Barang</label>
                                            <input type="text" class="form-control" id="nim" name="barang" value="{{ $item->barang }}">
                                        </div>
                                        <div class="form-group">
 
                                <button type="submit" class="btn btn-primary">Simpan Data</button>
                                </form>
                      
                          </div>
                          </div>
                        </div>
                      </div>
              
                  </div>
                    
                    <!--modal hapus-->
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus{{ $item->id }}">Delete</button>

                    <div class="modal fade" id="modalHapus{{ $item->id }}" tabindex="-1" aria-labelledby="modalHapus" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-body">
                                  <h4 class="text-center">Apakah anda yakin menghapus Data ini? :</h4>
                                  </div>
                                  <div class="modal-footer">
                                    <form action="{{ route('Cek.destroy',$item->id) }}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-primary">Hapus Data!</button>
                                    </form>
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                            </div>
                          </div>
                        </div>
                    </div>

                      
                  
                  
          
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

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop



