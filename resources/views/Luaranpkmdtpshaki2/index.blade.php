@extends('adminlte::page')

@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Luaran Penelitian HKI </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Luaran Penelitian HKI </li>
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
          <h3 class="card-title">Data Luaran Penelitian HKI </h3>
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
                          <h5 class="modal-title">Tambah Luaran Penelitian HKI </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH PS-->
                          <form action="{{ route('Luaranpkmdtpshaki2.store') }}" method="POST">
                            @csrf
                                  <div class="form-group">
                                    <label for="">Judul luaran penelitian dan PkM (HKI)</label>
                                      <input type="text" class="form-control" id="luaran_pkm" name="luaran_pkm" aria-describedby="emailHelp">
                                    </div>  

                                    <div class="form-group">
                                      <label for="">Tahun</label>
                                      <input type="number" class="form-control" id="tahun" name="tahun" aria-describedby="emailHelp">
                                    </div>

                                   <div class="form-group">
                                    <label for="">Keterangan </label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" aria-describedby="emailHelp">
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
      
      


<div class="card-body">
  <div style="overflow-x:auto;">
    <table border="1"cellpadding="10">
        <tr>
            <th width="10px"  class="text-center">No</th>
            <th width="600px"  class="text-center">Judul luaran penelitian dan PkM (HKI)</th>
            <th width="100px" class="text-center">Tahun</th>
            <th width="200px"  class="text-center">Keterangan </th>
         
            @if (auth()->user()->level=="user")
            <th width="100px" class="text-center">Action</th>
            @endif
     
        </tr>
        <tr>
            <th width="10px"  class="text-center">II</th>
            <th width="300px" ><p style="text-align: justify;">HKI 1):<br>
            a) Hak Cipta, <br>
            b) Desain Produk Industri, <br>
            c) Perlindungan Varietas Tanaman (Sertifikat 
            Perlindungan Varietas Tanaman, Sertifikat 
            Pelepasan Varietas, Sertifikat Pendaftaran 
            Varietas), <br>
            d) Desain Tata Letak Sirkuit Terpadu, <br>
            e) dll.)</p>
            </th>
            <th width="100px" class="text-center"></th>
            <th width="200px"  class="text-center"></th>
            <th width="100px" class="text-center"></th>
        </tr>
        @foreach ($Luaranpkmdtpshaki2 as $item)
        <tr>
            <td ></td>
             <td >{{ $item->luaran_pkm }}</td>
            <td class="text-center">{{ $item->tahun }}</td>
            <td class="text-center">{{ $item->keterangan }}</td>

            <td >

              <!--modal edit -->
              
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit{{ $item->id_pkm_dtps_haki2 }}">Edit</button>
                <div class="modal fade" id="modalEdit{{ $item->id_pkm_dtps_haki2}}" tabindex="-1" aria-labelledby="modalEdit1" aria-hidden="true">
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
            
                                <form action="{{ route('Luaranpkmdtpshaki2.update',$item->id_pkm_dtps_haki2)}}" method="POST">
                            @csrf
                            @method('PUT')

                                   <div class="form-group">
                                    <label for="">Judul luaran penelitian dan PkM (HKI)</label>
                                      <input type="text" class="form-control" id="luaran_pkm" name="luaran_pkm" aria-describedby="emailHelp" value="{{$item->luaran_pkm}}">
                                    </div>  

                                    <div class="form-group">
                                      <label for="">Tahun</label>
                                      <input type="number" class="form-control" id="tahun" name="tahun" aria-describedby="emailHelp" value="{{$item->tahun}}">
                                    </div>

                                   <div class="form-group">
                                    <label for="">Keterangan </label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" aria-describedby="emailHelp" value="{{$item->keterangan}}">
                                    </div>
                             

                          <button type="submit" class="btn btn-primary">Simpan Data</button>
                          </form>
                    <!--END FORM TAMBAH BARANG-->
                    </div>

                    </div>
                  </div>
                </div>

                    

                    <form action="{{ route('Luaranpkmdtpshaki2.destroy',$item->id_pkm_dtps_haki2) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>

       
            </td>


         
    
        </tr>
        @endforeach
        <tr>
      <td colspan="2" class="text-center">Jumlah</td>
      <td class="text-center">{{$count_tahun}}</td>
      <td bgcolor="#ababb3"></td>
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


