<?php

use Illuminate\Support\Facades\Route;
use\App\Http\Controllers\DaftarpsunipengelolaprodiController;
use\App\Http\Controllers\DosbingtaController;
use\App\Http\Controllers\DosentdktetapController;
use\App\Http\Controllers\DosentetapptController;
use\App\Http\Controllers\EwmpController;
use\App\Http\Controllers\IpklulusanController;
use\App\Http\Controllers\KaryailmiahdtpsdisitasiController;
use\App\Http\Controllers\KepuasanmhsController;
use\App\Http\Controllers\KepuasanpenggunaController;
use\App\Http\Controllers\KerjasamapendidikanController;
use\App\Http\Controllers\KerjasamapenelitianController;
use\App\Http\Controllers\KerjasamapkmController;
use\App\Http\Controllers\KesesuaianbidkerlulusanController;
use\App\Http\Controllers\KurikulumcapaianrppController;
use\App\Http\Controllers\Luaranpkmdtpshaki2Controller;
use\App\Http\Controllers\Luaranpkmdtpshaki3Controller;
use\App\Http\Controllers\Luaranpkmdtpshaki4Controller;
use\App\Http\Controllers\LuaranpkmdtpshakiController;
use\App\Http\Controllers\Luaranpkmmhs2Controller;
use\App\Http\Controllers\Luaranpkmmhs3Controller;
use\App\Http\Controllers\Luaranpkmmhs4Controller;
use\App\Http\Controllers\LuaranpkmmhsController;
use\App\Http\Controllers\MahasiswaController;
use\App\Http\Controllers\MhsasingController;
use\App\Http\Controllers\PenelitiandtpsController;
use\App\Http\Controllers\PenelitiandtpsmhsController;
use\App\Http\Controllers\PengakuanrekognisiController;
use\App\Http\Controllers\pengelolaprodiController;
use\App\Http\Controllers\PenggunaController;
use\App\Http\Controllers\PkmdtpsController;
use\App\Http\Controllers\PkmdtpsmhsController;
use\App\Http\Controllers\PkmpembelajaranController;
use\App\Http\Controllers\PrestasiakademikmhsController;
use\App\Http\Controllers\PrestasinonakademikmhsController;
use\App\Http\Controllers\PublikasiilmiahdtpsController;
use\App\Http\Controllers\PublikasiilmiahmhsController;
use\App\Http\Controllers\SeleksimhsbaruController;
use\App\Http\Controllers\TempatkerjalulusanController;
use\App\Http\Controllers\VisimisiController;
use\App\Http\Controllers\Waktutunggululusans1Controller;
use\App\Http\Controllers\DaftaruserController;
use\App\Http\Controllers\FakultasController;
use\App\Http\Controllers\ProdiController;







/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can Daftaruser web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware'=>['auth','ceklevel:admin,user']], function() {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
});

Route::group(['middleware'=>['auth','ceklevel:admin,user']], function() {
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('visimisi', VisimisiController::class);
Route::resource('pengelolaprodi', pengelolaprodiController::class);
Route::resource('Kerjasamapendidikan', KerjasamapendidikanController::class);
Route::resource('Kerjasamapenelitian', KerjasamapenelitianController::class);
Route::resource('Kerjasamapkm', KerjasamapkmController::class);
Route::resource('Seleksimhsbaru', SeleksimhsbaruController::class);

Route::get('Seleksimhsbaru.exportSeleksi',[SeleksimhsbaruController::class, 'exportSeleksi'])->name('Seleksimhsbaru.exportSeleksi');

Route::resource('Mhsasing', MhsasingController::class);
Route::resource('Dosentetappt', DosentetapptController::class);
Route::resource('Dosbingta', DosbingtaController::class);
Route::resource('Ewmp', EwmpController::class);
Route::resource('visimisi', VisimisiController::class);
Route::resource('Dosentdktetap', DosentdktetapController::class);
Route::resource('Publikasiilmiahmhs', PublikasiilmiahmhsController::class);
Route::resource('Penelitiandtps', PenelitiandtpsController::class);
Route::resource('Pengakuanrekognisi', PengakuanrekognisiController::class);
Route::resource('Pkmdtps', PkmdtpsController::class);
Route::resource('Publikasiilmiahdtps', PublikasiilmiahdtpsController::class);
Route::resource('Karyailmiahdtpsdisitasi', KaryailmiahdtpsdisitasiController::class);
Route::resource('Luaranpkmdtpshaki', LuaranpkmdtpshakiController::class);
Route::resource('Luaranpkmdtpshaki2', Luaranpkmdtpshaki2Controller::class);
Route::resource('Luaranpkmdtpshaki3', Luaranpkmdtpshaki3Controller::class);
Route::resource('Luaranpkmdtpshaki4', Luaranpkmdtpshaki4Controller::class);
Route::resource('Kurikulumcapaianrpp', KurikulumcapaianrppController::class);
Route::resource('Pkmpembelajaran', PkmpembelajaranController::class);
Route::resource('Kepuasanmhs', KepuasanmhsController::class);
Route::resource('Penelitiandtpsmhs', PenelitiandtpsmhsController::class);
Route::resource('Pkmdtpsmhs', PkmdtpsmhsController::class);
Route::resource('Ipklulusan', IpklulusanController::class);
Route::resource('Prestasiakademikmhs', PrestasiakademikmhsController::class);
Route::resource('Prestasinonakademikmhs', PrestasinonakademikmhsController::class);
Route::resource('Waktutunggululusans1', Waktutunggululusans1Controller::class);
Route::resource('Kesesuaianbidkerlulusan', KesesuaianbidkerlulusanController::class);
Route::resource('Tempatkerjalulusan', TempatkerjalulusanController::class);
Route::resource('Kepuasanpengguna', KepuasanpenggunaController::class);
Route::resource('Luaranpkmmhs', LuaranpkmmhsController::class);
Route::resource('Luaranpkmmhs2', Luaranpkmmhs2Controller::class);
Route::resource('Luaranpkmmhs3', Luaranpkmmhs3Controller::class);
Route::resource('Luaranpkmmhs4', Luaranpkmmhs4Controller::class);
Route::resource('Fakultas', FakultasController::class);
Route::resource('Prodi', ProdiController::class);
Route::post('Kepuasanpengguna.komenstore', [App\Http\Controllers\KepuasanpenggunaController::class, 'Komenstore'])->name('Kepuasanpengguna.komenstore');
Route::resource('Daftarpsunipengelolaprodi', DaftarpsunipengelolaprodiController::class);

Route::group(['middleware'=>['auth','ceklevel:admin']], function() {


Route::get('Daftaruser', [App\Http\Controllers\DaftaruserController::class, 'index'])->name('Daftaruser.index');


Route::get('Daftaruser.create', [DaftaruserController::class, 'create'])->name('Daftaruser.create');

Route::post('Daftaruser.create', [DaftaruserController::class, 'store'])->name('Daftaruser.store');

Route::post('Daftaruser.hapus/{id}', [DaftaruserController::class, 'hapus'])->name('Daftaruser.hapus');


Route::get('Daftaruser.edit/{id}', [DaftaruserController::class, 'edit'])->name('Daftaruser.edit');

Route::put('Daftaruser.edit/{id}', [DaftaruserController::class, 'update'])->name('Daftaruser.update');

//Route::get('Daftaruser.edit/{id}', [DaftaruserController::class, 'updatepassword'])->name('Daftaruser.edit');

Route::put('Daftaruser.updatepassword/{id}', [DaftaruserController::class, 'updatepassword'])->name('Daftaruser.updatepassword');




});






});





