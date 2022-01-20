@extends('adminlte::page')
@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Program Studi di UPPS
</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Daftar Program Studi di UPPS
</li>
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
          <h3 class="card-title">Daftar Program Studi di UPPS
</h3>
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
                <a class="btn btn-primary btn-sm" href="{{route('Daftarpsunipengelolaprodi.create')}}" role="button">Tambah</a>
        </div>
      


<div class="card-body">
  <div class="overflow-auto">
    <table border="1"cellpadding="5" style="width:90%">
        <tr bgcolor="#DCDCDC">
            <td rowspan="2" class="text-center" width="10px">No.</td>
            <td rowspan="2"class="text-center" width="150px">Jenis Program</td>
            <td rowspan="2"class="text-center" width="200px">Nama <br> Program Studi</td>
            <td colspan="3" class="text-center" width="50px">Akreditasi Program Studi</td>
            <td rowspan="2"class="text-center">Jumlah <br>Mahasiswa<br>Saat TS</td>
            <td rowspan="2"class="text-center">Action</td>
          </tr>
          <tr bgcolor="#DCDCDC">
            <td class="text-center">Status/<br>Peringkat</td>
            <td class="text-center">No. dan<br>Tgl.SK</td>
            <td class="text-center">Tgl.<br>Kadaluarsa</td>
          </tr>                   
        @foreach ($Daftarpsunipengelolaprodi as $item)
          <tr>
                  <td class="text-center">{{++$i}}</td>
                  <td >{{$item->jenis_program}}</td>
                  <td class="text-center">{{$item->nama_prodi}}</td>
                  <td class="text-center">{{$item->status}}</td>
                  <td class="text-center">{{$item->no_tgl_sk}}</td>
                  <td class="text-center">{{$item->tgl_kadaluarsa}}</td>
                  <td class="text-center">{{$item->jml_mhs_saat_ts}}</td>
            <td width="30px">

            <!--modal edit -->  
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit{{ $item->id_upps}}">Edit</button>
                <div class="modal fade" id="modalEdit{{ $item->id_upps}}" tabindex="-1" aria-labelledby="modalEdit1" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Edit Daftar Program Studi di UPPS</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH PS-->                           
                                 <form action="{{ route('Daftarpsunipengelolaprodi.update',$item->id_upps) }}" method="POST">
                                @csrf
                                @method('put')
                                    <div class="form-row">
                                          <div class="form-group col-md-3">
                                              <label>Jenis Program</label>
                                              <input type="text" name="jenis_program" class="form-control" value="{{$item->jenis_program}}">        
                                          </div>
                                           <div class="form-group col-md-7">
                                              <label>Nama Program Studi</label>
                                              <select name="prodi_id" class="form-control" disabled="">
                                                <option>{{$item->nama_prodi}}</option>
                                              </select>
                                          </div>
                                    </div>
                                    <!--row 1-->

                                      <br>
                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <h5>Akreditasi Program Studi</h5>
                                        </div>
                                      </div>
                         
                                      <div class="form-row">
                                          <div class="form-group col-md-2">
                                              <label>Status dan Peringkat</label>
                                              <input type="text" name="status" class="form-control" value="{{$item->status}}">          
                                          </div>
                                           <div class="form-group col-md-4">
                                              <label>No.Dan tanggal SK</label>
                                              <input type="text" name="no_tgl_sk" class="form-control" value="{{$item->no_tgl_sk}}">
                                          </div>
                                          <div class="form-group col-md-4">
                                              <label>Tanggal Kadaluarsa</label>
                                              <input type="date" name="tgl_kadaluarsa" class="form-control" value="{{$item->tgl_kadaluarsa}}">
                                          </div>
                                          

                                           <div class="form-group col-md-4">
                                              <label>Jumlah Mahasiswa Saat TS</label>
                                              <input type="text" name="jml_mhs_saat_ts" class="form-control" value="{{$item->jml_mhs_saat_ts}}">      
                                          </div>
                                      </div>        
                                  <button type="submit" class="btn btn-primary" onclick="return confirm('apakah data yang dimasukan sudah valid')">Simpan</button>
                                  <button type="reset" class="btn btn-primary">Reset Data</button>
                                </form>


                    </div>

                    </div>
                  </div>
                </div>


                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$item->id_upps}}">
                    delete
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModalCenter{{$item->id_upps}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                          <form action="{{ route('Daftarpsunipengelolaprodi.destroy',$item->id_upps) }}" method="POST">
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

         </tr>
            @endforeach
          <tr>
            <td colspan="2" class="text-center">Jumlah</td>
            <td class="text-center">{{$jml_prodi}}</td>
            <td bgcolor="#DCDCDC"></td>
            <td bgcolor="#DCDCDC"></td>
            <td bgcolor="#DCDCDC"></td>
            <td class="text-center">{{$jml_ts}}</td>
            <td></td>
          </tr>

     </table>



</div>
<br>
<p>Keterangan:<br>
1) Lampirkan salinan Surat Keputusan Pendirian Perguruan Tinggi.<br>
2) Lampirkan salinan Surat Keputusan Pembukaan Program Studi.<br>
3) Lampirkan salinan Surat Keputusan Akreditasi Program Studi terbaru.<br>
4) Diisi dengan jumlah mahasiswa aktif di masing-masing PS saat TS/p><br>
   
     </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
</div>
    </section>

    
   @stop


