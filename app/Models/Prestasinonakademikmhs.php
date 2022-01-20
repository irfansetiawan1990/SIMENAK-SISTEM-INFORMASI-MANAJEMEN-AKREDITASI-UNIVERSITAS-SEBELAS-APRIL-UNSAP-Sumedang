<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasinonakademikmhs extends Model
{
    use HasFactory;
    protected $table = 'prestasi_nonakademik_mhs';
    protected $primaryKey = 'id_prestasi_non_akademik_mhs';
    protected $fillable = 
   [
    'nama_kegiatan',
    'tahun_perolehan',
    'lokal',
    'nasional',
    'internasional',
    'prestasi_yg_dicapai',
    'prodi_id'
   ];

   public $timestamps = false;
}
