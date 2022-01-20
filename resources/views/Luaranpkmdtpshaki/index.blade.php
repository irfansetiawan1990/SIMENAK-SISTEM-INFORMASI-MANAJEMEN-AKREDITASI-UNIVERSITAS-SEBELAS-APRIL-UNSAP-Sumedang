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
                          <form action="{{ route('Luaranpkmdtpshaki.store') }}" method="POST">
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

      
 <div class="card-body">Keterangan: <br>
1) Luaran penelitian/PkM yang mendapat pengakuan Hak Kekayaan Intelektual (HKI) 
dibuktikan dengan surat penetapan oleh Kemenkumham atau kementerian lain yang 
berwenang</div>

<div class="card-body">
  <div style="overflow-x:auto;">
    <table border="1"cellpadding="10">
        <tr>
            <th width="10px"  class="text-center">No</th>
            <th width="300px"  class="text-center">Judul luaran penelitian dan PkM (HKI)</th>
            <th width="100px" class="text-center">Tahun</th>
            <th width="200px"  class="text-center">Keterangan </th>
         
            @if (auth()->user()->level=="user")
            <th width="100px" class="text-center">Action</th>
            @endif
            @if (auth()->user()->level=="admin")
            <th width="100px" class="text-center">Prodi</th>
            @endif
        </tr>
        <tr>
            <th width="10px"  class="text-center">I</th>
            <th width="300px">HKI 1): <br>
            a) Paten, <br>
            b) Paten Sederhana
            </th>
            <th width="100px" class="text-center"></th>
            <th width="200px"  class="text-center"></th>
            <th width="100px" class="text-center"></th>
        </tr>
        @foreach ($Luaranpkmdtpshaki as $item)
        <tr>
            <td ></td>
             <td >{{ $item->luaran_pkm }}</td>
            <td class="text-center">{{ $item->tahun }}</td>
            <td class="text-center">{{ $item->keterangan }}</td>

            @if (auth()->user()->level=="user")
            <td >

              <!--modal edit -->
              
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit{{ $item->id_pkm_dtps_hki }}">Edit</button>
                <div class="modal fade" id="modalEdit{{ $item->id_pkm_dtps_hki}}" tabindex="-1" aria-labelledby="modalEdit1" aria-hidden="true">
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
            
                                <form action="{{ route('Luaranpkmdtpshaki.update',$item->id_pkm_dtps_hki)}}" method="POST">
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

                    

                    <form action="{{ route('Luaranpkmdtpshaki.destroy',$item->id_pkm_dtps_hki) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>

       
            </td>

            @elseif (auth()->user()->level=="admin")
                     <!--modal edit -->
            <td>{{$item->nama_prodi}}</td>

            @endif
         
    
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


