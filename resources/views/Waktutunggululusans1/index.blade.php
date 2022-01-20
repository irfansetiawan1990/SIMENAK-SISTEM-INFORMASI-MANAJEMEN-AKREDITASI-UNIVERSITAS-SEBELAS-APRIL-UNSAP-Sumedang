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
              <li class="breadcrumb-item active">Daya Saing Lulusan</li>
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
          <h3 class="card-title">Waktu Tunggu Lulusan</h3>
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

                <a class="btn btn-primary btn-sm" href="{{route('Waktutunggululusans1.create')}}" role="button">Tambah</a>
      
              @endif  
          </div>
            
<div class="card-body">
  <p>
  Tuliskan data masa tunggu lulusan untuk mendapatkan pekerjaan pertama dalam 3 
  tahun, mulai TS-4 sampai dengan TS-2, dengan mengikuti format Tabel 8.d.1) berikut 
  ini. Data diambil dari hasil studi penelusuran lulusan.
  </p>

  <div class="overflow-auto">
    <table border="1"cellpadding="5" style="width:80%">
        <tr bgcolor="#DCDCDC">
                <td rowspan="2" class="text-center" width="50px">No.</td>
                <td rowspan="2"class="text-center" width="100px">Tahun <br>Lulus</td>
                <td rowspan="2" class="text-center" width="60px">Jumlah<br>Lulusan</td>
                <td rowspan="2" class="text-center" width="40px">Jumlah<br>Lulusan<br>yang terlacak</td>
                <td colspan="3" class="text-center" width="30px">Jumlah lulusan terlacak<br>dengan waktu <br>mendapatkan pekerjaan</td>
                <td rowspan="2" width="150px" class="text-center">Aksi</td>
              </tr>
              <tr bgcolor="#DCDCDC">
                <td class="text-center" class="30px">WT<6bulan</td>
                <td class="text-center" class="30px">6≤WT≤18<br>bulan</td>
                <td class="text-center" class="30px">WT>18bulan</td>
              </tr>
          </tr>
                     
        @foreach ($Waktutunggululusans1 as $item)
          <tr>
                  <td class="text-center">{{++$i}}</td>
                  <td class="text-center">{{$item->tahun_lulus}}</td>
                  <td class="text-center">{{$item->jml_lulusan}}</td>
                  <td class="text-center">{{$item->jml_terlacak}}</td>
                  <td class="text-center">{{$item->wt1}}</td>
                  <td class="text-center">{{$item->wt2}}</td>
                  <td class="text-center">{{$item->wt3}}</td>      
            @if (auth()->user()->level="user")
            <td width="30px">

            <!--modal edit -->  
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit{{ $item->id_tunggu_lulusan}}">Edit</button>
                <div class="modal fade" id="modalEdit{{ $item->id_tunggu_lulusan}}" tabindex="-1" aria-labelledby="modalEdit1" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Edit Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH PS-->                           
                                <form action="{{ route('Waktutunggululusans1.update',$item->id_tunggu_lulusan) }}" method="POST">
                                  @csrf
                                  @method('put')
                                    <div class="form-row">
                                          <div class="form-group col-md-4">
                                              <label>Tahun Lulus</label>
                                              <input type="text" name="tahun_lulus" class="form-control" value="{{$item->tahun_lulus}}" disabled="">        
                                          </div>
                                           <div class="form-group col-md-4">
                                              <label>Jumlah Lulusan</label>
                                              <input type="number" name="jml_lulusan" class="form-control" value="{{$item->jml_lulusan}}">       
                                          </div>
                                          <div class="form-group col-md-4">
                                              <label>Jumlah Lulusan terlacak</label>
                                              <input type="number" name="jml_terlacak" class="form-control" value="{{$item->jml_terlacak}}">       
                                          </div>
                                    </div>
                                    <br>
                                    <label>Jumlah Lulusan Terlacak dengan Waktu Tunggu Mendapatkan Pekerjaan </label>
                                     <div class="form-row">
                                          <div class="form-group col-md-4">
                                              <label>WT < 6bulan</label>
                                              <input type="number" name="wt1" class="form-control" value="{{$item->wt1}}">      
                                          </div>
                                           <div class="form-group col-md-4">
                                              <label>6 ≤ WT ≤ 18 bulan</label>
                                              <input type="number" name="wt2" class="form-control" value="{{$item->wt2}}">       
                                          </div>
                                          <div class="form-group col-md-4">
                                              <label>WT > 18 bulan</label>
                                              <input type="number" name="wt3" class="form-control" value="{{$item->wt3}}">       
                                          </div>
                                    </div>
                         
                                  <button type="submit" class="btn btn-primary" onclick="return confirm('apakah data yang dimasukan sudah valid')">Simpan</button>
                                  <button type="reset" class="btn btn-primary">Reset Data</button>
                                </form>


                    </div>

                    </div>
                  </div>
                </div>


                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$item->id_tunggu_lulusan}}">
                    delete
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModalCenter{{$item->id_tunggu_lulusan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                          <form action="{{ route('Waktutunggululusans1.destroy',$item->id_tunggu_lulusan) }}" method="POST">
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
     </table>



</div>
<br>


   
     </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
</div>
    </section>

    
   @stop


