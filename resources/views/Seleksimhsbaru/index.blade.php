@extends('adminlte::page')

@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Seleksi Mahasiswa Baru</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Seleksi Mahasiswa Baru</li>
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
          <h3 class="card-title">Seleksi Mahasiswa Baru</h3>
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
                  @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                          <p>{{ $message }}</p>
                         </div>
                      @endif

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

        </div>                                            
        <div class="card-body">

     
       
          <!-- Tombol untuk menampilkan modal-->
            <button type="button" class="btn btn-primary btn" data-toggle="modal" data-target="#modalTambah">Tambah</button>
           
            <!-- Modal -->

            <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambah" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Tambah Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH PS-->
                          <form action="{{ route('Seleksimhsbaru.store') }}" method="POST">
                            @csrf
                                  <div class="form-group">
                                    <label for="">Tahun Akademik</label>
                                    <input type="text" class="form-control" id="tahun_akademik" name="tahun_akademik" aria-describedby="emailHelp">
                                    </div>
                                  <div class="form-group">
                                      <label for="">Daya Tampung</label>
                                      <input type="number" class="form-control" id="daya_tampung" name="daya_tampung">
                                  </div>
                                  <br>

                                  <div class="form-group">
                                    <label>Jumlah Calon Mahasiswa</label>
                                  </div>
                                  <div class="form-group">
                                      <label for="">Pendaftar</label>
                                      <input type="text" class="form-control" id="pendaftar" name="pendaftar">
                                  </div>
                                  <div class="form-group">
                                      <label for="">Lulus Seleksi</label>
                                      <input type="text" class="form-control" id="lulus_seleksi" name="lulus_seleksi">
                                  </div>
                                  <br>

                                  <div class="form-group">
                                    <label>Jumlah Mahasiswa Baru</label>
                                  </div>
                                    <div class="form-group">
                                      <label for="">Reguler</label>
                                      <input type="text" class="form-control" id="reguler1" name="reguler1">
                                  </div>
                                  <div class="form-group">
                                      <label for="">Transfer</label>
                                      <input type="text" class="form-control" id="transfer1" name="transfer1">
                                  </div>
                                  <br>
                                   <div class="form-group">
                                    <label>Jumlah Mahasiswa Aktif</label>
                                  </div>
                                    <div class="form-group">
                                      <label for="">Reguler</label>
                                      <input type="text" class="form-control" id="reguler2" name="reguler2">
                                  </div>
                                     <div class="form-group">
                                      <label for="">Transfer</label>
                                      <input type="text" class="form-control" id="transfer2" name="transfer2">
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

    <table border="2"cellpadding="5" style="width:80%">
        <tr>
            <tr>
            <td width="100px" rowspan="2" class="text-center"><strong>Tahun Akademik</strong></td>
            <td width="100px" rowspan="2" class="text-center"><strong>Daya Tampung</strong></td>
            <td width="100px" colspan="2" class="text-center"><strong>Jumlah Calon Mahasiswa</strong></td>
            <td width="100px" colspan="2" class="text-center"><strong>Jumlah Mahasiswa Baru</strong></td>
            <td width="100px" colspan="2" class="text-center"><strong>Jumlah Mahasiswa Aktif</strong></td>
            <td width="100px" rowspan="2" class="text-center"><strong>Aksi</strong></td>
          </tr>
          <tr>
            <td width="100px" class="text-center"><strong>Pendaftar</strong></td>
            <td width="100px" class="text-center"><strong>Lulus Seleksi</strong></td>
            <td width="100px" class="text-center"><strong>Reguler</strong></td>
            <td width="100px" class="text-center"><strong>Transfer</strong></td>
            <td width="100px" class="text-center"><strong>Reguler</strong></td>
            <td width="100px" class="text-center"><strong>Transfer</strong></td>
          </tr>
        </tr>
            <tr bgcolor="#DCDCDC">
              <td width="100px" class="text-center">1</td>
              <td width="100px" class="text-center">2</td>
              <td width="100px" class="text-center">3</td>
              <td width="100px" class="text-center">4</td>
              <td width="100px" class="text-center">5</td>
              <td width="100px" class="text-center">6</td>
              <td width="100px" class="text-center">7</td>
              <td width="100px" class="text-center">8</td>
              <td width="100px" class="text-center">9</td>
          </tr>
        @foreach ($Seleksimhsbaru as $item)
        <tr>
 
            <td width="100px" class="text-center">{{ $item->tahun_akademik }}</div></td>
            <td width="100px" class="text-center">{{ $item->daya_tampung }}</div></td>
            <td width="100px" class="text-center">{{ $item->pendaftar }}</div></td>
            <td width="100px" class="text-center">{{ $item->lulus_seleksi }}</div></td>
            <td width="100px" class="text-center">{{ $item->reguler1 }}</div></td>
            <td width="100px" class="text-center">{{ $item->transfer1 }}</div></td>
            <td width="100px" class="text-center">{{ $item->reguler2 }}</div></td>
            <td width="100px" class="text-center">{{ $item->transfer2 }}</div></td>
            <td width="100px">

              <!--modal edit -->
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit{{ $item->id_seleksi_mhs }}">Edit</button>
                <div class="modal fade" id="modalEdit{{ $item->id_seleksi_mhs }}" tabindex="-1" aria-labelledby="modalEdit1" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Edit Data Seleksi </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                
            
                                <form action="{{ route('Seleksimhsbaru.update', $item->id_seleksi_mhs) }}" method="POST">
                                  @csrf
                                  @method('PUT')
                                    <div class="form-group">
                                    <label for="">Tahun Akademik</label>
                                    <input type="text" disabled class="form-control" id="tahun_akademik" name="tahun_akademik" aria-describedby="emailHelp" value="{{$item->tahun_akademik}}">
                                    </div>
                                  <div class="form-group">
                                      <label for="">Daya Tampung</label>
                                      <input type="number" class="form-control" id="daya_tampung" name="daya_tampung" value="{{$item->daya_tampung}}">
                                  </div>
                             
                                  <div class="form-group">
                                    <label>Jumlah Calon Mahasiswa</label>
                                  </div>
                                  <div class="form-group">
                                      <label for="">Pendaftar</label>
                                      <input type="text" class="form-control" id="pendaftar" name="pendaftar" value="{{$item->pendaftar}}">
                                  </div>
                                  <div class="form-group">
                                      <label for="">Lulus Seleksi</label>
                                      <input type="text" class="form-control" id="lulus_seleksi" name="lulus_seleksi" value="{{$item->lulus_seleksi}}">
                                  </div>

                                  <div class="form-group">
                                    <label>Jumlah Mahasiswa Baru</label>
                                  </div>
                                    <div class="form-group">
                                      <label for="">Reguler</label>
                                      <input type="text" class="form-control" id="reguler1" name="reguler1" value="{{$item->reguler1}}">
                                  </div>
                                  <div class="form-group">
                                      <label for="">Transfer</label>
                                      <input type="text" class="form-control" id="transfer1" name="transfer1" value="{{$item->transfer1}}">
                                  </div>

                                   <div class="form-group">
                                    <label>Jumlah Mahasiswa Aktif</label>
                                  </div>
                                    <div class="form-group">
                                      <label for="">Reguler</label>
                                      <input type="text" class="form-control" id="reguler2" name="reguler2" value="{{$item->reguler2}}">
                                  </div>
                                     <div class="form-group">
                                      <label for="">Reguler</label>
                                      <input type="text" class="form-control" id="transfer2" name="transfer2" value="{{$item->transfer2}}">
                                  </div>
                                  
                          <button type="submit" class="btn btn-primary">Simpan Data</button>
                          </form>

                    </div>
                    </div>
                  </div>
                </div>

                    

                    <form action="{{ route('Seleksimhsbaru.destroy',$item->id_seleksi_mhs) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>

          
            </td>
        </tr>
        @endforeach
          <tr>
              <td width="100px" colspan="2" class="text-center"> Jumlah </td>
              <td width="100px" class="text-center">{{$row1}}</td>
              <td width="100px" class="text-center">{{$row2}}</td>
              <td width="100px" class="text-center">{{$row3}}</td>
              <td width="100px" class="text-center">{{$row4}}</td>
              <td width="100px" colspan="2" class="text-center">{{$totalnm}}</td>
              <td width="100px" class="text-center" bgcolor="#DCDCDC"></td>
          </tr>
    </table>
     </div>
      </div>        <!-- /.card-body -->
        <div class="card-footer">
          SIMENAK NEW 2021 - UNIVERSITAS SEBELAS APRIL SUMEDANG
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
     @endsection



