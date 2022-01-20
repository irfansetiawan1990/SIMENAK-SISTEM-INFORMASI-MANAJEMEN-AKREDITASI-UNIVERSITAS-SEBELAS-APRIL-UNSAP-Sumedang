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

         

                <a class="btn btn-primary btn-sm" href="{{route('Daftaruser.create')}}" role="button">Tambah</a>
      
           
          </div>
            
<div class="card-body">
  <div class="overflow-auto">
    <table border="1"cellpadding="5" style="width:85%">
        <tr bgcolor="#DCDCDC">
                <td class="text-center">No.</td>
                <td class="text-center" width="300px">Nama User</td>
                <td class="text-center">Photo Profile</td>
                <td class="text-center">Email</td>
                <td class="text-center">Level</td>
         
                <td class="text-center" width="400px">Fakultas</td>
                <td class="text-center">Aksi</td>            
              </tr>
          </tr>
                     
        @foreach ($pengguna as $item)
          <tr>
                  <td class="text-center">{{++$i}}</td>
                  <td >{{$item->name}}</td>
                  <td><img src="{{asset('storage/'.$item->image)}}"class="img-fluid t-2"> </td>
                  <td class="text-center">{{$item->email}}</td>
                  <td class="text-center">{{$item->level}}</td>
        
                  <td class="text-center">{{$item->nama_fak}}</td>   
            <td width="10px">

            <!--modal edit -->  
                  <a class="btn btn-primary btn-sm" href="{{route('Daftaruser.edit',$item->id)}}" role="button">edit</a>

                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}">
                    delete
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModalCenter{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Perhatian</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                s        </div>
                        <div class="modal-body">
                          Apakah anda yakin akan menghapus data ini?
                        </div>
                        <div class="modal-footer">
                          <form action="{{ route('Daftaruser.hapus',$item->id) }}" method="POST">
                                            @csrf
                                    

 
                                             <button type="submit" class="btn btn-primary btn-sm">Hapus Data!</button>
                              </form>
                                            <button type="" class="btn btn-secondary btn-sm">Close</button>
                                
                          
                        </div>
                      </div>
                    </div>
                  </div>
            </td>
         </tr>
            @endforeach
     </table>



</div>

   
     </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
</div>
    </section>

    
   @stop


