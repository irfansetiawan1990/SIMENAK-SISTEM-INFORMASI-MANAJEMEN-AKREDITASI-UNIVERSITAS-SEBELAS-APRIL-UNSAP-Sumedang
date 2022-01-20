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
              <li class="breadcrumb-item active">Capaian Pembelajaran</li>
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
          <h3 class="card-title">IPK LULUSAN</h3>
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

                <a class="btn btn-primary btn-sm" href="{{route('Ipklulusan.create')}}" role="button">Tambah</a>
      
              @endif  
            </div>
      


<div class="card-body">
  <p>
  Tuliskan data Indeks Prestasi Kumulatif (IPK) lulusan dalam 3 tahun terakhir dengan 
  mengikuti format Tabel 8.a berikut ini. Data dilengkapi dengan jumlah lulusan pada 
  setiap tahun kelulusan.
  </p>
  <div class="overflow-auto">
    <table border="1"cellpadding="5" style="width:70%">
        <tr bgcolor="#DCDCDC">
          <td rowspan="2" class="text-center" width="10px">No</td>
          <td rowspan="2" class="text-center" width="50px">Tahun Lulus</td>
            <td rowspan="2" class="text-center" width="60px">Jumlah Lulusan</td>
            <td colspan="3" class="text-center">Indeks Prestasi Kumulatif</td>
            <td rowspan="2" class="text-center">Aksi</td>
          </tr>
          <tr bgcolor="#DCDCDC">
            <td class="text-center" width="50px">Min</td>
            <td class="text-center" width="50px">Rata-rata</td>
            <td class="text-center" width="50px">Maks</td>
          </tr>
                     
        @foreach ($Ipklulusan as $item)
          <tr>
                  <td class="text-center">{{++$i}}</td>
                  <td class="text-center">{{$item->tahun_lulus}}</td>
                  <td class="text-center">{{$item->jml_lulusan}}</td>
                  <td class="text-center">{{$item->minimal}}</td>
                  <td class="text-center">{{$item->rata_rata}}</td>
                  <td class="text-center">{{$item->maks}}</td>
               
            @if (auth()->user()->level="user")
            <td width="30px">

            <!--modal edit -->  
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit{{ $item->id_ipk_lulusan }}">Edit</button>
                <div class="modal fade" id="modalEdit{{ $item->id_ipk_lulusan}}" tabindex="-1" aria-labelledby="modalEdit1" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Edit Data IPK Lulusan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH PS-->                           
                              <form action="{{ route('Ipklulusan.update',$item->id_ipk_lulusan) }}" method="POST">
                              @csrf
                              @method('put')
                                  <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label>Tahun Lulusan</label>
                                        <input type="year" name="tahun_lulus" class="form-control" value="{{$item->tahun_lulus}}">         
                                    </div>
                                   <div class="form-group col-md-3">
                                          <label>Jumlah Lulusan</label>
                                          <input type="number" name="jml_lulusan" class="form-control" value="{{$item->jml_lulusan}}">      
                                    </div>
                                </div>

                                <br>
                                <div class="form-row">
                                  <div class="form-group col-md-4">
                                    <label>INDEKS PRESTASI KOMULATIF (IPK)</label>
                                  </div>
                                </div>

                                 <div class="form-row">
                                      <div class="form-group col-md-2">
                                          <label>Min</label>
                                          <input type="double" lang="en-150" name="minimal" class="form-control" value="{{$item->minimal}}">                          
                                      </div>
                                      <div class="form-group col-md-2">
                                          <label>Rata-Rata</label>
                                          <input type="double" lang="en-150" name="rata_rata" class="form-control" value="{{$item->rata_rata}}">                          
                                      </div>
                                      <div class="form-group col-md-2">
                                          <label>Max</label>
                                          <input type="double" lang="en-150" name="maks" class="form-control" value="{{$item->maks}}">                              
                                      </div>
                                </div>
                                   
                     
                              <button type="submit" class="btn btn-primary" onclick="return confirm('apakah data yang dimasukan sudah valid')">Simpan</button>
                              <button type="reset" class="btn btn-primary">Reset Data</button>

                              </form>


                    </div>

                    </div>
                  </div>
                </div>


                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$item->id_ipk_lulusan}}">
                    delete
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModalCenter{{$item->id_ipk_lulusan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                          <form action="{{ route('Ipklulusan.destroy',$item->id_ipk_lulusan) }}" method="POST">
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

     </table>

</div>
   
     </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
</div>
    </section>

    
   @stop


