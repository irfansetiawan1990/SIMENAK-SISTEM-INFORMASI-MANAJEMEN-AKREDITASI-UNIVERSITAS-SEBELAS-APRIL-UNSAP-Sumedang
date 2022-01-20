<!-- Main Sidebar Container -->


<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <img src="{{asset('vendor/adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SIMENAK UNSAP</span>
    </a>

    <!-- Sidebar -->
      <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!--div class="image">
          <img src="{{asset('vendor/adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div-->

      @if (auth()->user()->level=="admin")
      <div class="info">
          <a href="#" class="d-block">Administrator</a>
        </div>     
      </div>


      @elseif (auth()->user()->prodi_id=="1")
      <div class="info">
          <a href="#" class="d-block">PRODI Teknik Informatika</a>
        </div>     
      </div>
 

      @elseif (auth()->user()->prodi_id=="2")
      <div class="info">
          <a href="#" class="d-block">PRODI Sistem</a>
        </div>     
      </div>



      @elseif (auth()->user()->prodi_id=="3")
      <div class="info">
          <a href="#" class="d-block">PRODI Teknik informatika</a>
        </div>     
      </div>
 

      @endif



 <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Standar 1
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('visimisi.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Visi, misi dan Tujuan</p>
                </a>
              </li>
            </ul>
          </li>
    

           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Standar 2 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('Kerjasamapendidikan.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pendidikan</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{route('Kerjasamapenelitian.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penelitian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('Kerjasamapkm.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengabdian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tata Pamong</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Standar 3 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('Seleksimhsbaru.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Seleksi Mahasiswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route ('Mhsasing.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mahasiswa Asing</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Standar 4
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('Dosentetappt.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dosen Tetap</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('Dosbingta.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dosen Pembimbing T.A</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('Ewmp.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>EWMP Dosen Tetap</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('Dosentdktetap.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dosen Tidak Tetap</p>
                </a>
              </li>
                 <li class="nav-item">
                <a href="{{route('Pengakuanrekognisi.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengakuan/Rekognisi Dosen</p>
                </a>
              </li>
                 <li class="nav-item">
                <a href="{{route('Penelitiandtps.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penelitian DTPS</p>
                </a>
              </li>
                 <li class="nav-item">
                <a href="{{route('Pkmdtps.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PkM DTPS</p>
                </a>
              </li>
                 <li class="nav-item">
                <a href="{{route('Publikasiilmiahdtps.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Publikasi Ilmiah DTPS</p>
                </a>
              </li>
                 <li class="nav-item">
                <a href="{{route('Karyailmiahdtpsdisitasi.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Karya Ilmiah DTPS yang Disitasi</p>
                </a>
              </li>
                 <li class="nav-item">
                <a href="{{route('Luaranpkmdtpshaki.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>HKI (Paten, Paten Sederhana)</p>
                </a>
              </li>
                 <li class="nav-item">
                <a href="{{route('Luaranpkmdtpshaki2.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>HKI (Hak Cipta, Desain Produk Industri, dll.)</p>
                </a>
              </li>
                 <li class="nav-item">
                <a href="{{route('Luaranpkmdtpshaki3.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Teknologi Tepat Guna, Produk, Karya Seni, Rekayasa Sosial</p>
                </a>
              </li>
                 <li class="nav-item">
                <a href="{{route('Luaranpkmdtpshaki4.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buku ber-ISBN, Book</p>
                </a>
              </li>


            </ul>
          </li>
  
         <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Standar 5
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penggunaan Dana</p>
                </a>
              </li>
            </ul>
          </li>

   
      <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Standar 6
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('Kurikulumcapaianrpp.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kurikulum, Capaian, & RPP</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('Pkmpembelajaran.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Integrasi Kegiatan Penelitian/PkM dalam Pembelajaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('Kepuasanmhs.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kepuasan Mahasiswa</p>
                </a>
              </li>
            </ul>
          </li>

               <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Standar 7
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{Route('Penelitiandtpsmhs.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penelitian DTPS yang Melibatkan Mahasiswa</p>
                </a>
              </li>
            </ul>
          </li>

             <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Standar 8
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{Route('Pkmdtpsmhs.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PkM DTPS yang Melibatkan Mahasiswa</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
               <i class="nav-icon fas fa-edit"></i>
              <p>
                Standar 9
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Luaran Penelitian Mahasiswa
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{Route('Publikasiilmiahmhs.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Publikasi Ilmiah Mahasiswa</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{Route('Luaranpkmmhs.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>HKI (Paten, Paten Sederhana)</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{Route('Luaranpkmmhs2.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>HKI (Hak Cipta, Desain Produk Industri, dll.)</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{Route('Luaranpkmmhs3.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Teknologi Tepat Guna, Produk, Karya Seni, Rekayasa Sosial</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{Route('Luaranpkmmhs4.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Buku ber-ISBN, Book Chapter</p>
                    </a>
                  </li>
                </ul>
      

              <!-- menu normal-->
          
              </li>
              <li class="nav-item">
                <a href="{{Route('Ipklulusan.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>IPK Lulusan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('Prestasiakademikmhs.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Prestasi Akademik</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('Prestasinonakademikmhs.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Prestasi Non Akademik</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Masa Studi Lulusan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('Waktutunggululusans1.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Waktu tunggu Lulusan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('Kesesuaianbidkerlulusan.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kesuaian Bidang kerja</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('Tempatkerjalulusan.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>tempat kerja Lulusan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('Kepuasanpengguna.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kepuasan Pengguna</p>
                </a>
              </li>
            </ul>
          </li>   
        </li>


        @if (auth()->user()->level=="admin"){
         <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Pengaturan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{Route('Daftaruser.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('Fakultas.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fakultas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('Prodi.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Prodi</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-download"></i>
              <p>
               Download LKPS
              </p>
            </a>
            
          </li>
            <li class="nav-item">
            <a href="{{Route('Daftarpsunipengelolaprodi.index')}}" class="nav-link">
              <i class="nav-icon fas fa-download"></i>
              <p>
              Daftar Program Studi UPPS
              </p>
            </a>
            
          </li>

        }
        else
          @endif

      
 
            </ul>

           
        </nav>
    </div>

</aside>