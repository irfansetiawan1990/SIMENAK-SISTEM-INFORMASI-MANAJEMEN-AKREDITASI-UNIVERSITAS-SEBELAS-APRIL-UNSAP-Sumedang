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
               <li class="breadcrumb-item"><a href="{{route('visimisi.index')}}">Kembali</a></li>
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

        <div class="card-body">

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

          <div class="row">
                      <div class="container-fluid">
                        <div class="col-lg-12">
                             <form action="{{ route('visimisi.update', $visimisi->id) }}" method="POST">
                            @csrf
                            @method('put')
                                  <div class="form-group">
                                    <div class="form-group">
                                    <label>Periode</label>
                                       <input type="date" name="tahun_awal" value="{{$visimisi->tahun_awal}}">  sampai 

                                       <input type="date" name="tahun_akhir" value="{{$visimisi->tahun_akhir}}">
                                    </div>

                                    <textarea id="content" name="visimisi" rows="12" cols="6">
                                      {{ $visimisi->visimisi }}
                                    </textarea>
                                
                                  

                          <button type="submit" class="btn btn-primary">Simpan Data</button>
                          </form>
                          
                        </div>
                      </div>
                    </div>          
     </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>


   @stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop



