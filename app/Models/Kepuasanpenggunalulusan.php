<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepuasanpenggunalulusan extends Model
{
    use HasFactory;
    protected $table = 'kepuasan_pengguna_lulusan';
    protected $primaryKey ='id_pengguna_lulusan';
   protected $fillable = 
   [
   	'id_pengguna_lulusan',
   	'jenis_kemampuan',
   	'sangat_baik',
    'baik',
    'cukup',
    'kurang',
   	'rencana_tindak_lanjut_ps'
   ] ;
   protected $timestamps = false;
}
