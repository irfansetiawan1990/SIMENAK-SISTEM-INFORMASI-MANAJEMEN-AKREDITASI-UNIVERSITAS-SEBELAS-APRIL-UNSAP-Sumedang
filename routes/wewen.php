<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\VisimisiController;
use App\Http\Controllers\DaftarpsunipengelolapsController;
use App\Http\Controllers\Dosenpembimbingutamatugasakhir;
use App\Http\Controllers\DosenpraktisiController;
use App\Http\Controllers\DosentdktetapController;
use App\Http\Controllers\DosentetapptController;
use App\Http\Controllers\EwmpController;
use App\Http\Controllers\IdentitasController;
use App\Http\Controllers\IpklulusanController;
//use App\Http\Controllers\KaryailmiahdtpsdisitasiController;
use App\Http\Controllers\KaryailmiahmhsdisitasiController;
use App\Http\Controllers\KcprpembelajaranController;
use App\Http\Controllers\KepuasanmhsController;
use App\Http\Controllers\KepuasanpenggunalulusanController;
use App\Http\Controllers\KerjasamapendidikanController;
use App\Http\Controllers\KerjasamapenelitianController;
use App\Http\Controllers\KerjasamapkmController;
use App\Http\Controllers\KesesuaianbidkerlulusanController;
use App\Http\Controllers\Luaranpkmdtps1Controller;
use App\Http\Controllers\Luaranpkmdtps2Controller;
use App\Http\Controllers\Luaranpkmdtps3Controller;
use App\Http\Controllers\Luaranpkmdtps4Controller;
use App\Http\Controllers\Luaranpkmmhs1Controller;
use App\Http\Controllers\Luaranpkmmhs2Controller;
use App\Http\Controllers\Luaranpkmmhs3Controller;
use App\Http\Controllers\Luaranpkmmhs4Controller;
use App\Http\Controllers\Masastudilulusand3Controller;
use App\Http\Controllers\Masastudilulusans1Controller;
use App\Http\Controllers\MhsasingController;
use App\Http\Controllers\PameranpresentasipubilmiahdtpsController;
use App\Http\Controllers\PenelitiandtpsController;
use App\Http\Controllers\PenelitiandtpsmhsController;
use App\Http\Controllers\PenelitiandtpsrujukantesisController;
use App\Http\Controllers\PengakuanrekognisiController;
use App\Http\Controllers\PenggunaandanaController;
use App\Http\Controllers\PkmdtpsController;
use App\Http\Controllers\PkmdtpsmhsController;
use App\Http\Controllers\PkmpembelajaranController;
use App\Http\Controllers\PrestasiakademikmhsController;
use App\Http\Controllers\PrestasinonakademikmhsController;
use App\Http\Controllers\ProdukdtpsadopsiController;
use App\Http\Controllers\ProdukdtpsadopsimasyarakatController;
use App\Http\Controllers\PublikasiilmiahdtpsController;
use App\Http\Controllers\PublikasiilmiahmhsController;
use App\Http\Controllers\PublikasiilmiahmhspsterapanController;
use App\Http\Controllers\PublikasipamerandtpsController;
use App\Http\Controllers\Ref8E2Controller;
use App\Http\Controllers\RekognisidtpsController;
use App\Http\Controllers\SeleksimhsbaruController;
use App\Http\Controllers\TempatkerjalulusanController;
use App\Http\Controllers\Waktutunggululusand3Controller;
use App\Http\Controllers\Waktutunggululusans1Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::middleware('auth')->resource('pengguna', PenggunaController::class);
Route::middleware('auth')->resource('mahasiswa', MahasiswaController::class);
Route::middleware('auth')->resource('visimisi', VisimisiController::class);
Route::middleware('auth')->resource('DaftarpsunipengelolapsController',DaftarpsunipengelolapsController::class);
Route::middleware('auth')->resource('Dosenpembimbingutamatugasakhir',Dosenpembimbingutamatugasakhir::class);
Route::middleware('auth')->resource('DosenpraktisiController',DosenpraktisiController::class);
Route::middleware('auth')->resource('DosentdktetapController',DosentdktetapController::class);
Route::middleware('auth')->resource('DosentetapptController',DosentetapptController::class);
Route::middleware('auth')->resource('EwmpController',EwmpController::class);
Route::middleware('auth')->resource('HomeController',HomeController::class);
Route::middleware('auth')->resource('IdentitasController',IdentitasController::class);
Route::middleware('auth')->resource('IpklulusanController',IpklulusanController::class);
Route::middleware('auth')->resource('KaryailmiahdtpsdisitasiController',KaryailmiahdtpsdisitasiController::class);
//Route::middleware('auth')->resource('KaryailmiahmhsdisitasiController',KaryailmiahmhsdisitasiController::class);
Route::middleware('auth')->resource('KcprpembelajaranController',KcprpembelajaranController::class);
Route::middleware('auth')->resource('KepuasanmhsController',KepuasanmhsController::class);
Route::middleware('auth')->resource('KepuasanpenggunalulusanController',KepuasanpenggunalulusanController::class);
Route::middleware('auth')->resource('KerjasamapendidikanController',KerjasamapendidikanController::class);
Route::middleware('auth')->resource('KerjasamapenelitianController',KerjasamapenelitianController::class);
Route::middleware('auth')->resource('KerjasamapkmController',KerjasamapkmController::class);
Route::middleware('auth')->resource('KesesuaianbidkerlulusanController',KesesuaianbidkerlulusanController::class);
Route::middleware('auth')->resource('Luaranpkmdtps1Controller',Luaranpkmdtps1Controller::class);
Route::middleware('auth')->resource('Luaranpkmdtps2Controller',Luaranpkmdtps2Controller::class);
Route::middleware('auth')->resource('Luaranpkmdtps3Controller',Luaranpkmdtps3Controller::class);
Route::middleware('auth')->resource('Luaranpkmdtps4Controller',Luaranpkmdtps4Controller::class);
Route::middleware('auth')->resource('Luaranpkmmhs1Controller',Luaranpkmmhs1Controller::class);
Route::middleware('auth')->resource('Luaranpkmmhs2Controller',Luaranpkmmhs2Controller::class);
Route::middleware('auth')->resource('Luaranpkmmhs3Controller',Luaranpkmmhs3Controller::class);
Route::middleware('auth')->resource('Luaranpkmmhs4Controller',Luaranpkmmhs4Controller::class);
Route::middleware('auth')->resource('MahasiswaController',MahasiswaController::class);
Route::middleware('auth')->resource('Masastudilulusand3Controller',Masastudilulusand3Controller::class);
Route::middleware('auth')->resource('Masastudilulusans1Controller',Masastudilulusans1Controller::class);
Route::middleware('auth')->resource('MhsasingController',MhsasingController::class);
Route::middleware('auth')->resource('PameranpresentasipubilmiahdtpsController',PameranpresentasipubilmiahdtpsController::class);
Route::middleware('auth')->resource('PenelitiandtpsController',PenelitiandtpsController::class);
Route::middleware('auth')->resource('PenelitiandtpsmhsController',PenelitiandtpsmhsController::class);
Route::middleware('auth')->resource('PenelitiandtpsrujukantesisController',PenelitiandtpsrujukantesisController::class);
Route::middleware('auth')->resource('PengakuanrekognisiController',PengakuanrekognisiController::class);
Route::middleware('auth')->resource('PenggunaandanaController',PenggunaandanaController::class);
Route::middleware('auth')->resource('PenggunaController',PenggunaController::class);
Route::middleware('auth')->resource('PkmdtpsController',PkmdtpsController::class);
Route::middleware('auth')->resource('PkmdtpsmhsController',PkmdtpsmhsController::class);
Route::middleware('auth')->resource('PkmpembelajaranController',PkmpembelajaranController::class);
Route::middleware('auth')->resource('PrestasiakademikmhsController',PrestasiakademikmhsController::class);
Route::middleware('auth')->resource('PrestasinonakademikmhsController',PrestasinonakademikmhsController::class);
Route::middleware('auth')->resource('ProdukdtpsadopsiController',ProdukdtpsadopsiController::class);
Route::middleware('auth')->resource('ProdukdtpsadopsimasyarakatController',ProdukdtpsadopsimasyarakatController::class);
Route::middleware('auth')->resource('PublikasiilmiahdtpsController',PublikasiilmiahdtpsController::class);
Route::middleware('auth')->resource('PublikasiilmiahmhsController',PublikasiilmiahmhsController::class);
Route::middleware('auth')->resource('PublikasiilmiahmhspsterapanController',PublikasiilmiahmhspsterapanController::class);
Route::middleware('auth')->resource('PublikasipamerandtpsController',PublikasipamerandtpsController::class);
Route::middleware('auth')->resource('Ref8E2Controller',Ref8E2Controller::class);
Route::middleware('auth')->resource('RekognisidtpsController',RekognisidtpsController::class);
Route::middleware('auth')->resource('SeleksimhsbaruController',SeleksimhsbaruController::class);
Route::middleware('auth')->resource('TempatkerjalulusanController',TempatkerjalulusanController::class);
Route::middleware('auth')->resource('VisimisiController',VisimisiController::class);
Route::middleware('auth')->resource('Waktutunggululusand3Controller',Waktutunggululusand3Controller::class);
Route::middleware('auth')->resource('Waktutunggululusans1Controller',Waktutunggululusans1Controller::class);
