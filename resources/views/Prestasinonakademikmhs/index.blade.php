@extends('adminlte::page')
@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Standar 9</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Prestasi Mahasiswa</li>
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
          <h3 class="card-title">Prestasi Non Akademik</h3>
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
                          <strong>Ups</strong> Ada masalah di inputan anda<br><br>
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif

          <!-- Tombol untuk menampilkan modal-->

             @if (auth()->user()->level=="user")

                <a class="btn btn-primary btn-sm" href="{{route('Prestasinonakademikmhs.create')}}" role="button">Tambah</a>
      
              @endif  
            </div>
      


<div class="card-body">
  <p>
  Tuliskan prestasi nonakademik yang dicapai mahasiswa Program Studi dalam 5 
  tahun terakhir dengan mengikuti format Tabel 8.b.2) berikut ini. Data dilengkapi 
  dengan keterangan kegiatan yang diikuti (nama kegiatan, tahun, tingkat, dan prestasi 
  yang dicapai).
  </p>

  <div class="overflow-auto">
    <table border="1"cellpadding="5" style="width:90%">
        <tr bgcolor="#DCDCDC">
            <td rowspan="2" class="text-center" width="10px">No.</td>
              <td rowspan="2" class="text-center" width="500px">Nama Kegiatan</td>
              <td rowspan="2" class="text-center" width="10px">Tahun Perolehan</td>
              <td colspan="3" class="text-center" width="10px">Tingkat</td>
              <td rowspan="2" class="text-center" width="300px">Prestasi Yang dicapai</td>
              <td rowspan="2" class="text-center" width="200px">Aksi</td>
            </tr>
            <tr bgcolor="#DCDCDC">
              <td>Lokal/Wilayah</td>
              <td>Nasional</td>
              <td>Internasional</td>
          </tr>
                     
        @foreach ($Prestasinonakademikmhs as $item)
          <tr>
                  <td class="text-center">{{++$i}}</td>
                  <td >{{$item->nama_kegiatan}}</td>
                  <td class="text-center">{{$item->tahun_perolehan}}</td>
                  <td class="text-center">{{$item->lokal}}</td>
                  <td class="text-center">{{$item->nasional}}</td>
                  <td class="text-center">{{$item->internasional}}</td>
                  <td >{{$item->prestasi_yg_dicapai}}</td>
               
            @if (auth()->user()->level="user")
            <td width="30px">

            <!--modal edit -->  
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit{{ $item->id_prestasi_non_akademik_mhs }}">Edit</button>
                <div class="modal fade" id="modalEdit{{ $item->id_prestasi_non_akademik_mhs}}" tabindex="-1" aria-labelledby="modalEdit1" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Edit Data Prestasi Akademik</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH PS-->                           
                                <form action="{{ route('Prestasinonakademikmhs.update',$item->id_prestasi_non_akademik_mhs) }}" method="POST">
                                  @csrf
                                  @method('put')
                                    <div class="form-row">
                                          <div class="form-group col-md-6">
                                              <label>Nama Kegiatan</label>
                                              <input type="text" name="nama_kegiatan" class="form-control" value="{{$item->nama_kegiatan}}">     
                                          </div>
                                           <div class="form-group col-md-2">
                                              <label>Tahun</label>
                                              <input type="number" name="tahun_perolehan" class="form-control" value="tahun">        
                                          </div>
                                    </div>

                                      <br>
                                      <label>Tingkat (1)</label>
                                      <div class="form-row">
                                          <div class="form-group col-md-3">
                                              <label>Lokal/ Wilayah</label>
                                              <input type="checkbox" name="lokal" class="checkbox col-md-1" value="V">        
                                          </div>
                                           <div class="form-group col-md-3">
                                              <label>Nasional</label>
                                              <input type="checkbox" name="nasional" class="checkbox col-md-1" value="V">        
                                          </div>
                                           <div class="form-group col-md-3">
                                              <label>Internasional</label>
                                              <input type="checkbox" name="internasional" class="checkbox col-md-1" value="V">        
                                          </div>
                                      </div> 
                                      <div class="form-row">
                                          <div class="form-group col-md-8">
                                              <label>Prestasi yang dicapai</label>
                                              <textarea class="form-control" name="prestasi_yg_dicapai">{{$item->prestasi_yg_dicapai}}</textarea>       
                                          </div>
                                      </div>          
                         
                                  <button type="submit" class="btn btn-primary" onclick="return confirm('apakah data yang dimasukan sudah valid')">Simpan</button>
                                  <button type="reset" class="btn btn-primary">Reset Data</button>
                                </form>


                    </div>

                    </div>
                  </div>
                </div>


                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$item->id_prestasi_non_akademik_mhs}}">
                    delete
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModalCenter{{$item->id_prestasi_non_akademik_mhs}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Perhatian</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Apakah anda yakin akan menghapus data ini?
                        </div>
                        <div class="modal-footer">
                          <form action="{{ route('Prestasinonakademikmhs.destroy',$item->id_prestasi_non_akademik_mhs) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                             <button type="submit" class="btn btn-primary btn-sm">Hapus Data!</button>
                              </form>
                                            <button type="" class="btn btn-secondary btn-sm">Close</button>
                                
                          
                        </div>
                      </div>
                    </div>
                  </div>
            </td>
            @endif
         </tr>
            @endforeach
          <tr>
            <td colspan="3" class="text-center">Jumlah</td>
            <td class="text-center">{{$count_t1}}</td>
            <td class="text-center">{{$count_t2}}</td>
            <td class="text-center">{{$count_t3}}</td>
            <td colspan="2" bgcolor="#DCDCDC"></td>
          </tr>

     </table>



</div>
<br>
<p>Keterangan:<br>
1) Beri tanda centang V pada kolom yang sesuai.</p>
   
     </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
</div>
    </section>

    
   @stop


