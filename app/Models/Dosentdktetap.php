<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosentdktetap extends Model
{
    use HasFactory;
    protected $table ='dosen_tdk_tetap';
    protected $primaryKey ='id_dosen_tdk_tetap';
    protected $fillable =['id_dosen_tdk_tetap','nama_dosen','nidnk','pen_pas_sarjana','bid_keahlian','jabatan_akademik','serdikprof','serkomprof','matkul_ps_akre','kesbid_matkul','prodi_id'];
    public $timestamps = false;
}
