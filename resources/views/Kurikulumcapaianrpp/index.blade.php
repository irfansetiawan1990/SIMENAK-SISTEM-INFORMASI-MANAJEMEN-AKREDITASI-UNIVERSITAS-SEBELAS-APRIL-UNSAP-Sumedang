@extends('adminlte::page')
@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tabel 5.a</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Kurikulum, Capaian Pembelajaran, dan Rencana Pembelajaran</li>
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
          <h3 class="card-title">Tabel 5.a Kurikulum, Capaian Pembelajaran, dan Rencana Pembelajaran </h3>
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

           

                <a class="btn btn-primary btn-sm" href="{{route('Kurikulumcapaianrpp.create')}}" role="button">Tambah</a>
      
        
            </div>
      


<div class="card-body">
  <div class="overflow-auto">
    <table border="1"cellpadding="5" style="width:140%">
        <tr bgcolor=" #DCDCDC">
                  <td rowspan="2"  class="text-center">No.</td>
                  <td rowspan="2"  class="text-center" >Semester</td>
                  <td rowspan="2"  class="text-center" width="100px">Kode Mata Kuliah</td>
                  <td rowspan="2"  class="text-center" width="300px">Nama Mata Kuliah</td>
                  <td rowspan="2"  class="text-center" width="10px">Mata Kuliah Kompetensi</td>
                  <td colspan="3"  class="text-center">Bobot Kredit (SKS)</td>
                  <td rowspan="2"  class="text-center">Konversi <br>Kredit<br> Per jam</td>
                  <td colspan="4"  class="text-center">Capaian<br> Pembelajaran</td>
                  <td rowspan="2"  class="text-center">Dokumen<br> Rencana Pembelajaran</td>
                  <td rowspan="2"  class="text-center">Unit<br>Penyelenggara</td>
                  <td rowspan="2"  class="text-center" width="50px">Aksi</td>
              </tr>
              <tr bgcolor=" #DCDCDC">

                <td class="text-center">Kuliah/<br>respons/<br>tutorial</td>
                <td class="text-center">Seminar</td>
                <td class="text-center">Praktikum/<br>Praktik/<br>Praktik Lapangan</td>

                <td class="text-center" width="200px">Sikap</td>
                <td class="text-center">Pengetahuan</td>
                <td class="text-center">Keterampilan<br>Umum</td>
                <td class="text-center">Keterampilan<br>Khusus</td>
              </tr>
        
        @foreach ($Kurikulumcapaianrpp as $item)
              <tr>
                <td class="text-center">{{++$i}}</td>
                <td class="text-center" >{{$item->semester}}</td>
                <td width="100px">{{$item->kode_matkul}}</td>
                <td width="300px">{{$item->nama_matkul}}</td>
                <td class="text-center" width="10px">{{$item->matkul_komp}}</td>
                <td class="text-center">{{$item->kuliah_responsi_tutor}}</td>
                <td class="text-center">{{$item->seminar}}</td>
                <td class="text-center">{{$item->praktik}}</td>
                <td class="text-center">{{$item->konversi}}</td>              
                <td class="text-center" width="200px">{{$item->cpl_sikap}}</td>
                <td class="text-center">{{$item->cpl_pengetahuan}}</td>
                <td class="text-center">{{$item->cpl_keterampilan_umum}}</td>
                <td class="text-center">{{$item->cpl_keterampilan_khusus}}</td>
                <td class="text-center">{{$item->dokumen_rencana_pembelajaran}}</td>
                <td>{{$item->unit_penyelenggara}}</td>
                
         
            <td width="50px">

            <!--modal edit -->

              
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit{{ $item->id_kurikulum_capaian_rpp }}">Edit</button>
                <div class="modal fade" id="modalEdit{{ $item->id_kurikulum_capaian_rpp}}" tabindex="-1" aria-labelledby="modalEdit1" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Edit Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH PS-->
            
                            <form action="{{ route('Kurikulumcapaianrpp.update',$item->id_kurikulum_capaian_rpp)}}" method="POST">
                            @csrf
                            @method('PUT') 
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label for="matakuliah">Mata Kuliah</label>
                                          <select name="matkul_id"  class="form-control">
                                            <option selected disabled="">{{$item->nama_matkul}}</option>
                                          </select>
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="Matkuul komp">Mata Kuliah Kompetensi (1)</label>
                                          <select name="matkul_komp" id="inputState" class="form-control">
                                          <option selected>--</option>
                                          <option value="V">Ya, termasuk dalam mata kuliah kompetensi program studi.</option>
                                          <option value="">Tidak termasuk dalam mata kuliah kompetensi program studi.</option>
                                        </select>
                                      </div>
                                    </div>
                                    <hr>
                                    <br>
                                    <label>Bobot Kredit (SKS)</label>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                          <label>Kuliah/Responsi/Tutor</label>
                                          <input type="number" class="form-control" name="kuliah_responsi_tutor" value="{{$item->kuliah_responsi_tutor}}">
                                        </div>
                                        <div class="form-group col-md-4">
                                          <label>Seminar</label>
                                          <input type="number" class="form-control" name="seminar" value="{{$item->seminar}}">
                                        </div>
                                        <div class="form-group col-md-4">
                                          <label>Praktikum/Praktik/Praktik Lapangan</label>
                                          <input type="number" class="form-control" name="praktik" value="{{$item->praktik}}">
                                        </div>
                                         <div class="form-group col-md-4">
                                          <label>Konversi Kredit ke Jam (2)</label>
                                          <input type="number" class="form-control" name="konversi" value="{{$item->konversi}}">
                                        </div>
                                    </div>
                                        
                                    <br>
                                    <label>Capaian Pembelajaran (3)</label>
                                     <div class="form-row">
                                        <div class="form-group col-md-2">
                                          <label>Sikap</label>
                                          <input type="checkbox" class="checkbox col-md-2" name="cpl_sikap" value="V">
                                        </div>
                                        <div class="form-group col-md-2">
                                          <label>Pengetahuan</label>
                                          <input type="checkbox" class="checkbox col-md-2" name="cpl_pengetahuan" value="V">
                                        </div>
                                        <div class="form-group col-md-3">
                                          <label>Keterampilan Umum</label>
                                          <input type="checkbox" class="checkbox col-md-2" name="cpl_keterampilan_umum" value="V">
                                        </div><div class="form-group col-md-3">
                                          <label>Keterampilan Khusus</label>
                                          <input type="checkbox" class="checkbox col-md-2" name="cpl_keterampilan_khusus" value="V">
                                        </div>             
                                    </div>
                                    <br>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label>Dokumen Rencana Pembelajaran (4)</label>
                                          <input type="text" class="form-control" name="dokumen_rencana_pembelajaran" value="{{$item->dokumen_rencana_pembelajaran}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label>Unit Penyelenggara</label>
                                          <input type="text" class="form-control" name="unit_penyelenggara" value="{{$item->unit_penyelenggara}}">

                                        </div>
                                    </div>
                             

                          <button type="submit" class="btn btn-primary">Simpan Data</button>
                          </form>
                    <!--END FORM TAMBAH BARANG-->
                    </div>

                    </div>
                  </div>
                </div>

                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$item->id_kurikulum_capaian_rpp}}">
                    delete
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModalCenter{{$item->id_kurikulum_capaian_rpp}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                          <form action="{{ route('Kurikulumcapaianrpp.destroy',$item->id_kurikulum_capaian_rpp) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                             <button type="submit" class="btn btn-primary btn-sm">Hapus Data!</button>
                              </form>
                                            <button type="button" class="btn btn-secondary btn-sm">Close</button>
                                
                          
                        </div>
                      </div>
                    </div>
                  </div>
            </td>

        @endforeach
         
    
        </tr>
     
        <tr>
          <td colspan="4" class="text-center">Jumlah</td>
          <td class="text-center">{{$total_matkomp}}</td>
          <td class="text-center">{{$total_kul}}</td>
          <td class="text-center">{{$total_seminar}}</td>
          <td class="text-center">{{$total_praktik}}</td>
          <td class="text-center">{{$total_konversi}}</td>
          <td colspan="7" bgcolor="#ababb3"></td>
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


