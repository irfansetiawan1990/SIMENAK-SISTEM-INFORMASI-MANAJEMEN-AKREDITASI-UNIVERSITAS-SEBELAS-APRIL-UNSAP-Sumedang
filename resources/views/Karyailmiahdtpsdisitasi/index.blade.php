@extends('adminlte::page')

@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Karya Ilmiah DTPS Disitasi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Karya Ilmiah DTPS Disitasi</li>
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
          <h3 class="card-title">Data Karya Ilmiah DTPS Disitasi</h3>
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


        
             <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit">Tambah</button>
           
            <!-- Modal -->
            
            <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEdit" aria-hidden="true">
                 <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Tambah Karya Ilmiah DTPS Disitasi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH PS-->
                          <form action="{{ route('Karyailmiahdtpsdisitasi.store') }}" method="POST">
                            @csrf
                                  <div class="form-group">
                                    <label for="">Nama Dosen</label>
                                    <select name="nama_dosen" id="nama-dosen" class="form-control">
                                      @foreach ($dosen as $data)
                                      <option value="{{$data->nama_dosen}}">{{$data->nama_dosen}}</option>
                                      @endforeach
                                    </select>
                                    </div>  

                                    <div class="form-group">
                                      <label for="">Judul artikel disitasi</label>
                                      <input type="text" class="form-control" id="judul_artikel_disitasi" name="judul_artikel_disitasi" aria-describedby="emailHelp">
                                    </div>

                                   <div class="form-group">
                                    <label for="">Jumlah Sitasi </label>
                                    <input type="number" class="form-control" id="jumlah_sitasi" name="jumlah_sitasi" aria-describedby="emailHelp">
                                    </div>
                             
                                  <div class="form-group">
                                        <input type="hidden" class="form-control" id="prodi_id" name="prodi_id" value="{{$id}}">
                                    
                                  </div>

                          <button type="submit" class="btn btn-primary">Simpan Data</button>
                          </form>
                    <!--END FORM TAMBAH BARANG-->
                    </div>
                    </div>
                  </div>
              
                </div> 
            
        </div>
   

 <div class="card-body">Tuliskan judul artikel karya ilmiah DTPS yang disitasi dalam 3 tahun terakhir dengan mengikuti format Tabel 3.b.5) berikut ini. Judul artikel yang disitasi harus relevan dengan bidang program studi</div>
<div class="card-body">
  <div style="overflow-x:auto;">
    <table border="1"cellpadding="10">
        <tr>
            <th width="10px"  class="text-center">No</th>
            <th width="400px"  class="text-center">Nama Dosen</th>
            <th width="400px" class="text-center">Judul Artikel yang Disitasi (Jurnal/Buku, 
Volume, Tahun, Nomor, Halaman) </th>
            <th width="200px"  class="text-center">Jumlah Sitasi </th>
         
   
            <th width="100px" class="text-center">Action</th>
  

        </tr>

        @foreach ($Karyailmiahdtpsdisitasi as $item)
        <tr>
            <td >{{ ++$i }}</td>
             <td >{{ $item->nama_dosen }}</td>
            <td >{{ $item->judul_artikel_disitasi }}</td>
            <td class="text-center">{{ $item->jumlah_sitasi }}</td>

            <td >

              <!--modal edit -->
              
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit{{ $item->id_karya_ilmiah }}">Edit</button>
                <div class="modal fade" id="modalEdit{{ $item->id_karya_ilmiah}}" tabindex="-1" aria-labelledby="modalEdit1" aria-hidden="true">
                           <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Edit Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH PS-->
            
                                <form action="{{ route('Karyailmiahdtpsdisitasi.update',$item->id_karya_ilmiah)}}" method="POST">
                            @csrf
                            @method('PUT')

                                  <div class="form-group">
                                      <label for="">Nama Dosen</label>
                                      <input type="text"class="form-control" id="nama_dosen" name="nama_dosen" aria-describedby="emailHelp" value="{{$item->nama_dosen}}" disabled >
                                    </div> 

                                    <div class="form-group">
                                      <label for="">Judul artikel disitasi</label>
                                      <input type="text" class="form-control" id="judul_artikel_disitasi" name="judul_artikel_disitasi" aria-describedby="emailHelp" value="{{$item->judul_artikel_disitasi}}">
                                    </div>

                                   <div class="form-group">
                                    <label for="">Jumlah Sitasi </label>
                                    <input type="number" class="form-control" id="jumlah_sitasi" name="jumlah_sitasi" aria-describedby="emailHelp" value="{{$item->jumlah_sitasi}}">
                                    </div>

                          <button type="submit" class="btn btn-primary">Simpan Data</button>
                          </form>
                    <!--END FORM TAMBAH BARANG-->
                    </div>

                    </div>
                  </div>
                </div>

                    

                    <form action="{{ route('Karyailmiahdtpsdisitasi.destroy',$item->id_karya_ilmiah) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>

       
            </td>
 
       
    
        </tr>
       @endforeach
        <tr>

      <td colspan="2" class="text-center">Jumlah</td>
      <td class="text-center">{{$countjudul}}</td>
      <td class="text-center">{{$sumsitasi}}</td>
      <td bgcolor="#ababb3"></td>
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


