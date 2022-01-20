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
              <li class="breadcrumb-item active"> EWMP Dosen Tetap</li>
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
          <h3 class="card-title">EWMP Dosen Tetap</h3>
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
                          <strong>Whoops!</strong> Periksa Kembali inputan anda<br><br>
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif


            @if (auth()->user()->level=="user")
          <!-- Tombol untuk menampilkan modal-->
             <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit">Tambah</button>
           
            <!-- Modal -->

            <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEdit" aria-hidden="true">
                 <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Tambah EWMP Dosen Tetap PT</h5>
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
                                    <select name="nama_dosen" id="nama-dosen" class="form-control">
                                      @foreach ($Dosentetappt as $item)
                                      <option value="{{$item->nama_dosen}}">{{$item->nama_dosen}}</option>
                                      @endforeach
                                    </select>
                                    </div>
                                    
                                    <div class="form-group">
                                      <label for="">DTPS</label>
                                      <input type="text" class="form-control" id="dtps" name="dtps" aria-describedby="emailHelp">
                                    </div>

                                   <div class="form-group">
                                    <label for="">PS Akreditasi</label>
                                    <input type="text" class="form-control" id="ps_akreditasi" name="ps_akreditasi" aria-describedby="emailHelp">
                                    </div>
                                     <div class="form-group">
                                    <label for="">PS dalam PT</label>
                                    <input type="text" class="form-control" id="ps_dalampt" name="ps_dalampt" aria-describedby="emailHelp">
                                    </div>
                                  <div class="form-group">
                                      <label for="">PS Luar PT</label>
                                      <input type="text" class="form-control" id="ps_luarpt" name="ps_luarpt">
                                  </div>

                                   <div class="form-group">
                                    <label for="">Penelitian</label>
                                    <input type="text" class="form-control" id="penelitian" name="penelitian" aria-describedby="emailHelp">
                                    </div>

                                    <div class="form-group">
                                      <label for="">PKM</label>
                                      <input type="text" class="form-control" id="pkm" name="pkm" aria-describedby="emailHelp">
                                    </div>

                                  <div class="form-group">
                                      <label for="">Rata-rata</label>
                                      <input type="text" class="form-control" id="r2" name="r2">
                                  </div>
                                     <div class="form-group">
                                      <label for="">Tugas Tambahan</label>
                                      <input type="text" class="form-control" id="tugas_tambahan" name="tugas_tambahan">
                                  </div>
                                  <div class="form-group">
                                      <label for="">JML SKS</label>
                                      <input type="text" class="form-control" id="jml_sks" name="jml_sks">
                                  </div>
                                  <div class="form-group">
                                      <label for="">Rata-Rata Per semester</label>
                                      <input type="text" class="form-control" id="rata_rata_persemester" name="rata_rata_persemester">
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
    <table border="1"cellpadding="10">
  
      <tr>
      <td rowspan="3" class="text-center" width="auto">No</td>
      <td rowspan="3"class="text-center" width="400px">Nama Dosen</td>
      <td rowspan="3"class="text-center" width="100px">DTPS</td>
      <td colspan="6"class="text-center" width="400px">EWMP pada saat TS dalam satuan kredit semester (sks)</td>
      <td rowspan="3"class="text-center" width="100px">Jumlah (sks)</td>
      <td rowspan="3"class="text-center" width="100px">Rata-rata per Semester (sks)</td>
      <td rowspan="3"class="text-center" width="100px">Aksi</td>
    </tr>
     <tr>
      <td colspan="3"class="text-center" width="500px">Pendidikan: Pembelajaran dan Pembimbingan</td>
      <td rowspan="2"class="text-center" width="50px">Penelitian</td>
      <td rowspan="2"class="text-center" width="50px">PKM</td>
      <td rowspan="2"class="text-center" width="50px">Tugas Tambahan dan/atau Penunjang</td>

    </tr>
    <tr>
      <td class="text-center" width="100px">PS yang Diakreditasi</td>
      <td class="text-center" width="100px">PS Lain di dalam PT</td>
      <td class="text-center" width="100px">PS Lain di luar PT</td>
 

    </tr>
  
    <tr>
      <td class="text-center" width="50px">1</td>
      <td class="text-center" width="300px">2</td>
      <td class="text-center" width="50px">3</td>
      <td class="text-center" width="50px">4</td>
      <td class="text-center" width="50px">5</td>
      <td class="text-center" width="50px">6</td>
      <td class="text-center" width="50px">7</td>
      <td class="text-center"width="50px">8</td>
      <td class="text-center"width="50px">9</td>
      <td class="text-center" width="50px">10</td>
      <td class="text-center" width="50px">11</td>
      <td class="text-center" width="50px">12</td>
    <tr>
      @foreach ($ewmp as $item)
      <td> {{ ++$i }}</td>
      <td width="500px"> {{ $item->nama_dosen }}</td>
      <td> {{ $item->dtps }}</td>
      <td>{{ $item->ps_akreditasi }}</td>
      <td> {{ $item->ps_dalampt }}</td>
      <td>{{ $item->ps_luarpt }}</td>
      <td>{{ $item->penelitian }}</td>
      <td>{{ $item->pkm}}</td>
      <td>{{ $item->tugas_tambahan }}</td>
      <td>{{ $item->jml_sks }}</td>
      <td>{{ $item->rata_rata_persemester }}</td>

       @if (auth()->user()->level=="user")
    
      <td width="100px">
           
              <!--modal edit -->
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit{{ $item->id_ewmp_dosen}}">Edit</button>
                <div class="modal fade" id="modalEdit{{ $item->id_ewmp_dosen}}" tabindex="-1" aria-labelledby="modalEdit1" aria-hidden="true">
                           <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Edit Data EWMP </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH PS-->
            
                            <form action="{{ route('Ewmp.update',$item->id_ewmp_dosen) }}" method="POST">
                            @csrf
                            @method('PUT')
                                 <div class="form-group">
                                    <label for="">Nama Dosen</label>
                                    <input type="text" class="form-control" id="nama-dosen" name="nama_dosen" aria-describedby="emailHelp" value="{{$item->nama_dosen }}">
                                    </div>
                                    <div class="form-group">
                                      <label for="">DTPS</label>
                                      <input type="text" class="form-control" id="dtps" name="dtps" aria-describedby="emailHelp" value="{{$item->dtps}}">
                                    </div>

                                   <div class="form-group">
                                    <label for="">PS Akreditasi</label>
                                    <input type="text" class="form-control" id="ps_akreditasi" name="ps_akreditasi" aria-describedby="emailHelp" value="{{ $item->ps_akreditasi }}">
                                    </div>
                                     <div class="form-group">
                                    <label for="">PS dalam PT</label>
                                    <input type="text" class="form-control" id="ps_dalampt" name="ps_dalampt" aria-describedby="emailHelp" value="{{ $item->ps_dalampt }}">
                                    </div>
                                  <div class="form-group">
                                      <label for="">PS Luar PT</label>
                                      <input type="text" class="form-control" id="ps_luarpt" name="ps_luarpt" value="{{$item->ps_luarpt}}">
                                  </div>

                                   <div class="form-group">
                                    <label for="">Penelitian</label>
                                    <input type="text" class="form-control" id="penelitian" name="penelitian" aria-describedby="emailHelp" value="{{$item->penelitian}}">
                                    </div>

                                    <div class="form-group">
                                      <label for="">PKM</label>
                                      <input type="text" class="form-control" id="pkm" name="pkm" aria-describedby="emailHelp" value="{{$item->pkm}}">
                                    </div>

                                  <div class="form-group">
                                      <label for="">Rata-rata</label>
                                      <input type="text" class="form-control" id="r2" name="r2" value="{{$item->rata_rata_persemester}}">
                                  </div>
                                     <div class="form-group">
                                      <label for="">Tugas Tambahan</label>
                                      <input type="text" class="form-control" id="tugas_tambahan" name="tugas_tambahan" value="{{$item->tugas_tambahan}}">
                                  </div>
                                  <div class="form-group">
                                      <label for="">JML SKS</label>
                                      <input type="text" class="form-control" id="jml_sks" name="jml_sks" value="{{$item->jml_sks}}">
                                  </div>
                                  <div class="form-group">
                                      <label for="">Rata-Rata Per semester</label>
                                      <input type="text" class="form-control" id="rata_rata_persemester" name="rata_rata_persemester" value="{{$item->rata_rata_persemester}}">
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

                    

                    <form action="{{ route('Ewmp.destroy',$item->id_ewmp_dosen) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>

          
            </td>
           @endif 
        </tr>
  @endforeach
    </table>
</div>
</div>

   
     </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
</div>
    </section>
   @stop


