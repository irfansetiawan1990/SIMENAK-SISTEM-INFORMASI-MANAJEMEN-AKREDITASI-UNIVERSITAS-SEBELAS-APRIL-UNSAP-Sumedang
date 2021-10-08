@extends('adminlte::page')


@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Pegawai</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('pengelolaprodi.index') }}"> Kembali</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Muup ea</strong> Ada yg gak beres nginputna.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 <div class="body">
                    <!--FORM TAMBAH PS-->
        <form action="{{ route('pengelolaprodi.update', $d->id) }}" method="POST">
            
        @csrf
        @method('PUT')

         <div class="form-group">
                                    <label for="">Jenis Program</label>
                                    <input type="text" class="form-control" id="jenis_program" name="jenis_program" value="{{$d->jenis_program}}">
                                    </div>
                                  <div class="form-group">
                                      <label for="">Nama Program Studi</label>
                                      <input type="text" class="form-control" id="nama_ps" name="nama_ps" value="{{ $d->nama_ps }}">
                                  </div>
                                  <div class="form-group">
                                      <label for="">Status</label>
                                      <input type="text" class="form-control" id="status" name="status" value="{{$d->status}}">
                                  </div>
                                     <div class="form-group">
                                      <label for="">No. Tanggal SK</label>
                                      <input type="text" class="form-control" id="no_tgl_sk" name="no_tgl_sk" value="{{$d->no_tgl_sk }}">
                                  </div>
                                     <div class="form-group">
                                      <label for="">Tanggal Kadaluarsa</label>
                                      <input type="text" class="form-control" id="tgl_kadaluarsa" name="tgl_kadaluarsa" value="{{ $d->tgl_kadaluarsa }}">
                                  </div>   
                                  <div class="form-group">
                                      <label for="">Jumlah Mahasiswa Saat TS</label>
                                      <input type="text" class="form-control" id="jml_mhs_saat_ts" name="jml_mhs_saat_ts" value="{{ $d->jml_mhs_saat_ts }}">
                                  </div>
                                  
                          <button type="submit" class="btn btn-primary">Simpan Data</button>
                          </form>
          
          
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>

    </form>
                    <!--END FORM TAMBAH BARANG-->
                    </div>
@endsection


