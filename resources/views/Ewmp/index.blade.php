@extends('adminlte::page')

@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Ekuivalen Waktu Mengajar Penuh (EWMP) Dosen Tetap Perguruan Tinggi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active"> Ekuivalen Waktu Mengajar Penuh (EWMP) Dosen Tetap Perguruan Tinggi</li>
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
          <h3 class="card-title"> Ekuivalen Waktu Mengajar Penuh (EWMP) Dosen Tetap Perguruan Tinggi</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>                                                
        <div class="card-body col-lg-12">

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
             <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit">Tambah</button>
           
            <!-- Modal -->

            <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEdit" aria-hidden="true">
                 <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Tambah  Ekuivalen Waktu Mengajar Penuh (EWMP) Dosen Tetap Perguruan Tinggi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH PS-->
                          <form action="{{ route('Ewmp.store') }}" method="POST">
                            @csrf
                                  <div class="form-group">
                                    <label for="">Nama Dosen</label>
                                    <input type="text" class="form-control" id="lembaga_mitra" name="nama_dosen" aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group">
                                      <label for="">TS2</label>
                                      <input type="text" class="form-control" id="ts2" name="ts2" aria-describedby="emailHelp">
                                    </div>

                                   <div class="form-group">
                                    <label for="">TS1</label>
                                    <input type="text" class="form-control" id="ts1" name="ts1" aria-describedby="emailHelp">
                                    </div>
                                     <div class="form-group">
                                    <label for="">TS</label>
                                    <input type="text" class="form-control" id="ts" name="ts" aria-describedby="emailHelp">
                                    </div>
                                  <div class="form-group">
                                      <label for="">Rata-rata</label>
                                      <input type="text" class="form-control" id="r1" name="r1">
                                  </div>
                                  <br>
                                    <div class="form-group">
                                      <label for="">pada PS yang Diakreditasi</label>
                                    </div>
                                       <div class="form-group">
                                      <label for="">TS2</label>
                                      <input type="text" class="form-control" id="ts_2" name="ts_2" aria-describedby="emailHelp">
                                    </div>

                                   <div class="form-group">
                                    <label for="">TS1</label>
                                    <input type="text" class="form-control" id="ts_1" name="ts_1" aria-describedby="emailHelp">
                                    </div>
                                     <div class="form-group">
                                    <label for="">TS</label>
                                    <input type="text" class="form-control" id="ts_" name="ts_" aria-describedby="emailHelp">
                                    </div>
                                  <div class="form-group">
                                      <label for="">Rata-rata</label>
                                      <input type="text" class="form-control" id="r2" name="r2">
                                  </div>
                                     <div class="form-group">
                                      <label for="">Rata-rata Jumlah Bimbingan di semua Program/Semester</label>
                                      <input type="text" class="form-control" id="r3" name="r3">
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

  <div style="overflow-x:auto;">
    <table class="table table-bordered">
      <tr>
            <th width="400px" rowspan="3" class="text-center">Nama Dosen</th>
            <th width="400px"  colspan="8" class="text-center">Jumlah mahasiswa yang dibimbing</th>
             <th width="280px" rowspan="3" class="text-center">Rata-rata Jumlah Bimbingan di semua Program/ Semester</th>
              <th width="280px" rowspan="3" class="text-center">Aksi</th>
      </tr>
       <tr>
            <th width="400px" colspan="4" class="text-center">pada PS yang Diakreditasi</th>
            <th width="400px"  colspan="4" class="text-center">pada PS Lain di PT</th>
      </tr>
        <tr>
            <th width="280px" class="text-center">TS2</th>
            <th width="280px"  class="text-center">TS1</th>
            <th width="280px"  class="text-center">TS</th>
            <th width="280px"  class="text-center">Rata-rata</th>
            <th width="280px" class="text-center">TS2</th>
            <th width="280px"  class="text-center">TS1</th>
            <th width="280px"  class="text-center">TS</th>
            <th width="280px"  class="text-center">Rata-rata</th>
            
        </tr>

        @foreach ($dosenpembimbing as $item)

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
        <tr>
            <td width="280x">{{ $item->nama_dosen }}</td>
            <td width="280px">{{ $item->ts2 }}</td>
            <td width="280px">{{ $item->ts1 }}</td>
            <td width="280px">{{ $item->ts }}</td>
            <td width="280px">{{ $item->r1}}</td>
            <td width="280px">{{ $item->ts_2}}</td>
            <td width="280px">{{ $item->ts_1}}</td>
            <td width="280px">{{ $item->ts_ }}</td>
            <td width="280px">{{ $item->r2}}</td>
            <td width="280px">{{ $item->r3}}</td>
            <td width="100px">

              <!--modal edit -->
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit{{ $item->id_dosen_pembimbing }}">Edit</button>
                <div class="modal fade" id="modalEdit{{ $item->id_dosen_pembimbing }}" tabindex="-1" aria-labelledby="modalEdit1" aria-hidden="true">
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
            
                            <form action="{{ route('Ewmp.update',$item->id_dosen_pembimbing) }}" method="POST">
                            @csrf
                            @method('PUT')
                                  <div class="form-group">
                                    <label for="">Nama Dosen</label>
                                    <input type="text" class="form-control" id="lembaga_mitra" name="nama_dosen" aria-describedby="emailHelp" value="{{ $item->nama_dosen }}">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                      <label for=""><span>Jumlah Mahasiswa yang Dibimbing</span></label>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                      <label for="">pada PS yang Diakreditasi</label>
                                    </div>
                                  <br>
                                    <div class="form-group">
                                      <label for="">TS2</label>
                                      <input type="text" class="form-control" id="ts2" name="ts2" aria-describedby="emailHelp" value="{{ $item->ts2 }}">
                                    </div>

                                   <div class="form-group">
                                    <label for="">TS1</label>
                                    <input type="text" class="form-control" id="ts1" name="ts1" aria-describedby="emailHelp" value="{{ $item->ts1 }}">
                                    </div>
                                     <div class="form-group">
                                    <label for="">TS</label>
                                    <input type="text" class="form-control" id="ts" name="ts" aria-describedby="emailHelp" value="{{ $item->ts }}">
                                    </div>
                                  <div class="form-group">
                                      <label for="">Rata-rata</label>
                                      <input type="text" class="form-control" id="r1" name="r1" value="{{ $item->r1 }}">
                                  </div>
                                  <br>
                                    <div class="form-group">
                                      <label for="">pada PS yang Diakreditasi</label>
                                    </div>
                                       <div class="form-group">
                                      <label for="">TS2</label>
                                      <input type="text" class="form-control" id="ts_2" name="ts_2" aria-describedby="emailHelp" value="{{ $item->ts_2 }}">
                                    </div>

                                   <div class="form-group">
                                    <label for="">TS1</label>
                                    <input type="text" class="form-control" id="ts_1" name="ts_1" aria-describedby="emailHelp" value="{{ $item->ts_1 }}">
                                    </div>
                                     <div class="form-group">
                                    <label for="">TS</label>
                                    <input type="text" class="form-control" id="ts_" name="ts_" aria-describedby="emailHelp" value="{{ $item->ts_ }}">
                                    </div>
                                  <div class="form-group">
                                      <label for="">Rata-rata</label>
                                      <input type="text" class="form-control" id="r2" name="r2" value="{{ $item->r2 }}">
                                  </div>
                                     <div class="form-group">
                                      <label for="">Rata-rata Jumlah Bimbingan di semua Program/Semester</label>
                                      <input type="text" class="form-control" id="r3" name="r3" value="{{ $item->r3 }}">
                                  </div>
                          <button type="submit" class="btn btn-primary">Simpan Data</button>
                          </form>
                    <!--END FORM TAMBAH BARANG-->
                    </div>
                    </div>
                  </div>
                </div>

                    

                    <form action="{{ route('Ewmp.destroy',$item->id_dosen_pembimbing) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>

          
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


