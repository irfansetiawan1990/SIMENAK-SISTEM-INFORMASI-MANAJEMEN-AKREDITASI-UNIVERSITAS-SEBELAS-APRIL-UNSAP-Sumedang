<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasinonakademikmhs extends Model
{
    use HasFactory;
    protected $table = 'prestasi_non_akademik_mhs';
    protected $primaryKey = 'id_prestasi_non_akademik_mhs';
    protected $fillable = 
   [
   	'id_prestasi_akademik_non_mhs',
   	'nama_kegiatan',
   	'waktu_perolehan',
   	'lokal',
   	'nasional',
   	'internasional',
   	'prestasi_yg_dicapai'
   ];

   public $timestamps = false;
}
