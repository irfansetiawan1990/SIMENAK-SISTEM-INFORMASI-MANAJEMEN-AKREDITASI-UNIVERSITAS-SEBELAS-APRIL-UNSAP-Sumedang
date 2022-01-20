@extends('adminlte::page')

@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pengabdian kepada Masyarakat (PkM) DTPS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Pengabdian kepada Masyarakat (PkM) DTPS</li>
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
          <h3 class="card-title">Pengabdian kepada Masyarakat (PkM)DTPS</h3>
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
                          <strong>Whoops!</strong> There were some problems with your input.<br><br>
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif

               

 

  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit">Tambah</button>
 
    <BR>
    Masukan jumlah judul Pengabdian kepada Masyarakat (PkM) 1) yang dilaksanakan oleh DTPS berdasarkan sumber pembiayaan, yang relevan dengan bidang program studi pada TS-2 sampai dengan TS

   <!-- Tombol untuk menampilkan modal-->      
            <!-- Modal -->            
            <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEdit" aria-hidden="true">
                 <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Tambah Data Pengabdian kepada Masyarakat (PkM) DTPS DTPS</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH PS-->
                          <form action="{{ route('Pkmdtps.store') }}" method="POST">
                            @csrf
                                  <div class="form-group">
                                    <label for="">Sumber Pembiayaan</label>
                                    <input type="text" class="form-control" id="sumber_pembiayaan" name="sumber_pembiayaan" aria-describedby="emailHelp">
                                  </div>
                                  <div class="form-group">
                                    <label for="">TS-2</label>
                                    <input type="number" class="form-control" id="ts2" name="ts2" aria-describedby="emailHelp">
                                  </div>
                                  <div class="form-group">
                                    <label for="">TS-1</label>
                                    <input type="number" class="form-control" id="ts1" name="ts1" aria-describedby="emailHelp">
                                  </div>
                                  <div class="form-group">
                                    <label for="">TS</label>
                                    <input type="number" class="form-control" id="ts" name="ts" aria-describedby="emailHelp">
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
     
       <!-- Tombol untuk menampilkan modal-->

    

<div class="card-body">
  <div style="overflow-x:auto;">
    <table border="1"cellpadding="10">
      <tr>
      <td rowspan="2" width="10px" class="text-center">No</td>
      <td rowspan="2" width="300px" class="text-center">Sumber Pembiayaan</td>
      <td colspan="3" width="20px" class="text-center">Jumlah judul Pengabdian kepada Masyarakat (PkM) DTPS </td>
      <td rowspan="2" width="10px" class="text-center">Jumlah</td>
      <td rowspan="2" width="10px" class="text-center">Aksi</td>
    </tr>
    <tr>
      <td  width="100px" class="text-center">TS-2</td>
      <td  width="100px" class="text-center">TS-1</td>
      <td  width="100px" class="text-center">TS</td>
    </tr>
     <tr>
      <td width="10px" class="text-center" bgcolor="#ababb3">1</td>
      <td class="text-center" bgcolor="#ababb3">2</td>
      <td class="text-center" bgcolor="#ababb3">3</td>
      <td class="text-center" bgcolor="#ababb3">4</td>
      <td class="text-center" bgcolor="#ababb3">5</td>
      <td class="text-center" bgcolor="#ababb3">6</td>
      <td class="text-center" bgcolor="#ababb3">7</td>
    </tr>
    @foreach ($Pkmdtps as $item)
    <tr>
      <td width="10px" class="text-center">{{++$i}}</td>
      <td width="300px">{{$item->sumber_pembiayaan}}</td>
      <td class="text-center">{{$item->ts2}}</td>
      <td class="text-center">{{$item->ts1}}</td>
      <td class="text-center">{{$item->ts}}</td>
      <td class="text-center" >{{$item->jumlah}}</td>
      <td width="10px">
         <!-- Tombol untuk menampilkan modal-->
                  @if (auth()->user()->level=="user")
    

              <!--modal edit -->
              
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit{{ $item->id_pkm_dtps}}">Edit</button>
                <div class="modal fade" id="modalEdit{{ $item->id_pkm_dtps }}" tabindex="-1" aria-labelledby="modalEdit1" aria-hidden="true">
                           <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Edit Data PkM DTPS</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH PS-->
                        <form action="{{ route('Pkmdtps.update', $item->id_pkm_dtps) }}" method="POST">
                            @csrf
                            @method('PUT')

                                  <div class="form-group">
                                    <label for="">Sumber Pembiayaan</label>
                                    <input type="text" class="form-control" id="sumber_pembiayaan" name="sumber_pembiayaan" aria-describedby="emailHelp" value="{{$item->sumber_pembiayaan}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="">TS-2</label>
                                    <input type="text" class="form-control" id="ts2" name="ts2" aria-describedby="emailHelp" value="{{$item->ts2}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="">TS-1</label>
                                    <input type="text" class="form-control" id="ts1" name="ts1" aria-describedby="emailHelp" value="{{$item->ts1}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="">TS</label>
                                    <input type="text" class="form-control" id="ts" name="ts" aria-describedby="emailHelp" value="{{$item->ts}}">
                                  </div> 

   
                          <button type="submit" class="btn btn-primary">Simpan Data</button>
                          </form>
                    <!--END FORM TAMBAH BARANG-->
                    </div>

                    </div>
                  </div>
                </div>

                    

                    <form action="{{ route('Pkmdtps.destroy',$item->id_pkm_dtps)  }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>

            @endif







    </tr>
     @endforeach
    <tr>
      <td colspan="2" class="text-center" >Jumlah</td>
      <td class="text-center">{{$sum_ts2}}</td>
      <td class="text-center">{{$sum_ts1}}</td>
      <td class="text-center">{{$sum_ts}}</td>
      <td class="text-center">{{$sum_all_ts}}</td>
      <td class="text-center" bgcolor="#ababb3"></td>
    </tr>

    </table>
        
</div>


  Keterangan: <br>
  1) Kegiatan PkM tercatat di unit/lembaga yang mengelola kegiatan PkM di tingkat Perguruan Tinggi/UPPS. 
   <br>2) PkM dengan sumber pembiayaan dari DTPS. 





   
     </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
</div>
    </section>
   @stop


