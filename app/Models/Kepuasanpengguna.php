<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepuasanpengguna extends Model
{
    use HasFactory;
    protected $table = 'kepuasan_pengguna';
    protected $primaryKey ='id_kp';
   protected $fillable = 
   [
   	'jenis_kemampuan',
   	'sangat_baik',
    'baik',
    'cukup',
    'kurang',
   	'tindak_lanjut',
    'prodi_id'
   ] ;
   public $timestamps = false;
}
