@extends('adminlte::page')

@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mahasiswa Asing</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Mahasiswa Asing</li>
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
          <h3 class="card-title">Mahasiswa Asing</h3>
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
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Tambah Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH PS-->
                          <form action="{{ route('Mhsasing.store') }}" method="POST">
                            @csrf
                                  <div class="form-group">
                                    <label for="">Program Studi</label>
                                    <input type="text" class="form-control" id="ps_program_studi" name="ps_program_studi" aria-describedby="emailHelp">
                                    </div>
                                    <br>
                                  <div class="form-group">
                                    <label for="">Jumlah Mahasiswa Aktif</label>
                                  </div>
                                  <div class="form-group">
                                      <label for="">TS-2</label>
                                      <input type="number" class="form-control" id="ts2" name="ts2">
                                  </div>
                                  <div class="form-group">
                                      <label for="">TS-1</label>
                                      <input type="number" class="form-control" id="ts1" name="ts1">
                                  </div>
                                  <div class="form-group">
                                      <label for="">TS</label>
                                      <input type="number" class="form-control" id="ts" name="ts">
                                  </div>
                                  <br>

                                   <div class="form-group">
                                    <label for="">Jumlah Mahasiswa Asing Penuh Waktu (fulltime)</label>
                                  </div>
                                  <br>
                                  <div class="form-group">
                                      <label for="">TS-2</label>
                                      <input type="number" class="form-control" id="ts2_1" name="ts2_1">
                                  </div>
                                  <div class="form-group">
                                      <label for="">TS-1</label>
                                      <input type="number" class="form-control" id="ts1_1" name="ts1_1">
                                  </div>
                                  <div class="form-group">
                                      <label for="">TS</label>
                                      <input type="number" class="form-control" id="ts_1" name="ts_1">
                                  </div>
                                  <br>

                                   <div class="form-group">
                                    <label for="">Jumlah Mahasiswa Asing Paruh Waktu (Part time)</label>
                                  </div>
                                  <div class="form-group">
                                      <label for="">TS-2</label>
                                      <input type="number" class="form-control" id="ts2_2" name="ts2_2">
                                  </div>
                                  <br>
                                  <div class="form-group">
                                      <label for="">TS-1</label>
                                      <input type="number" class="form-control" id="ts1_2" name="ts1_2">
                                  </div>
                                  <div class="form-group">
                                      <label for="">TS</label>
                                      <input type="number" class="form-control" id="ts_2" name="ts_2">
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
            <tr>
            <td width="280px" rowspan="2" class="text-center"><strong>Program Studi</strong></td>
            <td width="100px" colspan="3" class="text-center"><strong>Jumlah Mahasiswa Aktif</strong></td>
            <td width="100px" colspan="3" class="text-center"><strong>Jumlah Mahasiswa Asing Penuh Waktu</strong></td>
            <td width="100px" colspan="3" class="text-center"><strong>Jumlah Mahasiswa Asing Paruh Waktu</strong></td>
            <td width="100px" rowspan="2" class="text-center"><strong>Aksi</strong></td>
          </tr>
          <tr>
            <td width="100px" class="text-center"><strong>TS-2</strong></td>
            <td width="100px" class="text-center"><strong>TS-1</strong></td>
            <td width="100px" class="text-center"><strong>TS</strong></td>
            <td width="100px" class="text-center"><strong>TS-2</strong></td>
            <td width="100px" class="text-center"><strong>TS-1</strong></td>
            <td width="100px" class="text-center"><strong>TS</strong></td>
            <td width="100px" class="text-center"><strong>TS-2</strong></td>
            <td width="100px" class="text-center"><strong>TS-1</strong></td>
            <td width="100px" class="text-center"><strong>TS</strong></td>
          </tr>
        </tr>
            <tr>
              <td width="100px" class="text-center">1</td>
              <td width="100px" class="text-center">2</td>
              <td width="100px" class="text-center">3</td>
              <td width="100px" class="text-center">4</td>
              <td width="100px" class="text-center">5</td>
              <td width="100px" class="text-center">6</td>
              <td width="100px" class="text-center">7</td>
              <td width="100px" class="text-center">8</td>
              <td width="100px" class="text-center">10</td>
              <td width="100px" class="text-center">11</td>
              <td width="100px" class="text-center">12</td>
          </tr>
        @foreach ($Mhsasing as $item)
        <tr>
 
            <td width="280px" class="text-center">{{ $item->ps_program_studi }}</div></td>
            <td width="100px" class="text-center">{{ $item->ts2 }}</div></td>
            <td width="100px" class="text-center">{{ $item->ts1 }}</div></td>
            <td width="100px" class="text-center">{{ $item->ts }}</div></td>
             <td width="100px" class="text-center">{{ $item->ts2_1 }}</div></td>
            <td width="100px" class="text-center">{{ $item->ts1_1 }}</div></td>
            <td width="100px" class="text-center">{{ $item->ts_1}}</div></td>
             <td width="100px" class="text-center">{{ $item->ts2_2 }}</div></td>
            <td width="100px" class="text-center">{{ $item->ts1_2 }}</div></td>
            <td width="100px" class="text-center">{{ $item->ts_2}}</div></td>

            <td width="100px">

              <!--modal edit -->
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit{{ $item->id_mhs_asing }}">Edit</button>
                <div class="modal fade" id="modalEdit{{ $item->id_mhs_asing }}" tabindex="-1" aria-labelledby="modalEdit1" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Edit Data Seleksi </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                
            
                                <form action="{{ route('Mhsasing.update', $item->id_mhs_asing) }}" method="POST">
                                  @csrf
                                  @method('PUT')
                                    <div class="form-group">
                                    <label for="">Program Studi</label>
                                    <input type="text" Disabled class="form-control" id="ps_program_studi"  name="ps_program_studi" aria-describedby="emailHelp" value="{{$item->ps_program_studi}}">
                                    </div>
                                    <br>
                                  <div class="form-group">
                                    <label for="">Jumlah Mahasiswa Aktif</label>
                                  </div>
                                  <div class="form-group">
                                      <label for="">TS-2</label>
                                      <input type="number" class="form-control" id="ts2" name="ts2" value="{{$item->ts2}}">
                                  </div>
                                  <div class="form-group">
                                      <label for="">TS-1</label>
                                      <input type="number" class="form-control" id="ts1" name="ts1" value="{{$item->ts1}}">
                                  </div>
                                  <div class="form-group">
                                      <label for="">TS</label>
                                      <input type="number" class="form-control" id="ts" name="ts" value="{{$item->ts}}">
                                  </div>
                                  <br>

                                   <div class="form-group">
                                    <label for="">Jumlah Mahasiswa Asing Penuh Waktu (fulltime)</label>
                                  </div>
                                  <div class="form-group">
                                      <label for="">TS-2</label>
                                      <input type="number" class="form-control" id="ts2_1" name="ts2_1" value="{{$item->ts2_1}}">
                                  </div>
                                  <div class="form-group">
                                      <label for="">TS-1</label>
                                      <input type="number" class="form-control" id="ts1_1" name="ts1_1" value="{{$item->ts1_1}}">
                                  </div>
                                  <div class="form-group">
                                      <label for="">TS</label>
                                      <input type="number" class="form-control" id="ts_1" name="ts_1"  value="{{$item->ts_1}}">
                                  </div>
                                  <br>

                                   <div class="form-group">
                                    <label for="">Jumlah Mahasiswa Asing Paruh Waktu (Part time)</label>
                                  </div>
                                  <div class="form-group">
                                      <label for="">TS-2</label>
                                      <input type="number" class="form-control" id="ts2_2" name="ts2_2" value="{{$item->ts2_2}}">
                                  </div>
                                  <div class="form-group">
                                      <label for="">TS-1</label>
                                      <input type="number" class="form-control" id="ts1_2" name="ts1_2" value="{{$item->ts2_1}}">
                                  </div>
                                  <div class="form-group">
                                      <label for="">TS</label>
                                      <input type="number" class="form-control" id="ts_2" name="ts_2" value="{{$item->ts_2}}">
                                  </div>
                                  
                          <button type="submit" class="btn btn-primary">Simpan Data</button>
                          </form>

                    </div>
                    </div>
                  </div>
                </div>

                    

                    <form action="{{ route('Mhsasing.destroy',$item->id_mhs_asing) }}" method="POST">
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


