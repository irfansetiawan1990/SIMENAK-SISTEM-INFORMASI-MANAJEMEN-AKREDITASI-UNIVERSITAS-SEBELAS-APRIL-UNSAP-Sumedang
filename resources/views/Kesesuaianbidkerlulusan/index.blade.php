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
          <h3 class="card-title">Kesesuaian Bidang kerja lulusan</h3>
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

                <a class="btn btn-primary btn-sm" href="{{route('Kesesuaianbidkerlulusan.create')}}" role="button">Tambah</a>
      
              @endif  
          </div>
            
<div class="card-body">
  <p>
  Tuliskan data kesesuaian bidang kerja lulusan saat mendapatkan pekerjaan pertama
  dalam 3 tahun, mulai TS-4 sampai dengan TS-2, dengan mengikuti format Tabel 
  8.d.2) berikut ini. Data diambil dari hasil studi penelusuran lulusan.
  </p>

  <div class="overflow-auto">
    <table border="1"cellpadding="5" style="width:60%">
        <tr bgcolor="#DCDCDC">
                <td rowspan="2" class="text-center" width="50px">No.</td>
                <td rowspan="2"class="text-center" width="100px">Tahun <br>Lulus</td>
                <td rowspan="2" class="text-center" width="60px">Jumlah<br>Lulusan</td>
                <td rowspan="2" class="text-center" width="60px">Jumlah<br>Lulusan<br>yang terlacak</td>
                <td colspan="3" class="text-center">Jumlah lulusan terlacak<br>dengan waktu <br>mendapatkan pekerjaan</td>
                <td rowspan="2" width="110px" class="text-center">Aksi</td>
              </tr>
              <tr bgcolor="#DCDCDC">
                <td class="text-center" class="30px">Rendah (1)</td>
                <td class="text-center" class="30px">Sedang (2)</td>
                <td class="text-center" class="30px">Tinggi (3)</td>
              </tr>
          </tr>
                     
        @foreach ($Kesesuaianbidkerlulusan as $item)
          <tr>
                  <td class="text-center">{{++$i}}</td>
                  <td class="text-center">{{$item->tahun_lulus}}</td>
                  <td class="text-center">{{$item->jml_lulusan}}</td>
                  <td class="text-center">{{$item->jml_terlacak}}</td>
                  <td class="text-center">{{$item->rendah}}</td>
                  <td class="text-center">{{$item->sedang}}</td>
                  <td class="text-center">{{$item->tinggi}}</td>      
            @if (auth()->user()->level="user")
            <td width="30px">

            <!--modal edit -->  
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit{{ $item->id_kbjl}}">Edit</button>
                <div class="modal fade" id="modalEdit{{ $item->id_kbjl}}" tabindex="-1" aria-labelledby="modalEdit1" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Edit Kesesuaian bidang kerja lulusan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH PS-->                           
                                <form action="{{ route('Kesesuaianbidkerlulusan.update',$item->id_kbjl) }}" method="POST">
                                  @csrf
                                  @method('put')
                                    <div class="form-row">
                                          <div class="form-group col-md-4">
                                              <label>Tahun Lulus</label>
                                              <input type="text" name="tahun_lulus" class="form-control" value="{{$item->tahun_lulus}}" disabled>       
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
                                    <label>Jumlah Lulusan Terlacak Tingkat Kesesuaian Bidang kerja </label>
                                     <div class="form-row">
                                          <div class="form-group col-md-4">
                                              <label>Rendah</label>
                                              <input type="number" name="rendah" class="form-control" value="{{$item->rendah}}">      
                                          </div>
                                           <div class="form-group col-md-4">
                                              <label>Sedang</label>
                                              <input type="number" name="sedang" class="form-control" value="{{$item->sedang}}">       
                                          </div>
                                          <div class="form-group col-md-4">
                                              <label>Tinggi</label>
                                              <input type="number" name="tinggi" class="form-control" value="{{$item->tinggi}}">       
                                          </div>
                                    </div>
                         
                                  <button type="submit" class="btn btn-primary" onclick="return confirm('apakah data yang dimasukan sudah valid')">Simpan</button>
                                  <button type="reset" class="btn btn-primary">Reset Data</button>
                                </form>


                    </div>

                    </div>
                  </div>
                </div>


                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$item->id_kbjl}}">
                    delete
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModalCenter{{$item->id_kbjl}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                          <form action="{{ route('Kesesuaianbidkerlulusan.destroy',$item->id_kbjl) }}" method="POST">
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
<p>Keterangan:<br>
1) Jenis pekerjaan/posisi jabatan dalam pekerjaan tidak sesuai atau kurang sesuai 
dengan profil lulusan yang direncanakan dalam dokumen kurikulum.<br>
2) Jenis pekerjaan/posisi jabatan dalam pekerjaan cukup sesuai dengan profil lulusan 
yang direncanakan dalam dokumen kurikulum.<br>
3) Jenis pekerjaan/posisi jabatan dalam pekerjaan sesuai atau sangat sesuai dengan 
profil lulusan yang direncanakan dalam dokumen kurikulum.<br>
</p>

   
     </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
</div>
    </section>

    
   @stop


