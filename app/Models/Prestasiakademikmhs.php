<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasiakademikmhs extends Model
{
    use HasFactory;
    protected $table = 'prestasi_akademik_mhs';
    protected $primaryKey = 'id_prestasi_akademik_mhs';
    protected $fillable = 
   [
   	'id_prestasi_akademik_mhs',
   	'nama_kegiatan',
   	'waktu_perolehan',
   	'lokal',
   	'nasional',
   	'internasional',
   	'prestasi'
   ];

   public $timestamps = false;
}
