@extends('adminlte::page')
@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Standar 7</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Penelitian DTPS</li>
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
          <h3 class="card-title">Penelitian DTPS yang melibatkan mahasiswa</h3>
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

            
                <a class="btn btn-primary btn-sm" href="{{route('Penelitiandtpsmhs.create')}}" role="button">Tambah</a>
      
  
            </div>
<div class="card-body">
  <p>
Tuliskan data penelitian DTPS yang dalam pelaksanaannya melibatkan mahasiswa 
Program Studi pada TS-2 sampai dengan TS dengan mengikuti format Tabel 6.a
berikut ini.
</p>
  <div class="overflow-auto">
    <table border="1"cellpadding="5" style="width:100%">
        <tr bgcolor="#DCDCDC">
                  <td class="text-center" class="text-center" width="10px">No.</td>
                  <td class="text-center" width="200px">Nama Dosen</td>
                  <td class="text-center" width="200px">Tema Penelitian <br>Sesuai Roadmap</td>
                  <td class="text-center" width="200px">Nama Mahasiswa</td>
                  <td class="text-center" width="200px">Judul Kegiatan (1)</td>
                  <td class="text-center" class="text-center" width="10px">Tahun</td>
                  <td class="text-center">Aksi</td>
          </tr>
        
        @foreach ($Penelitiandtpsmhs as $item)
          <tr>
                  <td class="text-center">{{++$i}}</td>
                  <td>{{$item->nama_dosen}}</td>
                  <td>{{$item->tema_roadmap}}</td>
                  <td>{{$item->nama_mhs}}</td>
                  <td>{{$item->judul_kegiatan}}</td>
                  <td class="text-center">{{$item->tahun}}</td>
               
            @if (auth()->user()->level="user")
            <td width="30px">

            <!--modal edit -->

              
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit{{ $item->id_penelitiandtps_mhs }}">Edit</button>
                <div class="modal fade" id="modalEdit{{ $item->id_penelitiandtps_mhs}}" tabindex="-1" aria-labelledby="modalEdit1" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Edit Data PkM Pembelajaran</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH PS-->                           
                              <form action="{{ route('Penelitiandtpsmhs.update',$item->id_penelitiandtps_mhs) }}" method="POST">
                                @csrf
                                @method('put')
                                  <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label>Nama Dosen</label>
                                        <select name="nama_dosen_id" class="form-control" disabled="">
                                          <option selected="" disabled="">{{$item->nama_dosen}}</option>
                                        </select>          
                                    </div>
                                </div> 

                                <div class="form-row">
                                   <div class="form-group col-md-8">
                                          <label>Tema Penelitian Sesuai Roadmap</label>
                                          <textarea name="tema_roadmap" class="form-control">{{$item->tema_roadmap}}</textarea>        
                                    </div>
                                </div>

                                   <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label>Nama Mahasiswa</label>
                                            <select name="mhs_id" class="form-control">
                                              @foreach ($mahasiswa as $data)
                                              <option value="{{$data->id_mhs}}">{{$data->nama_mhs}}</option>
                                              @endforeach
                                            </select>          
                                        </div>
                                  </div>
                                  <div class="form-row">
                                        <div class="form-group col-md-5">
                                            <label>Judul Kegiatan</label>
                                            <input type="text" name="judul_kegiatan" class="form-control" value="{{$item->judul_kegiatan}}">            
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Tahun</label>
                                            <input type="year" name="tahun" class="form-control" value="{{$item->tahun}}">            
                                        </div>
                                  </div>          
                       
                                <button type="submit" class="btn btn-primary" onclick="return confirm('apakah data yang dimasukan sudah valid')">Simpan</button>
                                <button type="reset" class="btn btn-primary">Reset Data</button>
                              </form>


                    </div>

                    </div>
                  </div>
                </div>


                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$item->id_penelitiandtps_mhs}}">
                    delete
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModalCenter{{$item->id_penelitiandtps_mhs}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                          <form action="{{ route('Penelitiandtpsmhs.destroy',$item->id_penelitiandtps_mhs) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                             <button type="submit" class="btn btn-primary btn-sm">Hapus Data!</button>
                              </form>
                                            <button type="close" class="btn btn-secondary btn-sm">Close</button>
                                
                          
                        </div>
                      </div>
                    </div>
                  </div>
            </td>
            @endif
         </tr>
            @endforeach

          <tr>
            <td colspan="4" class="text-center"> Jumlah</td>
            <td class="text-center">{{$count}}</td>
            <td colspan="2" bgcolor="#DCDCDC"></td>
        </tr>
        

     </table>
     <br>
     <p>
       Keterangan:<br>
      1) Judul kegiatan yang melibatkan mahasiswa dalam penelitian dosen dapat berupa
      Tugas Akhir, Perancangan, Pengembangan Produk/Jasa, atau kegiatan lain yang 
      relevan.
     </p>

</div>

   
     </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
</div>
    </section>

    
   @stop


