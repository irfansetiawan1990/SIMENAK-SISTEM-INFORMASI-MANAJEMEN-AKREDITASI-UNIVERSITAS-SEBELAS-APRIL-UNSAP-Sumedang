@extends('adminlte::page')

@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pengakuan Rekognisi Dosen</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Pengakuan Rekognisi Dosen</li>
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
          <h3 class="card-title">Pengakuan Rekognisi Dosen</h3>
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
                  @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                          <p>{{ $message }}</p>
                         </div>
                      @endif

                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <strong>Whoops!</strong> Ada Masalah di inputan anda<br><br>
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif

               

 

  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit">Tambah</button>
 
    <BR>
    <br>
    Tuliskan pengakuan/rekognisi atas kepakaran/prestasi/kinerja DTPS yang diterima dalam 3 tahun terakhir dengan mengikuti format Tabel 3.b.1) berikut ini. 
 
   <!-- Tombol untuk menampilkan modal-->      
            <!-- Modal -->            
            <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEdit" aria-hidden="true">
                 <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Tambah Data Pengakuan Rekognisi Dosen</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH PS-->
                          <form action="{{ route('Pengakuanrekognisi.store') }}" method="POST">
                            @csrf
                                  <div class="form-group">
                                    <label for="">Nama Dosen</label>
                                    <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" aria-describedby="emailHelp">
                                  </div>
                                  <div class="form-group">
                                    <label for="">Bidang Keahlian</label>
                                    <input type="text" class="form-control" id="bidang_keahlian" name="bidang_keahlian" aria-describedby="emailHelp">
                                  </div>
                                  <div class="form-group">
                                    <label for="">Rekognisi dan Bukti Pendukung</label>
                                    <input type="text" class="form-control" id="rekognisi_bukti" name="rekognisi_bukti" aria-describedby="emailHelp">
                                  </div>

                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox"  id="wilayah" name="wilayah"  value="V">
                                     <label class="form-check-label">Wilayah</label>
                                  </div>                                 
                                  <div class="form-check">
                                  
                                    <input class="form-check-input" type="checkbox"  id="wilayah" id="nasional" name="nasional" value="V">
                                    <label class="form-check-label">Nasional</label>
                                  </div>
                                  <div class="form-check">
                                    
                                    <input class="form-check-input" type="checkbox"  id="wilayah" name="internasional" aria-describedby="emailHelp" value="V">
                                      <label class="form-check-label">Internasional</label>
                                  </div>

                                  <div class="form-group">
                                    <label for="">Tahun</label>
                                    <input type="number" class="form-control" id="tahun" name="tahun" aria-describedby="emailHelp">
                                  </div>
                                  <div class="form-group">
                                    <input type="hidden" class="form-control" id="prodi_id" name="prodi_id" aria-describedby="emailHelp" value="{{$id}}">
                                  </div>                             
                          <button type="submit" class="btn btn-primary">Simpan Data</button>
                          </form>
                    <!--END FORM TAMBAH BARANG-->
                    </div>
                    </div>
                  </div>
              
                </div> 
            
        </div>
     
       <!-- Tombol untuk menampilkan modal-->

    

<div class="card-body">
  <div style="overflow-x:auto;">
  <table border="2"cellpadding="5" style="width:100%">
     <tr>
      <td class="text-center" rowspan="2" width="10px">No</td>
      <td class="text-center"rowspan="2" width="200px">Nama Dosen</td>
      <td class="text-center"rowspan="2" width="200px">Bidang Keahlian</td>
      <td class="text-center"rowspan="2" width="200px">Rekognisi dan Bukti Pendukung <br>1)</td>
      <td class="text-center"colspan="3" width="100px">Tingkat <br>2)</td>
      <td class="text-center"rowspan="2" width="30px">Tahun</td>
      <td class="text-center"rowspan="2" width="30px">Aksi</td>
    </tr>
    <tr>
      <td class="text-center"width="10px">Wilayah</td>
      <td class="text-center"width="10px">Nasional</td>
      <td class="text-center"width="10px">Internasional</td>
    </tr>

    <tr>
      @foreach ($Pengakuanrekognisi as $item)
      <td class="text-center">{{++$i}}</td>
      <td>{{$item->nama_dosen}}</td>
      <td>{{$item->bidang_keahlian}}</td>
      <td>{{$item->rekognisi_bukti}}</td>
      <td class="text-center">{{$item->wilayah}}</td>
      <td class="text-center">{{$item->nasional}}</td>
      <td class="text-center" width="10px">{{$item->internasional}}</td>
      <td class="text-center">{{$item->tahun}}</td>
      <td>
        


         <!-- Tombol untuk menampilkan modal-->
       
    

              <!--modal edit -->
              
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit{{ $item->id_rekognisi}}">Edit</button>
                <div class="modal fade" id="modalEdit{{ $item->id_rekognisi }}" tabindex="-1" aria-labelledby="modalEdit1" aria-hidden="true">
                           <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Edit Data Kerjasama </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH PS-->
            
                                        <form action="{{ route('Pengakuanrekognisi.update',$item->id_rekognisi) }}" method="POST">
                            @csrf
                            @method('put')
                                  <div class="form-group">
                                    <label for="">Nama Dosen</label>
                                    <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" aria-describedby="emailHelp" value="{{$item->nama_dosen}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="">Bidang Keahlian</label>
                                    <input type="text" class="form-control" id="bidang_keahlian" name="bidang_keahlian" aria-describedby="emailHelp" value="{{$item->bidang_keahlian}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="">Rekognisi dan Bukti Pendukung</label>
                                    <input type="text" class="form-control" id="rekognisi_bukti" name="rekognisi_bukti" aria-describedby="emailHelp" value="{{$item->rekognisi_bukti}}">
                                  </div>

                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox"  id="wilayah" name="wilayah"  value="V">
                                     <label class="form-check-label">Wilayah</label>
                                  </div>                                 
                                  <div class="form-check">
                                  
                                    <input class="form-check-input" type="checkbox"  id="wilayah" id="nasional" name="nasional" value="V">
                                    <label class="form-check-label">Nasional</label>
                                  </div>
                                  <div class="form-check">
                                    
                                    <input class="form-check-input" type="checkbox"  id="wilayah" name="internasional" aria-describedby="emailHelp" value="V">
                                      <label class="form-check-label">Internasional</label>
                                  </div>

                                  <div class="form-group">
                                    <label for="">Tahun</label>
                                    <input type="number" class="form-control" id="tahun" name="tahun" aria-describedby="emailHelp" value="{{$item->tahun}}">
                                  </div>
                                  <div class="form-group">
                                    <input type="hidden" class="form-control" id="prodi_id" name="prodi_id" aria-describedby="emailHelp" value="{{$id}}">
                                  </div>                             
                          <button type="submit" class="btn btn-primary">Simpan Data</button>
                          </form>
                    <!--END FORM TAMBAH BARANG-->
                    </div>

                    </div>
                  </div>
                </div>

                    

                    <form action="{{ route('Pengakuanrekognisi.destroy',$item->id_rekognisi) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>

   
      </td>
    </tr>
     @endforeach
    <tr>
      <td class="text-center"colspan="4" class="text-center">Jumlah</td>
      <td class="text-center">{{$t_wilayah}}</td>
      <td class="text-center">{{$t_nasional}}</td>
      <td class="text-center">{{$t_internasional}}</td>
      <td class="text-center"colspan="2"></td>
    </tr>
        







    </tr>



    </table>
        
</div>


    Keterangan:  
    <br>
    1) Pengakuan atau rekognisi atas kepakaran/prestasi/kinerja dapat berupa:
    <br>
     a) menjadi visiting lecturer atau visiting scholar di program studi/perguruan tinggi terakreditasi A/Unggul atau program studi/perguruan tinggi internasional bereputasi.  
     <br>
     b) menjadi keynote speaker/invited speaker pada pertemuan ilmiah tingkat nasional/ internasional.  
     <br>
     c) menjadi editor atau mitra bestari pada jurnal nasional terakreditasi/jurnal internasional bereputasi di bidang yang sesuai dengan bidang program studi. 
     <br> d) menjadi staf ahli/narasumber di lembaga tingkat wilayah/nasional/internasional pada bidang yang sesuai dengan bidang program studi (untuk pengusul dari program studi pada program Sarjana/Magister/Doktor), atau menjadi tenaga ahli/konsultan di lembaga/industri tingkat wilayah/nasional/ internasional pada bidang yang sesuai dengan bidang program studi (untuk pengusul dari program studi pada program Diploma Tiga/Sarjana Terapan/Magister Terapan/Doktor Terapan). 
     <br> e) mendapat penghargaan atas prestasi dan kinerja di tingkat wilayah/nasional/internasional. 
     <br>
     <br>
      2) Diisi dengan tanda centang V pada kolom yang sesuai. 

 
 





   
     </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
</div>
    </section>
   @stop


