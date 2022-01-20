@extends('adminlte::page')
@section('content')
 <!-- Content Header (Page header) -->

  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Data User</li>
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
          <h3 class="card-title">Data User</h3>
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
                      <div class="alert alert-danger" role="alert">
                          <strong>Ups</strong> Ada masalah di inputan anda<br><br>
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
         
                     
         <form action="{{ route('Daftaruser.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="form-row">
                  <div class="form-group col-md-4">
                      <label>Username</label>
                      <input type="text" name="name" class="form-control">       
                  </div>
                   <div class="form-group col-md-4">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control">       
                  </div>

                  <div class="form-group col-md-4">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control">       
                  </div>
            </div>
            <div class="form-row">
                  <div class="form-group col-md-4" id="level_input">
                      <label>Level</label>
                      <select id="level" onchange="rubah_level()" name="level" class="form-control">
                        <option value="admin">Administrator</option>
         
                        <option value="user">Operator Prodi</option>             
                      </select>     
                  </div>   
            </div>

             <div class="form-row">
                  <div class="form-group col-md-4">
                      <label>Photo Profile</label>
                      <input type="file" class="form-control" name="image">      
                  </div>

   
                  <div class="form-group col-md-4" >
                      <label>Program Studi</label>
                      <select name="prodi_id" class="form-control" id="prodi_0">
                        @foreach ($prodi as $prodi)
                        <option value="{{$prodi->id}}">{{$prodi->nama_prodi}}</option>
                        @endforeach
                      </select>     
                  </div>
          

                 <div class="form-group col-md-4">
                      <label>Fakultas</label>
                      <select name="fakul_id" class="form-control">
                        @foreach ($fakultas as $fakultas)
                        <option value="{{$fakultas->id_fakultas}}">{{$fakultas->nama_fak}}</option>
                        @endforeach
                      </select>     
                  </div>
            </div>
 
          <button type="submit" class="btn btn-primary" onclick="return confirm('apakah data yang dimasukan sudah valid')">Simpan</button>
          <button type="reset" class="btn btn-primary">Reset Data</button>
        </form>
    
</div>




   @stop


