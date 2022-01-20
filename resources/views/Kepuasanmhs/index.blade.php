@extends('adminlte::page')
@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Standar 6</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Kepuasan Mahasiswa</li>
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
          <h3 class="card-title">Kepuasan Mahasiswa</h3>
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

         

                <a class="btn btn-primary btn-sm" href="{{route('Kepuasanmhs.create')}}" role="button">Tambah</a>
  
            </div>
      


<div class="card-body">
  <div class="overflow-auto">
    <table border="1"cellpadding="5" style="width:100%">
        <tr bgcolor=" #DCDCDC">
                  <td rowspan="2" class="text-center" width="20px">No.</td>
                  <td rowspan="2" class="text-center" width="400px">Aspek yang diukur</td>
                  <td colspan="4" class="text-center">Tingkat Kepuasan Mahasiswa</td>
                  <td rowspan="2" class="text-center" width="300px">Rencana Tindak Lanjut UPPS</td>
                  <td rowspan="2" class="text-center" width="100px">Aksi</td>
                </tr>
                <tr bgcolor="#DCDCDC">
                  <td class="text-center" width="50px">Sangat Baik</td>
                  <td class="text-center" width="50px">Baik</td>
                  <td class="text-center" width="50px">Cukup</td>
                  <td class="text-center" width="50px">Kurang</td>
                </tr>
        
        @foreach ($kepuasanmhs as $item)
              <tr>
                <tr>
                  <td class="text-center">{{++$i}}</td>
                  <td align="justify">{{$item->aspek_yg_diukur}}</td>
                  <td class="text-center">{{$item->sangat_baik}}</td>
                  <td class="text-center">{{$item->baik}}</td>
                  <td class="text-center">{{$item->cukup}}</td>
                  <td class="text-center">{{$item->kurang}}</td>
                  <td>{{$item->rencana_tindak_lanjut}}</td>
     
               
            @if (auth()->user()->level="user")
            <td width="30px" class="text-center">

            <!--modal edit -->

              
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit{{ $item->id_kepuasanmhs }}">Edit</button>
                <div class="modal fade" id="modalEdit{{ $item->id_kepuasanmhs}}" tabindex="-1" aria-labelledby="modalEdit1" aria-hidden="true">
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
                             <form action="{{ route('Kepuasanmhs.update', $item->id_kepuasanmhs) }}" method="POST">
                              @csrf
                              @method('put')


                                <label>Tingkat Kepuasan Mahasiswa</label>
                                <div class="form-row">
                                  <div class="form-group col-md-3">
                                      <label>Sangat Baik</label>
                                      <input type="number" name="sangat_baik" class="form-control" value="{{$item->sangat_baik}}">          
                                  </div>  
                                  <div class="form-group col-md-3">
                                      <label>Baik</label>
                                      <input type="number" name="baik" class="form-control" value="{{$item->baik}}">            
                                  </div>
                                  <div class="form-group col-md-3">
                                      <label>Cukup</label>
                                      <input type="number" name="cukup" class="form-control" value="{{$item->cukup}}">            
                                  </div>
                                  <div class="form-group col-md-3">
                                      <label>Kurang</label>
                                      <input type="number" name="kurang" class="form-control" value="{{$item->kurang}}">            
                                  </div>
                                </div>

                                  <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Rencana Tindak Lanjut oleh UPPS/PS</label>
                                          <textarea class="form-control" name="rencana_tindak_lanjut">{{$item->rencana_tindak_lanjut}}</textarea>
                                       </div>
                                  </div>
                               

                              <button type="submit" class="btn btn-primary" onclick="return confirm('apakah data yang dimasukan sudah valid')">Simpan</button>
                              <button type="reset" class="btn btn-primary">Reset Data</button>
                            </form>


                    </div>

                    </div>
                  </div>
                </div>


                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$item->id_kepuasanmhs}}">
                    delete
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModalCenter{{$item->id_kepuasanmhs}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                          <form action="{{ route('Pkmpembelajaran.destroy',$item->id_kepuasanmhs) }}" method="POST">
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

            @elseif (auth()->user()->level="admin")
                     <!--modal edit -->
            <td>{{$item->nama_prodi}}</td>

            @endif
            @endforeach
            <tr>
              <td colspan="2" class="text-center">Jumlah</td>
              <td class="text-center">{{$total_sb}}</td>
              <td class="text-center">{{$total_b}}</td>
              <td class="text-center">{{$total_c}}</td>
              <td class="text-center">{{$total_k}}</td>
              <td colspan="2" bgcolor="#ababb3"></td>
            </tr>
         
    
        </tr>
        

     </table>

</div>

   
     </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
</div>
    </section>

    
   @stop


