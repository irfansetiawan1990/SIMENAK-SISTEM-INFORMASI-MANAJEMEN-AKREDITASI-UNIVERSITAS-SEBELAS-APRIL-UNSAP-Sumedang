 @extends('adminlte::page')

@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Visi dan Misi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Visi dan Misi</li>
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
          <h3 class="card-title">Data Visi dan Misi</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div> 

     
         @if (auth()->user()->level=="user")
        <div class="card-body">
          <a class="btn btn-primary" href="{{route('visimisi.create')}}" role="button">Tambah</a>
        </div>  
        @endif  

  
      <div class="card-body">
        <table class="table table-bordered">
          <tr>
              <th width="10px" class="text-center">No</th> 
              @if (auth()->user()->level=="admin")
              <th width="240px" class="text-center">Program Studi</th> 
              @endif
              <th width="240px" class="text-center">Periode</th>      
              <th width="160px" class="text-center">Action</th>

          </tr>

        @foreach ($visimisi as $item)
            <tr>
                <td width="10px" class="text-center">{{ ++$i }} </td>
                @if (auth()->user()->level=="admin")
                <td width="10px" >{{ $item->nama_prodi}} </td>
                @endif

                <td width="240px" class="text-center">{{ $item->tahun_awal }} - {{ $item->tahun_awal }} </td>        
                <td width="100px" class="text-center">
                      
                        <a class="btn btn-info btn-sm" href="{{ route('visimisi.show',$item->id) }}" role="button">Lihat</a>

                        @if (auth()->user()->level=="user")
                          <a class="btn btn-primary btn-sm" href="{{ route('visimisi.edit',$item->id) }}" role="button">Ubah</a>

                         <!--modal hapus-->
                          <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus{{ $item->id }}">Delete</button>

                          <div class="modal" id="modalHapus{{ $item->id }}" tabindex="-1" aria-labelledby="modalHapus" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Perhatian</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                      <span aria-hidden="true">&times;</span>
                                      </button>
                                      </div>
                                      <div class="modal-body">
                                        <h4>Apakah anda yakin menghapus Data ini? :</h4>
                                      </div>
                                        <div class="modal-footer">
                                          <form action="{{ route('visimisi.destroy',$item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary">Hapus Data!</button>
                                          </form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                          @endif
                               
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>

                       

      
                </td>
       
        </tr>
        @endforeach
    </table>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>

    <script type="text/javascript">
  $(document).ready(function() {
    $('#content').summernote({
      height: "300px",
      styleWithSpan: false
    });
  }); 
</script>
   @stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop



