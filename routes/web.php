<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\VisimisiController;
use App\Http\Controllers\pengelolaprodiController;
use App\Http\Controllers\KerjasamapendidikanController;
use App\Http\Controllers\KerjasamapenelitianController;
use App\Http\Controllers\KerjasamapkmController;
use App\Http\Controllers\SeleksimhsbaruController;
use App\Http\Controllers\MhsasingController;
use App\Http\Controllers\DosentetapptController;
use App\Http\Controllers\DosbingtaController;
use App\Http\Controllers\EwmpController;
use App\Http\Controllers\Auth\LoginController;




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




Route::group(['middleware'=>['auth','ceklevel:admin,user']], function() {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::resource('pengguna', PenggunaController::class);
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('visimisi', VisimisiController::class);
Route::resource('pengelolaprodi', pengelolaprodiController::class);
Route::resource('Kerjasamapendidikan', KerjasamapendidikanController::class);
Route::resource('Kerjasamapenelitian', KerjasamapenelitianController::class);
Route::resource('Kerjasamapkm', KerjasamapkmController::class);
Route::resource('Seleksimhsbaru', SeleksimhsbaruController::class);
Route::resource('Mhsasing', MhsasingController::class);
Route::resource('Dosentetappt', DosentetapptController::class);
Route::resource('Dosbingta', DosbingtaController::class);
Route::resource('Ewmp', EwmpController::class);
Route::resource('visimisi', VisimisiController::class);

});



