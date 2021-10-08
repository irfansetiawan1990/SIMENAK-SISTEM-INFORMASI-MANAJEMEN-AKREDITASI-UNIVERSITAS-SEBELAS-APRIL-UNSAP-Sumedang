@extends('adminlte::page')

@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kerjasama Pengabdian Kepada Masyarakat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Kerjasama Pengabdian Kepada Masyarakat</li>
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
          <h3 class="card-title">Kerjasama Pengabdian Kepada Masyarakat</h3>
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

        </div>                                            
        <div class="card-body">

          <!-- Tombol untuk menampilkan modal-->
            <button type="button" class="btn btn-primary btn" data-toggle="modal" data-target="#modalTambah">Tambah</button>
           
            <!-- Modal -->

            <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambah" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Tambah Kerjasama Pengabdian Kepada Masyarakat</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH PS-->
                          <form action="{{ route('Kerjasamapkm.store') }}" method="POST">
                            @csrf
                                  <div class="form-group">
                                    <label for="">Lembaga Mitra</label>
                                    <input type="text" class="form-control" id="lembaga_mitra" name="lembaga_mitra" aria-describedby="emailHelp">
                                    </div>
                                  <div class="form-group">
                                      <label for="">tingkat</label>
                                      <input type="text" class="form-control" id="tingkat" name="tingkat">
                                  </div>
                             
                                   <div class="form-group">
                                    <label for="">judul kegiatan kerjasama </label>
                                    <input type="text" class="form-control" id="judul_kegiatan_kerja" name="judul_kegiatan_kerja" aria-describedby="emailHelp">
                                    </div>

                                   <div class="form-group">
                                      <label for="">tingkat</label>
                                      <select name="tingkat" id="tingkat" class="form-control">
                                        <option value="Internasional">Internasional</option>
                                        <option value="Nasional">Nasional</option>
                                        <option value="Wilayah/Lokal">Wilayah dan Lokal</option>
                                      </select>

                                  </div>

                                     <div class="form-group">
                                    <label for="">Manfaat </label>
                                    <input type="text" class="form-control" id="manfaat" name="manfaat" aria-describedby="emailHelp">
                                    </div>

                                  <div class="form-group">
                                      <label for="">Waktu dan Durasi</label>
                                      <input type="text" class="form-control" id="waktu_durasi" name="waktu_durasi">
                                  </div>
                                  <div class="form-group">
                                      <label for="">Bukti Kerjasama</label>
                                      <input type="text" class="form-control" id="bukti_kerjasama" name="bukti_kerjasama">
                                  </div>
                                    <div class="form-group">
                                      <label for="">Tahun Berakhir</label>
                                      <input type="text" class="form-control" id="tahun_berakhir_kjs_pkm" name="tahun_berakhir_kjs_pkm">
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

    <table class="table table-bordered">
        <tr>

            <th width="20px" class="text-center">Lembaga Mitra</th>
            <th width="280px" class="text-center">Tingkat</th>
            <th width="280px" class="text-center">Judul</th>
            <th width="280px" class="text-center">Manfaat</th>
            <th width="280px" class="text-center">Waktu</th>
            <th width="280px" class="text-center">Bukti Kerjasama</th>
            <th width="280px" class="text-center">Tahun berakhir</th>
            <th width="200px"class="text-center">Action</th>
        </tr>
        @foreach ($Kerjasamapkm as $item)
        <tr>
 
            <td width="280x">{{ $item->lembaga_mitra }}</div></td>
            <td width="280px">{{ $item->tingkat }}</div></td>
            <td width="280px">{{ $item->judul_kegiatan_kerja }}</div></td>
            <td width="280px">{{ $item->manfaat }}</div></td>
            <td width="280px">{{ $item->waktu_durasi }}</div></td>
            <td width="280px">{{ $item->bukti_kerjasama }}</div></td>
            <td width="280px">{{ $item->tahun_berakhir_kjs_pkm }}</div></td>
            <td width="100px">

              <!--modal edit -->
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit{{ $item->id_kjspkm }}">Edit</button>
                <div class="modal fade" id="modalEdit{{ $item->id_kjspkm }}" tabindex="-1" aria-labelledby="modalEdit1" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title">Edit Data Kerjasama </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH PS-->
            
                                <form action="{{ route('Kerjasamapkm.update', $item->id_kjspkm) }}" method="POST">
                                  @csrf
                                  @method('PUT')
                                 <div class="form-group">
                                    <label for="">Lembaga Mitra</label>
                                    <input type="text" class="form-control" id="lembaga_mitra" name="lembaga_mitra" aria-describedby="emailHelp" value="{{$item->lembaga_mitra}}">
                                    </div>
                                  <div class="form-group">
                                      <label for="">tingkat</label>
                                      <select name="tingkat" id="tingkat" class="form-control">
                                        <option value="Internasional">Internasional</option>
                                        <option value="Nasional">Nasional</option>
                                        <option value="Wilayah/Lokal">Wilayah dan Lokal</option>
                                      </select>

                                  </div>
                             
                                   <div class="form-group">
                                    <label for="">judul kegiatan kerjasama </label>
                                    <input type="text" class="form-control" id="judul_kegiatan_kerja" name="judul_kegiatan_kerja" aria-describedby="emailHelp" value="{{$item->judul_kegiatan_kerja}}">
                                    </div>

                                     <div class="form-group">
                                    <label for="">Manfaat </label>
                                    <input type="text" class="form-control" id="manfaat" name="manfaat" aria-describedby="emailHelp" value="{{$item->manfaat}}">
                                    </div>

                                  <div class="form-group">
                                      <label for="">Waktu dan Durasi</label>
                                      <input type="text" class="form-control" id="waktu_durasi" name="waktu_durasi" value="{{$item->waktu_durasi}}">
                                  </div>
                                  <div class="form-group">
                                      <label for="">Bukti Kerjasama</label>
                                      <input type="text" class="form-control" id="bukti_kerjasama" name="bukti_kerjasama" value="{{$item->bukti_kerjasama}}">
                                  </div>
                                    <div class="form-group">
                                      <label for="">Tahun Berakhir</label>
                                      <input type="text" class="form-control" id="tahun_berakhir_kjs_pkm" name="tahun_berakhir_kjs_pkm" value="{{$item->tahun_berakhir_kjs_pkm}}">
                                  </div>
                                  
                          <button type="submit" class="btn btn-primary">Simpan Data</button>
                          </form>
                    <!--END FORM TAMBAH BARANG-->
                    </div>
                    </div>
                  </div>
                </div>

                    

                    <form action="{{ route('Kerjasamapkm.destroy',$item->id_kjspkm) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>

          
            </td>
        </tr>
        @endforeach
    </table>
     </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
   @stop


