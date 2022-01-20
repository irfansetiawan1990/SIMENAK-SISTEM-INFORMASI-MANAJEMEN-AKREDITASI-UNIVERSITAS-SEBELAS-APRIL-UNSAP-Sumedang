@extends('adminlte::page')
@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Integrasi Kegiatan Penelitian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">PKM Dalam Pembelajaran</li>
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
          <h3 class="card-title">PKM Dalam Pembelajaran </h3>
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

 

                <a class="btn btn-primary btn-sm" href="{{route('Pkmpembelajaran.create')}}" role="button">Tambah</a>
      
     
            </div>
      


<div class="card-body">
  <div class="overflow-auto">
    <table border="1"cellpadding="5" style="width:100%">
        <tr bgcolor=" #DCDCDC">
                <td class="text-center" width="10px">No.</td>
                <td class="text-center" width="100px">Judul <br> Penelitian/PkM</td>
                 <td class="text-center" width="100px">Nama Dosen</td>
                 <td class="text-center" width="100px">Mata Kuliah</td>

                <td class="text-center" width="100px">Bentuk Integrasi</td>
                <td class="text-center">Aksi</td>
              </tr>
        
        @foreach ($Pkmpembelajaran as $item)
              <tr>
                <td class="text-center">{{++$i}}</td>
                <td  >{{$item->judul_pkm}}</td>
                <td >{{$item->nama_dosen}}</td>
                <td >{{$item->nama_matkul}}</td>
                <td >{{$item->bentuk_integrasi}}</td>

               
            @if (auth()->user()->level="user")
            <td width="30px" class="text-center">

            <!--modal edit -->

              
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit{{ $item->id_pkm_pembelajaran }}">Edit</button>
                <div class="modal fade" id="modalEdit{{ $item->id_pkm_pembelajaran}}" tabindex="-1" aria-labelledby="modalEdit1" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Edit Data PkM Pembelajaran</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH PS-->                           
                              <form action="{{ route('Pkmpembelajaran.update', $item->id_pkm_pembelajaran) }}" method="POST">
                                  @csrf
                                  @method('put')
                                  <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label>Judul Penelitian/ PKM (1)</label>
                                        <textarea class="form-control" name="judul_pkm">{{$item->judul_pkm}}</textarea> 
                                      </div>
                                  </div>
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                          <label for="nama_dosen">Nama Dosen</label>
                                           <select name="nama_dosen_id" class="form-control" disabled="">
                                            <option>{{$item->nama_dosen}}</option>
                                           </select>
                                      </div>       
                                    <div class="form-group col-md-6">
                                        <label for="mata_kuliah">Mata Kuliah</label>
                                        <select name="mata_kuliah_id" class="form-control" id="mata_kuliah"> 
                                          @foreach ($matkul as $data2)
                                          <option value="{{$data2->id}}" id="mata_kuliah">{{$data2->nama_matkul}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                  </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Bentuk Integrasi (2)</label>
                                              <textarea class="form-control" name="bentuk_integrasi">{{$item->bentuk_integrasi}}</textarea>
                                              <input type="hidden"  name="prodi_id" value="{{$id}}">
                                           </div>
                                      </div>
                                   

                                  <button type="submit" class="btn btn-primary" onclick="return confirm('apakah data yang dimasukan sudah valid')">Simpan</button>
                                  <button type="reset" class="btn btn-primary">Reset Data</button>
                                </form>

                    </div>

                    </div>
                  </div>
                </div>


                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$item->id_pkm_pembelajaran}}">
                    delete
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModalCenter{{$item->id_pkm_pembelajaran}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                          <form action="{{ route('Pkmpembelajaran.destroy',$item->id_pkm_pembelajaran) }}" method="POST">
                                            @csrf
                                   a         @method('DELETE')
                                             <button type="submit" class="btn btn-primary btn-sm">Hapus Data!</button>
                              </form>
                                            <button type="button" class="btn btn-secondary btn-sm">Close</button>
                                
                          
                        </div>
                      </div>
                    </div>
                  </div>
            </td>

            @elseif (auth()->user()->level="admin")
                     <!--modal edit -->
            <td>{{$item->nama_prodi}}</td>

            @endif
         
    
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


