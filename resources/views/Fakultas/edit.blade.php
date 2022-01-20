@extends('adminlte::page')
@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data User dan Hak Akses</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Data User dan Hak Akses</li>
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
          <h3 class="card-title">Data User dan Hak Akses</h3>
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

         
     
                    <!--FORM TAMBAH PS-->    
          <form action="{{ route('Daftaruser.update',$Pengguna->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
            <div class="form-row">
                  <div class="form-group col-md-4">
                      <label>Username</label>
                      <input type="text" name="name" class="form-control" value="{{$Pengguna->name}}">       
                  </div>
                   <div class="form-group col-md-4">
                      <label>Email</label>
                      <input type="text" name="email" class="form-control" value="{{ $Pengguna->email }}"> 
                  </div>
                  <div class="form-group col-md-4">
                      <label>Level</label>
                      <select name="level" class="form-control">
                        <option value="admin">Administrator</option>
                        <option value="admin">user</option>             
                      </select>     
                  </div>   
            </div>


             <div class="form-row">
                  <div class="form-group col-md-4">
                      <label>Photo Profile</label>
                      <input type="file" class="form-control" name="image" value="{{$Pengguna->image}}"> >
                  </div>

                   <div class="form-group col-md-4">
                      <label>Program Studi</label>
                      <select name="prodi_id" class="form-control">
                        <option selected value="{{$Pengguna->prodi_id}}">{{$Pengguna->nama_prodi}}</option>
                        @foreach ($prodi as $prodis)
                        <option value="{{$prodis->id}}">{{$prodis->nama_prodi}}</option>
                        @endforeach
                      </select>     
                  </div>

                 <div class="form-group col-md-4">
                      <label>Fakultas</label>
                      <select name="fakul_id" class="form-control">
                        <option selected value="{{$Pengguna->fakul_id}}">{{$Pengguna->nama_fak}}</option>
                        @foreach ($fakultas as $fakultass)
                        <option value="{{$fakultass->id_fakultas}}">{{$fakultass->nama_fak}}</option>
                        @endforeach
                      </select>     
                  </div>
            </div>
 
          <button type="submit" class="btn btn-primary" onclick="return confirm('apakah data yang dimasukan sudah valid')">Simpan</button>
          <button type="reset" class="btn btn-primary">Reset Data</button>
        </form>                       
         
</div>

   
     </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

       <div class="card">
        <div class="card-header">
          <h3 class="card-title">Ubah Password</h3>
        </div>                                                
        <div class="card-body">
         
     
                    <!--FORM TAMBAH PS-->    
          <form action="{{ route('Daftaruser.updatepassword',$Pengguna->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
            <div class="form-row">
                  <!--div class="form-group col-md-4">
                      <label for="current_password">Password Lama</label>
                      <input type="password" name="current_password" class="form-control">
                      @error('current_password')
                       <div class="text-danger">{{ $message }}</div> 
                      @enderror
                  </div-->
                  <div class="form-group col-md-4">
                      <label>Password Baru</label>
                      <input type="password" name="password" class="form-control"> 
                       @error('password')
                       <div class="text-danger">{{ $message }}</div> 
                      @enderror
                  </div>
                  <div class="form-group col-md-4">
                      <label for="password_confirmation">Ulangi Password</label>
                      <input type="password" name="password_confirmation" class="form-control" id="password" id="password_confirmation"> 
                      @error('password_confirmation')
                       <div class="text-danger">{{ $message }}</div> 
                      @enderror

                  </div>
            </div>


             
 
          <button type="submit" class="btn btn-primary" onclick="return confirm('apakah data yang dimasukan sudah valid')">Simpan</button>
          <button type="reset" class="btn btn-primary">Reset Data</button>
        </form>                       
         
</div>

   
     </div>
        <!-- /.card-footer-->
      </div>
</div>
    </section>

    
   @stop


